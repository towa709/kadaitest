<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class CreateNewUser implements CreatesNewUsers
{
  public function create(array $input)
  {
    // RegisterRequest のバリデーションルールとメッセージを取得して使う
    $request = new RegisterRequest();

    Validator::make($input, $request->rules(), $request->messages())->validate();

    return User::create([
      'name' => $input['name'],
      'email' => $input['email'],
      'password' => Hash::make($input['password']),
    ]);
  }
}
