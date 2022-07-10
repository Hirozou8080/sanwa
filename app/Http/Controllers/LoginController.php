<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LoginService;

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
        
        // バリデーション
        $validated = $request->validate([
            'email' => 'required|unique:admin_users|max:255',
            'password' => 'required',
        ]);

        //ログイン認証処理
        $loginService = new LoginService;
        $login = $loginService->postLogin($email,$password);
        dd($login);
    }
}
