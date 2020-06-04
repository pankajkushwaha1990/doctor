@extends('doctor_master') 
@section('title','Dashboard') 
@section('styles')
		<link rel="stylesheet" href="{{asset('template')}}/assets/css/bootstrap-datetimepicker.min.css">
		<link rel="stylesheet" href="{{asset('template')}}/assets/plugins/select2/css/select2.min.css">
		<link rel="stylesheet" href="{{asset('template')}}/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">	
		<link rel="stylesheet" href="{{asset('template')}}/assets/plugins/dropzone/dropzone.min.css">
@endsection
@section('content')
      <!-- Page Wrapper -->
						<div class="col-md-7 col-lg-8 col-xl-9">
						<form id="needs-validation" enctype="multipart/form-data" novalidate class="needs-validation" method="post" action="{{ url('doctor_profile_setting_submit') }}">
          				 <input type="hidden" name="_token" value="{{ csrf_token() }}">

							<!-- Basic Information -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Basic Information</h4>
									<div class="row form-row">
										<div class="col-md-3"></div>
										 <div class="col-md-6">
                                            <center><h6 class="card-title">
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
                                              </h6>
                                          </center>
                                        </div>
										<div class="col-md-3"></div>
                                        
										<div class="col-md-6">
											<div class="form-group">
												<div class="change-avatar">
													<div class="profile-img">
														<img id="blah" src="{{asset('doctor_files')}}/{{ $list[0]->profile_picture }}" alt="User Image">
													</div>
													<div class="upload-img">
														<div class="change-photo-btn">
															<span><i class="fa fa-upload"></i> Upload Photo</span>
															<input type="file" class="upload" name="profile_picture" id="imgInp">
															<input type="hidden" name="profile_picture_old" value="{{ $list[0]->profile_picture }}">
														</div>
														<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														 @if ($errors->has('profile_picture')) <p style="color:red;">{{ $errors->first('profile_picture') }}</p> @endif
													</div>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group mb-0">
												<label>Profile Name <span class="text-danger">*</span></label>
												<input type="text" required="" name="profile_name" class="form-control"  value="{{ $list[0]->name }}">
												 @if ($errors->has('profile_name')) <p style="color:red;">{{ $errors->first('profile_name') }}</p> @endif
											</div>
										</div>


										<div class="col-md-6">
											<div class="form-group">
												<label>Username <span class="text-danger">*</span></label>
												<input type="text" class="form-control" readonly value="#DR{{ $list[0]->id }}" required="">
												 @if ($errors->has('user_id')) <p style="color:red;">{{ $errors->first('user_id') }}</p> @endif
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Designation <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="designation" value="{{ $list[0]->designation }}" required="">
												 @if ($errors->has('designation')) <p style="color:red;">{{ $errors->first('designation') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Email</label>
												<input type="email" class="form-control" name="email" value="{{ $list[0]->email }}" >
												 @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>First Name <span class="text-danger">*</span></label>
												<input type="text" name="first_name" class="form-control" value="{{ $list[0]->first_name }}" required="">
												 @if($errors->has('first_name')) <p style="color:red;">{{ $errors->first('first_name') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Last Name <span class="text-danger">*</span></label>
												<input type="text" name="last_name" class="form-control" value="{{ $list[0]->last_name }}" required="">
												 @if($errors->has('last_name')) <p style="color:red;">{{ $errors->first('last_name') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Phone Number <span class="text-danger">*</span></label>
												<input type="number" class="form-control" value="{{ $list[0]->mobile }}" required="">
												 @if($errors->has('mobile')) <p style="color:red;">{{ $errors->first('mobile') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Gender <span class="text-danger">*</span></label>
												<select class="form-control" name="gender" required="">
													<option value='' >Select</option>
													<option value="male" @if($list[0]->gender=='male'){{ 'selected' }} @endif >Male</option>
													<option value="female" @if($list[0]->gender=='female'){{ 'selected' }} @endif>Female</option>
													<option value="transgender" @if($list[0]->gender=='transgender'){{ 'selected' }} @endif>Trans-Gender</option>
												</select>
												 @if($errors->has('gender')) <p style="color:red;">{{ $errors->first('gender') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group mb-0">
												<label>Date of Birth (DD/MM/YYYY) <span class="text-danger">*</span></label>
												<input type="text" required="" name="date_of_birth" class="form-control datetimepicker1"  value="{{ $list[0]->date_of_birth }}">
												 @if($errors->has('date_of_birth')) <p style="color:red;">{{ $errors->first('date_of_birth') }}</p> @endif

											</div>
										</div>
										
									</div>
								</div>
							</div>
							<!-- /Basic Information -->
							
							<!-- About Me -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">About Me</h4>
									<div class="form-group mb-0">
										<label>Biography</label>
										<textarea class="form-control" name="about_us" rows="5">{{ $list[0]->about_us }}</textarea>
										 @if($errors->has('about_us')) <p style="color:red;">{{ $errors->first('about_us') }}</p> @endif
									</div>
								</div>
							</div>
							<!-- /About Me -->
							
							<!-- Clinic Info -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Clinic Info</h4>
									<div class="row form-row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Clinic Name </label>
												<input type="text" class="form-control" name="clinic_name"  value="{{ $list[0]->clinic_name }}">
										 @if($errors->has('clinic_name')) <p style="color:red;">{{ $errors->first('clinic_name') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Clinic Open Time <span class="text-danger">*</span></label>
												<input type="time" class="form-control" name="clinic_open_time" required="" value="{{ $list[0]->clinic_open_time }}">
										 @if($errors->has('clinic_open_time')) <p style="color:red;">{{ $errors->first('clinic_open_time') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Clinic Close Time <span class="text-danger">*</span></label>
												<input type="time" class="form-control" name="clinic_close_time" required="" value="{{ $list[0]->clinic_close_time }}">
										 @if($errors->has('clinic_close_time')) <p style="color:red;">{{ $errors->first('clinic_close_time') }}</p> @endif

											</div>
										</div>
										<!-- <div class="col-md-12">
											<div class="form-group">
												<label>Clinic Images</label>
												<form action="#" class="dropzone"></form>
											</div>
											<div class="upload-wrap">
												<div class="upload-images">
													<img src="{{asset('template')}}/assets/img/features/feature-01.jpg" alt="Upload Image">
													<a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
												</div>
												<div class="upload-images">
													<img src="{{asset('template')}}/assets/img/features/feature-02.jpg" alt="Upload Image">
													<a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
												</div>
											</div>
										</div> -->
									</div>
								</div>
							</div>
							<!-- /Clinic Info -->

							<!-- Contact Details -->
							<div class="card contact-card">
								<div class="card-body">
									<h4 class="card-title">Clinic Address</h4>
									<div class="row form-row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Address Line 1 <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="clinic_address" required="" value="{{ $list[0]->clinic_address }}">
												 @if($errors->has('clinic_address')) <p style="color:red;">{{ $errors->first('clinic_address') }}</p> @endif
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">City <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="clinic_city" required="" value="{{ $list[0]->clinic_city }}">
												@if($errors->has('clinic_city')) <p style="color:red;">{{ $errors->first('clinic_city') }}</p> @endif
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">

												<label>State <span class="text-danger">*</span></label>
													<select class="form-control select2" name="clinic_state" required="">
													<option value='' >Select State</option>
													@foreach($states as $st)
													<option value="{{ $st->name }}" @if($list[0]->clinic_state==$st->name){{ 'selected' }} @endif >{{ $st->name }}</option>
													@endforeach
												</select>


											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Country</label>
												<input type="text" class="form-control" name="clinic_country" value="{{ $list[0]->clinic_country }}">
												@if($errors->has('clinic_country')) <p style="color:red;">{{ $errors->first('clinic_country') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Postal Code</label>
												<input type="text" class="form-control" name="clinic_pincode" value="{{ $list[0]->clinic_pincode }}" maxlength="6" minlength="6" min='111111' max='999999' onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
												@if($errors->has('clinic_pincode')) <p style="color:red;">{{ $errors->first('clinic_pincode') }}</p> @endif
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Contact Details -->
							
							<!-- Pricing -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Pricing</h4>

										<div class="row form-row">
										<div class="col-md-4">
											<div class="form-group">
												<label>New Appointment Fee <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="clinic_fee" required="" value="{{ $list[0]->clinic_fee }}">
												 @if($errors->has('clinic_fee')) <p style="color:red;">{{ $errors->first('clinic_fee') }}</p> @endif
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Appointment Validity </label>
												<input type="number" class="form-control" name="clinic_fee_validity" value="{{ $list[0]->clinic_fee_validity }}" placeholder="in days">
												 @if($errors->has('clinic_fee_validity')) <p style="color:red;">{{ $errors->first('clinic_fee_validity') }}</p> @endif
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Old Appointment Fee</label>
												<input type="text" class="form-control" name="old_clinic_fee" value="{{ $list[0]->old_clinic_fee }}">
												 @if($errors->has('old_clinic_fee')) <p style="color:red;">{{ $errors->first('old_clinic_fee') }}</p> @endif
											</div>
										</div>
									</div>
									
									
									
								</div>
							</div>
							<!-- /Pricing -->
							
							<!-- Services and Specialization -->
							<div class="card services-card">
								<div class="card-body">
									<h4 class="card-title">Services and Specialization</h4>
									<div class="form-group">
										<label>Services</label>
										<input type="text" data-role="tagsinput" class="input-tags form-control" placeholder="Enter Services" name="clinic_services" value="{{ $list[0]->clinic_services }}" id="services" >
										<small class="form-text text-muted">Note : Type & Press enter to add new services</small>
									@if($errors->has('clinic_services')) <p style="color:red;">{{ $errors->first('clinic_services') }}</p> @endif

									</div> 
									<div class="form-group mb-0">
										<label>Specialization </label>
										<input class="input-tags form-control" type="text" data-role="tagsinput" placeholder="Enter Specialization" name="clinic_specialist" value="{{ $list[0]->clinic_specialist }}" id="specialist" >
										<small class="form-text text-muted">Note : Type & Press  enter to add new specialization</small>
									@if($errors->has('clinic_specialist')) <p style="color:red;">{{ $errors->first('clinic_specialist') }}</p> @endif

									</div> 
								</div>              
							</div>
							<!-- /Services and Specialization -->
						 
							<!-- Education -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Education</h4>
									<div class="education-info">
										<?php 
										   $degree       =  json_decode($list[0]->degree,true);
										   $institute    =  json_decode($list[0]->institute,true);
										   $completion_year =  json_decode($list[0]->completion_year,true);
										   if(!empty($degree)){
										   	foreach ($degree as $key => $value) { ?>
										   	     <div class="row form-row education-cont">
													<div class="col-12 col-md-10 col-lg-11">
														<div class="row form-row">
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>Degree</label>
																	<input type="text" class="form-control" name="degree[]" required="" value="{{ $degree[$key] }}">
																</div> 
															</div>
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>College/Institute</label>
																	<input type="text" class="form-control" name="institute[]" required="" value="{{ $institute[$key] }}">
																</div> 
															</div>
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>Year of Completion</label>
																	<input type="text" class="form-control" name="completion_year[]" required="" value="{{ $completion_year[$key] }}">
																</div> 
															</div>
														</div>
													</div>
												</div>
										   	<?php }
										   }else{ ?>

										   	 <div class="row form-row education-cont">
													<div class="col-12 col-md-10 col-lg-11">
														<div class="row form-row">
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>Degree</label>
																	<input type="text" class="form-control" name="degree[]" required="" value="">
									@if($errors->has('degree')) <p style="color:red;">{{ $errors->first('degree') }}</p> @endif

																</div> 
															</div>
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>College/Institute</label>
																	<input type="text" class="form-control" name="institute[]" required="" value="">
									@if($errors->has('institute')) <p style="color:red;">{{ $errors->first('institute') }}</p> @endif

																</div> 
															</div>
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>Year of Completion</label>
																	<input type="text" class="form-control" name="completion_year[]" required="" value="">
									@if($errors->has('completion_year')) <p style="color:red;">{{ $errors->first('completion_year') }}</p> @endif

																</div> 
															</div>
														</div>
													</div>
												</div>

										   <?php }
										?>
									</div>
									<div class="add-more">
										<a href="javascript:void(0);" class="add-education"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								</div>
							</div>
							<!-- /Education -->
						
							<!-- Experience -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Experience</h4>
									<div class="experience-info">
									<?php 
										   $hospital_name       =  json_decode($list[0]->hospital_name,true);
										   $experience_from    =  json_decode($list[0]->experience_from,true);
										   $experience_to =  json_decode($list[0]->experience_to,true);
										   $experience_designation =  json_decode($list[0]->experience_designation,true);
										   if(!empty($hospital_name)){
										   	foreach ($hospital_name as $key => $value) { ?>
										
										<div class="row form-row experience-cont">
											<div class="col-12 col-md-10 col-lg-11">
												<div class="row form-row">
													<div class="col-12 col-md-6 col-lg-3">
														<div class="form-group">
															<label>Hospital Name</label>
															<input type="text" class="form-control" name="hospital_name[]" value="{{ $hospital_name[$key] }}">
														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-3">
														<div class="form-group">
															<label>From</label>
															<input type="text" class="form-control" name="experience_from[]"   value="{{ $experience_from[$key] }}">
														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-3">
														<div class="form-group">
															<label>To</label>
															<input type="text" class="form-control" name="experience_to[]" value="{{ $experience_to[$key] }}">
														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-3">
														<div class="form-group">
															<label>Designation</label>
															<input type="text" class="form-control" name="experience_designation[]"  value="{{ $experience_designation[$key] }}">
														</div> 
													</div>
												</div>
											</div>
										</div>
									<?php } }else{ ?>

										<div class="row form-row experience-cont">
											<div class="col-12 col-md-10 col-lg-11">
												<div class="row form-row">
													<div class="col-12 col-md-6 col-lg-3">
														<div class="form-group">
															<label>Hospital Name</label>
															<input type="text" class="form-control" name="hospital_name[]"  value="">
									@if($errors->has('hospital_name')) <p style="color:red;">{{ $errors->first('hospital_name') }}</p> @endif

														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-3">
														<div class="form-group">
															<label>From</label>
															<input type="text" class="form-control" name="experience_from[]"  value="">
									@if($errors->has('experience_from')) <p style="color:red;">{{ $errors->first('experience_from') }}</p> @endif

														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-3">
														<div class="form-group">
															<label>To</label>
															<input type="text" class="form-control" name="experience_to[]"  value="">
									@if($errors->has('experience_to')) <p style="color:red;">{{ $errors->first('experience_to') }}</p> @endif

														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-3">
														<div class="form-group">
															<label>Designation</label>
															<input type="text" class="form-control" name="experience_designation[]" value="">
									@if($errors->has('experience_designation')) <p style="color:red;">{{ $errors->first('experience_designation') }}</p> @endif

														</div> 
													</div>
												</div>
											</div>
										</div>

									<?php } ?>


									</div>
									<div class="add-more">
										<a href="javascript:void(0);" class="add-experience"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								</div>
							</div>
							<!-- /Experience -->
							
							<!-- Awards -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Awards</h4>
									<div class="awards-info">
									<?php 
									 $award_name =  json_decode($list[0]->award_name,true);
									 $award_year =  json_decode($list[0]->award_year,true);
									  if(!empty($award_name)){
										foreach ($award_name as $key => $value) { ?>
										
										<div class="row form-row awards-cont">
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Awards</label>
													<input type="text" class="form-control" name="award_name[]" value="{{ $award_name[$key] }}">
												</div> 
											</div>
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Year</label>
													<input type="text" class="form-control" name="award_year[]" value="{{ $award_year[$key] }}">
												</div> 
											</div>
										</div>
									<?php } }else{ ?>
										<div class="row form-row awards-cont">
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Awards</label>
													<input type="text" class="form-control" name="award_name[]" value="">
												</div> 
											</div>
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Year</label>
													<input type="text" class="form-control" name="award_year[]" value="">
												</div> 
											</div>
										</div>

									<?php } ?>


									</div>
									<div class="add-more">
										<a href="javascript:void(0);" class="add-award"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								</div>
							</div>
							<!-- /Awards -->
							
							<!-- Memberships -->
							<!-- <div class="card">
								<div class="card-body">
									<h4 class="card-title">Memberships</h4>
									<div class="membership-info">
										<div class="row form-row membership-cont">
											<div class="col-12 col-md-10 col-lg-5">
												<div class="form-group">
													<label>Memberships</label>
													<input type="text" class="form-control">
												</div> 
											</div>
										</div>
									</div>
									<div class="add-more">
										<a href="javascript:void(0);" class="add-membership"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								</div>
							</div> -->
							<!-- /Memberships -->
							
							<!-- Registrations -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Registrations</h4>
									<div class="registrations-info">
										<div class="row form-row reg-cont">
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Registrations</label>
													<input type="text" class="form-control" name="registration_no" value="{{ $list[0]->registration_no }}">
													@if($errors->has('registration_no')) <p style="color:red;">{{ $errors->first('registration_no') }}</p> @endif
												</div> 
											</div>
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Year</label>
													<input type="text" class="form-control" name="registration_year" value="{{ $list[0]->registration_year }}">
													@if($errors->has('registration_year')) <p style="color:red;">{{ $errors->first('registration_year') }}</p> @endif
												</div> 
											</div>
										</div>
									</div>
									<!-- <div class="add-more">
										<a href="javascript:void(0);" class="add-reg"><i class="fa fa-plus-circle"></i> Add More</a>
									</div> -->
								</div>
							</div>
							<!-- /Registrations -->

							<!-- About Me -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Booking Notification</h4>
									<div class="col-12 col-md-12">
									<div class="form-group mb-0">
										<label>Notifiaction Show On Patient Booking Page</label>
										<textarea class="form-control" name="booking_notification" rows="5">{{ $list[0]->booking_notification }}</textarea>
										 @if($errors->has('booking_notification')) <p style="color:red;">{{ $errors->first('booking_notification') }}</p> @endif
									</div>
								</div>
								<div class="col-6 col-md-6">
									<div class="form-group">
												<label>Notification Status</label>
												<select class="form-control" name="notification_status" >
													<option value='' >Select</option>
													<option value="active" @if($list[0]->notification_status=='active'){{ 'selected' }} @endif >Active</option>
													<option value="deactive" @if($list[0]->notification_status=='deactive'){{ 'selected' }} @endif>Deactive</option>
												</select>

											</div>
								</div>
								</div>
							</div>
							<!-- /About Me -->
							
							<div class="submit-section submit-btn-bottom">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
							
						</div>
      <!-- /Page Wrapper -->
      @section('scripts')
		<script src="{{asset('template')}}/assets/plugins/select2/js/select2.min.js"></script>
		<script src="{{asset('template')}}/assets/plugins/dropzone/dropzone.min.js"></script>
		<script src="{{asset('template')}}/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
		<script src="{{asset('template')}}/assets/js/moment.min.js"></script>

        <script src="{{asset('template')}}/assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="{{asset('template')}}/assets/js/profile-settings.js"></script>
		<script src="{{asset('template')}}/assets/js/script.js"></script>
		<script src="{{asset('template/admin')}}/assets/js/form-validation.js"></script>
		<script type="text/javascript">
			function readURL(input) {
			    if (input.files && input.files[0]) {
			        var reader = new FileReader();

			        reader.onload = function (e) {
			            $('#blah').attr('src', e.target.result);
			        }

			        reader.readAsDataURL(input.files[0]);
			    }
			}

			$("#imgInp").change(function(){
			    readURL(this);
			});
		</script>

		<script type="text/javascript">
			$('.datetimepicker1').datetimepicker({
				    	format: 'DD/MM/YYYY',
			icons: {
				up: "fas fa-chevron-up",
				down: "fas fa-chevron-down",
				next: 'fas fa-chevron-right',
				previous: 'fas fa-chevron-left'
			}
				    });

			
			

		</script>


      @endsection
   
@endsection


