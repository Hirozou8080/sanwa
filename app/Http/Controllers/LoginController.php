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
        
        //ログイン認証処理
        $email = $request['emial'];
        $password = $request['password'];
        
        $loginService = new LoginService;
        $login = $loginService->postLogin($email,$password);
        dd($login);
    }
}
