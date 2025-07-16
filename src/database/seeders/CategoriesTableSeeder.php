<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
  public function run(): void
  {
    $now = Carbon::now();

    DB::table('categories')->insert([
      [
        'name' => '商品のお届けについて',
        'content' => '商品のお届けについて',
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'name' => '商品の交換について',
        'content' => '商品の交換について',
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'name' => '商品トラブル',
        'content' => '商品トラブル',
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'name' => 'ショップへのお問い合わせ',
        'content' => 'ショップへのお問い合わせ',
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'name' => 'その他',
        'content' => 'その他',
        'created_at' => $now,
        'updated_at' => $now,
      ],
    ]);
  }
}
