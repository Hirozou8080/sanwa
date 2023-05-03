<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

// Controller
use App\Http\Controllers\CommonController;
// models
use App\Models\Alert;

use Carbon\Carbon;
use Exception;

class AlertService
{

  private $common;

  public function __construct()
  {
    $this->common = new CommonService();
  }
  /**
   * 通知登録処理
   * @param request  : post値 
   */
  public function alertRegist(Request $request)
  {
    Log::info(__CLASS__ . ' ' . __FUNCTION__ . ' start ');
    try {
      // トランザクション開始
      DB::transaction(function () use ($request) {

        $file_name = null;
        $file_path = null;
        if ($request->file('image')) {
          $file_name = $request->file('image')->getClientOriginalName();
          // file保存処理
          $file_path = $this->common->saveFile($request->file('image'), 'alert');
        }

        // 現在日時取得
        $now = Carbon::now();

        Alert::create([
          'category_id'  => $request['category'],
          'title'    => $request['postNumPrev'] . $request['title'],
          'body' => $request['body'],
          'file_name' => $file_name,
          'file_path' => $file_path,
          'posted_date' => $now,
        ]);
      });
      Log::info(__CLASS__ . ' ' . __FUNCTION__ . ' success ');
    } catch (Exception $e) {
      Log::error(__CLASS__ . ' ' . __FUNCTION__ . ' error ');
      Log::error($e);
    }
    return;
  }
}
