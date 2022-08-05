<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'post_num',
        'prefecture_id',
        'city',
        'address',
        'recruit_flg',
    ];

    /**
     * 全店舗取得
     */
    public static function getAllStore(){
        return Store::all();
    }
}
