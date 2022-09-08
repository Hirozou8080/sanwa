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
    if($request->file()){
      $request->upload_file->store('alerts');
      dd($request->file(),$request->all());
    }else {
      dd($request->all());
    }

    try {
      // トランザクション開始
      DB::beginTransaction();
      Store::create([
        'category_id'     => $request['category_id'],
        'title'    => $request['postNumPrev'].$request['title'],
        'body' => $request['body'],
        'image_dir' => $request['image_dir'],
        'posted_date' => $request['posted_date'],
      ]);
      DB::commit();
      // トランザクション終了
  } catch (Throwable $e) {
      DB::rollBack();
  }
    return ;
  }
}