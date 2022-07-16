<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// models
use App\Models\Admin_user;

class CommonController extends Controller
{
    /**
     * IDからユーザ情報を取得
     * 1 : 1
     * @param id : ユーザーID
     */
    public function getUser($id){
        $user = Admin_user::getUserId($id);
        return $user;
    }
}
