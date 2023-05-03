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
    Log::info(__CLASS__ . ' ' . __FUNCTION__ . ' start');

    try {
      // トランザクション開始
      DB::transaction(function () use ($request) {

        Store::create([
          'name'     => $request['storeName'],
          'post_num'    => $request['postNumPrev'] . $request['postNumNext'],
          'prefecture_id' => $request['prefecture'],
          'city' => $request['city'],
          'address' => $request['address'],
          'recruit_flg' => $request['recruit']
        ]);
        Log::info(__CLASS__ . ' ' . __FUNCTION__ . ' success');
      });
    } catch (Throwable $e) {
      Log::error(__CLASS__ . ' ' . __FUNCTION__ . ' error');
      Log::error($e);
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
    Log::info(__CLASS__ . ' ' . __FUNCTION__ . ' start');

    try {
      // トランザクション開始
      DB::transaction(function () use ($request, $store_id) {
        // 該当の店舗の更新
        Store::where('id', $store_id)
          ->update([
            'name' => $request['storeName'],
            'post_num' => $request['postNumPrev'] . $request['postNumNext'],
            'prefecture_id' => $request['prefecture'],
            'city' => $request['city'],
            'address' => $request['address'],
            'recruit_flg' => $request['recruit']
          ]);
      });
      Log::info(__CLASS__ . ' ' . __FUNCTION__ . ' success');
    } catch (Throwable $e) {
      Log::error(__CLASS__ . ' ' . __FUNCTION__ . ' error');
      Log::error($e);
    }

    return;
  }

  /**
   * 店舗削除処理
   * @param store_id : 店舗ID
   */
  public function storeDelete($store_id)
  {
    Log::info(__CLASS__ . ' ' . __FUNCTION__ . ' start');

    try {
      // トランザクション開始
      DB::transaction(function () use ($store_id) {
        // 該当店舗の削除
        Store::find($store_id)->delete();
      });
      Log::info(__CLASS__ . ' ' . __FUNCTION__ . ' success');
    } catch (Throwable $e) {
      Log::error(__CLASS__ . ' ' . __FUNCTION__ . ' error');
      Log::error($e);
    }
    return;
  }
}
