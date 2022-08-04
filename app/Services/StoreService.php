<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// models
use App\Models\Store;
class StoreService
{

/**
 * 店舗登録処理
 * @param request  : post値 
 */
  public function storeRegist(Request $request)
  {
    dd($request);
    try {
      // トランザクション開始
      DB::beginTransaction();
      
      Store::create([
        'name'     => $request['name'],
        'email'    => $request['email'],
        'password' => $password,
        'register_date' => $now
      ]);
      DB::commit();
      // トランザクション終了
  } catch (Throwable $e) {
      DB::rollBack();
  }
    return ;
  }
}