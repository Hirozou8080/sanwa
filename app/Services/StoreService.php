<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
// models
use App\Models\Store;
use Throwable;

class StoreService
{

  /**
   * 店舗登録処理
   * @param request  : post値 
   */
  public function storeRegist(Request $request)
  {
    try {
      // トランザクション開始
      DB::beginTransaction();
      Store::create([
        'name'     => $request['storeName'],
        'post_num'    => $request['postNumPrev'] . $request['postNumNext'],
        'prefecture_id' => $request['prefecture'],
        'city' => $request['city'],
        'address' => $request['address'],
        'recruit_flg' => $request['recruit']
      ]);
      DB::commit();
      // トランザクション終了
    } catch (Throwable $e) {
      Log::error($e);
      DB::rollBack();
    }
    return;
  }
  /**
   * 店舗編集処理
   * @param request  : post値 
   * @param store_id : 店舗ID
   */
  public function storeEdit(Request $request, $store_id)
  {
    try {
      // トランザクション開始
      DB::beginTransaction();
      Store::where('id', $store_id)->update([
        'name' => $request['storeName'],
        'post_num' => $request['postNumPrev'] . $request['postNumNext'],
        'prefecture_id' => $request['prefecture'],
        'city' => $request['city'],
        'address' => $request['address'],
        'recruit_flg' => $request['recruit']
      ]);
      DB::commit();
      // トランザクション終了
    } catch (Throwable $e) {
      Log::error($e);
      DB::rollBack();
    }
    return;
  }
  /**
   * 店舗削除処理
   * @param store_id : 店舗ID
   */
  public function storeDelete($store_id)
  {
    try {
      // トランザクション開始
      DB::beginTransaction();
      Store::find($store_id)->delete();
      DB::commit();
      // トランザクション終了
    } catch (Throwable $e) {
      Log::error($e);
      DB::rollBack();
    }
    return;
  }
}
