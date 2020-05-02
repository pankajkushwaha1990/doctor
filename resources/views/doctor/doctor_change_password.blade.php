@extends('doctor_master') 
@section('title','Dashboard') 
@section('styles')
@endsection
@section('content')
      <!-- Page Wrapper -->
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									<div class="login-header">
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
                                        
									<div class="row">
										<div class="col-md-12 col-lg-6">
										
											<!-- Change Password Form -->
			<form id="needs-validation" enctype="multipart/form-data" novalidate class="needs-validation" method="post" action="{{ url('doctor_change_password_submit') }}">
          	 <input type="hidden" name="_token" value="{{ csrf_token() }}">
												<div class="form-group">
													<label>Old Password</label>
													<input type="password" class="form-control" name="old_password" required="">
												</div>
												<div class="form-group">
													<label>New Password</label>
													<input type="password" class="form-control" name="new_password" required="">
												</div>
												<div class="form-group">
													<label>Confirm Password</label>
													<input type="password" class="form-control" name="confirm_password" required="">
												</div>
												<div class="submit-section">
													<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
												</div>
											</form>
											<!-- /Change Password Form -->
											
										</div>
									</div>
								</div>
							</div>
						</div>
      <!-- /Page Wrapper -->


      	
      @section('scripts')
		<script src="{{asset('template/admin')}}/assets/js/form-validation.js"></script>

      @endsection
   
@endsection


