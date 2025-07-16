<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
  public function run(): void
  {
    Contact::factory()->count(35)->create(); // ← ここで35件作成！
  }
}
