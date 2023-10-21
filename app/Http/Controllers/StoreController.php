<?php

namespace App\Http\Controllers;

// common
use App\Http\Controllers\CommonController;
use Illuminate\Contracts\View\View;

class StoreController extends CommonController
{
  public function index(): View
  {
    // 全店舗取得
    $stores = $this->getAllStore();
    // 都道府県取得
    $prefectures = $this->getAllPrefecture();

    return view("store")->with(['stores' => $stores, 'prefectures' => $prefectures]);
  }
}
