<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// models
use App\Models\Admin_user;
use App\Models\Store;
use App\Models\Prefecture;

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
    /**
     * 全店舗の取得
     */
    public function getAllStore(){
        $stores = Store::getAllStore();
        return $stores;
    }

    /**
     * 全都道府県の取得
     */
    public function getAllPrefecture(){
        $prefecture = Prefecture::getAllPrefecture();
        return $prefecture;
    }
}
