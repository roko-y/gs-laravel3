<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|-------------------------------------------------------------------------- 
| Web Routes 
|-------------------------------------------------------------------------- 
| Here is where you can register web routes for your application. 
| These routes are loaded by the RouteServiceProvider and all of them will 
| be assigned to the "web" middleware group. Make something great!
*/

Route::get('/', function () {
    return view('welcome');
});

// チャット機能のルート設定
Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
Route::post('/chat/next', [ChatController::class, 'next'])->name('chat.next');

// 認証機能に関連するルート（必要に応じて削除またはコメントアウト）
/*
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/

// セッション動作確認用ルート（不要であれば削除）
/*
Route::get('/session-test', function () {
    session(['key' => 'value']);
    return session('key');
});
*/

require __DIR__.'/auth.php';