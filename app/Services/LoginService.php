<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Admin_users;

class LoginService
{

/**
 * ログイン処理
 * @param request  : post値 
 */
  public function postLogin(Request $request)
  {
    
    
    return dd($request->all());
  }
/**
 * アカウント登録処理
 * @param request  : post値 
 */
  public function postRegister(Request $request)
  {
    $adminUser = new Admin_users();
    $adminUser['name'] = $request['name'];
    $adminUser['email'] = $request['email'];
    $adminUser['password'] = $request['password'];

    return dd($request->all());
  }
}