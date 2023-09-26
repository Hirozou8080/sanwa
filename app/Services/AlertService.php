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

        // 通知新規登録
        $alert = new Alert();
        $alert['category_id']  = $request['category'];
        $alert['title']    = $request['postNumPrev'] . $request['title'];
        $alert['body'] = $request['body'];
        $alert['file_name'] = $file_name;
        $alert['file_path'] = $file_path;
        $alert['posted_date'] = $now;

        // 登録
        $alert->save();
      });
      Log::info(__CLASS__ . ' ' . __FUNCTION__ . ' success ');
    } catch (Exception $e) {
      Log::error(__CLASS__ . ' ' . __FUNCTION__ . ' error ');
      Log::error($e);
    }
    return;
  }

  /**
   * 通知編集処理
   * @param request  : post値 
   */
  public function alertEdit($request)
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

        // 通知編集
        $alert = Alert::find($request['id']);
        $alert['category_id']  = $request['category'];
        $alert['title']    = $request['postNumPrev'] . $request['title'];
        $alert['body'] = $request['body'];
        $alert['file_name'] = $file_name;

        // 削除フラグがあればファイル削除
        if ($request['fileDeleteFlg'] && $alert['file_path']) {
          $this->common->deleteFile($alert['file_path']);
        }

        $alert['file_path'] = $file_path;

        // 更新
        $alert->save();
      });
      Log::info(__CLASS__ . ' ' . __FUNCTION__ . ' success ');
    } catch (Exception $e) {
      Log::error(__CLASS__ . ' ' . __FUNCTION__ . ' error ');
      Log::error($e);
    }
    return;
  }

  /**
   * 通知削除処理
   * @param alert_id : 通知ID
   */
  public function storeDelete($alert_id)
  {
    Log::info(__CLASS__ . ' ' . __FUNCTION__ . ' start');

    try {
      // トランザクション開始
      DB::transaction(function () use ($alert_id) {
        // 該当通知の削除
        Alert::find($alert_id)->delete();
      });
      Log::info(__CLASS__ . ' ' . __FUNCTION__ . ' success');
    } catch (Throwable $e) {
      Log::error(__CLASS__ . ' ' . __FUNCTION__ . ' error');
      Log::error($e);
    }
    return;
  }
}
