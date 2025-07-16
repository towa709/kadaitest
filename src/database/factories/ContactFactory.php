<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class ContactFactory extends Factory
{
  protected $model = Contact::class;

  public function definition(): array
  {
    return [
      'first_name' => $this->faker->firstName(),
      'last_name' => $this->faker->lastName(),
      'gender' => $this->faker->numberBetween(1, 3), // 1:男性, 2:女性, 3:その他
      'email' => $this->faker->unique()->safeEmail(),
      'tel' => $this->faker->numerify('090-####-####'), // よりそれっぽい形式に
      'address' => $this->faker->postcode() . ' ' .
        $this->faker->prefecture() .
        $this->faker->city() .
        $this->faker->streetAddress(),
      'building' => $this->faker->secondaryAddress(),
      'detail' => $this->faker->realText(100),
      'created_at' => Carbon::create(
        2025,
        7,
        rand(1, 10),
        rand(0, 23),
        rand(0, 59),
        rand(0, 59)
      ),
      'updated_at' => now(), // 忘れがちだけど追加しよう！
      'category_id' => Category::inRandomOrder()->value('id') ?? 1, // よりスッキリした書き方
    ];
  }
}
