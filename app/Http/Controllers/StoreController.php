<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){

        $commonController = new CommonController();
         // 全店舗取得
         $stores = $commonController->getAllStore();
         // 都道府県取得
         $prefectures = $commonController->getAllPrefecture();
        
        return view("store")->with(['stores'=>$stores,'prefectures'=>$prefectures]);
    }
}
