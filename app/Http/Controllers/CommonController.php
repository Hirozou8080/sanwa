<?php

namespace App\Http\Controllers;

// models
use App\Models\Admin_user;
use App\Models\Store;
use App\Models\Prefecture;
use App\Models\Alert;
use App\Models\Product;

class CommonController extends Controller
{
  /**
   * IDからユーザ情報を取得
   * 1 : 1
   * @param id : ユーザーID
   */
  public function getUser($id)
  {
    $user = Admin_user::getUserId($id);
    return $user;
  }
  /**
   * 全店舗の取得
   */
  public function getAllStore()
  {
    $stores = Store::getAllStore();
    return $stores;
  }
  /**
   * IDから店舗の取得
   */
  public function getStore($id)
  {
    $store = Store::getStoreId($id);
    return $store;
  }
  /**
   * 店舗IDから店舗商品の取得
   */
  public function getProduct($store_id)
  {
    $products = Product::getProductId($store_id);
    return $products;
  }
  /**
   * 全都道府県の取得
   */
  public function getAllPrefecture()
  {
    $prefecture = Prefecture::getAllPrefecture();
    return $prefecture;
  }
  /**
   * IDから都道府県の取得
   */
  public function getPrefecture($id)
  {
    $prefecture = Prefecture::getPrefectureId($id);
    return $prefecture;
  }
  /**
   * 全通知の取得
   */
  public function getAllAlert($sort = false)
  {
    $alerts = Alert::getAllAlert(sort: $sort);
    return $alerts;
  }
  /**
   * Topページ用の通知取得
   */
  public function getTopAlert()
  {
    $alerts = Alert::getTopAlert();
    return $alerts;
  }
  /**
   * IDから通知を一件取得
   */
  public function getAlert($id)
  {
    $alert = Alert::getAlertId($id);
    return $alert;
  }
}
