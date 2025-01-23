Chatページの元コード
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Page</title>
    <style>
        .chat-container {
            margin: 20px auto;
            padding: 20px;
            width: 90%;
            max-width: 600px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .message {
            margin-bottom: 10px;
        }
        .user-message {
            text-align: right;
            font-weight: bold;
            color: #444;
        }
        .option-btn {
            display: inline-block;
            margin: 5px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .option-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="chat-container" id="chat-container">
        <div class="message">
            <strong>質問:</strong>
            <p>{{ $message->message_text }}</p>
        </div>
        <div id="options">
            @foreach ($options as $option)
                <button class="option-btn" data-next-message-id="{{ $option->next_message_id }}">
                    {{ $option->option_text }}
                </button>
            @endforeach
        </div>
    </div>

    <script>
        document.getElementById('options').addEventListener('click', function(event) {
            if (event.target.classList.contains('option-btn')) {
                const nextMessageId = event.target.getAttribute('data-next-message-id');

                fetch('/chat/next', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ next_message_id: nextMessageId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.error) {
                        alert(data.error);
                        return;
                    }

                    // ユーザーの選択を履歴に追加
                    const userMessage = document.createElement('div');
                    userMessage.className = 'message user-message';
                    userMessage.innerHTML = `<p>${event.target.innerText}</p>`;
                    document.getElementById('chat-container').appendChild(userMessage);

                    // 次の質問を表示
                    const nextMessage = document.createElement('div');
                    nextMessage.className = 'message';
                    nextMessage.innerHTML = `<strong>質問:</strong> <p>${data.message}</p>`;
                    document.getElementById('chat-container').appendChild(nextMessage);

                    // 選択肢を更新
                    const optionsContainer = document.getElementById('options');
                    optionsContainer.innerHTML = '';
                    data.options.forEach(option => {
                        const button = document.createElement('button');
                        button.className = 'option-btn';
                        button.textContent = option.option_text;
                        button.setAttribute('data-next-message-id', option.next_message_id);
                        optionsContainer.appendChild(button);
                    });
                })
                .catch(error => console.error('Error:', error));
            }
        });
    </script>
</body>
</html>