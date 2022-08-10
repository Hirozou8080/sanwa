<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    use HasFactory;

    /**
     * 全都道府県取得
     */
    public static function getAllPrefecture(){
        return Prefecture::all();
    }
    /**
     * IDから都道府県取得
     */
    public static function getPrefectureId($id){
        return Prefecture::find($id);
    }
}
