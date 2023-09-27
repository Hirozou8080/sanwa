<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    DB::table('prefectures')->truncate();
    DB::table('alerts_categories')->truncate();

    $this->call(PrefectureSeeder::class);
    $this->call(AlertCategorySeeder::class);
  }
}
