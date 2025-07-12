@extends('layouts.app')

@section('subtitle', 'ダッシュボード')

@section('content')
<div class="container">
  <h2>ようこそ、{{ Auth::user()->name }}さん 🎉</h2>

  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">ログアウト</button>
  </form>
</div>
@endsection