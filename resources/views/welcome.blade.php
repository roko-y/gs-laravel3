@extends('layouts.app') {{-- Laravelの基本レイアウトを拡張 --}}

@section('content')
<div class="flex">
    {{-- サイドバー --}}
    <aside class="w-1/4 max-w-[250px] min-h-screen border-r p-4">
        {{-- サイドバー内のリンク --}}
        <nav class="space-y-4">
            <a href="#" class="block text-sm font-medium text-gray-600 hover:text-gray-900">
                課題一覧 {{-- サイドバーの「課題一覧」リンク --}}
            </a>
            <a href="#" class="block text-sm font-medium text-gray-600 hover:text-gray-900">
                改善案一覧 {{-- サイドバーの「改善案一覧」リンク --}}
            </a>
            <a href="#" class="block text-sm font-medium text-gray-600 hover:text-gray-900">
                タスク一覧 {{-- サイドバーの「タスク一覧」リンク --}}
            </a>
        </nav>
    </aside>

    {{-- メインコンテンツ --}}
    <main class="w-3/4 min-h-screen p-8">
        {{-- ページタイトル --}}
        <h2 class="text-2xl font-bold mb-4">
            課題を特定して、あなたのビジネスを加速させます！
        </h2>
        {{-- ページ説明文 --}}
        <p class="text-gray-600 mb-8">
            以下のステップを踏むことで、あなたのマーケティング・営業領域での課題が明確になります！
        </p>

        {{-- STEPごとのセクション --}}
        <div class="space-y-6">

            {{-- STEP 1 --}}
            <section class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-medium mb-4">STEP1：課題を特定する</h3>
                <div class="grid gap-6 md:grid-cols-2">
                    {{-- WEB診断カード --}}
                    <div class="shadow-sm p-4 bg-white rounded-lg">
                        <h4 class="text-base font-bold">①WEB診断による課題の整理と特定</h4>
                        {{-- ボタンをクリックして新規作成を開始 --}}
                        <a href="{{ route('chat.index') }}" target="_blank" class="mt-4 px-4 py-2 border border-gray-300 rounded-md w-full inline-block text-center">
                            <span class="mr-2">+</span>新規作成
                        </a>
                    </div>
                    {{-- AI診断カード --}}
                    <div class="shadow-sm p-4 bg-white rounded-lg">
                        <h4 class="text-base font-bold">②AI診断による課題の整理と特定</h4>
                        {{-- ボタンをクリックして新規作成を開始 --}}
                        <button class="mt-4 px-4 py-2 border border-gray-300 rounded-md w-full">
                            <span class="mr-2">+</span>新規作成
                        </button>
                        </a>
                    </div>
                </div>
            </section>

            {{-- STEP 2 --}}
            <section class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-medium mb-4">STEP2：課題の改善案を出す</h3>
                <div class="grid gap-6 md:grid-cols-2">
                    {{-- WEB改善カード --}}
                    <div class="shadow-sm p-4 bg-white rounded-lg">
                        <h4 class="text-base font-bold">①WEB診断による改善提案</h4>
                        {{-- このステップが終了していないことを表示 --}}
                        <p class="text-sm text-gray-500 mt-2">
                            このSTEPが終了していません。
                        </p>
                    </div>
                    {{-- AI改善カード --}}
                    <div class="shadow-sm p-4 bg-white rounded-lg">
                        <h4 class="text-base font-bold">②AI診断による改善提案</h4>
                        {{-- このステップが終了していないことを表示 --}}
                        <p class="text-sm text-gray-500 mt-2">
                            このSTEPが終了していません。
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </main>
</div>
@endsection
