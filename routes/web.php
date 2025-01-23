<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| このファイルでは、アプリケーションのルートを登録します。
| RouteServiceProviderにより、自動的に「web」ミドルウェアグループに
| 割り当てられます。大きなアプリケーションを作りましょう！
*/

// Welcomeページのルート（トップページ用）
Route::get('/', function () {
    return view('welcome'); // welcomeページを表示
});

/*
|--------------------------------------------------------------------------
| チャット機能のルート設定
|--------------------------------------------------------------------------
| ChatControllerを使ったチャット画面表示と質問の流れを処理します。
*/

// 最初の質問を表示するルート
Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

// 選択肢をクリックした後、次の質問を取得するルート
Route::post('/chat/next', [ChatController::class, 'next'])->name('chat.next');

/*
|--------------------------------------------------------------------------
| 認証機能関連のルート（必要に応じてコメントアウトまたは削除可能）
|--------------------------------------------------------------------------
| 以下は認証機能（ログイン、プロフィール編集など）のルートです。
| プロジェクト要件に応じて有効化してください。
*/

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard'); // ダッシュボード画面
//     })->name('dashboard');
//
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

/*
|--------------------------------------------------------------------------
| ダッシュボードのルート追加
|--------------------------------------------------------------------------
| もし認証が必要でない場合、以下のルートを使用してください。
*/

Route::get('/dashboard', function () {
    return view('dashboard'); // ダッシュボード画面
})->name('dashboard');


// プロフィール編集用のルート
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

// プロフィール更新のルート
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

// プロフィール削除のルート
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| セッションテスト用ルート（デバッグ用・不要であれば削除可能）
|--------------------------------------------------------------------------
| 以下のコードはセッション操作をテストするためのものです。
*/

// Route::get('/session-test', function () {
//     session(['key' => 'value']); // セッションに値を保存
//     return session('key');       // セッションから値を取得して返す
// });

/*
|--------------------------------------------------------------------------
| 認証関連ルートの追加設定
|--------------------------------------------------------------------------
| デフォルトの認証用ルートを追加します。
*/
require __DIR__.'/auth.php';
