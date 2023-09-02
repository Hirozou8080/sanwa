<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
// models
use App\Models\Product;

class ProductService
{
  public function productRegist($post_data)
  {
    Log::info(__CLASS__ . ' ' . __FUNCTION__ . ' start');
    // トランザクション開始
    DB::transaction(function () use ($post_data) {
      if ($post_data['product_id']) {
        // 編集の場合
        $product = Product::where('id', $post_data['product_id'])->first();
      } else {
        // 登録の場合
        $product = new Product();
      }
      $product->store_id = $post_data['store_id'];
      $product->name = $post_data['name'];
      $product->price = $post_data['price'];
      $product->detail = $post_data['detail'];
      $product->save();
    });
    Log::info(__CLASS__ . ' ' . __FUNCTION__ . ' success');
  }
}
