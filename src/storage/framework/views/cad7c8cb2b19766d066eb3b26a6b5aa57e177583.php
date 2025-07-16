<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/contact.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('subtitle', 'Contact'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

  <form method="POST" action="<?php echo e(route('contact.confirm')); ?>">
    <?php echo csrf_field(); ?>

    <div class="form-group">
      <label class="form-label name-label">お名前 <span class="required-mark">※</span></label>
      <div class="name-inputs">
        <div class="input-wrapper">
          <input type="text" id="last_name" name="last_name" placeholder="例: 山田">
          <?php $__errorArgs = ['last_name'];
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
        <div class="input-wrapper">
          <input type="text" id="first_name" name="first_name" placeholder="例: 太郎">
          <?php $__errorArgs = ['first_name'];
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
      </div>
    </div>

    <div class="form-group">
      <label class="form-label gender-label">性別 <span class="required-mark">※</span></label>
      <div class="form-input radio-options">
        <label><input type="radio" name="gender" value="1" <?php echo e(old('gender') == 1 ? 'checked' : ''); ?>> 男性</label>
        <label><input type="radio" name="gender" value="2" <?php echo e(old('gender') == 2 ? 'checked' : ''); ?>> 女性</label>
        <label><input type="radio" name="gender" value="3" <?php echo e(old('gender') == 3 ? 'checked' : ''); ?>> その他</label>
      </div>
      <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <div class="error"><?php echo e($message); ?></div>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>


<div class="form-group">
  <label class="form-label">メールアドレス <span class="required-mark">※</span></label>
  <input type="email" name="email" class="email-input" placeholder="例: test@example.com" value="<?php echo e(old('email')); ?>">
  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
  <div class="error"><?php echo e($message); ?></div>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="form-group tel-group">
  <label class="form-label">電話番号 <span class="required-mark">※</span></label>
  <div class="tel-inputs">
    <input type="text" name="tel1" maxlength="4" placeholder="080" value="<?php echo e(old('tel1')); ?>">
    <span class="tel-dash">-</span>
    <input type="text" name="tel2" maxlength="4" placeholder="1234" value="<?php echo e(old('tel2')); ?>">
    <span class="tel-dash">-</span>
    <input type="text" name="tel3" maxlength="4" placeholder="5678" value="<?php echo e(old('tel3')); ?>">
  </div>
  <?php $__errorArgs = ['tel1'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
  <div class="error"><?php echo e($message); ?></div>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="form-group address-group">
  <label class="form-label">住所 <span class="required-mark">※</span></label>
  <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷" value="<?php echo e(old('address')); ?>">
  <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
  <div class="error"><?php echo e($message); ?></div>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="form-group building-group">
  <label class="form-label">建物名 </label>
  <input type="text" name="building" placeholder="例: コーポ123" value="<?php echo e(old('building')); ?>">
  <?php $__errorArgs = ['building'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
  <div class="error"><?php echo e($message); ?></div>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>

<div class="form-group type-group">
  <label class="form-label">お問い合わせの種類 <span class="required-mark">※</span></label>
  <select name="category_id" class="soft-select">
    <option value="">選択してください</option>
    <option value="1" <?php echo e(old('category_id') == '1' ? 'selected' : ''); ?>>商品の交換について</option>
    <option value="2" <?php echo e(old('category_id') == '2' ? 'selected' : ''); ?>>商品のお届けについて</option>
    <option value="3" <?php echo e(old('category_id') == '3' ? 'selected' : ''); ?>>商品トラブル</option>
    <option value="4" <?php echo e(old('category_id') == '4' ? 'selected' : ''); ?>>ショップへのお問い合わせ</option>
    <option value="5" <?php echo e(old('category_id') == '5' ? 'selected' : ''); ?>>その他</option>
  </select>
  <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
  <div class="error"><?php echo e($message); ?></div>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>



<div class="form-group form-row">
  <label class="form-label">お問い合わせ内容 <span class="required-mark">※</span></label>
  <textarea name="detail" class="form-textarea" placeholder="お問い合わせ内容をご記載ください"><?php echo e(old('detail')); ?></textarea>
  <?php $__errorArgs = ['detail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
  <div class="error"><?php echo e($message); ?></div>
  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>


<button type="submit">確認画面</button>
</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/contact/index.blade.php ENDPATH**/ ?>