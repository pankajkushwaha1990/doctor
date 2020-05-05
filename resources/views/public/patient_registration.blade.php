<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from dreamguys.co.in/demo/doccure/template/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:09:17 GMT -->
<head>
		<meta charset="utf-8">
		<title>aasanilaz</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="{{asset('template')}}/assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('template')}}/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{asset('template')}}/assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="{{asset('template')}}/assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{asset('template')}}/assets/css/style.css">
		
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
			@include('public/header')
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
										<img src="{{asset('template')}}/assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Patient Register <a href="{{ url('doctor_registration') }}">Are you a Doctor?</a></h3>
										</div>
										
										<!-- Register Form -->
										 <form id="needs-validation" novalidate class="needs-validation"  role="form" enctype="multipart/form-data" method="post" action="{{ url('patient_registration_submit') }}">
           									<input type="hidden" name="_token" value="{{ csrf_token() }}">
           									<input type="hidden" name="type" value="cGF0aWVudA==">

											<div class="form-group form-focus">
												<input type="text" class="form-control floating" value="{{ old('name') }}" minlength="3" maxlength="100" name="name" required="" >
												<label class="focus-label">Name</label>
											</div>
                                               @if ($errors->has('name')) <p style="color:red;">{{ $errors->first('name') }}</p> @endif
											<div class="form-group form-focus">
												<input type="text" class="form-control floating mobile_validation" name="mobile" required="" maxlength="10" minlength="10" value="{{ old('mobile') }}" min='1111111111' max='9999999999' onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
												<label class="focus-label">Mobile Number (+91)</label>
                                               @if ($errors->has('mobile')) <p style="color:red;">{{ $errors->first('mobile') }}</p> @endif

											</div>
											<div class="form-group form-focus">
												<input type="password" class="form-control floating" placeholder="Example@123" name="password" required="" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" title="At least 1 Uppercase,1 Lowercase,1 Number,1 Symbol, symbol allowed --> !@#$%^&*_=+-,Min 8 chars and Max 12 chars">
												<label class="focus-label">Create Password</label>
                                               @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif

											</div>
											<div class="text-right">
												<a class="forgot-link" href="{{ url('login') }}">Already have an account?</a>
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
            @include('public/footer')
			
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="{{asset('template')}}/assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{asset('template')}}/assets/js/popper.min.js"></script>
		<script src="{{asset('template')}}/assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('template')}}/assets/js/script.js"></script>
		<script src="{{asset('template/admin')}}/assets/js/form-validation.js"></script>

		
		
	</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/template/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:09:17 GMT -->
</html>