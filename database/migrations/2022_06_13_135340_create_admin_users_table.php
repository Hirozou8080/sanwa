<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name')->nullable(false)->comment('名前');
            $table->string('email')->nullable(false)->comment('メールアドレス');
            $table->string('password')->nullable(false)->comment('パスワード');
            $table->date('register_date')->comment('登録日');
            $table->timestamps();
            $table->softDeletes();
            // ALTER 文を実行しテーブルにコメントを設定
            DB::statement("ALTER TABLE admin_users COMMENT '管理者ユーザテーブル'");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
    }
};