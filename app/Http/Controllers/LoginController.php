<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LoginService;

class LoginController extends Controller
{

    protected $loginService;
    
    public function __construct(LoginService $loginService){
        //ログイン認証処理
        $this->loginService = $loginService;
    }
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
            'email' => 'required|',
            'password' => 'required',
        ]);
        
        //ログイン認証処理
        $login = $this->loginService->postLogin($request);
        dd($login);
    }
    /**
     * アカウント登録
     */
    public function register(Request $request){
        
        return view('admin.register');
    }
    /**
     * アカウント登録
     */
    public function registerPost(Request $request){
        
        // バリデーション
        $validated = $request->validate([
            'name' => 'required|',
            'email' => 'required | email | unique:adminUsers',
            'password' => 'required | min:8 | confirmed',
        ]);
        
        //アカウント登録処理
        $this->loginService->postRegister($request);
        return view('admin.register');
    }
}
