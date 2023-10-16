<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $fillable = [
    'name',
    'post_num',
    'prefecture_id',
    'city',
    'address',
    'recruit_flg',
  ];

  /**
   * 全店舗取得
   */
  public static function getAllStore()
  {
    return Store::all()->toArray();
  }

  /**
   * IDから店舗取得
   */
  public static function getStoreId($id)
  {
    $store = Store::with('product')->with('prefecture')->find($id);
    return json_decode(json_encode($store), true);
  }

  /**
   * 商品取得
   */
  public function product()
  {
    return $this->hasMany(Product::class);
  }

  /**
   * 
   */
  public function prefecture()
  {
    return $this->belongsTo(Prefecture::class);
  }
}
