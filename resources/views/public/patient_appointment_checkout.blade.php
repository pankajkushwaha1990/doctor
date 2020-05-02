<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from dreamguys.co.in/demo/doccure/template/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:09:14 GMT -->
<head>
		<meta charset="utf-8">
		<title>Doccure</title>
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
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-7 col-lg-8">
							<div class="card">
								<div class="card-body">
								
									<!-- Checkout Form -->
						<form  enctype="multipart/form-data" class="needs-validation" method="post" action="{{ url('patient_appointment_checkout_submit') }}">
          				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
									
										<!-- Personal Information -->
										<div class="info-widget">
											<h4 class="card-title">Patient Information</h4>
											<div class="row">
												<?php 
												if(!empty($patient)){?>
													<div class="col-md-12 col-sm-12">
													 			<div class="form-group card-label">
														         <label>Select Patient</label>
													 		      <select class="form-control" required="" name="patient_details">
													 		      	<option value="">Select Patient</option>
													 		      	<?php
														$family_name     = json_decode($patient[0]->family_name,true);
													 	$family_relation = json_decode($patient[0]->family_relation,true);
													 	$family_dob      = json_decode($patient[0]->family_dob,true);
													 	foreach ($family_name as $key => $value) { ?>
													 		     	<option value="{{ $family_name[$key] }}||{{ $family_relation[$key] }}||{{ $family_dob[$key] }}">{{ $family_name[$key] }}  ({{ $family_relation[$key] }}) {{ $family_dob[$key] }}</option>
													 	<?php } ?>
													 		      </select>
													 			</div>
															</div>

													 	<?php 
												}else{ ?>

													<div class="col-md-6 col-sm-12">
													<div class="form-group card-label">
														<label>Name</label>
														<input class="form-control" type="text">
													</div>
													</div>
													<div class="col-md-6 col-sm-12">
														<div class="form-group card-label">
															<label>DOB</label>
															<input class="form-control" type="email">
														</div>
													</div>
													<div class="col-md-6 col-sm-12">
														<div class="form-group card-label">
															<label>Phone</label>
															<input class="form-control" type="text">
														</div>
													</div>

												<?php }
												?>
													<input type="hidden" required="" name="ref_url" value=" {{ $ref_url }}">
													<input type="hidden" required="" name="doctor_fee" value=" {{ $doctor->clinic_fee }}">
												
											</div>
											<!-- <div class="exist-customer">Existing Customer? <a href="#">Click here to login</a></div> -->
										</div>
										<!-- /Personal Information -->
										
										<div class="payment-widget">
											<!-- <h4 class="card-title">Payment Method</h4> -->
											
											<!-- Credit Card Payment -->
<!-- 											<div class="payment-list">
												<label class="payment-radio credit-card-option">
													<input type="radio" name="radio" checked>
													<span class="checkmark"></span>
													Credit card
												</label>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_name">Name on Card</label>
															<input class="form-control" id="card_name" type="text">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group card-label">
															<label for="card_number">Card Number</label>
															<input class="form-control" id="card_number" placeholder="1234  5678  9876  5432" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_month">Expiry Month</label>
															<input class="form-control" id="expiry_month" placeholder="MM" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="expiry_year">Expiry Year</label>
															<input class="form-control" id="expiry_year" placeholder="YY" type="text">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group card-label">
															<label for="cvv">CVV</label>
															<input class="form-control" id="cvv" type="text">
														</div>
													</div>
												</div>
											</div> -->
											<!-- /Credit Card Payment -->
											
											<!-- Paypal Payment -->
<!-- 											<div class="payment-list">
												<label class="payment-radio paypal-option">
													<input type="radio" name="radio">
													<span class="checkmark"></span>
													Paypal
												</label>
											</div> -->
											<!-- /Paypal Payment -->
											
											<!-- Terms Accept -->
											<div class="terms-accept">
												<div class="custom-checkbox">
												   <input type="checkbox" id="terms_accept" required="">
												   <label for="terms_accept">I have read and accept <a href="#">Terms &amp; Conditions</a></label>
												</div>
											</div>
											<!-- /Terms Accept -->
											
											<!-- Submit Section -->
											<div class="submit-section mt-4">
												<button type="submit" class="btn btn-primary submit-btn">Confirm and Pay</button>
											</div>
											<!-- /Submit Section -->
											
										</div>
									</form>
									<!-- /Checkout Form -->
									
								</div>
							</div>
							
						</div>
						
						<div class="col-md-5 col-lg-4 theiaStickySidebar">
						
							<!-- Booking Summary -->
							<div class="card booking-card">
								<div class="card-header">
									<h4 class="card-title">Booking Summary</h4>
								</div>
								<div class="card-body">
								
									<!-- Booking Doctor Info -->
									<div class="booking-doc-info">
										<a href="doctor-profile.html" class="booking-doc-img">
											<img src="{{asset('template')}}/assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
										</a>
										<div class="booking-info">
											<h4><a href="doctor-profile.html">{{ $doctor->name }} </a></h4>
											<!-- <div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
												<span class="d-inline-block average-rating">35</span>
											</div> -->
											<div class="clinic-details">
												<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ ucfirst($doctor->clinic_address) }} <br> {{ ucfirst($doctor->clinic_city) }},{{ ucfirst($doctor->clinic_country) }}</p>
											</div>
										</div>
									</div>
									<!-- Booking Doctor Info -->
									
									<div class="booking-summary">
										<div class="booking-item-wrap">
											<ul class="booking-date">
												<?php $timestramp = strtotime($appointment_date); ?>
												<li>Date <span><?php echo date('d F Y',$timestramp); ?></span></li>
												<li>Time <span><?php echo $booking_slot;?></span></li>
											</ul>
											<ul class="booking-fee">
												<li>Consulting Fee <span>
													<?php 
													  if($doctor->rating_option='custom_price'){
													     echo $fee = $doctor->clinic_fee ." Rs.";
												      }else{
												         echo $fee = "Free";
												      }
												      ?>
												</span></li>
												<!-- <li>Booking Fee <span>$10</span></li>
												<li>Video Call <span>$50</span></li> -->
											</ul>
											<div class="booking-total">
												<ul class="booking-total-list">
													<li>
														<span>Total</span>
														<span class="total-cost">{{ $fee }}</span>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Booking Summary -->
							
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