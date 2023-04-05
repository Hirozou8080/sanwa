<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// Model
use App\Models\Admin_user;

class UserSetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * id ID	
         * name 名前
         * email メールアドレス
         * password パスワード
         * register_date 登録日
         * created_at 
         * */
        $pass = Hash::make('aaaaaaa1');
        Admin_user::create([
            'name' => Str::random(10),
            'email' => Str::random(10) . '@test.com',
            'password' => Hash::make('aaaaaaa1'),
        ]);
    }
}
