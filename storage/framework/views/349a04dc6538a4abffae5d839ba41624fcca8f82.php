<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="<?php echo e(asset('template/admin')); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('template/admin')); ?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('template/admin')); ?>/assets/css/feathericon.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('template/admin')); ?>/assets/plugins/morris/morris.css">
    <link rel="stylesheet" href="<?php echo e(asset('template/admin')); ?>/assets/css/style.css">
     <?php echo $__env->yieldContent('styles'); ?>
    </head>
<body> 
    <div class="main-wrapper">
      <?php echo $__env->make('partials.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo $__env->make('partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <?php echo $__env->yieldContent('content'); ?>
      <?php echo $__env->make('partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
   </div>
   <script src="<?php echo e(asset('template/admin')); ?>/assets/js/jquery-3.2.1.min.js"></script>
   <script src="<?php echo e(asset('template/admin')); ?>/assets/js/popper.min.js"></script>
   <script src="<?php echo e(asset('template/admin')); ?>/assets/js/bootstrap.min.js"></script>
   <script src="<?php echo e(asset('template/admin')); ?>/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
   <script src="<?php echo e(asset('template/admin')); ?>/assets/plugins/raphael/raphael.min.js"></script>    
   <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>