<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Services\AlertService;

class AlertController extends Controller
{
    protected $alertService;
    protected $commonController;

    public function __construct(AlertService $alertService)
    {
        $this->alertService = $alertService;
        $this->commonController = new CommonController();
    }

    /**
     * 通知一覧取得
     */
    public function alert()
    {
        $alerts = $this->commonController->getAllAlert();
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
     * 店舗編集
     * @param alert_id  対象店舗ID
     */
    public function edit($alert_id)
    {
        $alert = $this->commonController->getAlert($alert_id);
        return view('admin.alert.edit', ['alert' => $alert]);
    }
}
