<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin_user extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'password',
        'register_date'
    ];

    /**
     * Idでユーザ取得
     * @param id ユーザID
     */
    public static function getUserId($id)
    {
        $user = Admin_user::find($id)->first();
        return json_decode(json_encode($user), true);
    }
    /**
     * Emailでユーザ取得
     * @param email メールアドレス
     */
    public static function getUserEmail($email)
    {
        $user = Admin_user::whereEmail($email)->first();
        return json_decode(json_encode($user), true);
    }
}
