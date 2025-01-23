<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
</head>
<body>
    <h1>Chat Page</h1>

    <div id="message-container">
        <p id="message-text">{{ $message->message_text }}</p>
    </div>

    <div id="options-container">
        @foreach ($options as $option)
            <button class="option-button" data-next-message-id="{{ $option->next_message_id }}">
                {{ $option->option_text }}
            </button>
        @endforeach
    </div>

    <script>
        // 選択肢ボタンのクリックイベントを設定
        document.querySelectorAll('.option-button').forEach(button => {
            button.addEventListener('click', function() {
                const nextMessageId = this.getAttribute('data-next-message-id');

                // 次のメッセージを取得するためにAJAXリクエストを送信
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
                    // 新しいメッセージを表示
                    document.getElementById('message-text').textContent = data.message;

                    // 新しい選択肢を表示
                    const optionsContainer = document.getElementById('options-container');
                    optionsContainer.innerHTML = ''; // 既存の選択肢をクリア

                    data.options.forEach(option => {
                        const button = document.createElement('button');
                        button.classList.add('option-button');
                        button.textContent = option.option_text;
                        button.setAttribute('data-next-message-id', option.next_message_id);
                        optionsContainer.appendChild(button);
                    });
                });
            });
        });
    </script>
</body>
</html>
