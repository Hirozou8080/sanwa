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

    return view("price_detail")->with('store', $store);
  }
}
