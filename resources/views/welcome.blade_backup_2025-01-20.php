<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Chat</title>

    <style>
        .start-chat-btn {
            padding: 15px 30px;
            font-size: 18px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            text-align: center;
        }

        .start-chat-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <!-- チャット開始ボタン -->
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <h1 class="text-3xl font-semibold text-gray-900 dark:text-white">Welcome to the Chat Application!</h1>
            </div>

            <div class="flex justify-center mt-6">
                <a href="{{ route('chat.index') }}">
                    <button class="start-chat-btn">Start Chat</button>
                </a>
            </div>
        </div>
    </div>
</body>
</html>