<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_user extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'register_date'
    ]; 

    /**
     * Emailでユーザ取得
     * @param email メールアドレス
     */
    public static function getUserEmail($email){
        return Admin_user::whereEmail($email)->first();
    }
}
