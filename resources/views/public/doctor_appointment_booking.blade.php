<!DOCTYPE html> 
<html lang="en">
	
<!-- Mirrored from dreamguys.co.in/demo/doccure/template/booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:09:14 GMT -->
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
		
		<!-- Daterangepikcer CSS -->
		<link rel="stylesheet" href="{{asset('template')}}/assets/plugins/daterangepicker/daterangepicker.css">
		
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

			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
				
					<div class="row">
						<div class="col-12">
						
							<div class="card">
								<div class="card-body">
									<div class="booking-doc-info">
										<a href="doctor-profile.html" class="booking-doc-img">
											<img src="{{asset('doctor_files')}}/{{ $doctor->profile_picture }}" alt="User Image">
										</a>
										<div class="booking-info">
											<h4><a href="doctor-profile.html">{{ $doctor->name }}</a></h4>
											<!-- <div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
												<span class="d-inline-block average-rating">35</span>
											</div> -->
											<p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> {{ ucfirst($doctor->clinic_address) }}, {{ ucfirst($doctor->clinic_city) }},{{ ucfirst($doctor->clinic_country) }}</p>
										</div>
									</div>
								</div>
							</div>
							<input type="hidden" class="doctor_id" value="{{ base64_encode(base64_encode($doctor->id)) }}">
							<div class="row">
								<div class="col-12 col-sm-4 col-md-6">
									<?php $timestramp = strtotime($appointment_date); ?>
									<h4 class="mb-1"><?php echo date('d F Y',$timestramp); ?></h4>
									<p class="text-muted"><?php echo $appointment = date('l',$timestramp); ?></p>
								</div>
								<!-- <div class="col-12 col-sm-8 col-md-6 text-sm-right">
									<div class="bookingrange btn btn-white btn-sm mb-3">
										<i class="far fa-calendar-alt mr-2"></i>
										<span></span>
										<i class="fas fa-chevron-down ml-2"></i>
									</div>
								</div> -->
                            </div>
							<!-- Schedule Widget -->
							<div class="card booking-schedule schedule-widget">
							
								<!-- Schedule Header -->
								<div class="schedule-header">
									<div class="row">
										<div class="col-md-12">
										
											<!-- Day Slot -->
											<div class="day-slot">
												<ul>
													<!-- <li class="left-arrow">
														<a href="#">
															<i class="fa fa-chevron-left"></i>
														</a>
													</li> -->
												<?php 
												$days = range(0,6);
												foreach ($days as $key => $add_day) {
													$date = date('Y-m-d',strtotime("+$add_day day"));
													$stramp = strtotime("+$add_day day",strtotime(date('Y-m-d')));
													$days = date('l', strtotime("+$add_day day"));
													// $date = date('Y-m-d');
												?>
												<a href="{{ url('doctor_appointment_booking') }}/{{ base64_encode(base64_encode($doctor->id)) }}?appointment_date={{ $date }}">
														<li <?php if($timestramp==$stramp){ echo 'booking_date="'.$date.'" class="btn btn-success booking_date" style="background-color: #65b2ff;border-radius: 24px;"';}?> >
															<span><?php echo $days; ?></span>
															<span class="slot-date"><?php echo date('d F Y',$stramp); ?></span>
														</li>
												</a>
													    <?php }
													?>
													

													
													
													<!-- <li class="right-arrow">
														<a href="#">
															<i class="fa fa-chevron-right"></i>
														</a>
													</li> -->
												</ul>
											</div>
											<!-- /Day Slot -->
											
										</div>
									</div>
								</div>
								<!-- /Schedule Header -->
								
								<!-- Schedule Content -->
								<div class="schedule-cont">
									<div class="row">
										<div class="col-md-12">
										
											<!-- Time Slot -->
											<div class="time-slot">
												<ul class="clearfix">
												<?php 
												if(ucfirst($appointment)=='Saturday'){
													$start = $doctor->saturday_start_time?json_decode($doctor->saturday_start_time,true):[];
													$end   = $doctor->saturday_end_time?json_decode($doctor->saturday_end_time,true):[];
												}elseif(ucfirst($appointment)=='Sunday'){
													$start = $doctor->sunday_start_time?json_decode($doctor->sunday_start_time,true):[];
													$end   = $doctor->sunday_end_time?json_decode($doctor->sunday_end_time,true):[];
												}elseif(ucfirst($appointment)=='Monday'){
													$start = $doctor->monday_start_time?json_decode($doctor->monday_start_time,true):[];
													$end   = $doctor->monday_end_time?json_decode($doctor->monday_end_time,true):[];
												}elseif(ucfirst($appointment)=='Tuesday'){
													$start = $doctor->tuesday_start_time?json_decode($doctor->tuesday_start_time,true):[];
													$end   = $doctor->tuesday_end_time?json_decode($doctor->tuesday_end_time,true):[];
												}elseif(ucfirst($appointment)=='Wednesday'){
													$start = $doctor->wednesday_start_time?json_decode($doctor->wednesday_start_time,true):[];
													$end   = $doctor->wednesday_end_time?json_decode($doctor->wednesday_end_time,true):[];
												}elseif(ucfirst($appointment)=='Thursday'){
													$start = $doctor->thursday_start_time?json_decode($doctor->thursday_start_time,true):[];
													$end   = $doctor->thursday_end_time?json_decode($doctor->thursday_end_time,true):[];
												}elseif(ucfirst($appointment)=='Friday'){
													$start = $doctor->friday_start_time?json_decode($doctor->friday_start_time,true):[];
													$end   = $doctor->friday_end_time?json_decode($doctor->friday_end_time,true):[];
												}
												if(!empty($start)){
												foreach ($start as $key => $value) { ?>
													<li style="padding-top: 5px;padding-bottom: 5px;width:19.28%">
														<a class="timing <?php $booking= $start[$key]." - ".$end[$key]; if($booking_slot==$booking){ echo 'selected'; } ?>"  href="javascript:void(0)">
															<span>{{ $start[$key] }} - {{ $end[$key] }}</span>
														</a>
													</li>
													
												<?php } }else{ ?>

													<li style="padding-top: 5px;margin-left: 37%;padding-bottom: 5px;width:19.28%">
														<center><button type="button" class="btn btn-xs btn-danger">Today Slot Not Available</button></center>
													</li>

												<?php }	?>

												</ul>
											</div>
											<!-- /Time Slot -->
											
										</div>
									</div>
								</div>
								<!-- /Schedule Content -->
								
							</div>
							<!-- /Schedule Widget -->
							
							<!-- Submit Section -->
							
							<?php 
							if(empty($session) && !empty($start)){?>
							 <div class="submit-section proceed-btn text-right">
								<a href="javascript:void(0)" class="btn btn-primary submit-btn login_to_procced">Login To Proceed</a>
							 </div>
							<?php }elseif(!empty($start)){?>
								<div class="submit-section proceed-btn text-right">
									<a href="javascript:void(0)" class="btn btn-primary submit-btn login_to_checkout">Proceed to Book</a>
								 </div>
							<?php } ?>
							<!-- /Submit Section -->
							
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
		
		<!-- Daterangepikcer JS -->
		<script src="{{asset('template')}}/assets/js/moment.min.js"></script>
		<script src="{{asset('template')}}/assets/plugins/daterangepicker/daterangepicker.js"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('template')}}/assets/js/script.js"></script>
		<script src="{{asset('template')}}/assets/js/sweetalert.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$('.timing').click(function(){
					$('.timing').removeClass('selected');
					$(this).addClass('selected');

					var booking_date = $('.booking_date').attr('booking_date');
					var booking_slot = $('.timing.selected>span').text();
					var doctor_id    = $('.doctor_id').val();
					var url_encode   = btoa("booking_date="+booking_date+"&booking_slot="+booking_slot+"&doctor_id="+doctor_id);
					var final_url    = "<?php echo url('patient_appointment_checkout');?>?ref_url="+url_encode;
					$('.login_to_checkout').attr('href',final_url);

				})

				$('.login_to_procced').click(function(){
					var booking_date = $('.booking_date').attr('booking_date');
					var booking_slot = $('.timing.selected>span').text();
					var doctor_id    = $('.doctor_id').val();
					if(booking_date==''){
						swal("Somthing Missing..", "Please Select Appointments Date", "error");
					}else if(booking_slot==''){
						swal("Somthing Missing..", "Please Select Time Slot", "error");
					}else if(doctor_id==''){
						swal("Somthing Missing..", "Please Select Doctor Again..", "error");
					}else{
							$('#myModal').modal('show');
					}
				})

				$('.login_to_checkout').click(function(){
					var booking_date = $('.booking_date').attr('booking_date');
					var booking_slot = $('.timing.selected>span').text();
					var doctor_id    = $('.doctor_id').val();
					if(booking_date==''){
						swal("Somthing Missing..", "Please Select Appointments Date", "error");
					}else if(booking_slot==''){
						swal("Somthing Missing..", "Please Select Time Slot", "error");
					}else if(doctor_id==''){
						swal("Somthing Missing..", "Please Select Doctor Again..", "error");
					}else{
							
					}
				})

				$('#ajax_login_form').submit(function(e){
					e.preventDefault();
					var user_mobile = $('.user_mobile').val();
					var password  = $('.password').val();
					var token  = $('.token').val();
					if(user_mobile==''){
						swal("Please Enter Mobile Numbar", "Please Enter Valid Mobile Number", "error");
					}else if(password==''){
						swal("Please Enter Password", "Please Enter Valid Password", "error");
					}else{
						$.ajax('<?php echo url('ajax_patient_login');?>', {
			                  type: 'GET',  // http method
			                  data: { user_mobile:user_mobile,password:password,_token:token },  // data to submit
			                  success: function (data, status, xhr) {
			                    var response = $.parseJSON(data);
			                    if(response.status=='failure'){
			                    	$('.error_message').text(response.message);
			                    }else if(response.status=='success'){
			                    	var booking_date = $('.booking_date').attr('booking_date');
									var booking_slot = $('.timing.selected>span').text();
									var doctor_id    = $('.doctor_id').val();
									var url_encode   = btoa("booking_date="+booking_date+"&booking_slot="+booking_slot+"&doctor_id="+doctor_id);
									window.location.href = "<?php echo url('patient_appointment_checkout');?>?ref_url="+url_encode;

			                    }
			                  }
			          });
					}
				    return false;
				})
			})
		</script>
		
	</body>

	<div id="myModal" class="modal fade" style="display: none;">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<form id="ajax_login_form" method="post" action="{{ url('admin_login_submit') }}">
             <input type="hidden" class="token" name="_token" value="{{ csrf_token() }}">
				<div class="modal-header">				
					<h4 class="modal-title">Login</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">				
					<div class="form-group">
						<label>Mobile Number</label>
						<input type="number" class="form-control user_mobile" required="required">
					</div>
					<div class="form-group">
						<div class="clearfix">
							<label>Password</label>
							<!-- <a href="#" class="pull-right text-muted"><small>Forgot?</small></a> -->
						</div>
						
						<input type="password" class="form-control password" required="required">
					</div>
				</div>
				<div class="modal-footer">
					<!-- <label class="checkbox-inline pull-left"><input type="checkbox"> Remember me</label> -->
					<span class="pull-left text text-danger error_message"></span>

					<input type="submit" class="btn btn-primary pull-right" value="Login">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Mirrored from dreamguys.co.in/demo/doccure/template/booking.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:09:14 GMT -->
</html>