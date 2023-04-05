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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
});
Route::controller(StoreController::class)->group(function () {
    Route::get('/store', 'index')->name('store');
});
Route::controller(PriceController::class)->group(function () {
    Route::get('/price', 'index')->name('price');
    Route::get('/price/{{price_id}}', 'detail')->name('price/detail');
});


Route::prefix('admin')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'registerPost')->name('register');
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'loginPost')->name('login');
        Route::get('/logout', 'logout')->name('logout');
    });
    // Route::group(['middleware' => ['loginCheck']], function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/', 'home')->name('admin/home');
    });
    Route::controller(AdminStoreController::class)->group(function () {
        Route::get('/store', 'store')->name('admin/store');
        Route::get('/store/add', 'add')->name('admin/store/add');
        Route::post('/store/add', 'addPost')->name('admin/store/add');
        Route::get('/store/edit/{store_id}', 'edit')->name('admin/store/edit');
        Route::post('/store/edit/{store_id}', 'editPost')->name('admin/store/edit');
        Route::get('/store/detail/{store_id}', 'detail')->name('admin/store/detail');
        Route::post('/store/delete/{store_id}', 'deletePost')->name('admin/store/delete');
    });
    Route::controller(AdminPriceController::class)->group(function () {
        Route::get('/store/price/{store_id}', 'price')->name('admin/store/price');
    });

    Route::controller(AdminAlertController::class)->group(function () {
        Route::get('/alert', 'alert')->name('admin/alert');
        Route::get('/alert/add', 'add')->name('admin/alert/add');
        Route::post('/alert/add', 'addPost')->name('admin/alert/add');
    });
    Route::controller(AdminSettingController::class)->group(function () {
        Route::get('/setting', 'setting')->name('admin/setting');
    });
    // });
});
