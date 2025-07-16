<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function showLoginForm()
  {
    return view('auth.login');
  }

  public function login(LoginRequest $request)
  {
    // バリデーションはLoginRequestで自動実行される

    if (Auth::attempt($request->only('email', 'password'))) {
      $request->session()->regenerate();
      return redirect()->intended('/admin');
    }

    return back()->withErrors([
      'email' => '認証に失敗しました。',
    ])->withInput();
  }
}
