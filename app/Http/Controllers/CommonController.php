<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @param disk = ディスク
     * @param name = ファイル名
     * @param node = ノード
     */
    public function saveFile($disc, $name, $node){
        //作成したいディレクトリ（のパス）
        $directory_path = "../hoge";    //この場合、一つ上の階層に「hoge」というディレクトリを作成する
    
        //「$directory_path」で指定されたディレクトリが存在するか確認
        if(file_exists($directory_path)){
            //存在したときの処理
            echo "作成しようとしたディレクトリは既に存在します";
        }else{
            //存在しないときの処理（「$directory_path」で指定されたディレクトリを作成する）
            if(mkdir($directory_path, 0777)){
                //作成したディレクトリのパーミッションを確実に変更
                chmod($directory_path, 0777);
                //作成に成功した時の処理
                echo "作成に成功しました";
            }else{
                //作成に失敗した時の処理
                echo "作成に失敗しました";
            }
        }
    }
}
