<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\LoginController;

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
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'loginPost')->name('login');
});
