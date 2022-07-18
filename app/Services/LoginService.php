<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

// models
use App\Models\Admin_user;
class LoginService
{

/**
 * ログイン処理
 * @param request  : post値 
 */
  public function postLogin(Request $request)
  {
    $loginUser = '';
    try {
      // トランザクション開始
      DB::beginTransaction();
      $loginUser = Admin_user::getUserEmail($request['email']);
      DB::commit();
      // トランザクション終了
    } catch (Throwable $e) {
      DB::rollBack();
    }
    return $loginUser;
  }
  
/**
 * アカウント登録処理
 * @param request  : post値 
 */
  public function postRegister(Request $request)
  {
    // 作成時刻
    $now = new Carbon();
    // パスワードハッシュ化
    $password = Hash::make($request['password']); 
    try {
      // トランザクション開始
      DB::beginTransaction();
      
      Admin_user::create([
        'name'     => $request['name'],
        'email'    => $request['email'],
        'password' => $password,
        'register_date' => $now
      ]);
      DB::commit();
      // トランザクション終了
  } catch (Throwable $e) {
      DB::rollBack();
  }
    return ;
  }
}