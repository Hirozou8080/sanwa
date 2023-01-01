<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = [
    'store_id',
    'name',
    'detail',
    'price'
  ];

  /**
   * 店舗IDから商品取得
   */
  public static function getProductId($store_id)
  {
    return Product::where('store_id', $store_id)->get()->toArray();
  }

  /**
   * 店舗取得
   */
  public function store()
  {
    return $this->belongsTo(Store::class);
  }
}
