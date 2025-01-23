@extends('layouts.app') {{-- Laravelの基本レイアウトを拡張 --}}

@section('content')
<div class="flex">
    {{-- サイドバー --}}
    <aside class="w-1/4 max-w-[250px] min-h-screen border-r p-4">
        {{-- サイドバー内のリンク --}}
        <nav class="space-y-4">
            <a href="{{ route('dashboard') }}" class="block text-sm font-medium text-gray-600 hover:text-gray-900">
                課題一覧 {{-- サイドバーの「課題一覧」リンク --}}
            </a>
            <a href="{{ route('dashboard') }}" class="block text-sm font-medium text-gray-600 hover:text-gray-900">
                改善案一覧 {{-- サイドバーの「改善案一覧」リンク --}}
            </a>
            <a href="{{ route('dashboard') }}" class="block text-sm font-medium text-gray-600 hover:text-gray-900">
                タスク一覧 {{-- サイドバーの「タスク一覧」リンク --}}
            </a>
        </nav>
    </aside>

    {{-- メインコンテンツ --}}
    <main class="w-3/4 min-h-screen p-8">
        {{-- ページタイトル --}}
        <h2 class="text-2xl font-bold mb-4">
            課題を特定しよう！
        </h2>
        {{-- チャットコンテナ --}}
        <div class="chat-container bg-gray-50 p-4 rounded-lg shadow">
            {{-- 現在の質問を表示 --}}
            <div class="message">
            <p><strong>質問:</strong>{{ $message->message_text }}</p>
            </div>
            {{-- 選択肢を表示 --}}
            <div id="options" class="mt-4 space-y-2">
                @foreach ($options as $option)
                    <button class="option-btn w-full text-left px-4 py-2 border border-gray-300 rounded-md" 
                            data-next-message-id="{{ $option->next_message_id }}">
                        {{ $option->option_text }}
                    </button>
                @endforeach
            </div>
        </div>
    </main>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const optionsContainer = document.getElementById('options'); // 選択肢を含むコンテナ

    /**
     * ユーザーが選択肢ボタンをクリックした際の処理を設定。
     * - `fetch`を使用してサーバーにリクエストを送信。
     * - レスポンスデータをもとに次の質問と選択肢を更新。
     */
    optionsContainer.addEventListener('click', function (event) {
        if (event.target.classList.contains('option-btn')) { // ボタンがクリックされた場合のみ処理を実行
            const nextMessageId = event.target.getAttribute('data-next-message-id');



            fetch('/chat/next', {         // サーバーにPOSTリクエストを送信
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'        // LaravelのCSRFトークンを追加
                },
                body: JSON.stringify({ next_message_id: nextMessageId })   // リクエストデータをJSON形式で送信
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {          // サーバーからエラーが返された場合
                    alert('エラー'+data.error);
                    return;
                }

                // ユーザーの選択を履歴に追加
                const userMessage = document.createElement('div');
                userMessage.classList.add('message', 'user-message');
                userMessage.textContent = event.target.textContent;
                optionsContainer.insertAdjacentElement('beforebegin', userMessage);

                // 次の質問を表示
                const nextMessage = document.createElement('div');
                nextMessage.classList.add('message');
                nextMessage.innerHTML = `<strong>質問:</strong> <p>${data.message}</p>`;
                optionsContainer.insertAdjacentElement('beforebegin', nextMessage);

                // 選択肢を更新
                optionsContainer.innerHTML = '';
                data.options.forEach(option => {
                    const button = document.createElement('button');
                    button.className = 'option-btn w-full text-left px-4 py-2 border border-gray-300 rounded-md';
                    button.textContent = option.option_text;
                    button.setAttribute('data-next-message-id', option.next_message_id);
                    optionsContainer.appendChild(button);
                });
            })
            .catch(error => console.error('Error:', error));
            alert('通信に失敗しました。');
        }
    });
</script>
@endsection