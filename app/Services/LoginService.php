<?php

namespace App\Services;

class LoginService
{

/**
 * ログイン処理
 */
  public function postLogin($email,$password)
  {
    if(empty($email) || empty($password)){
      $error['message'][] = \Lang::get("messages.require", ['name' => 'メールアドレス']);
      $error['message'][] = \Lang::get("messages.require", ['name' => 'パスワード']);
      dd($error);
      return;      
    }
    dd($email);
  }
}