<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Services\AlertService;

class AlertController extends Controller
{
    protected $alertService;
    public function __construct(AlertService $alertService)
    {
        $this->alertService = $alertService;
    }
    public function alert(Request $request){
        // user取得
        $commonController = new CommonController();
        // sessionユーザIDを取得
        $user_id = session()->get('user_id');
        $alerts = $commonController->getAllAlert();
        $user = $commonController->getUser($user_id);
        return view('admin.alert.index',['user'=>$user, 'alerts' => $alerts]);
    }

    public function add(Request $request){
        // user取得
        $commonController = new CommonController();
        // sessionユーザIDを取得
        $user_id = session()->get('user_id');
        $user = $commonController->getUser($user_id);
        return view('admin.alert.add',['user'=>$user]);
    }

    /**
     * 通知登録処理
     * 
     */
    public function addPost(Request $request){
        
        // バリデーション
        $validated = $request->validate([
            'category' => 'required',
            'title' => 'required | min:3 ',
            'body' => 'required | min:4 ',
            'image' => 'image',
       ]);
        // 店舗登録処理
        $this->alertService->alertRegist($request);
        
        // user取得
        $commonController = new CommonController();

        return view('admin.alert.add',['user'=>$user]);
    }
}

