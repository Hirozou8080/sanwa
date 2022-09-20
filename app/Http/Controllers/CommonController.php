<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// models
use App\Models\Admin_user;
use App\Models\Store;
use App\Models\Prefecture;
use App\Models\Alert;

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
     * IDから店舗の取得
     */
    public function getStore($id){
        $store = Store::getStoreId($id);
        return $store;
    }
    /**
     * 全都道府県の取得
     */
    public function getAllPrefecture(){
        $prefecture = Prefecture::getAllPrefecture();
        return $prefecture;
    }
    /**
     * IDから都道府県の取得
     */
    public function getPrefecture($id){
        $prefecture = Prefecture::getPrefectureId($id);
        return $prefecture;
    }
    /**
     * 全通知の取得
     */
    public function getAllAlert(){
        $alerts = Alert::getAllAlert();
        return $alerts;
    }
    /**
     * ファイルの保存
     * @param file = 保存ファイル
     * @param path = ディレクトリパス
     */
    public function saveFile($file,$path){
        $disk = Storage::disk('public');
        if(!$disk->exists($path)){
            Storage::makeDirectory($path);
        }
        dd($file);
        $upload_file_name = Storage::disk('public')->putFile($path, $file);
        return $upload_file_name;
    }
}
