@extends('doctor_master') 
@section('title','Dashboard') 
@section('styles')
		<link rel="stylesheet" href="{{asset('template')}}/admin/assets/plugins/datatables/datatables.min.css">
				<link rel="stylesheet" href="{{asset('template')}}/assets/css/bootstrap-datetimepicker.min.css">
		<link rel="stylesheet" href="{{asset('template')}}/assets/plugins/select2/css/select2.min.css">

@endsection
@section('content')
      <!-- Page Wrapper -->
						<div class="col-md-7 col-lg-8 col-xl-9">
			<form role="form" enctype="multipart/form-data" method="get" action="{{ url('doctor_booking_report') }}">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<?php 
					                        $patient_id = $appointment_type = $from = $to = '';
					                        $package_id_get = 'all';
					                        if(isset($_GET['patient_id'])){
					                          $patient_id             = $_GET['patient_id'];
					                          $appointment_type       = $_GET['appointment_type'];
					                          $from                   = $_GET['from'];
					                          $to                     = $_GET['to'];
					                        }
					                    ?>

										<div class="col-md-3">
											<div class="form-group">
												<select class="form-control" name="patient_id" >
													<option value="">Select Patient</option>
													@if(!empty($patient_list))
													@foreach($patient_list as $patient)
													<option {{ $patient_id==$patient->patient_id ? "selected" : "" }} value="{{ $patient->patient_id }}">{{ $patient->name }} {{ $patient->mobile }}</option>
													@endforeach
													@endif

												</select>
												 
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<select class="form-control" name="appointment_type" >
													<option  value="">Appointment</option>
													<option {{ $appointment_type=='new' ? "selected" : "" }} value="new">New</option>
													<option {{ $appointment_type=='old' ? "selected" : "" }} value="old">Old</option>
												</select>
												 
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-0">
												<input type="text" name="from" class="form-control datetimepicker1"  value="{{ $from }}" placeholder="From">
												

											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group mb-0">
												<input type="text"  name="to" class="form-control datetimepicker1"  value="{{ $to }}" placeholder="To">
												 

											</div>
										</div>
										<div class="col-md-1">
											<div class="form-group mb-0">
												<button type="submit" class="btn btn-success">Go</button>
												 

											</div>
										</div>
									</div>
								</div>
							</form>
							</div>
							<?php 
							$all_patient_count = 0;
							$total_new_appointment = 0;
							$total_old_appointment = 0;
							$today_revenue = 0;
							if(!empty($appointment_booked)){
							 $all_patient_count = count($appointment_booked); 	
						 	 foreach($appointment_booked as $doctor){
						 	 	if($doctor->booking_type=='old'){
						 	 		$total_old_appointment+=1;
						 	 	}else{
						 	 		$total_new_appointment+=1;
						 	 	}
						 	 	$today_revenue += $doctor->pay_amount;
						 	 }
							}
							?>
							<div class="col-md-12">
									<div class="card dash-card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 col-lg-3">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar1">
															<div class="circle-graph1" data-percent="75">
																<img src="{{asset('template')}}/assets/img/icon-01.png" class="img-fluid" alt="patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Total Patient</h6>
															<h3>{{ $all_patient_count }}</h3>
															<p class="text-muted">Till Today</p>
														</div>
													</div>
												</div>
												
												
												
												<div class="col-md-12 col-lg-3">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar3">
															<div class="circle-graph3" data-percent="50">
																<img src="{{asset('template')}}/assets/img/icon-03.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>New Appoinments</h6>
															<h3><span style="font-size: 12px;">New</span> {{ $total_new_appointment }}</h3>
															<p class="text-muted"></p>
														</div>
													</div>
												</div>

												<div class="col-md-12 col-lg-3">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar3">
															<div class="circle-graph3" data-percent="50">
																<img src="{{asset('template')}}/assets/img/icon-03.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Old Appoinments</h6>
															<h3><span style="font-size: 12px;">Old</span> {{ $total_old_appointment }}</h3>
															<p class="text-muted"></p>
														</div>
													</div>
												</div>

												<div class="col-md-12 col-lg-3">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar3">
															<div class="circle-graph3" data-percent="50">
																<img src="{{asset('template')}}/assets/img/icon-02.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Today Revenue</h6>
															<h3>{{ $today_revenue }} </h3>
															<p class="text-muted"></p>
														</div>
													</div>
												</div>


											</div>
										</div>
									</div>
								</div>
							<div class="card">
								<div class="card-body pt-0">
										<div class="login-header" style="text-align: center;">
                                             <h6 class="card-title">
                                                  @if(session()->get('success'))
                                                  <br>
                                                    <span class="text-success">
                                                      {{ session()->get('success') }}  
                                                    </span>
                                                  @endif
                                                   @if(session()->get('failure'))
                                                   <br>
                                                    <span class="text-danger">
                                                      {{ session()->get('failure') }}  
                                                    </span>
                                                  @endif
                                              </h6>
                                        </div>

														<table class="datatable table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Patient</th>
																	<th>Booked By</th>
																	<th>Appt Date</th>
																	<th>Booking Date</th>
																	<th>Amount</th>
																	<th>Paid</th>
																	<!-- <th>Follow Up</th> -->
																	<!-- <th>Action</th> -->
																	<th></th>
																</tr>
															</thead>
															<tbody>
															@if(!empty($appointment_booked))
						 									 @foreach($appointment_booked as $doctor)
																<tr>
																	<?php 
																	      $timestramp = strtotime($doctor->patient_dob); 
                                                                          $year = date('Y',$timestramp);
                                                                    ?>
																	<td>{{ $doctor->patient_name }}<br>
																		<span style="font-size: 12px;">{{ ucfirst($doctor->patient_gender) }}  <?php echo date('Y')-$year;?> Years</span>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a  href="{{ url('patient_profile_view') }}/{{ base64_encode(base64_encode($doctor->id)) }}" target="_blank" class="avatar avatar-sm mr-2">
																				@if($doctor->booked_by_type=='doctor')
																				<img class="avatar-img rounded-circle" src="{{asset('doctor_files')}}/{{ $doctor->profile_picture }}" alt="User Image">
																				@else
																				<img class="avatar-img rounded-circle" src="{{asset('patient_files')}}/{{ $doctor->profile_picture }}" alt="User Image">
																				@endif
																			</a>
																			<a href="{{ url('doctor_profile_view') }}/{{ base64_encode(base64_encode($doctor->id)) }}">{{ $doctor->name }} <span>{{ $doctor->state }} , {{ $doctor->city }}</span> <span>+91 {{ $doctor->mobile }}</span></a>
																		</h2>
																	</td>
																	<?php $timestramp = strtotime($doctor->appointment_date); ?>
																	<?php $created_at = strtotime($doctor->created_at); ?>
																	<td><?php echo date('d F Y',$timestramp); ?><span class="d-block text-info">{{ $doctor->appointment_slot }}</span></td>
																	<td><?php echo date('d F Y',$created_at); ?></td>
																	<td>{{ $doctor->doctor_fee }} Rs.</td>
																	<td>{{ $doctor->pay_amount }} Rs.</td>
																	<!-- <td>16 Nov 2019</td> -->
																	<!-- <td><span class="badge badge-pill bg-success-light">Confirm</span></td> -->
																	
																</tr>
															 @endforeach
															@endif
																
															</tbody>
														</table>
													</div>
								</div>
											</div>
										<!-- /Appointment Tab -->
										
										<!-- Prescription Tab -->
										
										<!-- /Prescription Tab -->
											
										<!-- Medical Records Tab -->
									
										<!-- /Medical Records Tab -->
										
										<!-- Billing Tab -->
										
										<!-- /Billing Tab -->
										
									</div>
									<!-- Tab Content -->
									
								</div>


      <!-- /Page Wrapper -->



      	
      @section('scripts')
      <script src="{{asset('template')}}/admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="{{asset('template')}}/admin/assets/plugins/datatables/datatables.min.js"></script>
		<script  src="{{asset('template')}}/admin/assets/js/script.js"></script>
		<script src="{{asset('template/admin')}}/assets/js/form-validation.js"></script>
				<script src="{{asset('template')}}/assets/js/moment.min.js"></script>

        <script src="{{asset('template')}}/assets/js/bootstrap-datetimepicker.min.js"></script>

		<script type="text/javascript">
			$(function(){
				$('.check_in_click').click(function(e){
					e.preventDefault();
					$('.patient_name').text($(this).attr('patient_name'));
					$('.appintment_on').text($(this).attr('appointment_on'));
					$('.doctor_fee').val($(this).attr('doctor_fee'));
					$('.booking_id').val($(this).attr('booking_id'));
					$('#check_in_modal').modal('show');
				})
			})
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

<div id="check_in_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="needs-validation" enctype="multipart/form-data" novalidate="" class="needs-validation" method="post" action="{{ url('doctor_appointments_checked_in_submit') }}">
          	 <input type="hidden" name="_token" value="{{ csrf_token() }}">
          	 <input type="hidden" name="booking_id" required="" value="" class="booking_id">
              <div class="hours-info">
                <div class="row form-row hours-cont">
                  <div class="col-12 col-md-12">
                    <div class="row form-row">
                      
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label>Patient Name</label>
                          <div class="patient_name">Pankaj Kushwaha</div>
                        </div> 
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label>Appointment On</label>
                          <div class="appintment_on">Pankaj Kushwaha</div>
                        </div> 
                      </div>
                    </div>
                  </div>
                </div>
<hr>
                <div class="row form-row hours-cont">
                  <div class="col-12 col-md-12">
                    <div class="row form-row">
                      
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label>Booking Amount</label>
                          <div ><input class="doctor_fee form-control" readonly="" type="number" name="doctor_fee"></div>
                        </div> 
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label>Pay Amount</label>
                          <div ><input class="pay_amount form-control" required=""  type="number" name="pay_amount"></div>
                        </div> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="submit-section text-center">
                <button type="submit" class="btn btn-primary submit-btn">Check-In</button>
              </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


