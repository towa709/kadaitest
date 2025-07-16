<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FashionablyLate</title>
  <link rel="stylesheet" href="<?php echo e(asset('css/sanitize.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/common.css')); ?>">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600&display=swap" rel="stylesheet">

  <?php echo $__env->yieldContent('css'); ?>
</head>

<body>
  <header>
    <div class="header-inner">
      <h1 class="font-cormorant">FashionablyLate</h1>
      <div class="header__nav">
        <?php if(auth()->guard()->check()): ?>
        <form method="POST" action="<?php echo e(route('logout')); ?>" style="display: inline;">
          <?php echo csrf_field(); ?>
          <button type="submit" class="nav__link" style="background: none; border: none; padding: 0; cursor: pointer;">
            logout
          </button>
        </form>
        <?php else: ?>
        <?php if(!Request::is('contact')): ?>
        <?php if(Route::currentRouteName() === 'register'): ?>
        <a class="nav__link" href="<?php echo e(route('login')); ?>">login</a>
        <?php else: ?>
        <a class="nav__link" href="<?php echo e(route('register')); ?>">register</a>
        <?php endif; ?>
        <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </header>


  <main>
    <h2 style="text-align: center; margin-top: 40px;"><?php echo $__env->yieldContent('subtitle'); ?></h2>

    <div class="container">
      <?php echo $__env->yieldContent('content'); ?>
    </div>
  </main>
  <?php echo $__env->yieldContent('js'); ?>

</body>

</html><?php /**PATH /var/www/resources/views/layouts/app.blade.php ENDPATH**/ ?>