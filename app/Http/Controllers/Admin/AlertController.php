<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;

class AlertController extends Controller
{
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
}

