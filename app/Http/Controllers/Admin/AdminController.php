<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(Request $request)
    {

        // user取得
        $commonController = new CommonController();
        // sessionユーザIDを取得
        $user_id = session()->get('user_id');
        $user = $commonController->getUser($user_id);

        return view('admin.home', ['user' => $user]);
    }
}
