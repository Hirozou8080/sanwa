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
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name')->comment('店舗名');
            $table->integer('post_num')->comment('郵便番号');
            $table->integer('prefecture_id')->comment('都道府県ID');
            $table->string('city')->comment('市区町村');
            $table->string('address')->comment('住所');
            $table->boolean('recruit_flg')->nullable()->comment('求人募集フラグ');
            $table->timestamps();
            $table->softDeletes();
        });
    // ALTER 文を実行しテーブルにコメントを設定
    DB::statement("ALTER TABLE stores COMMENT '店舗テーブル'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
};
