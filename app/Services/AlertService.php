<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
// Controller
use App\Http\Controllers\CommonController;
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
    $file_name = null;
    $file_path = null;
    if($request->file()){
      // file保存処理
      $commonController = new CommonController();
      $upload_file_name = $commonController->saveFile('alert',$request->file());
    }
    dd($upload_file_name,$request->file());
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