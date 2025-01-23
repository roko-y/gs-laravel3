<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        // 仮のユーザー情報を渡す
        $user = (object) [
            'name' => 'Default User',          // デフォルトの名前
            'email' => 'default@example.com', // デフォルトのメールアドレス
        ];

        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        // POSTデータを利用した仮の更新処理（実際には何も保存されない）
        $updatedName = $request->input('name', 'Default User');
        $updatedEmail = $request->input('email', 'default@example.com');

        // デバッグ用にログを記録（必要に応じて削除）
        \Log::info('Updated Profile', ['name' => $updatedName, 'email' => $updatedEmail]);

        // 成功メッセージをセッションに保存してリダイレクト
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // 仮の削除処理（実際には何も削除されない）
        \Log::info('Account deletion attempted.');

        return Redirect::to('/')->with('status', 'account-deleted');
    }
}
