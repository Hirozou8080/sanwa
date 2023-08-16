<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
// models
use App\Models\Product;
use Throwable;

class ProductService
{
  public function productRegist($post_data)
  {
    Log::info(__CLASS__ . ' ' . __FUNCTION__ . ' start');
    // トランザクション開始
    DB::transaction(function () use ($post_data) {
      Product::create([
        'store_id'     => $post_data['store_id'],
        'name'    => $post_data['name'],
        'price' => $post_data['price'],
        'detail' => $post_data['detail'],
      ]);
    });
    Log::info(__CLASS__ . ' ' . __FUNCTION__ . ' success');
  }
}
