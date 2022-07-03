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
        Schema::create('notice_categories', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name')->nullable(false)->comment('カテゴリ名');
            $table->timestamps();
            $table->softDeletes();
            // ALTER 文を実行しテーブルにコメントを設定
            DB::statement("ALTER TABLE flights COMMENT 'お知らせカテゴリーテーブル'");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notice_categories');
    }
};
