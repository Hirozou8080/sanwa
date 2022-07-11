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
}