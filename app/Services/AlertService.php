<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// models
use App\Models\Alert;
class AlertService
{
  /**
 * 通知登録処理
 * @param request  : post値 
 */
  public function alertRegist(Request $request)
  {
    dd($request->all());
    try {
      // トランザクション開始
      DB::beginTransaction();
      Store::create([
        'name'     => $request['storeName'],
        'post_num'    => $request['postNumPrev'].$request['postNumNext'],
        'prefecture_id' => $request['prefecture'],
        'city' => $request['city'],
        'address' => $request['address'],
        'recruit_flg' => $request['recruit']
      ]);
      DB::commit();
      // トランザクション終了
  } catch (Throwable $e) {
      DB::rollBack();
  }
    return ;
  }
}