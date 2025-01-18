<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // ユーザー名
            $table->string('email')->unique(); // ユーザーのメールアドレス
            $table->timestamp('email_verified_at')->nullable(); // メール確認日時
            $table->string('password'); // パスワード
            $table->rememberToken(); // Remember me トークン
            $table->timestamps(); // 作成日時と更新日時
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();

        //     $table->string('image_path')->nullable()->comment('画像の保存URL');
        //     $table->string('title')->comment('画像のタイトル');
        //     $table->text('description')->nullable()->comment('画像に関する説明');


        //     $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
