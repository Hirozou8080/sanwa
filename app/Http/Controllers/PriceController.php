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
   * @param price_id : 店舗ID
   *  
   */
  public function detail(Request $request, $price_id)
  {
    $stores = [
      'name' => '金親本店',
      'post_code' => '264-0002',
      'prefectures' => '千葉県',
      'address' => '千葉市若葉区千城台東2-24-10',
      'service' => [
        '土日祝営業', '衣類リフォーム', '駐車場あり', '当日仕上げ可能'
      ],
      'job_offer' => true,
    ];
    return view("price_detail")->with('stores', $stores);
  }
}
