<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Services\AlertService;

class AlertController extends CommonController
{
  protected $alertService;

  public function __construct(AlertService $alertService)
  {
    $this->alertService = $alertService;
  }

  /**
   * 通知一覧取得
   */
  public function alert()
  {
    $alerts = $this->getAllAlert();
    return view('admin.alert.index', ['alerts' => $alerts]);
  }

  /**
   * 通知登録画面表示
   */
  public function add()
  {
    return view('admin.alert.add');
  }

  /**
   * 通知登録処理
   */
  public function addPost(Request $request)
  {

    // バリデーション
    $request->validate([
      'category' => 'required',
      'title' => 'required | min:3 ',
      'body' => 'required | min:4 ',
      'image' => 'image',
    ]);

    // 店舗登録処理
    $this->alertService->alertRegist($request);

    return redirect()->route('admin/alert');
  }

  /**
   * 通知編集
   * @param alert_id  対象通知ID
   */
  public function edit($alert_id)
  {
    $alert = $this->getAlert($alert_id);
    return view('admin.alert.edit', ['alert' => $alert]);
  }

  /**
   * 通知編集処理
   */
  public function editPost(Request $request)
  {

    // バリデーション
    $request->validate([
      'category' => 'required',
      'title' => 'required | min:3 ',
      'body' => 'required | min:4 ',
      'image' => 'image',
    ]);

    // 店舗編集処理
    $this->alertService->alertEdit($request);

    return redirect()->route('admin/alert');
  }


  /**
   * 通知詳細
   * @param alert_id  対象通知ID
   */
  public function detail($alert_id)
  {
    $alert = $this->getAlert($alert_id);
    return view('admin.alert.detail', ['alert' => $alert]);
  }

  /**
   * 通知削除
   * @param request  削除データ
   * @param alert_id  対象通知ID
   */
  public function deletePost($alert_id)
  {
    // 通知削除処理
    $this->alertService->storeDelete($alert_id);
    return redirect()->route('admin/alert');
  }
}
