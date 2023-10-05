<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\LoginController;
// Admin
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StoreController as AdminStoreController;
use App\Http\Controllers\Admin\AlertController as AdminAlertController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\PriceController as AdminPriceController;


//HPのTOP画面
Route::controller(HomeController::class)->group(function () {
  Route::get('/', 'home')->name('home');
});

// 店舗画面
Route::controller(StoreController::class)->group(function () {
  Route::get('/store', 'index')->name('store');
});
// 金額画面
Route::controller(PriceController::class)->group(function () {
  Route::get('/price', 'index')->name('price');
  Route::get('/price/{price_id}', 'detail')->name('price/detail');
});


/**
 * 管理者画面
 */
Route::prefix('admin')->group(function () {
  // ログイン関連
  Route::controller(LoginController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerPost')->name('register');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginPost')->name('login');
    Route::get('/logout', 'logout')->name('logout');
  });
  Route::group(['middleware' => ['loginCheck']], function () {
    Route::controller(AdminController::class)->group(function () {
      Route::get('/', 'home')->name('admin/home');
    });
    // 店舗管理関連
    Route::controller(AdminStoreController::class)->group(function () {
      Route::get('/store', 'store')->name('admin/store'); // 店舗一覧情報取得
      Route::get('/store/add', 'add')->name('admin/store/add'); // 店舗登録画面情報取得
      Route::post('/store/add', 'addPost')->name('admin/store/add'); // 店舗登録処理
      Route::get('/store/edit/{store_id}', 'edit')->name('admin/store/edit'); // 店舗編集画面情報取得
      Route::post('/store/edit/{store_id}', 'editPost')->name('admin/store/edit'); // 店舗編集処理
      Route::get('/store/detail/{store_id}', 'detail')->name('admin/store/detail'); // 店舗詳細情報取得     
      Route::post('/store/delete/{store_id}', 'deletePost')->name('admin/store/delete'); // 店舗削除処理
      Route::get('/store/product/{store_id}', 'product')->name('admin/store/product'); // 店舗商品設定画面情報取得
      Route::post('/store/product/add', 'productPost')->name('admin/store/product/add'); // 店舗商品設定画面情報取得
      Route::post('/store/product/delete', 'productDeletePost')->name('admin/store/product/delete'); // 店舗商品設定画面情報取得

    });

    // 通知管理関連
    Route::controller(AdminAlertController::class)->group(function () {
      Route::get('/alert', 'alert')->name('admin/alert'); // 通知一覧画面情報取得
      Route::get('/alert/add', 'add')->name('admin/alert/add'); // 通知登録画面情報取得
      Route::post('/alert/add', 'addPost')->name('admin/alert/add'); // 通知登録処理
      Route::get('/alert/edit/{alert_id}', 'edit')->name('admin/alert/edit'); // 通知編集画面情報取得
      Route::post('/alert/edit/{alert_id}', 'editPost')->name('admin/alert/edit'); // 通知編集画面情報取得
      Route::get('/alert/detail/{alert_id}', 'detail')->name('admin/alert/detail'); // 通知詳細情報取得
      Route::post('/alert/delete/{alert_id}', 'deletePost')->name('admin/alert/delete'); // 通知削除処理
    });

    // 設定管理関連
    Route::controller(AdminSettingController::class)->group(function () {
      Route::get('/setting', 'setting')->name('admin/setting');
    });
  });
});
