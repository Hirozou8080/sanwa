<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * ログイン画面
     */
    public function index(Request $request){
        return view('admin.login');
    }

    /**
     * ログイン処理
     */
    public function loginPost(Request $request){
        dd($request->all());
    }
}
