@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('subtitle', 'Register')

@section('content')

<form method="POST" action="{{ route('register') }}">
  @csrf

  <div class="form-group">
    <label for="name">お名前</label>
    <input type="text" id="name" name="name" placeholder="例: 山田 太郎" value="{{ old('name') }}">
    @error('name')
    <p class="error">{{ $message }}</p>
    @enderror

  </div>

  <div class="form-group">
    <label for="email">メールアドレス</label>
    <input type="text" id="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
    @error('name')
    <p class="error">{{ $message }}</p>
    @enderror

  </div>

  <div class="form-group">
    <label for="password">パスワード</label>
    <input type="password" id="password" name="password" placeholder="例: coachtech1106">
    @error('name')
    <p class="error">{{ $message }}</p>
    @enderror
  </div>


  <button type="submit">登録</button>
</form>
@endsection