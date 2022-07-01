<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * 店舗料金案内表示
     */
    public function index(Request $request)
    {
        $stores = [
            0=>[
            'id' => 1,
            'uid' => 123141,
            'name' => '金親本店',
            'post_code' => '264-0002',
            'prefectures' => '千葉県',
            'address' => '千葉市若葉区千城台東2-24-10',
            'service' => [
                '土日祝営業','衣類リフォーム','駐車場あり','当日仕上げ可能'
            ],
            'job_offer' => true,
            ],
            1=>[
            'id' => 2,
            'uid' => 973204,
            'name' => 'マリンピア店',
            'post_code' => '261-0004',
            'prefectures' => '千葉県',
            'address' => '千葉市美浜区高洲3-20-8 1F',
            'service' => [
                '土日祝営業','衣類リフォーム','駐車場あり','当日仕上げ可能'
            ],
            'job_offer' => true,
            ]
        ];
        return view("price")->with('stores',$stores);
    }

    /** 
     * 店舗料金表示
     * @param price_id : 店舗ID
     *  
     */
    public function detail(Request $request,$price_id)
    {
        $stores = [
            0=>[
            'name' => '金親本店',
            'post_code' => '264-0002',
            'prefectures' => '千葉県',
            'address' => '千葉市若葉区千城台東2-24-10',
            'service' => [
                '土日祝営業','衣類リフォーム','駐車場あり','当日仕上げ可能'
            ],
            'job_offer' => true,
            ]
        ];
        return view("price")->with('stores',$stores);
    }
}
