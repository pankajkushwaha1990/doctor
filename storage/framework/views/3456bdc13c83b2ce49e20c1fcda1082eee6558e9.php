 
<?php $__env->startSection('title','Dashboard'); ?> 
<?php $__env->startSection('styles'); ?>
		<link rel="stylesheet" href="<?php echo e(asset('template')); ?>/assets/css/bootstrap-datetimepicker.min.css">
		<link rel="stylesheet" href="<?php echo e(asset('template')); ?>/assets/plugins/select2/css/select2.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
      <!-- Page Wrapper -->
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									
									<!-- Profile Settings Form -->
					<form id="needs-validation" enctype="multipart/form-data" novalidate class="needs-validation" method="post" action="<?php echo e(url('patient_profile_setting_submit')); ?>">
          				 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
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

											<div class="col-6 col-md-6">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<img id="blah" src="<?php echo e(asset('patient_files')); ?>/<?php echo e($session->profile_picture); ?>" alt="User Image">
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input type="file" class="upload" name="profile_picture" id="imgInp">
																<input type="hidden" name="profile_picture_old" value="<?php echo e($list[0]->profile_picture); ?>">
															</div>
															<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														</div>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group mb-0">
													<label>Profile Name</label>
													<input type="text" required="" name="profile_name" class="form-control"  value="<?php echo e($list[0]->name); ?>">
												</div>
											</div>

										<div class="col-md-4">
											<div class="form-group">
												<label>Username <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="username" readonly value="<?php echo e($list[0]->user_id); ?>" required="">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Email <span class="text-danger">*</span></label>
												<input type="email" class="form-control" name="email" value="<?php echo e($list[0]->email); ?>" required="">
											</div>
										</div>
										<div class="col-12 col-md-4">
												<div class="form-group">
													<label>Mobile</label>
													<input type="number" name="mobile" class="form-control" value="<?php echo e($list[0]->mobile); ?>" required="">
												</div>
											</div>

											<div class="col-12 col-md-4">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" name="first_name" class="form-control" value="<?php echo e($list[0]->first_name); ?>" required="">
												</div>
											</div>
											<div class="col-12 col-md-4">
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" name="last_name" class="form-control" value="<?php echo e($list[0]->last_name); ?>" required="">
												</div>
											</div>
											<div class="col-12 col-md-4">
												<div class="form-group">
													<label>Date of Birth</label>
													<div class="cal-icon">
														<input type="text" required="" name="date_of_birth" class="form-control datetimepicker"  value="<?php echo e($list[0]->date_of_birth); ?>">
													</div>
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
											</div>
										</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Blood Group</label>
													<select class="form-control select" required="" name="blood_group">
														<option  value="">Select Blood Group</option>
														<option <?php if($list[0]->blood_group=='A-'): ?><?php echo e('selected'); ?> <?php endif; ?> value="A-">A-</option>
														<option <?php if($list[0]->blood_group=='A+'): ?><?php echo e('selected'); ?> <?php endif; ?> value="A+">A+</option>
														<option <?php if($list[0]->blood_group=='B-'): ?><?php echo e('selected'); ?> <?php endif; ?> value="B-">B-</option>
														<option <?php if($list[0]->blood_group=='B+'): ?><?php echo e('selected'); ?> <?php endif; ?> value="B+">B+</option>
														<option <?php if($list[0]->blood_group=='AB-'): ?><?php echo e('selected'); ?> <?php endif; ?> value="AB-">AB-</option>
														<option <?php if($list[0]->blood_group=='AB+'): ?><?php echo e('selected'); ?> <?php endif; ?> value="AB+">AB+</option>
														<option <?php if($list[0]->blood_group=='O-'): ?><?php echo e('selected'); ?> <?php endif; ?> value="O-">O-</option>
														<option <?php if($list[0]->blood_group=='O+'): ?><?php echo e('selected'); ?> <?php endif; ?> value="O+">O+</option>
													</select>
												</div>
											</div>
											<!-- <div class="col-12 col-md-6">
												<div class="form-group">
													<label>Email ID</label>
													<input type="email" class="form-control" value="richard@example.com">
												</div>
											</div> -->

											<div class="col-12">
												<div class="form-group">
												<label>Address</label>
													<input type="text" name="address" class="form-control" value="<?php echo e($list[0]->address); ?>" required="">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>City</label>
													<input type="text" name="city" class="form-control" value="<?php echo e($list[0]->city); ?>" required="">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>State</label>
													<input type="text" name="state" class="form-control" value="<?php echo e($list[0]->state); ?>" required="">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Zip Code</label>
													<input type="text" name="pincode" class="form-control" value="<?php echo e($list[0]->pincode); ?>" required="">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input type="text" name="country" class="form-control" value="<?php echo e($list[0]->country); ?>" required="">
												</div>
											</div>
										</div>
										<div class="card">
								<div class="card-body">
									<h4 class="card-title">Family Members</h4>
									<div class="awards-info">
										<div class="row form-row awards-cont">
										 <?php 
										 if(!empty($list[0]->family_name)){
										 	$family_name     = json_decode($list[0]->family_name,true);
										 	$family_relation = json_decode($list[0]->family_relation,true);
										 	$family_dob      = json_decode($list[0]->family_dob,true);
										 	foreach ($family_name as $key => $value) { ?>

										 		<div class="col-12 col-md-4">
												<div class="form-group">
													<label>Name</label>
													<input type="text" required="" name="family_name[]" class="form-control" value="<?php echo e($family_name[$key]); ?>">
												</div> 
											</div>
											<div class="col-12 col-md-4">
												<div class="form-group">
													<label>Relation</label>
													<select class="form-control" name="family_relation[]">
													  <option <?php if($family_relation[$key]=='self'){ echo 'selected'; } ?>  value="self" selected="">Self</option>
													  <option <?php if($family_relation[$key]=='wife'){ echo 'selected'; } ?> value="wife">Wife</option>
													  <option <?php if($family_relation[$key]=='children'){ echo 'selected'; } ?> value="children">Children</option>
													  <option <?php if($family_relation[$key]=='father'){ echo 'selected'; } ?> value="father">Father</option>
													  <option <?php if($family_relation[$key]=='mother'){ echo 'selected'; } ?> value="mother">Mother</option>
													</select>

												</div> 
											</div>
										<div class="col-12 col-md-4">
												<div class="form-group">
													<label>DOB</label>
													<input type="text"  name="family_dob[]" class="form-control" value="<?php echo e($family_dob[$key]); ?>">
												</div> 
											</div>
										 		
										 	<?php }

										    }else{ ?>

											<div class="col-12 col-md-4">
												<div class="form-group">
													<label>Name</label>
													<input type="text" required="" readonly="" name="family_name[]" class="form-control" value="<?php echo e($list[0]->name); ?>">
												</div> 
											</div>
											<div class="col-12 col-md-4">
												<div class="form-group">
													<label>Relation</label>
													<select class="form-control" name="family_relation[]" readonly="">
													  <option value="self" selected="">Self</option>
													</select>

												</div> 
											</div>
										<div class="col-12 col-md-4">
												<div class="form-group">
													<label>DOB</label>
													<input type="text"  name="family_dob[]" class="form-control ">
												</div> 
											</div>
										    <?php } ?>



										</div>
									</div>
									<div class="add-more">
										<a href="javascript:void(0);" class="add-award"><i class="fa fa-plus-circle"></i> Add More</a>
									</div>
								</div>
							</div>
										<div class="submit-section">
											<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
										</div>
									</form>
									<!-- /Profile Settings Form -->
									
								</div>
							</div>
						</div>
      <!-- /Page Wrapper -->
      <?php $__env->startSection('scripts'); ?>
		<script src="<?php echo e(asset('template')); ?>/assets/plugins/select2/js/select2.min.js"></script>
		<script src="<?php echo e(asset('template')); ?>/assets/js/moment.min.js"></script>
		<script src="<?php echo e(asset('template')); ?>/assets/js/bootstrap-datetimepicker.min.js"></script>
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
			$(".awards-info").on('click','.trash', function () {
		$(this).closest('.awards-cont').remove();
		return false;
    });

    $(".add-award").on('click', function () {

        var regcontent = '<div class="row form-row awards-cont">' +
			'<div class="col-12 col-md-4">' +
				'<div class="form-group">' +
					'<label>Name</label>' +
					'<input type="text" required="" class="form-control" name="family_name[]">' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-4">' +
				'<div class="form-group">' +
					'<label>Relation</label>' +
					'<select required="" class="form-control" name="family_relation[]" ><option value="">Select Relation</option><option value="wife">Wife</option><option value="children">Children</option><option value="father">Father</option><option value="mother">Mother</option></select>' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-3">' +
				'<div class="form-group">' +
					'<label>DOB</label>' +
					'<input required="" type="text" class="form-control" name="family_dob[]">' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-1">' +
				'<label class="d-md-block d-sm-none d-none">&nbsp;</label>' +
				'<a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a>' +
			'</div>' +
		'</div>';
		
        $(".awards-info").append(regcontent);
        return false;
    });
		</script>
      <?php $__env->stopSection(); ?>
   
<?php $__env->stopSection(); ?>



<?php echo $__env->make('patient_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>