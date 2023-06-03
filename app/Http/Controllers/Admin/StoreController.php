<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use App\Services\StoreService;
use Illuminate\Http\Request;

class StoreController extends Controller
{
     protected $storeService;
     protected $commonController;

     public function __construct(StoreService $storeService)
     {
          $this->storeService = $storeService;
          $this->commonController = new CommonController();
     }

     /**
      * 店舗一覧
      */
     public function store()
     {
          $stores = $this->commonController->getAllStore();
          $prefectures = $this->commonController->getAllPrefecture();

          return view('admin.store.index', ['stores' => $stores, 'prefectures' => $prefectures]);
     }

     /**
      * 店舗登録画面表示
      */
     public function add()
     {
          $prefectures = $this->commonController->getAllPrefecture();
          return view('admin.store.add', ['prefectures' => $prefectures]);
     }

     /**
      * 店舗登録
      */
     public function addPost(Request $request)
     {
          dd($request->post());
          // バリデーション
          $request->validate([
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
          return redirect()->route('admin/store');
     }

     /**
      * 店舗編集
      * @param store_id  対象店舗ID
      */
     public function edit($store_id)
     {
          $prefectures = $this->commonController->getAllPrefecture();
          $store = $this->commonController->getStore($store_id);
          $store['postNumPrev'] = substr($store['post_num'], 0, 3);
          $store['postNumNext'] = substr($store['post_num'], 3, 7);

          return view('admin.store.edit', ['store' => $store, 'prefectures' => $prefectures]);
     }

     /**
      * 店舗編集
      * @param request  更新データ
      * @param store_id  対象店舗ID
      */
     public function editPost(Request $request, $store_id)
     {

          // バリデーション
          $request->validate([
               'storeName' => 'required | max:36',
               'postNumPrev' => 'required | min:001 | numeric',
               'postNumNext' => 'required | min:0001 | numeric',
               'prefecture' => 'required',
               'city' => 'required | max:32',
               'address' => 'required | max:64',
               'recruit' => 'required',
          ]);

          // 店舗登録処理
          $this->storeService->storeEdit($request, $store_id);
          return redirect()->route('admin/store');
     }

     /**
      * 店舗削除
      * @param request  削除データ
      * @param store_id  対象店舗ID
      */
     public function deletePost($store_id)
     {
          // 店舗登録処理
          $this->storeService->storeDelete($store_id);
          return redirect()->route('admin/store');
     }

     /**
      * 店舗詳細
      * @param store_id  対象店舗ID
      */
     public function detail($store_id)
     {
          $store = $this->commonController->getStore($store_id);
          $store['postNumPrev'] = substr($store['post_num'], 0, 3);
          $store['postNumNext'] = substr($store['post_num'], 3, 7);
          $prefecture = $this->commonController->getPrefecture($store->prefecture_id);

          return view('admin.store.detail', ['store' => $store, 'prefecture' => $prefecture]);
     }
}
