<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// controller
use App\Http\Controllers\CommonController;

class PriceController extends Controller
{
  private $commonController;
  public function __construct()
  {
    $this->commonController = new CommonController();
  }
  /**
   * 店舗料金案内表示
   */
  public function index(Request $request)
  {
    $stores = $this->commonController->getAllStore();

    return view("price")->with('stores', $stores);
  }

  /** 
   * 店舗料金表示
   * @param store_id : 店舗ID
   *  
   */
  public function detail(Request $request, $store_id)
  {
    // 店舗情報取得
    $store = $this->commonController->getStore($store_id);
    $res = [];
    $res['name'] = $store['name'];
    $res['product_left'] = [];
    $res['product_right'] = [];
    foreach ($store['product'] as $key => $product) {
      if ($key % 2 !== 1) {
        // 奇数の場合
        $res['product_left'][$key]['name'] = $product['name'];
        $res['product_left'][$key]['price'] = $product['price'];
      } else {
        // 偶数の場合
        $res['product_right'][$key]['name'] = $product['name'];
        $res['product_right'][$key]['price'] = $product['price'];
      }
    }
    // dd($res);
    return view("price_detail")->with('store', $res);
  }
}
