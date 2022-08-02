<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * 店舗一覧
     */
    public function store(Request $request){
         // user取得
         $commonController = new CommonController();
         // sessionユーザIDを取得
         $user_id = session()->get('user_id');
         $user = $commonController->getUser($user_id);
         $stores = $commonController->getAllStore();
         return view('admin.store.list',['user'=>$user,'stores'=>$stores]);
    }

    /**
     * 店舗登録
     */
    public function add(Request $request){
         // user取得
         $commonController = new CommonController();
         // sessionユーザIDを取得
         $user_id = session()->get('user_id');
         $user = $commonController->getUser($user_id);
         $stores = $commonController->getAllStore();
         return view('admin.store.add',['user'=>$user,'stores'=>$stores]);
    }

    /**
     * 店舗登録
     */
    public function addPost(Request $request){
       
     // バリデーション
     $validated = $request->validate([
       'storeName' => 'required | max:36',
       'postNumPrev' => 'required | min:3 | integer',
       'postNumNext' => 'required | min:4 | integer',
       'prefecture' => 'required',
       'city' => 'required | max:32',
       'address' => 'required | max:64',
       'recruit' => 'required',
     ]);
         // user取得
         $commonController = new CommonController();
         // sessionユーザIDを取得
         $user_id = session()->get('user_id');
         $user = $commonController->getUser($user_id);
         $stores = $commonController->getAllStore();
         return view('admin.store.add',['user'=>$user,'stores'=>$stores]);
    }
}
