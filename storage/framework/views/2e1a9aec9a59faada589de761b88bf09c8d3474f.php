<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from dreamguys.co.in/demo/doccure/template/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:09:17 GMT -->
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="<?php echo e(asset('template')); ?>/assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('template')); ?>/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('template')); ?>/assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="<?php echo e(asset('template')); ?>/assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('template')); ?>/assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body class="account-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<?php echo $__env->make('public/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<!-- /Header -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
								
							<!-- Register Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="<?php echo e(asset('template')); ?>/assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Doctor Register <a href="<?php echo e(url('patient_registration')); ?>">Not a Doctor?</a></h3>
										</div>
										<div class="login-header">
											 <h6 class="card-title">
								                  <?php if(session()->get('success')): ?>
								                    <span class="text-success">
								                      <?php echo e(session()->get('success')); ?>  
								                    </span>
								                  <?php endif; ?>
								                   <?php if(session()->get('failure')): ?>
								                    <span class="text-danger">
								                      <?php echo e(session()->get('failure')); ?>  
								                    </span>
								                  <?php endif; ?>
								              </h6>
										</div>
										
										<!-- Register Form -->
										 <form role="form" enctype="multipart/form-data" method="post" action="<?php echo e(url('doctor_registration_submit')); ?>">
           									<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
           									<input type="hidden" name="type" value="ZG9jdG9y">

											<div class="form-group form-focus">
												<input type="text" class="form-control floating" name="name" required="" >
												<label class="focus-label">Name</label>
											</div>
                                               <?php if($errors->has('name')): ?> <p style="color:red;"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
											<div class="form-group form-focus">
												<input type="number" class="form-control floating" name="mobile" required="" maxlength="10" minlength="10">
												<label class="focus-label">Mobile Number</label>
                                               <?php if($errors->has('mobile')): ?> <p style="color:red;"><?php echo e($errors->first('mobile')); ?></p> <?php endif; ?>

											</div>
											<div class="form-group form-focus">
												<input type="password" class="form-control floating" name="password" required="">
												<label class="focus-label">Create Password</label>
                                               <?php if($errors->has('password')): ?> <p style="color:red;"><?php echo e($errors->first('password')); ?></p> <?php endif; ?>

											</div>
											<div class="text-right">
												<a class="forgot-link" href="<?php echo e(url('login')); ?>">Already have an account?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Signup</button>
											<!-- <div class="login-or">
												<span class="or-line"></span>
												<span class="span-or">or</span>
											</div> -->
											<!-- <div class="row form-row social-login">
												<div class="col-6">
													<a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f mr-1"></i> Login</a>
												</div>
												<div class="col-6">
													<a href="#" class="btn btn-google btn-block"><i class="fab fa-google mr-1"></i> Login</a>
												</div>
											</div> -->
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Register Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
            <?php echo $__env->make('public/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="<?php echo e(asset('template')); ?>/assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="<?php echo e(asset('template')); ?>/assets/js/popper.min.js"></script>
		<script src="<?php echo e(asset('template')); ?>/assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="<?php echo e(asset('template')); ?>/assets/js/script.js"></script>
		
	</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/template/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:09:17 GMT -->
</html>