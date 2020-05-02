 
<?php $__env->startSection('title','Dashboard'); ?> 
<?php $__env->startSection('styles'); ?>
		<link rel="stylesheet" href="<?php echo e(asset('template')); ?>/assets/plugins/select2/css/select2.min.css">
		<link rel="stylesheet" href="<?php echo e(asset('template')); ?>/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">	
		<link rel="stylesheet" href="<?php echo e(asset('template')); ?>/assets/plugins/dropzone/dropzone.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
      <!-- Page Wrapper -->
						<div class="col-md-7 col-lg-8 col-xl-9">
						<form id="needs-validation" enctype="multipart/form-data" novalidate class="needs-validation" method="post" action="<?php echo e(url('doctor_profile_setting_submit')); ?>">
          				 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

							<!-- Basic Information -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Basic Information</h4>
									<div class="row form-row">
										<div class="col-md-3"></div>
										 <div class="col-md-6">
                                            <center><h6 class="card-title">
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
                                          </center>
                                        </div>
										<div class="col-md-3"></div>
                                        
										<div class="col-md-6">
											<div class="form-group">
												<div class="change-avatar">
													<div class="profile-img">
														<img id="blah" src="<?php echo e(asset('doctor_files')); ?>/<?php echo e($list[0]->profile_picture); ?>" alt="User Image">
													</div>
													<div class="upload-img">
														<div class="change-photo-btn">
															<span><i class="fa fa-upload"></i> Upload Photo</span>
															<input type="file" class="upload" name="profile_picture" id="imgInp">
															<input type="hidden" name="profile_picture_old" value="<?php echo e($list[0]->profile_picture); ?>">
														</div>
														<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														 <?php if($errors->has('profile_picture')): ?> <p style="color:red;"><?php echo e($errors->first('profile_picture')); ?></p> <?php endif; ?>
													</div>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group mb-0">
												<label>Profile Name</label>
												<input type="text" required="" name="profile_name" class="form-control"  value="<?php echo e($list[0]->name); ?>">
												 <?php if($errors->has('profile_name')): ?> <p style="color:red;"><?php echo e($errors->first('profile_name')); ?></p> <?php endif; ?>
											</div>
										</div>


										<div class="col-md-6">
											<div class="form-group">
												<label>Username <span class="text-danger">*</span></label>
												<input type="text" class="form-control" readonly value="<?php echo e($list[0]->user_id); ?>" required="">
												 <?php if($errors->has('user_id')): ?> <p style="color:red;"><?php echo e($errors->first('user_id')); ?></p> <?php endif; ?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Designation <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="designation" value="<?php echo e($list[0]->designation); ?>" required="">
												 <?php if($errors->has('designation')): ?> <p style="color:red;"><?php echo e($errors->first('designation')); ?></p> <?php endif; ?>

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Email <span class="text-danger">*</span></label>
												<input type="email" class="form-control" name="email" value="<?php echo e($list[0]->email); ?>" required="">
												 <?php if($errors->has('email')): ?> <p style="color:red;"><?php echo e($errors->first('email')); ?></p> <?php endif; ?>

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>First Name <span class="text-danger">*</span></label>
												<input type="text" name="first_name" class="form-control" value="<?php echo e($list[0]->first_name); ?>" required="">
												 <?php if($errors->has('first_name')): ?> <p style="color:red;"><?php echo e($errors->first('first_name')); ?></p> <?php endif; ?>

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Last Name <span class="text-danger">*</span></label>
												<input type="text" name="last_name" class="form-control" value="<?php echo e($list[0]->last_name); ?>" required="">
												 <?php if($errors->has('last_name')): ?> <p style="color:red;"><?php echo e($errors->first('last_name')); ?></p> <?php endif; ?>

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Phone Number</label>
												<input type="number" class="form-control" value="<?php echo e($list[0]->mobile); ?>" required="">
												 <?php if($errors->has('mobile')): ?> <p style="color:red;"><?php echo e($errors->first('mobile')); ?></p> <?php endif; ?>

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Gender</label>
												<select class="form-control select" name="gender" required="">
													<option value='' >Select</option>
													<option value="male" <?php if($list[0]->gender=='male'): ?><?php echo e('selected'); ?> <?php endif; ?> >Male</option>
													<option value="female" <?php if($list[0]->gender=='female'): ?><?php echo e('selected'); ?> <?php endif; ?>>Female</option>
												</select>
												 <?php if($errors->has('gender')): ?> <p style="color:red;"><?php echo e($errors->first('gender')); ?></p> <?php endif; ?>

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group mb-0">
												<label>Date of Birth (DD/MM/YYYY)</label>
												<input type="text" required="" name="date_of_birth" class="form-control"  value="<?php echo e($list[0]->date_of_birth); ?>">
												 <?php if($errors->has('date_of_birth')): ?> <p style="color:red;"><?php echo e($errors->first('date_of_birth')); ?></p> <?php endif; ?>

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
										<textarea class="form-control" name="about_us" required="" rows="5"><?php echo e($list[0]->about_us); ?></textarea>
										 <?php if($errors->has('about_us')): ?> <p style="color:red;"><?php echo e($errors->first('about_us')); ?></p> <?php endif; ?>
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
												<input type="text" class="form-control" name="clinic_name" required="" value="<?php echo e($list[0]->clinic_name); ?>">
										 <?php if($errors->has('clinic_name')): ?> <p style="color:red;"><?php echo e($errors->first('clinic_name')); ?></p> <?php endif; ?>

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Clinic Open Time</label>
												<input type="time" class="form-control" name="clinic_open_time" required="" value="<?php echo e($list[0]->clinic_open_time); ?>">
										 <?php if($errors->has('clinic_open_time')): ?> <p style="color:red;"><?php echo e($errors->first('clinic_open_time')); ?></p> <?php endif; ?>

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Clinic Close Time</label>
												<input type="time" class="form-control" name="clinic_close_time" required="" value="<?php echo e($list[0]->clinic_close_time); ?>">
										 <?php if($errors->has('clinic_close_time')): ?> <p style="color:red;"><?php echo e($errors->first('clinic_close_time')); ?></p> <?php endif; ?>

											</div>
										</div>
										<!-- <div class="col-md-12">
											<div class="form-group">
												<label>Clinic Images</label>
												<form action="#" class="dropzone"></form>
											</div>
											<div class="upload-wrap">
												<div class="upload-images">
													<img src="<?php echo e(asset('template')); ?>/assets/img/features/feature-01.jpg" alt="Upload Image">
													<a href="javascript:void(0);" class="btn btn-icon btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
												</div>
												<div class="upload-images">
													<img src="<?php echo e(asset('template')); ?>/assets/img/features/feature-02.jpg" alt="Upload Image">
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
												<label>Address Line 1</label>
												<input type="text" class="form-control" name="clinic_address" required="" value="<?php echo e($list[0]->clinic_address); ?>">
												 <?php if($errors->has('clinic_address')): ?> <p style="color:red;"><?php echo e($errors->first('clinic_address')); ?></p> <?php endif; ?>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">City</label>
												<input type="text" class="form-control" name="clinic_city" required="" value="<?php echo e($list[0]->clinic_city); ?>">
												<?php if($errors->has('clinic_city')): ?> <p style="color:red;"><?php echo e($errors->first('clinic_city')); ?></p> <?php endif; ?>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">State / Province</label>
												<input type="text" class="form-control" name="clinic_state" required="" value="<?php echo e($list[0]->clinic_state); ?>">
												<?php if($errors->has('clinic_state')): ?> <p style="color:red;"><?php echo e($errors->first('clinic_state')); ?></p> <?php endif; ?>

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Country</label>
												<input type="text" class="form-control" name="clinic_country" required="" value="<?php echo e($list[0]->clinic_country); ?>">
												<?php if($errors->has('clinic_country')): ?> <p style="color:red;"><?php echo e($errors->first('clinic_country')); ?></p> <?php endif; ?>

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Postal Code</label>
												<input type="text" class="form-control" name="clinic_pincode" required="" value="<?php echo e($list[0]->clinic_pincode); ?>">
												<?php if($errors->has('clinic_pincode')): ?> <p style="color:red;"><?php echo e($errors->first('clinic_pincode')); ?></p> <?php endif; ?>
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
									
									<div class="form-group mb-0">
										<div id="pricing_select">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="price_free" name="rating_option" <?php if($list[0]->rating_option=='price_free'): ?><?php echo e('checked'); ?> <?php endif; ?> class="custom-control-input" value="price_free">
												<label class="custom-control-label" for="price_free">Free</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input <?php if($list[0]->rating_option=='custom_price'): ?><?php echo e('checked'); ?> <?php endif; ?> type="radio" id="price_custom" name="rating_option" value="custom_price" class="custom-control-input">
												<label class="custom-control-label" for="price_custom">Custom Price (per hour)</label>
											</div>
										</div>

									</div>
									
									<div class="row custom_price_cont" id="custom_price_cont" <?php if($list[0]->rating_option=='custom_price'): ?><?php echo e('checked'); ?> <?php else: ?> <?php echo e('style="display: none;"'); ?> <?php endif; ?> >
										<div class="col-md-4">
											<input type="text" class="form-control" id="custom_rating_input" name="clinic_fee" value="<?php echo e($list[0]->clinic_fee); ?>" placeholder="Enter Fee">
											<small class="form-text text-muted">Custom price you can add</small>
										</div>
									</div>
									<?php if($errors->has('rating_option')): ?> <p style="color:red;"><?php echo e($errors->first('rating_option')); ?></p> <?php endif; ?>
									
								</div>
							</div>
							<!-- /Pricing -->
							
							<!-- Services and Specialization -->
							<div class="card services-card">
								<div class="card-body">
									<h4 class="card-title">Services and Specialization</h4>
									<div class="form-group">
										<label>Services</label>
										<input type="text" data-role="tagsinput" class="input-tags form-control" placeholder="Enter Services" name="clinic_services" value="<?php echo e($list[0]->clinic_services); ?>" id="services" required="">
										<small class="form-text text-muted">Note : Type & Press enter to add new services</small>
									<?php if($errors->has('clinic_services')): ?> <p style="color:red;"><?php echo e($errors->first('clinic_services')); ?></p> <?php endif; ?>

									</div> 
									<div class="form-group mb-0">
										<label>Specialization </label>
										<input class="input-tags form-control" type="text" data-role="tagsinput" placeholder="Enter Specialization" name="clinic_specialist" value="<?php echo e($list[0]->clinic_specialist); ?>" id="specialist" required="">
										<small class="form-text text-muted">Note : Type & Press  enter to add new specialization</small>
									<?php if($errors->has('clinic_specialist')): ?> <p style="color:red;"><?php echo e($errors->first('clinic_specialist')); ?></p> <?php endif; ?>

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
																	<input type="text" class="form-control" name="degree[]" required="" value="<?php echo e($degree[$key]); ?>">
																</div> 
															</div>
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>College/Institute</label>
																	<input type="text" class="form-control" name="institute[]" required="" value="<?php echo e($institute[$key]); ?>">
																</div> 
															</div>
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>Year of Completion</label>
																	<input type="text" class="form-control" name="completion_year[]" required="" value="<?php echo e($completion_year[$key]); ?>">
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
									<?php if($errors->has('degree')): ?> <p style="color:red;"><?php echo e($errors->first('degree')); ?></p> <?php endif; ?>

																</div> 
															</div>
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>College/Institute</label>
																	<input type="text" class="form-control" name="institute[]" required="" value="">
									<?php if($errors->has('institute')): ?> <p style="color:red;"><?php echo e($errors->first('institute')); ?></p> <?php endif; ?>

																</div> 
															</div>
															<div class="col-12 col-md-6 col-lg-4">
																<div class="form-group">
																	<label>Year of Completion</label>
																	<input type="text" class="form-control" name="completion_year[]" required="" value="">
									<?php if($errors->has('completion_year')): ?> <p style="color:red;"><?php echo e($errors->first('completion_year')); ?></p> <?php endif; ?>

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
															<input type="text" class="form-control" name="hospital_name[]" required="" value="<?php echo e($hospital_name[$key]); ?>">
														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-3">
														<div class="form-group">
															<label>From</label>
															<input type="text" class="form-control" name="experience_from[]" required=""  value="<?php echo e($experience_from[$key]); ?>">
														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-3">
														<div class="form-group">
															<label>To</label>
															<input type="text" class="form-control" name="experience_to[]" required="" value="<?php echo e($experience_to[$key]); ?>">
														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-3">
														<div class="form-group">
															<label>Designation</label>
															<input type="text" class="form-control" name="experience_designation[]" required="" value="<?php echo e($experience_designation[$key]); ?>">
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
															<input type="text" class="form-control" name="hospital_name[]" required="" value="">
									<?php if($errors->has('hospital_name')): ?> <p style="color:red;"><?php echo e($errors->first('hospital_name')); ?></p> <?php endif; ?>

														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-3">
														<div class="form-group">
															<label>From</label>
															<input type="text" class="form-control" name="experience_from[]" required=""  value="">
									<?php if($errors->has('experience_from')): ?> <p style="color:red;"><?php echo e($errors->first('experience_from')); ?></p> <?php endif; ?>

														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-3">
														<div class="form-group">
															<label>To</label>
															<input type="text" class="form-control" name="experience_to[]" required="" value="">
									<?php if($errors->has('experience_to')): ?> <p style="color:red;"><?php echo e($errors->first('experience_to')); ?></p> <?php endif; ?>

														</div> 
													</div>
													<div class="col-12 col-md-6 col-lg-3">
														<div class="form-group">
															<label>Designation</label>
															<input type="text" class="form-control" name="experience_designation[]" required="" value="">
									<?php if($errors->has('experience_designation')): ?> <p style="color:red;"><?php echo e($errors->first('experience_designation')); ?></p> <?php endif; ?>

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
													<input type="text" class="form-control" name="award_name[]" value="<?php echo e($award_name[$key]); ?>">
												</div> 
											</div>
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Year</label>
													<input type="text" class="form-control" name="award_year[]" value="<?php echo e($award_year[$key]); ?>">
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
													<input type="text" class="form-control" name="registration_no" required="" value="<?php echo e($list[0]->registration_no); ?>">
													<?php if($errors->has('registration_no')): ?> <p style="color:red;"><?php echo e($errors->first('registration_no')); ?></p> <?php endif; ?>
												</div> 
											</div>
											<div class="col-12 col-md-5">
												<div class="form-group">
													<label>Year</label>
													<input type="text" class="form-control" name="registration_year" required="" value="<?php echo e($list[0]->registration_year); ?>">
													<?php if($errors->has('registration_year')): ?> <p style="color:red;"><?php echo e($errors->first('registration_year')); ?></p> <?php endif; ?>
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
							
							<div class="submit-section submit-btn-bottom">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
							
						</div>
      <!-- /Page Wrapper -->
      <?php $__env->startSection('scripts'); ?>
		<script src="<?php echo e(asset('template')); ?>/assets/plugins/select2/js/select2.min.js"></script>
		<script src="<?php echo e(asset('template')); ?>/assets/plugins/dropzone/dropzone.min.js"></script>
		<script src="<?php echo e(asset('template')); ?>/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
		<script src="<?php echo e(asset('template')); ?>/assets/js/profile-settings.js"></script>
		<script src="<?php echo e(asset('template')); ?>/assets/js/script.js"></script>
		<script src="<?php echo e(asset('template/admin')); ?>/assets/js/form-validation.js"></script>
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


      <?php $__env->stopSection(); ?>
   
<?php $__env->stopSection(); ?>



<?php echo $__env->make('doctor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>