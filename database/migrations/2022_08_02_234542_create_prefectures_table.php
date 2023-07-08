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
        Schema::create('prefectures', function (Blueprint $table) {
            $table->id('id')->comment('ID');
            $table->string('name')->comment('都道府県');
            $table->timestamps();
        });
        // ALTER 文を実行しテーブルにコメントを設定
        DB::statement("ALTER TABLE prefectures COMMENT '都道府県テーブル'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prefectures');
    }
};
