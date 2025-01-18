<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message; // 'messages'テーブルを扱うモデル
use App\Models\Option;  // 'options'テーブルを扱うモデル

class ChatController extends Controller
{
    /**
     * 初期チャット画面を表示するメソッド
     * - 最初の質問を取得してビューに渡す
     */
    public function index()
    {
        // 'messages'テーブルからorderが1の最初の質問を取得
        $firstMessage = Message::where('order', 1)->first();

        // 最初の質問に関連する選択肢を取得
        $options = Option::where('message_id', $firstMessage->id)->get();

        // 'chat'ビューに質問と選択肢を渡して表示
        return view('chat', ['message' => $firstMessage, 'options' => $options]);
    }

    /**
     * ユーザーの選択に基づき、次の質問を表示するメソッド
     * - ユーザーが選んだ選択肢に基づき次のメッセージを取得
     */
    public function next(Request $request)
    {
        // フォームから送信された次のメッセージIDを取得
        $nextMessageId = $request->input('next_message_id');
        
        // 次のメッセージを取得
        $nextMessage = Message::find($nextMessageId);
        
        // 次のメッセージに関連する選択肢を取得
        $options = Option::where('message_id', $nextMessage->id)->get();

        // 次のメッセージと選択肢をJSONレスポンスで返す
        return response()->json([
            'message' => $nextMessage->message_text,
            'options' => $options
        ]);
    }
}
