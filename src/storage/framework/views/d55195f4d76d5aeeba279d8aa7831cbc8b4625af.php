<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/confirm.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subtitle', 'Confirm'); ?>

<?php $__env->startSection('content'); ?>
<div class="container confirm-container">

  <table class="confirm-table">
    <tr>
      <th>お名前</th>
      <td><?php echo e($data['last_name']); ?> <?php echo e($data['first_name']); ?></td>
    </tr>
    <tr>
      <th>性別</th>
      <td>
        <?php if($data['gender'] == 1): ?> 男性
        <?php elseif($data['gender'] == 2): ?> 女性
        <?php else: ?> その他
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <th>メールアドレス</th>
      <td><?php echo e($data['email']); ?></td>
    </tr>
    <tr>
      <th>電話番号</th>
      <td><?php echo e($data['tel1']); ?>-<?php echo e($data['tel2']); ?>-<?php echo e($data['tel3']); ?></td>
    </tr>
    <tr>
      <th>住所</th>
      <td><?php echo e($data['address']); ?></td>
    </tr>
    <tr>
      <th>建物名</th>
      <td><?php echo e($data['building']); ?></td>
    </tr>
    <tr>
      <th>お問い合わせの種類</th>
      <td><?php echo e($data['category_name']); ?></td>
    </tr>
    <tr>
      <th>お問い合わせ内容</th>
      <td><?php echo nl2br(e($data['detail'])); ?></td>
    </tr>
  </table>

  <form method="POST" action="<?php echo e(route('contact.store')); ?>">
    <?php echo csrf_field(); ?>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($value); ?>">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="confirm-buttons">
      <button type="submit" class="btn-submit">送信</button>
      <button type="button" onclick="history.back();" class="btn-back">修正</button>
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/contact/confirm.blade.php ENDPATH**/ ?>