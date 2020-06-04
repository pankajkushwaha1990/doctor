<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from dreamguys.co.in/demo/doccure/template/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:09:14 GMT -->
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
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			@include('public/header')
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<!-- <div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Checkout</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Checkout</h2>
						</div>
					</div>
				</div>
			</div> -->
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content success-page-cont">
				<div class="container-fluid">
				
					<div class="row justify-content-center">
						<div class="col-lg-6">
						
							<!-- Success Card -->
							<div class="card success-card">
								<div class="card-body">
									<div class="success-cont">
										<i class="fas fa-check"></i>
										<h3>Appointment booked Successfully!</h3>
										<?php $timestramp = strtotime($appointment->appointment_date); ?>
										<p>Appointment booked with <strong>{{ $appointment->name }}</strong><br> on <strong><?php echo date('d F Y',$timestramp); ?> {{ $appointment->appointment_slot }}</strong></p>
										@if($appointment->booked_by_type=='doctor')
										<a href="{{ url('doctor_appointments') }}" class="btn btn-primary view-inv-btn">Goto to Appointments</a>
										@else
										<a href="{{ url('patient_invoice_view') }}/{{ base64_encode(base64_encode($appointment->id)) }}" class="btn btn-primary view-inv-btn">View Invoice</a>
										@endif
									</div>
								</div>
							</div>
							<!-- /Success Card -->
							
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
		
		<!-- Sticky Sidebar JS -->
        <script src="{{asset('template')}}/assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="{{asset('template')}}/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('template')}}/assets/js/script.js"></script>
		
	</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/template/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:09:14 GMT -->
</html>