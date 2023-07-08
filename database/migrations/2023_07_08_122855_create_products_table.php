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
        Schema::create('products', function (Blueprint $table) {
            $table->id('id')->comment('ID');
            $table->unsignedBigInteger('store_id')->comment('店舗ID');
            $table->string('name')->comment('商品名');
            $table->text('detail')->nullable()->comment('詳細');
            $table->integer('price')->comment('金額');
            $table->timestamps();
            $table->softDeletes();
            # 外部キー制約
            $table->foreign('store_id')->references('id')->on('stores')->onUpdate('CASCADE')->onDelete('CASCADE');
        });

        // ALTER 文を実行しテーブルにコメントを設定
        DB::statement("ALTER TABLE products COMMENT '商品情報テーブル'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
