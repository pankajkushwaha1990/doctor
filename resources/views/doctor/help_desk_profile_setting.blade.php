@extends('doctor_master') 
@section('title','Dashboard') 
@section('styles')
		<link rel="stylesheet" href="{{asset('template')}}/assets/plugins/select2/css/select2.min.css">
		<link rel="stylesheet" href="{{asset('template')}}/assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css">	
		<link rel="stylesheet" href="{{asset('template')}}/assets/plugins/dropzone/dropzone.min.css">
@endsection
@section('content')
      <!-- Page Wrapper -->
						<div class="col-md-7 col-lg-8 col-xl-9">
					    @if(!empty($list))		
						<form id="needs-validation" enctype="multipart/form-data" novalidate class="needs-validation" method="post" action="{{ url('help_desk_profile_setting_submit') }}">
          				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
          				 <input type="hidden" name="help_desk_id" value="{{ $list[0]->id }}">

							<!-- Basic Information -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Front Desk Information</h4>
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
														<img id="blah" src="{{asset('patient_files')}}/{{ $list[0]->profile_picture }}" alt="User Image">
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
												<label>Profile Name</label>
												<input type="text" required="" name="profile_name" class="form-control"  value="{{ $list[0]->name }}">
												 @if ($errors->has('profile_name')) <p style="color:red;">{{ $errors->first('profile_name') }}</p> @endif
											</div>
										</div>



										
										<div class="col-md-6">
											<div class="form-group">
												<label>Phone Number <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="mobile" value="{{ $list[0]->user_id }}" required="" maxlength="10" minlength="10"  min='1111111111' max='9999999999' onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
												 @if($errors->has('mobile')) <p style="color:red;">{{ $errors->first('mobile') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Password <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="password" value="{{ $list[0]->password }}" required="" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" title="At least 1 Uppercase,1 Lowercase,1 Number,1 Symbol, symbol allowed --> !@#$%^&*_=+-,Min 8 chars and Max 12 chars">
												 @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Gender</label>
												<select class="form-control" name="gender" required="">
													<option value='' >Select</option>
													<option value="male" @if($list[0]->gender=='male'){{ 'selected' }} @endif >Male</option>
													<option value="female" @if($list[0]->gender=='female'){{ 'selected' }} @endif>Female</option>
												</select>
												 @if($errors->has('gender')) <p style="color:red;">{{ $errors->first('gender') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group mb-0">
												<label>Date of Birth (DD/MM/YYYY)</label>
												<input type="text" required="" name="date_of_birth" class="form-control"  value="{{ $list[0]->date_of_birth }}">
												 @if($errors->has('date_of_birth')) <p style="color:red;">{{ $errors->first('date_of_birth') }}</p> @endif

											</div>
										</div>
										
									</div>
								</div>
							</div>
							<div class="card contact-card">
								<div class="card-body">
									<h4 class="card-title">Front Desk Address</h4>
									<div class="row form-row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Address Line </label>
												<input type="text" class="form-control" name="address" required="" value="{{ $list[0]->address }}">
												 @if($errors->has('address')) <p style="color:red;">{{ $errors->first('address') }}</p> @endif
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">City</label>
												<input type="text" class="form-control" name="city" required="" value="{{ $list[0]->city }}">
												@if($errors->has('city')) <p style="color:red;">{{ $errors->first('city') }}</p> @endif
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">State / Province</label>
												<input type="text" class="form-control" name="state" required="" value="{{ $list[0]->state }}">
												@if($errors->has('state')) <p style="color:red;">{{ $errors->first('state') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Country</label>
												<input type="text" class="form-control" name="country" required="" value="{{ $list[0]->country }}">
												@if($errors->has('country')) <p style="color:red;">{{ $errors->first('country') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Postal Code</label>
												<input type="text" class="form-control" name="pincode" required="" value="{{ $list[0]->pincode }}">
												@if($errors->has('pincode')) <p style="color:red;">{{ $errors->first('pincode') }}</p> @endif
											</div>
										</div>
									</div>
								</div>
							</div>
                            <?php 
                              $menu = json_decode($list[0]->date_of_birth,true);
                            ?>
							<div class="card contact-card">
								<div class="card-body">
									<h4 class="card-title">Allow Menu</h4>
									<div class="row form-row">
										<div class="col-md-3">
											<div class="form-group">
												<label>Dashboard</label>
												<input type="checkbox" @if(in_array('dashboard',$menu)) {{ 'checked' }} @endif required="" name="menu[]" required="" value="dashboard">
												<div class="invalid-feedback">Please Select Dashboard.</div>
											
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Appointments</label>
												<input type="checkbox" name="menu[]"  value="appointments">
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">My Patients</label>
												<input type="checkbox"  name="menu[]"  value="my_patients">
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Schedule Timing</label>
												<input type="checkbox" name="menu[]" value="schedule_timing">
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Profile Setting</label>
												<input type="checkbox"  name="menu[]" value="profile_setting">
											</div>
										</div>
									</div>
								</div>
							</div>

							
							<div class="submit-section submit-btn-bottom">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							@if($list[0]->status =='1')         
                                <a href="{{ url('help_desk_profile_setting_status/0/'.base64_encode($list[0]->id))}}">
                                	<button type="button" class="btn btn-primary submit-btn">Active</button></a>         
                            @else
                               <a href="{{ url('help_desk_profile_setting_status/1/'.base64_encode($list[0]->id))}}">
                               	<button type="button" class="btn btn-danger submit-btn">Deactive</button>
                               </a>
                            @endif


								
							</div>
						</form>
						@else
						<form id="needs-validation" enctype="multipart/form-data" novalidate class="needs-validation" method="post" action="{{ url('help_desk_profile_setting_submit') }}">
          				 <input type="hidden" name="_token" value="{{ csrf_token() }}">

							<!-- Basic Information -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Front Desk Information</h4>
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
														<img id="blah" src="{{asset('patient_files')}}/default_help_desk_profile_picture.png" alt="User Image">
													</div>
													<div class="upload-img">
														<div class="change-photo-btn">
															<span><i class="fa fa-upload"></i> Upload Photo</span>
															<input type="file" class="upload" name="profile_picture" id="imgInp">
														</div>
														<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														 @if ($errors->has('profile_picture')) <p style="color:red;">{{ $errors->first('profile_picture') }}</p> @endif
													</div>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group mb-0">
												<label>Profile Name</label>
												<input type="text" required="" name="profile_name" class="form-control"  value="{{ old('profile_name') }}">
												 @if ($errors->has('profile_name')) <p style="color:red;">{{ $errors->first('profile_name') }}</p> @endif
											</div>
										</div>



										
										<div class="col-md-6">
											<div class="form-group">
												<label>Phone Number <span class="text-danger">*</span></label>
												<input type="text" class="form-control" required="" name="mobile" required="" maxlength="10" minlength="10" value="{{ old('mobile') }}" min='1111111111' max='9999999999' onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
												 @if($errors->has('mobile')) <p style="color:red;">{{ $errors->first('mobile') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Password <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="password" value="" required="" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" title="At least 1 Uppercase,1 Lowercase,1 Number,1 Symbol, symbol allowed --> !@#$%^&*_=+-,Min 8 chars and Max 12 chars" value="{{ old('password') }}">
												 @if ($errors->has('password')) <p style="color:red;">{{ $errors->first('password') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Gender</label>
												<select class="form-control" name="gender" required="">
													<option value='' >Select</option>
													<option value="male"   >Male</option>
													<option value="female" >Female</option>
												</select>
												 @if($errors->has('gender')) <p style="color:red;">{{ $errors->first('gender') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group mb-0">
												<label>Date of Birth (DD/MM/YYYY)</label>
												<input type="text" required="" name="date_of_birth" class="form-control"  value="{{ old('date_of_birth') }}">
												 @if($errors->has('date_of_birth')) <p style="color:red;">{{ $errors->first('date_of_birth') }}</p> @endif

											</div>
										</div>
										
									</div>
								</div>
							</div>
							<div class="card contact-card">
								<div class="card-body">
									<h4 class="card-title">Front Desk Address</h4>
									<div class="row form-row">
										<div class="col-md-12">
											<div class="form-group">
												<label>Address Line </label>
												<input type="text" class="form-control" name="address" required="" value="{{ old('address') }}">
												 @if($errors->has('address')) <p style="color:red;">{{ $errors->first('address') }}</p> @endif
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">City</label>
												<input type="text" class="form-control" name="city" required="" value="{{ old('city') }}">
												@if($errors->has('city')) <p style="color:red;">{{ $errors->first('city') }}</p> @endif
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">State / Province</label>
												<input type="text" class="form-control" name="state" required="" value="{{ old('state') }}">
												@if($errors->has('state')) <p style="color:red;">{{ $errors->first('state') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Country</label>
												<input type="text" class="form-control" name="country" required="" value="{{ old('country') }}">
												@if($errors->has('country')) <p style="color:red;">{{ $errors->first('country') }}</p> @endif

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Postal Code</label>
												<input type="text" class="form-control" name="pincode" required="" value="{{ old('pincode') }}">
												@if($errors->has('pincode')) <p style="color:red;">{{ $errors->first('pincode') }}</p> @endif
											</div>
										</div>
									</div>
								</div>
							</div>

														<div class="card contact-card">
								<div class="card-body">
									<h4 class="card-title">Allow Menu</h4>
									<div class="row form-row">
										<div class="col-md-3">
											<div class="form-group">
												<label>Dashboard</label>
												<input type="checkbox" required="" name="menu[]" required="" value="dashboard">
												<div class="invalid-feedback">Please Select Dashboard.</div>
											
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Appointments</label>
												<input type="checkbox"  name="menu[]"  value="appointments">
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">My Patients</label>
												<input type="checkbox" name="menu[]" value="my_patients">
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Schedule Timing</label>
												<input type="checkbox"  name="menu[]"  value="schedule_timing">
											</div>
										</div>

										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">Profile Setting</label>
												<input type="checkbox"  name="menu[]" value="profile_setting">
											</div>
										</div>
									</div>
								</div>
							</div>

							
							<div class="submit-section submit-btn-bottom">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
						</form>
						@endif

							
						</div>
      <!-- /Page Wrapper -->
      @section('scripts')
		<script src="{{asset('template')}}/assets/plugins/select2/js/select2.min.js"></script>
		<script src="{{asset('template')}}/assets/plugins/dropzone/dropzone.min.js"></script>
		<script src="{{asset('template')}}/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js"></script>
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


      @endsection
   
@endsection


