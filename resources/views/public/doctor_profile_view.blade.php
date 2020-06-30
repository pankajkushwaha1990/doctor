<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from dreamguys.co.in/demo/doccure/template/doctor-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:09:14 GMT -->
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
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Doctor Profile</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Doctor Profile</h2>
						</div>
					</div>
				</div>
			</div> -->
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<!-- Doctor Widget -->
					<div class="card">
						<div class="card-body">
							<div class="doctor-widget">
								<div class="doc-info-left">
									<div class="doctor-img">
										<img src="{{asset('doctor_files')}}/{{ $doctor->profile_picture }}" class="img-fluid" alt="User Image">
									</div>
									<div class="doc-info-cont">
										<h4 class="doc-name">{{ $doctor->name }}</h4>
										<p class="doc-speciality">{{ $doctor->designation }}</p>
										<!-- <p class="doc-department"><img src="{{asset('template')}}/assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">Dentist</p> -->
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
											<?php }else{ ?>
												<!-- <div class="rating">
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<span class="d-inline-block average-rating">0</span>
												</div> -->
											<?php } ?>
										<div class="clinic-details">
											<p class="doc-location"><i class="fas fa-map-marker-alt"></i>  {{ ucfirst($doctor->clinic_address) }}, {{ ucfirst($doctor->clinic_city) }},{{ ucfirst($doctor->clinic_country) }} </p>
											<!-- <ul class="clinic-gallery">
												<li>
													<a href="{{asset('template')}}/assets/img/features/feature-01.jpg" data-fancybox="gallery">
														<img src="{{asset('template')}}/assets/img/features/feature-01.jpg" alt="Feature">
													</a>
												</li>
												<li>
													<a href="{{asset('template')}}/assets/img/features/feature-02.jpg" data-fancybox="gallery">
														<img  src="{{asset('template')}}/assets/img/features/feature-02.jpg" alt="Feature Image">
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
											<!-- <li><i class="far fa-thumbs-up"></i> 99%</li>
											<li><i class="far fa-comment"></i> 35 Feedback</li> -->
											<li><i class="fas fa-map-marker-alt"></i> {{ ucfirst($doctor->clinic_city) }},{{ ucfirst($doctor->clinic_country) }}</li>
											<li><i class="far fa-money-bill-alt"></i> 
											<?php 
													  if($doctor->rating_option='custom_price'){
													     echo $doctor->clinic_fee ." Rs.";
												      }else{
												         echo "Free";
												      }
												      ?>
												       </li>
										</ul>
									</div>
									<!-- <div class="doctor-action">
										<a href="javascript:void(0)" class="btn btn-white fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
										<a href="chat.html" class="btn btn-white msg-btn">
											<i class="far fa-comment-alt"></i>
										</a>
										<a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#voice_call">
											<i class="fas fa-phone"></i>
										</a>
										<a href="javascript:void(0)" class="btn btn-white call-btn" data-toggle="modal" data-target="#video_call">
											<i class="fas fa-video"></i>
										</a>
									</div> -->
									<div class="clinic-booking">
										<a class="apt-btn" href="{{ url('doctor_appointment_booking') }}/{{ base64_encode(base64_encode($doctor->id)) }}?appointment_date={{ date('Y-m-d') }}">Book Appointment</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Doctor Widget -->
					
					<!-- Doctor Details Tab -->
					<div class="card">
						<div class="card-body pt-0">
						
							<!-- Tab Menu -->
							<nav class="user-tabs mb-4">
								<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
									<li class="nav-item">
										<a class="nav-link active" href="#doc_overview" data-toggle="tab">Overview</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#doc_locations" data-toggle="tab">Locations</a>
									</li>
									<?php 
												if(!empty($doctor->rating)){ ?>
									<li class="nav-item">
										<a class="nav-link" href="#doc_reviews" data-toggle="tab">Reviews</a>
									</li>
								<?php } ?>
									<!-- <li class="nav-item"> -->
										<!-- <a class="nav-link" href="#doc_business_hours" data-toggle="tab">Business Hours</a> -->
									<!-- </li> -->
								</ul>
							</nav>
							<!-- /Tab Menu -->
							
							<!-- Tab Content -->
							<div class="tab-content pt-0">
							
								<!-- Overview Content -->
								<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
									<div class="row">
										<div class="col-md-12 col-lg-9">
										
											<!-- About Details -->
											<div class="widget about-widget">
												<h4 class="widget-title">About Me</h4>
												<p>{{ $doctor->about_us }}</p>
											</div>
											<!-- /About Details -->
										
											<!-- Education Details -->
											<div class="widget education-widget">
												<h4 class="widget-title">Education</h4>
												<div class="experience-box">
													<ul class="experience-list">
													<?php 
													$degree         = json_decode($doctor->degree,true);	
													$institute      = json_decode($doctor->institute,true);	
													$completion_year = json_decode($doctor->completion_year,true);
													if(!empty($degree)){
													foreach($degree as $key=>$value){ ?>

													<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<a href="#/" class="name">{{ $institute[$key] }}</a>
																	<div>{{ $degree[$key] }}</div>
																	<span class="time">{{ $completion_year[$key] }}</span>
																</div>
															</div>
														</li>

												    <?php } }	 ?>
													</ul>
												</div>
											</div>
											<!-- /Education Details -->
									
											<!-- Experience Details -->
											<div class="widget experience-widget">
												<h4 class="widget-title">Work & Experience</h4>
												<div class="experience-box">
													<ul class="experience-list">
													<?php 
													$hospital_name         = json_decode($doctor->hospital_name,true);	
													$experience_from      = json_decode($doctor->experience_from,true);	
													$experience_to = json_decode($doctor->experience_to,true);
													$experience_designation = json_decode($doctor->experience_designation,true);
													if(!empty($hospital_name)){
													foreach($hospital_name as $key=>$value){ ?>
														
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<a href="#/" class="name">{{ $hospital_name[$key] }}</a>
																	<span class="time">{{ $experience_from[$key] }} - {{ $experience_to[$key] }}</span>
																</div>
															</div>
														</li>

														<?php } } ?>
													</ul>
												</div>
											</div>
											<!-- /Experience Details -->
								
											<!-- Awards Details -->
											<div class="widget awards-widget">
												<h4 class="widget-title">Awards</h4>
												<div class="experience-box">
													<ul class="experience-list">

													<?php 
													$award_name         = json_decode($doctor->award_name,true);	
													$award_year      = json_decode($doctor->award_year,true);
													if(!empty($award_name)){
													foreach($award_name as $key=>$value){ ?>	
														<li>
															<div class="experience-user">
																<div class="before-circle"></div>
															</div>
															<div class="experience-content">
																<div class="timeline-content">
																	<p class="exp-year">{{ $award_year[$key] }}</p>
																	<h4 class="exp-title">{{ $award_name[$key] }}</h4>
																	<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p> -->
																</div>
															</div>
														</li>

													<?php } } ?>


													
														
													</ul>
												</div>
											</div>
											<!-- /Awards Details -->
											
											<!-- Services List -->
											<div class="service-list">
												<h4>Services</h4>
												<ul class="clearfix">
													 <?php
												   $services = explode(',',$doctor->clinic_services);
												   foreach($services as $service){ ?>
												     <li>{{ ucfirst($service) }}</li>
												   <?php } ?>
												</ul>
											</div>
											<!-- /Services List -->
											
											<!-- Specializations List -->
											<div class="service-list">
												<h4>Specializations</h4>
												<ul class="clearfix">
													 <?php
												   $services = explode(',',$doctor->clinic_specialist);
												   foreach($services as $service){ ?>
												     <li>{{ ucfirst($service) }}</li>
												   <?php } ?>	
												</ul>
											</div>
											<!-- /Specializations List -->

										</div>
									</div>
								</div>
								<!-- /Overview Content -->
								
								<!-- Locations Content -->
								<div role="tabpanel" id="doc_locations" class="tab-pane fade">
								
									<!-- Location List -->
									<div class="location-list">
										<div class="row">
										
											<!-- Clinic Content -->
											<div class="col-md-6">
												<div class="clinic-content">
													<h4 class="clinic-name"><a href="#">{{ $doctor->clinic_name }}</a></h4>
													<p class="doc-speciality">MDS - Periodontology and Oral Implantology, BDS</p>
													<!-- <div class="rating">
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star filled"></i>
														<i class="fas fa-star"></i>
														<span class="d-inline-block average-rating">(4)</span>
													</div> -->
													<div class="clinic-details mb-0">
														<h5 class="clinic-direction"> <i class="fas fa-map-marker-alt"></i> {{ ucfirst($doctor->clinic_address) }}, {{ ucfirst($doctor->clinic_city) }},{{ ucfirst($doctor->clinic_country) }} <br>
															<!-- <a href="javascript:void(0);">Get Directions</a></h5> -->
														<!-- <ul>
															<li>
																<a href="{{asset('template')}}/assets/img/features/feature-01.jpg" data-fancybox="gallery2">
																	<img src="{{asset('template')}}/assets/img/features/feature-01.jpg" alt="Feature Image">
																</a>
															</li>
															<li>
																<a href="{{asset('template')}}/assets/img/features/feature-02.jpg" data-fancybox="gallery2">
																	<img src="{{asset('template')}}/assets/img/features/feature-02.jpg" alt="Feature Image">
																</a>
															</li>
															<li>
																<a href="{{asset('template')}}/assets/img/features/feature-03.jpg" data-fancybox="gallery2">
																	<img src="{{asset('template')}}/assets/img/features/feature-03.jpg" alt="Feature Image">
																</a>
															</li>
															<li>
																<a href="{{asset('template')}}/assets/img/features/feature-04.jpg" data-fancybox="gallery2">
																	<img src="{{asset('template')}}/assets/img/features/feature-04.jpg" alt="Feature Image">
																</a>
															</li>
														</ul> -->
													</div>
												</div>
											</div>
											<!-- /Clinic Content -->
											
											<!-- Clinic Timing -->
											<div class="col-md-4">
												<div class="clinic-timing">
													<div>
														<p class="timings-days">
															<span> Opening Time </span>
														</p>
														<p class="timings-times">
                                                   <?php 
                                                   date_default_timezone_set('Asia/Kolkata');
                                                    $openTime           = date('Gi',strtotime($doctor->clinic_open_time)); ?>
                                                 <?php $closedTime       = date('Gi',strtotime($doctor->clinic_close_time)); ?>

															<span>{{ date('h:i A',strtotime($openTime)) }} - {{ date('h:i A',strtotime($closedTime)) }}</span>
															<!-- <span>4:00 PM - 9:00 PM</span> -->
														</p>
													</div>
													<div>
													<!-- <p class="timings-days">
														<span>Sun</span>
													</p>
													<p class="timings-times">
														<span>10:00 AM - 2:00 PM</span>
													</p> -->
													</div>
												</div>
											</div>
											<!-- /Clinic Timing -->
											
											<div class="col-md-2">
												<div class="consult-price">
													<?php 
													  if($doctor->rating_option='custom_price'){
													     echo $doctor->clinic_fee ." Rs.";
												      }else{
												         echo "Free";
												      }
												      ?>
												</div>
											</div>
										</div>
									</div>
									<!-- /Location List -->
									
									<!-- Location List -->

									<!-- /Location List -->

								</div>
								<!-- /Locations Content -->
								
								<!-- Reviews Content -->
								<div role="tabpanel" id="doc_reviews" class="tab-pane fade">
								
									<!-- Review Listing -->
									<div class="widget review-listing">
										<ul class="comments-list">

									    <?php 
									    if(!empty($doctor->rating->review_details)){
									    	foreach ($doctor->rating->review_details as $key => $value) { ?>
									    		<li>
												<div class="comment">
													<img class="avatar avatar-sm rounded-circle" alt="User Image" src="{{asset('patient_files')}}/{{ $value->profile_picture }}">
													<div class="comment-body">
														<div class="meta-data">
															<span class="comment-author">{{ $value->name }}</span>
															<span class="comment-date">Reviewed {{ date('d/m/Y',strtotime($value->date)) }}</span>
															<div class="review-count rating" style="position: unset;">
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star"></i>
															</div>
														</div>
														<!-- <p class="recommended"><i class="far fa-thumbs-up"></i> I recommend the doctor</p> -->
														<p class="comment-content">
															{{ $value->review }}
														</p>
													<!-- 	<div class="comment-reply">
															<a class="comment-btn" href="#">
																<i class="fas fa-reply"></i> Reply
															</a>
														   <p class="recommend-btn">
															<span>Recommend?</span>
															<a href="#" class="like-btn">
																<i class="far fa-thumbs-up"></i> Yes
															</a>
															<a href="#" class="dislike-btn">
																<i class="far fa-thumbs-down"></i> No
															</a>
														</p>
														</div> -->
													</div>
												</div>
												
												
												
											</li>
									    	<?php }
									    	?>
										
											<!-- Comment List -->
											
										<?php } ?>
											<!-- /Comment List -->
											
											<!-- Comment List -->
										<!-- 	<li>
												<div class="comment">
													<img class="avatar avatar-sm rounded-circle" alt="User Image" src="{{asset('template')}}/assets/img/patients/patient2.jpg">
													<div class="comment-body">
														<div class="meta-data">
															<span class="comment-author">Travis Trimble</span>
															<span class="comment-date">Reviewed 4 Days ago</span>
															<div class="review-count rating">
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star filled"></i>
																<i class="fas fa-star"></i>
															</div>
														</div>
														<p class="comment-content">
															Lorem ipsum dolor sit amet, consectetur adipisicing elit,
															sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
															Ut enim ad minim veniam, quis nostrud exercitation.
															Curabitur non nulla sit amet nisl tempus
														</p>
														<div class="comment-reply">
															<a class="comment-btn" href="#">
																<i class="fas fa-reply"></i> Reply
															</a>
															<p class="recommend-btn">
																<span>Recommend?</span>
																<a href="#" class="like-btn">
																	<i class="far fa-thumbs-up"></i> Yes
																</a>
																<a href="#" class="dislike-btn">
																	<i class="far fa-thumbs-down"></i> No
																</a>
															</p>
														</div>
													</div>
												</div>
											</li> -->
											<!-- /Comment List -->
											
										</ul>
										
										<!-- Show All -->
										<!-- <div class="all-feedback text-center">
											<a href="#" class="btn btn-primary btn-sm">
												Show all feedback <strong>(167)</strong>
											</a>
										</div> -->
										<!-- /Show All -->
										
									</div>
									<!-- /Review Listing -->
								
									<!-- Write Review -->
									<!-- <div class="write-review"> -->
										<!-- <h4>Write a review for <strong>Dr. Darren Elder</strong></h4> -->
										
										<!-- Write Review Form -->
										<!-- <form>
											<div class="form-group">
												<label>Review</label>
												<div class="star-rating">
													<input id="star-5" type="radio" name="rating" value="star-5">
													<label for="star-5" title="5 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-4" type="radio" name="rating" value="star-4">
													<label for="star-4" title="4 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-3" type="radio" name="rating" value="star-3">
													<label for="star-3" title="3 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-2" type="radio" name="rating" value="star-2">
													<label for="star-2" title="2 stars">
														<i class="active fa fa-star"></i>
													</label>
													<input id="star-1" type="radio" name="rating" value="star-1">
													<label for="star-1" title="1 star">
														<i class="active fa fa-star"></i>
													</label>
												</div>
											</div>
											<div class="form-group">
												<label>Title of your review</label>
												<input class="form-control" type="text" placeholder="If you could say it in one sentence, what would you say?">
											</div>
											<div class="form-group">
												<label>Your review</label>
												<textarea id="review_desc" maxlength="100" class="form-control"></textarea>
											  
											  <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">100</span> characters remaining</small></div>
											</div>
											<hr>
											<div class="form-group">
												<div class="terms-accept">
													<div class="custom-checkbox">
													   <input type="checkbox" id="terms_accept">
													   <label for="terms_accept">I have read and accept <a href="#">Terms &amp; Conditions</a></label>
													</div>
												</div>
											</div>
											<div class="submit-section">
												<button type="submit" class="btn btn-primary submit-btn">Add Review</button>
											</div>
										</form> -->
										<!-- /Write Review Form -->
										
									<!-- </div> -->
									<!-- /Write Review -->
						
								</div>
								<!-- /Reviews Content -->
								
								<!-- Business Hours Content -->
								<div role="tabpanel" id="doc_business_hours" class="tab-pane fade">
									<div class="row">
										<div class="col-md-6 offset-md-3">
										
											<!-- Business Hours Widget -->
											<div class="widget business-widget">
												<div class="widget-content">
													<div class="listing-hours">
														<div class="listing-day current">
															<div class="day">Today <span>5 Nov 2019</span></div>
															<div class="time-items">
																<span class="open-status"><span class="badge bg-success-light">Open Now</span></span>
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Monday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Tuesday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Wednesday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Thursday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Friday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day">
															<div class="day">Saturday</div>
															<div class="time-items">
																<span class="time">07:00 AM - 09:00 PM</span>
															</div>
														</div>
														<div class="listing-day closed">
															<div class="day">Sunday</div>
															<div class="time-items">
																<span class="time"><span class="badge bg-danger-light">Closed</span></span>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- /Business Hours Widget -->
									
										</div>
									</div>
								</div>
								<!-- /Business Hours Content -->
								
							</div>
						</div>
					</div>
					<!-- /Doctor Details Tab -->

				</div>
			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
 			@include('public/footer')

			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
		
		<!-- Voice Call Modal -->
		<div class="modal fade call-modal" id="voice_call">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<!-- Outgoing Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img alt="User Image" src="{{asset('template')}}/assets/img/doctors/doctor-thumb-02.jpg" class="call-avatar">
										<h4>Dr. Darren Elder</h4>
										<span>Connecting...</span>
									</div>							
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
										<a href="voice-call.html" class="btn call-item call-start"><i class="material-icons">call</i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- Outgoing Call -->

					</div>
				</div>
			</div>
		</div>
		<!-- /Voice Call Modal -->
		
		<!-- Video Call Modal -->
		<div class="modal fade call-modal" id="video_call">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-body">
					
						<!-- Incoming Call -->
						<div class="call-box incoming-box">
							<div class="call-wrapper">
								<div class="call-inner">
									<div class="call-user">
										<img class="call-avatar" src="{{asset('template')}}/assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
										<h4>Dr. Darren Elder</h4>
										<span>Calling ...</span>
									</div>							
									<div class="call-items">
										<a href="javascript:void(0);" class="btn call-item call-end" data-dismiss="modal" aria-label="Close"><i class="material-icons">call_end</i></a>
										<a href="video-call.html" class="btn call-item call-start"><i class="material-icons">videocam</i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- /Incoming Call -->
						
					</div>
				</div>
			</div>
		</div>
		<!-- Video Call Modal -->
		
		<!-- jQuery -->
		<script src="{{asset('template')}}/assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{asset('template')}}/assets/js/popper.min.js"></script>
		<script src="{{asset('template')}}/assets/js/bootstrap.min.js"></script>
		
		<!-- Fancybox JS -->
		<script src="{{asset('template')}}/assets/plugins/fancybox/jquery.fancybox.min.js"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('template')}}/assets/js/script.js"></script>
		
	</body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/template/doctor-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:09:14 GMT -->
</html>