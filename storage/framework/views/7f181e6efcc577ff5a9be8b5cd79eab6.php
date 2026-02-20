<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RR | Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo e(asset('backend/plugins/fontawesome-free/css/all.min.css')); ?>">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Toastr CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <?php echo $__env->yieldContent('stylesheet'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('backend/dist/css/adminlte.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('backend/developer.css')); ?>">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php echo $__env->make('backend.includes.nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('backend.includes.aside', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="content-wrapper">
      <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo $__env->make('backend.includes.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  </div>
  <script src="<?php echo e(asset('backend/plugins/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <!-- Toastr JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <?php echo $__env->yieldContent('scripts_plugin'); ?>
  <script src="<?php echo e(asset('backend/dist/js/adminlte.min.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/dist/js/demo.js')); ?>"></script>
  <!-- Common JS (includes toastr configuration) -->
  <script src="<?php echo e(asset('backend/dist/js/common.js')); ?>"></script>
  <?php echo $__env->yieldContent('scripts_custom'); ?>

  <!-- Toastr Messages -->
  <script>
    // Check for login success from sessionStorage (for AJAX login from frontend)
    $(document).ready(function() {
      if (sessionStorage.getItem('loginSuccess') === 'true') {
        var userName = sessionStorage.getItem('loginUserName') || '';
        toastr.success('Welcome back, ' + userName + '! You have successfully logged in.', 'Success');
        // Clear the flags
        sessionStorage.removeItem('loginSuccess');
        sessionStorage.removeItem('loginUserName');
      }
    });

    <?php if(session('success')): ?>
        toastr.success("<?php echo e(session('success')); ?>");
    <?php endif; ?>
    <?php if(session('error')): ?>
        toastr.error("<?php echo e(session('error')); ?>");
    <?php endif; ?>
    <?php if(session('warning')): ?>
        toastr.warning("<?php echo e(session('warning')); ?>");
    <?php endif; ?>
    <?php if(session('info')): ?>
        toastr.info("<?php echo e(session('info')); ?>");
    <?php endif; ?>
  </script>
</body>
</html>
<?php /**PATH C:\laragonUpdated\www\rr-app\resources\views/backend/layouts/default.blade.php ENDPATH**/ ?>