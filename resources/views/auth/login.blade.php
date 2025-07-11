@extends('layouts.app')

@section('subtitle', 'Login')


@section('css')

<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection
@section('content')

<form method="POST" action="{{ route('login') }}">
  @csrf
  <div class="form-group">
    <label for="email">メールアドレス</label>
    <input type="text" id="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
    @error('email')
    <p style="color: red;">{{ $message }}</p>
    @enderror
  </div>

  <div class="form-group">
    <label>パスワード</label>
    <input type="password" name="password" placeholder="例: coachtech1106">
    @error('password')
    <p style="color: red;">{{ $message }}</p>
    @enderror
  </div>
  <button type="submit">ログイン</button>
</form>
@endsection