<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(){

        $stores = [
            // 0=>[
            // 'name' => '金親本店',
            // 'post_code' => '264-0002',
            // 'prefectures' => '千葉県',
            // 'address' => '千葉市若葉区千城台東2-24-10',
            // 'service' => [
            //     '土日祝営業','衣類リフォーム','駐車場あり','当日仕上げ可能'
            // ],
            // 'job_offer' => true,
            // ],
            // 1=>[
            // 'name' => '金親本店',
            // 'post_code' => '264-0002',
            // 'prefectures' => '千葉県',
            // 'address' => '千葉市若葉区千城台東2-24-10',
            // 'service' => [
            //     '土日祝営業','衣類リフォーム','駐車場あり','当日仕上げ可能'
            // ],
            // 'job_offer' => true,
            // ]
        ];
        // dd($stores);
        return view("store")->with('stores',$stores);
    }
}
