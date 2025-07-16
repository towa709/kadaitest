@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('subtitle', 'Contact')

@section('content')
<div class="container">

  <form method="POST" action="{{ route('contact.confirm') }}">
    @csrf

    <div class="form-group">
      <label class="form-label name-label">お名前 <span class="required-mark">※</span></label>
      <div class="name-inputs">
        <div class="input-wrapper">
          <input type="text" id="last_name" name="last_name" placeholder="例: 山田">
          @error('last_name')
          <p class="error">{{ $message }}</p>
          @enderror
        </div>
        <div class="input-wrapper">
          <input type="text" id="first_name" name="first_name" placeholder="例: 太郎">
          @error('first_name')
          <p class="error">{{ $message }}</p>
          @enderror
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="form-label gender-label">性別 <span class="required-mark">※</span></label>
      <div class="form-input radio-options">
        <label><input type="radio" name="gender" value="1" {{ old('gender') == 1 ? 'checked' : '' }}> 男性</label>
        <label><input type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}> 女性</label>
        <label><input type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }}> その他</label>
      </div>
      @error('gender')
      <div class="error">{{ $message }}</div>
      @enderror
    </div>
</div>


<div class="form-group">
  <label class="form-label">メールアドレス <span class="required-mark">※</span></label>
  <input type="email" name="email" class="email-input" placeholder="例: test@example.com" value="{{ old('email') }}">
  @error('email')
  <div class="error">{{ $message }}</div>
  @enderror
</div>

<div class="form-group tel-group">
  <label class="form-label">電話番号 <span class="required-mark">※</span></label>
  <div class="tel-inputs">
    <input type="text" name="tel1" maxlength="4" placeholder="080" value="{{ old('tel1') }}">
    <span class="tel-dash">-</span>
    <input type="text" name="tel2" maxlength="4" placeholder="1234" value="{{ old('tel2') }}">
    <span class="tel-dash">-</span>
    <input type="text" name="tel3" maxlength="4" placeholder="5678" value="{{ old('tel3') }}">
  </div>
  @error('tel1')
  <div class="error">{{ $message }}</div>
  @enderror
</div>

<div class="form-group address-group">
  <label class="form-label">住所 <span class="required-mark">※</span></label>
  <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷" value="{{ old('address') }}">
  @error('address')
  <div class="error">{{ $message }}</div>
  @enderror
</div>

<div class="form-group building-group">
  <label class="form-label">建物名 </label>
  <input type="text" name="building" placeholder="例: コーポ123" value="{{ old('building') }}">
  @error('building')
  <div class="error">{{ $message }}</div>
  @enderror
</div>

<div class="form-group type-group">
  <label class="form-label">お問い合わせの種類 <span class="required-mark">※</span></label>
  <select name="category_id" class="soft-select">
    <option value="">選択してください</option>
    <option value="1" {{ old('category_id') == '1' ? 'selected' : '' }}>商品の交換について</option>
    <option value="2" {{ old('category_id') == '2' ? 'selected' : '' }}>商品のお届けについて</option>
    <option value="3" {{ old('category_id') == '3' ? 'selected' : '' }}>商品トラブル</option>
    <option value="4" {{ old('category_id') == '4' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
    <option value="5" {{ old('category_id') == '5' ? 'selected' : '' }}>その他</option>
  </select>
  @error('category_id')
  <div class="error">{{ $message }}</div>
  @enderror
</div>


{{-- お問い合わせ内容 --}}
<div class="form-group form-row">
  <label class="form-label">お問い合わせ内容 <span class="required-mark">※</span></label>
  <textarea name="detail" class="form-textarea" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
  @error('detail')
  <div class="error">{{ $message }}</div>
  @enderror
</div>


<button type="submit">確認画面</button>
</form>
</div>
@endsection