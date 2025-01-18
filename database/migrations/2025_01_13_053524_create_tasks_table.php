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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // 課題のタイトル
            $table->text('description')->nullable(); // 課題の詳細 (任意)
            $table->string('category')->nullable(); // カテゴリ (任意)
            $table->boolean('completed')->default(false); // 完了状況 (初期値: 未完了)
            $table->timestamps(); // 作成日時と更新日時
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks'); // テーブルを削除
    }
};
