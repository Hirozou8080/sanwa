<?php

namespace Database\Seeders;

use App\Models\Alert_category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class alertCategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Alert_category::create([
      'name' => '重要'
    ]);
  }
}
