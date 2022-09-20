<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
// Controller
use App\Http\Controllers\CommonController;
// models
use App\Models\Alert;

use Carbon\Carbon;
class AlertService
{
  /**
 * 通知登録処理
 * @param request  : post値 
 */
  public function alertRegist(Request $request)
  {
    $file_name = null;
    $file_path = null;
    if($request->file('image')){
      $file_name = $request->file('image')->getClientOriginalName();
      // file保存処理
      $commonController = new CommonController();
      $file_path = $commonController->saveFile($request->file('image'),'alert');
    }
    
    // 現在日時取得
    $now = Carbon::now();

    try {
      // トランザクション開始
      DB::beginTransaction();
      Alert::create([
        'category_id'  => $request['category'],
        'title'    => $request['postNumPrev'].$request['title'],
        'body' => $request['body'],
        'file_name' => $file_name,
        'file_path' => $file_path,
        'posted_date' => $now,
      ]);
      DB::commit();
      // トランザクション終了
  } catch (Throwable $e) {
      DB::rollBack();
  }
    return ;
  }
}