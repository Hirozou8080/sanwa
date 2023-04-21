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
        // user取得
        $user_id = session()->get('user_id');
        $alerts = $this->commonController->getAllAlert();
        $user = $this->commonController->getUser($user_id);
        return view('admin.alert.index', ['user' => $user, 'alerts' => $alerts]);
    }

    /**
     * 通知登録画面表示
     */
    public function add()
    {
        // user取得
        $user_id = session()->get('user_id');
        $user = $this->getUser($user_id);
        return view('admin.alert.add', ['user' => $user]);
    }

    /**
     * 通知登録処理
     * 
     */
    public function addPost(Request $request)
    {

        // バリデーション
        $validated = $request->validate([
            'category' => 'required',
            'title' => 'required | min:3 ',
            'body' => 'required | min:4 ',
            'image' => 'image',
        ]);
        // 店舗登録処理
        $this->alertService->alertRegist($request);

        return redirect()->route('admin/alert');
    }
}
