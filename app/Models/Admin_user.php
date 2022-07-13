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

    public static function getUserEmail($email){
        return Admin_user::where('email',$email)->first();
    }
}
