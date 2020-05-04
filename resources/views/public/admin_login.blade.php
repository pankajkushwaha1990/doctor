<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/template/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:10:34 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>aasanilaz - Login</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('template/admin')}}/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('template/admin')}}/assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('template/admin')}}/assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="{{asset('template/admin')}}/assets/img/logo-white.png" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>

								<center><p class="card-title">
					                  @if(session()->get('success'))
					                    <span class="text-success">
					                      {{ session()->get('success') }}  
					                    </span>
					                  @endif
					                   @if(session()->get('failure'))
					                    <span class="text-danger">
					                      {{ session()->get('failure') }}  
					                    </span>
					                  @endif
					              </p></center>
								
								<!-- Form -->
								<form id="needs-validation" novalidate class="needs-validation" method="post" action="{{ url('admin_login_submit') }}">
          						    <input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<input class="form-control" type="email" placeholder="Email" required="" name="admin_email">
										<div class="invalid-feedback">Please provide email address.</div>
									</div>
									<div class="form-group">
										<input class="form-control admin_password" name="admin_password" minlength="6" type="password" placeholder="Password" required="">
										<div class="invalid-feedback">Please provide password.</div>

									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block admin_login_submit_button" type="submit">Login</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="text-center forgotpass"><a href="#">Forgot Password?</a></div>
								<!-- <div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div> -->
								  
								<!-- Social Login -->
								<!-- <div class="social-login">
									<span>Login with</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
								</div> -->
								<!-- /Social Login -->
								
								<!-- <div class="text-center dont-have">Don’t have an account? <a href="register.html">Register</a></div> -->
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{asset('template/admin')}}/assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{asset('template/admin')}}/assets/js/popper.min.js"></script>
        <script src="{{asset('template/admin')}}/assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('template/admin')}}/assets/js/script.js"></script>
		
    </body>
    <script type="text/javascript">
    	$(function(){
    		// $('.needs-validation').submit(function(){
    		// 	var admin_password = $('.admin_password').val();
    		// 	$('.admin_password').val(atob(admin_password));
    		// })
    	})
    </script>
		<script src="{{asset('template/admin')}}/assets/js/form-validation.js"></script>

<!-- Mirrored from dreamguys.co.in/demo/doccure/template/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:10:34 GMT -->
</html>