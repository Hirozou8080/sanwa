<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LoginService;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        //ログイン認証処理
        $this->loginService = $loginService;
    }

    /**
     * ログイン画面
     */
    public function login(Request $request)
    {
        return view('admin.login');
    }

    /**
     * ログイン処理
     */
    public function loginPost(Request $request)
    {

        // バリデーション
        $validated = $request->validate([
            'email' => 'required|',
            'password' => 'required',
        ]);

        //ログイン認証処理
        $loginUser = $this->loginService->postLogin($request);

        if (!empty($loginUser)) {
            // パスワードチェック
            $request['password'];
            if (Hash::check($request['password'], $loginUser['password'])) {
                //sessionの保存
                session()->put('user_id', $loginUser['id']);
                return redirect()->route('admin/home');
            } else {
                $errors['messages'] = 'パスワードが違います。';
                return view('admin.login')->withErrors($errors['messages']);
            }
        } else {
            $errors['messages'] = 'ユーザが存在しません。';
            return view('admin.login')->withErrors($errors['messages']);
        }

        return redirect()->route('/');
    }
    /**
     * アカウント登録
     */
    public function register(Request $request)
    {

        return view('admin.register');
    }

    /**
     * アカウント登録
     */
    public function registerPost(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'name' => 'required|',
            'email' => 'required | email | unique:admin_users',
            'password' => 'required | min:8 | confirmed',
        ]);

        //アカウント登録処理
        $this->loginService->postRegister($request);
        return view('admin.login');
    }

    /**
     * ログアウト
     */
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }
}
