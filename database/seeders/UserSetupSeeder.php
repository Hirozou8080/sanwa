<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// Model
use App\Models\Admin_user;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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
         * */
        DB::table('admin_users')->truncate(); // 既存のユーザを削除

        Admin_user::create([
            'name' => Str::random(10),
            'email' => Str::random(10) . '@test.com',
            'password' => Hash::make('aaaaaaa1'),
            'register_date' => Carbon::now(),
        ]);
    }
}
