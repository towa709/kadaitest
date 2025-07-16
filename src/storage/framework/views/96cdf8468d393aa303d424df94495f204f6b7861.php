<?php $__env->startSection('subtitle', 'Admin'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <form method="GET" action="<?php echo e(route('admin.index')); ?>" class="search-form">
    <div class="search-bar">
      <div class="input-group">
        <input type="text" name="keyword" value="<?php echo e(request('keyword')); ?>" placeholder="名前やメールアドレスを入力してください">
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
      <a href="<?php echo e(route('admin.index')); ?>" class="reset-btn">リセット</a>
    </div>
  </form>

  <div class="export-row">
    <form method="GET" action="<?php echo e(route('admin.export')); ?>">
      <input type="hidden" name="keyword" value="<?php echo e(request('keyword')); ?>">
      <input type="hidden" name="gender" value="<?php echo e(request('gender')); ?>">
      <input type="hidden" name="type" value="<?php echo e(request('type')); ?>">
      <input type="hidden" name="date" value="<?php echo e(request('date')); ?>">
      <button type="submit" class="export-btn">エクスポート</button>
    </form>
  </div>

  <div class="pagination">
    <?php echo e($users->appends(request()->query())->onEachSide(2)->links('pagination::default')); ?>

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
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <td><?php echo e($user->last_name); ?> <?php echo e($user->first_name); ?></td>
      <td>
        <?php if($user->gender === 1): ?> 男性
        <?php elseif($user->gender === 2): ?> 女性
        <?php elseif($user->gender === 3): ?> その他
        <?php else: ?> 未設定 <?php endif; ?>
      </td>
      <td class="email-column"><?php echo e($user->email); ?></td>
      <td><?php echo e($user->category->name ?? '---'); ?></td>
      <td>
        <button type="button" class="button" onclick="openModal('<?php echo e($user->id); ?>')">詳細</button>
      </td>
    </tr>

    <!-- モーダル（ループ内だけどテーブルの外に出してOK） -->
    <div id="modal-<?php echo e($user->id); ?>" class="modal" style="display: none;">
      <div class="modal-content">
        <span class="close" onclick="closeModal('<?php echo e($user->id); ?>')">&times;</span>
        <div class="modal-row"><span class="label">お名前</span><span><?php echo e($user->last_name); ?> <?php echo e($user->first_name); ?></span></div>
        <div class="modal-row"><span class="label">性別</span><span>
            <?php if($user->gender === 1): ?> 男性
            <?php elseif($user->gender === 2): ?> 女性
            <?php elseif($user->gender === 3): ?> その他
            <?php else: ?> 未設定 <?php endif; ?>
          </span></div>
        <div class="modal-row"><span class="label">メールアドレス</span><span><?php echo e($user->email); ?></span></div>
        <div class="modal-row"><span class="label">電話番号</span><span><?php echo e($user->tel); ?></span></div>
        <div class="modal-row"><span class="label">住所</span><span><?php echo e($user->address); ?></span></div>
        <div class="modal-row"><span class="label">建物名</span><span><?php echo e($user->building); ?></span></div>
        <div class="modal-row"><span class="label">お問い合わせの種類</span><span><?php echo e($user->category->name ?? '---'); ?></span></div>
        <div class="modal-row"><span class="label">お問い合わせ内容</span>
          <span style="white-space: pre-wrap;"><?php echo e($user->content); ?></span>
        </div>

        <form method="POST" action="<?php echo e(route('admin.destroy', $user->id)); ?>" class="delete-form">
          <?php echo csrf_field(); ?>
          <?php echo method_field('DELETE'); ?>
          <button type="submit" class="delete-btn">削除</button>
        </form>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/admin.blade.php ENDPATH**/ ?>