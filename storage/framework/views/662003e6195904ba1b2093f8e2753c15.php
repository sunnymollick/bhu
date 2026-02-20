<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Bengali Hindu Unity'); ?></title>
    <?php echo $__env->make('frontend.includes.links', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->yieldContent('stylesheet'); ?>
  </head>

  <body>

    <div class="sigma_preloader">
      <img src="<?php echo e(asset('frontend/assets/img/om.svg')); ?>" alt="preloader">
    </div>

    <?php echo $__env->make('frontend.includes.mobile_nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->make('frontend.includes.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->yieldContent('subheader'); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('frontend.includes.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->make('frontend.includes.scripts', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->yieldContent('custom_scripts'); ?>

  </body>

</html>
<?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/frontend/layouts/default.blade.php ENDPATH**/ ?>