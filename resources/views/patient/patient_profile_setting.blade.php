@extends('patient_master') 
@section('title','Dashboard') 
@section('styles')
		<link rel="stylesheet" href="{{asset('template')}}/assets/css/bootstrap-datetimepicker.min.css">
		<link rel="stylesheet" href="{{asset('template')}}/assets/plugins/select2/css/select2.min.css">
@endsection
@section('content')
      <!-- Page Wrapper -->
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									
									<!-- Profile Settings Form -->
					<form id="needs-validation" enctype="multipart/form-data" novalidate class="needs-validation" method="post" action="{{ url('patient_profile_setting_submit') }}">
          				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
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

											<div class="col-6 col-md-6">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															<img id="blah" src="{{asset('patient_files')}}/{{ $session->profile_picture }}" alt="User Image">
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input type="file" class="upload" name="profile_picture" id="imgInp">
																<input type="hidden" name="profile_picture_old" value="{{ $list[0]->profile_picture }}">
															</div>
															<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														</div>
													</div>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group mb-0">
													<label>Profile Display Name  <span class="text-danger">*</span></label>
													<input type="text" required="" name="profile_name" class="form-control"  value="{{ $list[0]->name }}">
												</div>
											</div>

										<div class="col-md-4">
											<div class="form-group">
												<label>UserID <span class="text-danger">*</span></label>
												<input type="text" class="form-control"  readonly value="#PT{{ $list[0]->id }}" required="">
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Email </label>
												<input type="email" class="form-control" name="email" value="{{ $list[0]->email }}" >
											</div>
										</div>
										<div class="col-12 col-md-4">
												<div class="form-group">
													<label>Mobile  <span class="text-danger">*</span></label>
													<input type="number" readonly="" name="mobile" class="form-control" value="{{ $list[0]->mobile }}" required="">
												</div>
											</div>

											<div class="col-12 col-md-4">
												<div class="form-group">
													<label>First Name  <span class="text-danger">*</span></label>
													<input type="text" name="first_name" class="form-control" value="{{ $list[0]->first_name }}" required="">
												</div>
											</div>
											<div class="col-12 col-md-4">
												<div class="form-group">
													<label>Last Name  <span class="text-danger">*</span></label>
													<input type="text" name="last_name" class="form-control" value="{{ $list[0]->last_name }}" required="">
												</div>
											</div>
											<div class="col-12 col-md-4">
												<div class="form-group">
													<label>Date of Birth  <span class="text-danger">*</span></label>
													<div class="cal-icon">
														<input type="text" required="" name="date_of_birth" class="form-control datetimepicker2 first_date_of_birth"  value="{{ $list[0]->date_of_birth }}">
													</div>
												</div>
											</div>
											<div class="col-md-6">
											<div class="form-group">
												<label>Gender <span class="text-danger ">*</span></label>
												<select class="form-control select_gender" name="gender" required="">
													<option value='' >Select</option>
													<option value="male" @if($list[0]->gender=='male'){{ 'selected' }} @endif >Male</option>
													<option value="female" @if($list[0]->gender=='female'){{ 'selected' }} @endif>Female</option>
													<option value="transgender" @if($list[0]->gender=='transgender'){{ 'selected' }} @endif>Trans-Gender</option>
												</select>
											</div>
										</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Blood Group <span class="text-danger">*</span></label>
													<select class="form-control" required="" name="blood_group">
														<option  value="">Select Blood Group</option>
														<option @if($list[0]->blood_group=='Not Known'){{ 'selected' }} @endif value="Not Known">Not Known</option>
														<option @if($list[0]->blood_group=='A-'){{ 'selected' }} @endif value="A-">A-</option>
														<option @if($list[0]->blood_group=='A+'){{ 'selected' }} @endif value="A+">A+</option>
														<option @if($list[0]->blood_group=='B-'){{ 'selected' }} @endif value="B-">B-</option>
														<option @if($list[0]->blood_group=='B+'){{ 'selected' }} @endif value="B+">B+</option>
														<option @if($list[0]->blood_group=='AB-'){{ 'selected' }} @endif value="AB-">AB-</option>
														<option @if($list[0]->blood_group=='AB+'){{ 'selected' }} @endif value="AB+">AB+</option>
														<option @if($list[0]->blood_group=='O-'){{ 'selected' }} @endif value="O-">O-</option>
														<option @if($list[0]->blood_group=='O+'){{ 'selected' }} @endif value="O+">O+</option>
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
												<label>Address <span class="text-danger">*</span></label>
													<input type="text" name="address" class="form-control" value="{{ $list[0]->address }}" required="">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>City <span class="text-danger">*</span></label>
													<input type="text" name="city" class="form-control" value="{{ $list[0]->city }}" required="">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>State <span class="text-danger">*</span></label>
													<input type="text" name="state" class="form-control" value="{{ $list[0]->state }}" required="">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Zip/Pin Code <span class="text-danger">*</span></label>
													<input maxlength="6" minlength="6" min='111111' max='999999' onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" type="text" name="pincode" class="form-control" value="{{ $list[0]->pincode }}" required="">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Country <span class="text-danger">*</span></label>
													<input type="text" name="country" class="form-control" value="{{ $list[0]->country }}" required="">
												</div>
											</div>
										</div>
										<div class="card">
								<div class="card-body">
									<h4 class="card-title">Family Members <span class="text-danger">*</span></h4>
									<div class="awards-info">
										<div class="row form-row awards-cont">
										 <?php 
										 if(!empty($list[0]->family_name)){
										 	$family_name     = json_decode($list[0]->family_name,true);
										 	$family_gender     = json_decode($list[0]->family_gender,true);
										 	$family_relation = json_decode($list[0]->family_relation,true);
										 	$family_dob      = json_decode($list[0]->family_dob,true);
										 	foreach ($family_name as $key => $value) { ?>

										 		<div class="col-12 col-md-3">
												<div class="form-group">
													<label>Name</label>
													<input type="text" required="" name="family_name[]" class="form-control" value="{{ $family_name[$key] }}">
												</div> 
											</div>

											<div class="col-md-3">
											<div class="form-group">
												<label>Gender <span class="text-danger ">*</span></label>
												<select class="form-control gender1"  name="family_gender[]" required="">
													<option  value="male" <?php if($family_gender[$key]=='self'){ echo 'selected'; } ?> >Male</option>
													<option value="female" <?php if($family_gender[$key]=='self'){ echo 'selected'; } ?> >Female</option>
													<option value="transgender" <?php if($family_gender[$key]=='self'){ echo 'selected'; } ?>>Trans-Gender</option>
												</select>
											</div>
										</div>

											<div class="col-12 col-md-3">
												<div class="form-group">
													<label>Relation</label>
													<select class="form-control" name="family_relation[]">
													  <option <?php if($family_relation[$key]=='self'){ echo 'selected'; } ?>  value="self" selected="">Self</option>
													  <option <?php if($family_relation[$key]=='wife'){ echo 'selected'; } ?> value="wife">Wife</option>
													  <option <?php if($family_relation[$key]=='children'){ echo 'selected'; } ?> value="children">Children</option>
													  <option <?php if($family_relation[$key]=='father'){ echo 'selected'; } ?> value="father">Father</option>
													  <option <?php if($family_relation[$key]=='mother'){ echo 'selected'; } ?> value="mother">Mother</option>
													  <option <?php if($family_relation[$key]=='others'){ echo 'selected'; } ?> value="others">Others</option>
													</select>

												</div> 
											</div>
										<div class="col-12 col-md-3">
												<div class="form-group">
													<label>DOB</label>
													<input type="text"  name="family_dob[]" class="form-control datetimepicker1" value="{{ $family_dob[$key] }}">
												</div> 
											</div>
										 		
										 	<?php }

										    }else{ ?>

											<div class="col-12 col-md-3">
												<div class="form-group">
													<label>Name <span class="text-danger">*</span></label>
													<input type="text" required="" readonly="" name="family_name[]" class="form-control" value="{{ $list[0]->name }}">
												</div> 
											</div>
											<div class="col-md-3">
											<div class="form-group">
												<label>Gender <span class="text-danger ">*</span></label>
												<select class="form-control gender1" readonly='' name="family_gender[]" required="">
													<option value='' >Select</option>
													<option value="male" @if($list[0]->gender=='male'){{ 'selected' }} @endif >Male</option>
													<option value="female" @if($list[0]->gender=='female'){{ 'selected' }} @endif>Female</option>
													<option value="transgender" @if($list[0]->gender=='transgender'){{ 'selected' }} @endif>Trans-Gender</option>
												</select>
											</div>
										</div>
											<div class="col-12 col-md-3">
												<div class="form-group">
													<label>Relation <span class="text-danger">*</span></label>
													<select class="form-control"  required="" name="family_relation[]" readonly="">
													  <option value="self" selected="">Self</option>
													  <option <?php if($family_relation[$key]=='others'){ echo 'selected'; } ?> value="others">Others</option>
													</select>

												</div> 
											</div>
										<div class="col-12 col-md-3">
												<div class="form-group">
													<label>DOB <span class="text-danger">*</span></label>
													<input type="text" required="" readonly=""  name="family_dob[]" class="form-control set_date_picked">
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
      @section('scripts')
		<script src="{{asset('template')}}/assets/plugins/select2/js/select2.min.js"></script>
		<script src="{{asset('template')}}/assets/js/moment.min.js"></script>
		<script src="{{asset('template')}}/assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="{{asset('template/admin')}}/assets/js/form-validation.js"></script>
		<script type="text/javascript">
			$(function(){
				$('.first_date_of_birth').change(function(){
					alert();
				})
			})
		</script>
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
			'<div class="col-12 col-md-3">' +
				'<div class="form-group">' +
					'<label>Name <span class="text-danger">*</span></label>' +
					'<input type="text" required="" class="form-control" name="family_name[]">' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-3">' +
				'<div class="form-group">' +
					'<label>Gender <span class="text-danger">*</span></label>' +
					'<select required="" class="form-control" name="family_gender[]" ><option value="">Select Gender</option><option value="male">Male</option><option value="female">Female</option><option value="transgender">Trans-Gender</option></select>' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-3">' +
				'<div class="form-group">' +
					'<label>Relation <span class="text-danger">*</span></label>' +
					'<select required="" class="form-control" name="family_relation[]" ><option value="">Select Relation</option><option value="wife">Wife</option><option value="children">Children</option><option value="father">Father</option><option value="mother">Mother</option><option value="others">Others</option></select>' +
				'</div>' +
			'</div>' +
			'<div class="col-12 col-md-2">' +
				'<div class="form-group">' +
					'<label>DOB <span class="text-danger">*</span></label>' +
					'<input required="" type="text" class="form-control datetimepicker1" name="family_dob[]">' +
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
		<script type="text/javascript">
			$('body').on('focus',".datetimepicker1", function(){
				    $(this).datetimepicker({
				    	format: 'DD/MM/YYYY',
			icons: {
				up: "fas fa-chevron-up",
				down: "fas fa-chevron-down",
				next: 'fas fa-chevron-right',
				previous: 'fas fa-chevron-left'
			}
				    });
				})

		</script>
		<script type="text/javascript">
			$('body').on('focus',".datetimepicker2", function(){
				    $(this).datetimepicker({
				    	format: 'DD/MM/YYYY',
			icons: {
				up: "fas fa-chevron-up",
				down: "fas fa-chevron-down",
				next: 'fas fa-chevron-right',
				previous: 'fas fa-chevron-left'
			}
				    });
				})

		</script>
		<script type="text/javascript">
			$('body').on('focusout',".datetimepicker2", function(){
				    var dob = $(this).val();
				    $('.set_date_picked').val(dob);
			})

			$(function(){
				$('.select_gender').change(function(){
					var gender = $(this).val();
					$('.gender1').val(gender);
				})
			})

		</script>
      @endsection
   
@endsection


