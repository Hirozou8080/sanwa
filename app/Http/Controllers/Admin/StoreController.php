<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use App\Services\StoreService;
use Illuminate\Http\Request;

class StoreController extends Controller
{
     protected $storeService;
     public function __construct(StoreService $storeService)
     {
         //ログイン認証処理
         $this->storeService = $storeService;
     }
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
         $prefectures = $commonController->getAllPrefecture();
          return view('admin.store.list',['user'=>$user,'stores'=>$stores,'prefectures'=>$prefectures]);
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
         $prefectures = $commonController->getAllPrefecture();
         return view('admin.store.add',['user'=>$user,'prefectures'=>$prefectures]);
    }
    
    /**
     * 店舗登録
     */
    public function addPost(Request $request){
          // バリデーション
          $validated = $request->validate([
               'storeName' => 'required | max:36',
               'postNumPrev' => 'required | min:3 | numeric',
               'postNumNext' => 'required | min:4 | numeric',
               'prefecture' => 'required',
               'city' => 'required | max:32',
               'address' => 'required | max:64',
               'recruit' => 'required',
          ]);
          // 店舗登録処理
          $this->storeService->storeRegist($request);
          // return view('admin.store.list',['user'=>$user,'stores'=>$stores]);
          return redirect()->route('admin/store');
     }
     /**
      * 店舗編集
      */
     public function edit(Request $request, $store_id){
          // user取得
          $commonController = new CommonController();
          // sessionユーザIDを取得
          $user_id = session()->get('user_id');
          $user = $commonController->getUser($user_id);
          $prefectures = $commonController->getAllPrefecture();
          $store = $commonController->getStore($store_id);
          $store['postNumPrev'] = substr($store['post_num'],0,3);
          $store['postNumNext'] = substr($store['post_num'],3,7);
          return view('admin.store.edit',['user'=>$user,'store'=>$store,'prefectures'=>$prefectures]);
     }
     /**
      * 店舗編集
      */
      public function editPost(Request $request, $store_id){
           // バリデーション
           $validated = $request->validate([
                'storeName' => 'required | max:36',
                'postNumPrev' => 'required | min:3 | numeric',
                'postNumNext' => 'required | min:4 | numeric',
                'prefecture' => 'required',
                'city' => 'required | max:32',
                'address' => 'required | max:64',
                'recruit' => 'required',
               ]);
               // 店舗登録処理
               $this->storeService->storeEdit($request,$store_id);
               return redirect()->route('admin/store');
          }
          /**
           * 店舗詳細
           */
          public function detail(Request $request, $store_id){
               // user取得
               $commonController = new CommonController();
               // sessionユーザIDを取得
               $user_id = session()->get('user_id');
               $user = $commonController->getUser($user_id);
               $store = $commonController->getStore($store_id);
               $store['postNumPrev'] = substr($store['post_num'],0,3);
               $store['postNumNext'] = substr($store['post_num'],3,7);
               $prefecture = $commonController->getPrefecture($store->prefecture_id);
          return view('admin.store.detail',['user'=>$user,'store'=>$store,'prefecture'=>$prefecture]);
     }
}
