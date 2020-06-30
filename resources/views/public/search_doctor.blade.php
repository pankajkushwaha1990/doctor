<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from dreamguys.co.in/demo/doccure/template/search.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:09:14 GMT -->
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
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{asset('template')}}/assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{asset('template')}}/assets/plugins/select2/css/select2.min.css">
		
		<!-- Fancybox CSS -->
		<link rel="stylesheet" href="{{asset('template')}}/assets/plugins/fancybox/jquery.fancybox.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{asset('template')}}/assets/css/style.css">

		<style type="text/css">
#mobileshow { 
display:none; 
}
@media screen and (max-width: 500px) {
#mobileshow { 
display:block; }
}
</style>
		
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
						<div class="col-md-8 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Search</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">2245 matches found for : Dentist In Bangalore</h2>
						</div>
						<div class="col-md-4 col-12 d-md-block d-none">
							<div class="sort-by">
								<span class="sort-title">Sort by</span>
								<span class="sortby-fliter">
									<select class="select">
										<option>Select</option>
										<option class="sorting">Rating</option>
										<option class="sorting">Popular</option>
										<option class="sorting">Latest</option>
										<option class="sorting">Free</option>
									</select>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Search Filter -->
							<div class="card search-filter">
								<div class="card-header">
									<h4 class="card-title mb-0">Search Filter</h4>
								</div>
								<div class="card-body">
								<div class="filter-widget">
									<!-- <div class="cal-icon">
										<input type="text" class="form-control datetimepicker" placeholder="Select Date">
									</div>	 -->		
								</div>
								<div class="filter-widget">
									<!-- <h4>Gender</h4>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="gender_type" checked>
											<span class="checkmark"></span> Male Doctor
										</label>
									</div>
									<div>
										<label class="custom_check">
											<input type="checkbox" name="gender_type">
											<span class="checkmark"></span> Female Doctor
										</label>
									</div> -->
								</div>
								<div class="filter-widget">
									<h4>Select Specialist</h4>
									 <form  role="form" enctype="multipart/form-data" method="get" action="{{ url('search_doctor') }}">
									<div>
											<input type="text" class="form-control" placeholder="Search Location" name="location" value="{{ $location }}">
										
									</div>
									<br>
									<div>
										 <input type="text" class="form-control" name="keywords" placeholder="Search Doctors, Clinics, Hospitals, Diseases Etc">
									</div>
									
								</div>
									<div class="btn-search">
										<button type="submit" class="btn btn-block">Search</button>
									</div>	
								</div>
							</form>
							</div>
							<!-- /Search Filter -->
							
						</div>
						
						<div class="col-md-12 col-lg-8 col-xl-9">

							<!-- Doctor Widget -->
						@if(!empty($list))
						  @foreach($list as $doctor)
							<div class="card">
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img">
												<a href="{{ url('doctor_profile_view') }}/{{ base64_encode(base64_encode($doctor->id)) }}">
													<img src="{{asset('doctor_files')}}/{{ $doctor->profile_picture }}" class="img-fluid" alt="User Image">
												</a>
											</div>
											<div class="doc-info-cont">
												<h4 class="doc-name"><a href="{{ url('doctor_profile_view') }}/{{ base64_encode(base64_encode($doctor->id)) }}">{{ $doctor->name }}</a></h4>
												<p class="doc-speciality">{{ $doctor->designation }}</p>
												<!-- <h5 class="doc-department"><img src="{{asset('template')}}/assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">Dentist</h5> -->
												<?php 
												if(!empty($doctor->rating)){ ?>
												<div class="rating">
													<?php 
													$checked = round($doctor->rating->star);
													for($k=1;$k<=5;$k++){
														if($k<=$checked){?>
														<i class="fas fa-star filled"></i>
													<?php }else{?>
														<i class="fas fa-star"></i>
													<?php } } ?>
													<span class="d-inline-block average-rating">{{ $doctor->rating->total }}</span>
												</div>
											<?php } ?>
												<div class="clinic-details">
													<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{ ucfirst($doctor->clinic_address) }}, {{ ucfirst($doctor->clinic_city) }},{{ ucfirst($doctor->clinic_country) }}</p>
													<!-- <ul class="clinic-gallery">
														<li>
															<a href="{{asset('template')}}/assets/img/features/feature-01.jpg" data-fancybox="gallery">
																<img src="{{asset('template')}}/assets/img/features/feature-01.jpg" alt="Feature">
															</a>
														</li>
														<li>
															<a href="{{asset('template')}}/assets/img/features/feature-02.jpg" data-fancybox="gallery">
																<img  src="{{asset('template')}}/assets/img/features/feature-02.jpg" alt="Feature">
															</a>
														</li>
														<li>
															<a href="{{asset('template')}}/assets/img/features/feature-03.jpg" data-fancybox="gallery">
																<img src="{{asset('template')}}/assets/img/features/feature-03.jpg" alt="Feature">
															</a>
														</li>
														<li>
															<a href="{{asset('template')}}/assets/img/features/feature-04.jpg" data-fancybox="gallery">
																<img src="{{asset('template')}}/assets/img/features/feature-04.jpg" alt="Feature">
															</a>
														</li>
													</ul> -->
												</div>
												<div class="clinic-services">
												  <?php
												   $services = explode(',',$doctor->clinic_services);
												   foreach($services as $service){ ?>
												     <span>{{ ucfirst($service) }}</span>
												   <?php } ?>
												</div>
											</div>
										</div>
										<div class="doc-info-right">
											<div class="clini-infos">
												<ul>
													<!-- <li><i class="far fa-thumbs-up"></i> 98%</li>
													<li><i class="far fa-comment"></i> 17 Feedback</li> -->
													<li><i class="fas fa-map-marker-alt"></i>{{ ucfirst($doctor->clinic_city) }},{{ ucfirst($doctor->clinic_country) }}</li>
													<li><i class="far fa-money-bill-alt"></i>
													<?php 
													  if($doctor->rating_option='custom_price'){
													     echo $doctor->clinic_fee ." Rs.";
												      }else{
												         echo "Free";
												      }
												      ?>

													 <!-- <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i> </li> -->
												</ul>
											</div>
											<div class="clinic-booking">
												<a class="view-pro-btn" href="{{ url('doctor_profile_view') }}/{{ base64_encode(base64_encode($doctor->id)) }}">View Profile</a>
												<a class="apt-btn" href="{{ url('doctor_appointment_booking') }}/{{ base64_encode(base64_encode($doctor->id)) }}?appointment_date={{ date('Y-m-d') }}">Book Appointment</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						   @else
						   <div class="load-more text-center">
								<a class="btn btn-primary btn-lg" href="javascript:void(0);">Doctor Not Found</a>	
							</div>
						   @endif

							<!-- /Doctor Widget -->

							<!-- <div class="load-more text-center">
								<a class="btn btn-primary btn-sm" href="javascript:void(0);">Load More</a>	
							</div>	 -->
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
		
		<!-- Select2 JS -->
		<script src="{{asset('template')}}/assets/plugins/select2/js/select2.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="{{asset('template')}}/assets/js/moment.min.js"></script>
		<script src="{{asset('template')}}/assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Fancybox JS -->
		<script src="{{asset('template')}}/assets/plugins/fancybox/jquery.fancybox.min.js"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('template')}}/assets/js/script.js"></script>
		
	</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/template/search.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:09:14 GMT -->
</html>