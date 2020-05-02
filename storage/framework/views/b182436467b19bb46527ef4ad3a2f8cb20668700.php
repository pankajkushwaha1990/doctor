<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link href="<?php echo e(asset('template')); ?>/assets/img/favicon.png" rel="icon">
    <link rel="stylesheet" href="<?php echo e(asset('template')); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('template')); ?>/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('template')); ?>/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('template')); ?>/assets/css/style.css">  
     <?php echo $__env->yieldContent('styles'); ?>
  </head>
  <body>
    <div class="main-wrapper">
      <?php echo $__env->make('patient_partials.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo $__env->make('patient_partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo $__env->yieldContent('content'); ?>
      <?php echo $__env->make('patient_partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <script src="<?php echo e(asset('template')); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo e(asset('template')); ?>/assets/js/popper.min.js"></script>
    <script src="<?php echo e(asset('template')); ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('template')); ?>/assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="<?php echo e(asset('template')); ?>/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
    <script src="<?php echo e(asset('template')); ?>/assets/js/script.js"></script> 
  </body>
</html>   
