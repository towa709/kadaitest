<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Validator;


class FortifyServiceProvider extends ServiceProvider
{
  public function register()
  {
    //
  }

  public function boot()
  {
    Fortify::createUsersUsing(CreateNewUser::class);
    Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
    Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
    Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

    // 登録ページのView設定
    Fortify::registerView(function () {
      return view('auth.register');
    });

    Fortify::authenticateUsing(function (Request $request) {
      // LoginRequest を使ってバリデーション
      $loginRequest = new \App\Http\Requests\LoginRequest();
      $loginRequest->setContainer(app())
        ->setRedirector(app('redirect'))
        ->merge($request->all());

      // バリデーション実行
      $loginRequest->validateResolved();

      // 認証処理
      $user = \App\Models\User::where('email', $request->email)->first();
      if ($user && Hash::check($request->password, $user->password)) {
        return $user;
      }

      return null;
    });
  }
}
