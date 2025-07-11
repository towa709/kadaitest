@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('subtitle', 'Confirm')

@section('content')
<div class="container confirm-container">

  <table class="confirm-table">
    <tr>
      <th>お名前</th>
      <td>{{ $data['last_name'] }} {{ $data['first_name'] }}</td>
    </tr>
    <tr>
      <th>性別</th>
      <td>
        @if ($data['gender'] == 1) 男性
        @elseif ($data['gender'] == 2) 女性
        @else その他
        @endif
      </td>
    </tr>
    <tr>
      <th>メールアドレス</th>
      <td>{{ $data['email'] }}</td>
    </tr>
    <tr>
      <th>電話番号</th>
      <td>{{ $data['tel1'] }}-{{ $data['tel2'] }}-{{ $data['tel3'] }}</td>
    </tr>
    <tr>
      <th>住所</th>
      <td>{{ $data['address'] }}</td>
    </tr>
    <tr>
      <th>建物名</th>
      <td>{{ $data['building'] }}</td>
    </tr>
    <tr>
      <th>お問い合わせの種類</th>
      <td>{{ $data['category_name'] }}</td>
    </tr>
    <tr>
      <th>お問い合わせ内容</th>
      <td>{!! nl2br(e($data['detail'])) !!}</td>
    </tr>
  </table>

  <form method="POST" action="{{ route('contact.store') }}">
    @csrf
    @foreach ($data as $key => $value)
    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
    @endforeach

    <div class="confirm-buttons">
      <button type="submit" class="btn-submit">送信</button>
      <button type="button" onclick="history.back();" class="btn-back">修正</button>
    </div>
  </form>
</div>
@endsection