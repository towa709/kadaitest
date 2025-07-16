<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/register.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subtitle', 'Register'); ?>

<?php $__env->startSection('content'); ?>

<form method="POST" action="<?php echo e(route('register')); ?>">
  <?php echo csrf_field(); ?>

  <div class="form-group">
    <label for="name">お名前</label>
    <input type="text" id="name" name="name" placeholder="例: 山田 太郎" value="<?php echo e(old('name')); ?>">
    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <p class="error"><?php echo e($message); ?></p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

  </div>

  <div class="form-group">
    <label for="email">メールアドレス</label>
    <input type="text" id="email" name="email" placeholder="例: test@example.com" value="<?php echo e(old('email')); ?>">
    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <p class="error"><?php echo e($message); ?></p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

  </div>

  <div class="form-group">
    <label for="password">パスワード</label>
    <input type="password" id="password" name="password" placeholder="例: coachtech1106">
    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <p class="error"><?php echo e($message); ?></p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
  </div>


  <button type="submit">登録</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/auth/register.blade.php ENDPATH**/ ?>