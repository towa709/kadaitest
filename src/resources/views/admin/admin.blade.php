@extends('layouts.app')

@section('subtitle', 'Admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="container">
  <form method="GET" action="{{ route('admin.index') }}" class="search-form">
    <div class="search-bar">
      <div class="input-group">
        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="名前やメールアドレスを入力してください">
      </div>

      <select name="gender">
        <option value="">性別</option>
        <option value="1">男性</option>
        <option value="2">女性</option>
        <option value="3">その他</option>
      </select>

      <select name="category_id">
        <option value="">お問い合わせの種類</option>
        <option value="商品の交換について">商品の交換について</option>
        <option value="商品のお届けについて">商品のお届けについて</option>
        <option value="商品トラブル">商品トラブル</option>
        <option value="ショップへのお届けについて">ショップへのお届けについて</option>
        <option value="その他">その他</option>
      </select>

      <input type="date" name="date">

      <button type="submit" class="search-btn">検索</button>
      <a href="{{ route('admin.index') }}" class="reset-btn">リセット</a>
    </div>
  </form>

  <div class="export-row">
    <form method="GET" action="{{ route('admin.export') }}">
      <input type="hidden" name="keyword" value="{{ request('keyword') }}">
      <input type="hidden" name="gender" value="{{ request('gender') }}">
      <input type="hidden" name="type" value="{{ request('type') }}">
      <input type="hidden" name="date" value="{{ request('date') }}">
      <button type="submit" class="export-btn">エクスポート</button>
    </form>
  </div>

  <div class="pagination">
    {{ $users->appends(request()->query())->onEachSide(2)->links('pagination::default') }}
  </div>
</div>

<table class="table">
  <thead>
    <tr>
      <th class="name-column">お名前</th>
      <th>性別</th>
      <th>メールアドレス</th>
      <th>お問い合わせの種類</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
    <tr>
      <td>{{ $user->last_name }} {{ $user->first_name }}</td>
      <td>
        @if ($user->gender === 1) 男性
        @elseif ($user->gender === 2) 女性
        @elseif ($user->gender === 3) その他
        @else 未設定 @endif
      </td>
      <td class="email-column">{{ $user->email }}</td>
      <td>{{ $user->category->name ?? '---' }}</td>
      <td>
        <button type="button" class="button" onclick="openModal('{{ $user->id }}')">詳細</button>
      </td>
    </tr>

    <!-- モーダル（ループ内だけどテーブルの外に出してOK） -->
    <div id="modal-{{ $user->id }}" class="modal" style="display: none;">
      <div class="modal-content">
        <span class="close" onclick="closeModal('{{ $user->id }}')">&times;</span>
        <div class="modal-row"><span class="label">お名前</span><span>{{ $user->last_name }} {{ $user->first_name }}</span></div>
        <div class="modal-row"><span class="label">性別</span><span>
            @if ($user->gender === 1) 男性
            @elseif ($user->gender === 2) 女性
            @elseif ($user->gender === 3) その他
            @else 未設定 @endif
          </span></div>
        <div class="modal-row"><span class="label">メールアドレス</span><span>{{ $user->email }}</span></div>
        <div class="modal-row"><span class="label">電話番号</span><span>{{ $user->tel }}</span></div>
        <div class="modal-row"><span class="label">住所</span><span>{{ $user->address }}</span></div>
        <div class="modal-row"><span class="label">建物名</span><span>{{ $user->building }}</span></div>
        <div class="modal-row"><span class="label">お問い合わせの種類</span><span>{{ $user->category->name ?? '---' }}</span></div>
        <div class="modal-row"><span class="label">お問い合わせ内容</span>
          <span style="white-space: pre-wrap;">{{ $user->content }}</span>
        </div>

        <form method="POST" action="{{ route('admin.destroy', $user->id) }}" class="delete-form">
          @csrf
          @method('DELETE')
          <button type="submit" class="delete-btn">削除</button>
        </form>
      </div>
    </div>
    @endforeach
  </tbody>
</table>
@endsection

@section('js')
<script>
  function openModal(id) {
    const modal = document.getElementById(`modal-${id}`);
    if (modal) {
      modal.style.display = 'block';
    }
  }

  function closeModal(id) {
    const modal = document.getElementById(`modal-${id}`);
    if (modal) {
      modal.style.display = 'none';
    }
  }

  // モーダルの背景クリックで閉じる
  window.addEventListener('click', function(event) {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(function(modal) {
      if (event.target === modal) {
        modal.style.display = 'none';
      }
    });
  });
</script>
@endsection