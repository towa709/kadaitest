<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank you</title>
  <link rel="stylesheet" href="<?php echo e(asset('css/thank.css')); ?>">
</head>

<body>
  <div class="thanks-box">
    <p class="thanks-message">お問い合わせありがとうございました</p>
    <a href="<?php echo e(route('contact.index')); ?>" class="thanks-home-btn">HOME</a>
  </div>
</body>

</html><?php /**PATH /var/www/resources/views/contact/thank.blade.php ENDPATH**/ ?>