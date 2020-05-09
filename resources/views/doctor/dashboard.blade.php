@extends('doctor_master') 
@section('title','Dashboard') 
@section('styles')

@endsection
@section('content')
      <!-- Page Wrapper -->
<div class="col-md-7 col-lg-8 col-xl-9">

							<div class="row">
								<div class="col-md-12">
									<div class="card dash-card">
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 col-lg-4">
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
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget dct-border-rht">
														<div class="circle-bar circle-bar2">
															<div class="circle-graph2" data-percent="65">
																<img src="{{asset('template')}}/assets/img/icon-02.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Today Patient</h6>
															<h3>{{ $today_patient_count }}</h3>
															<p class="text-muted">{{ date('d F Y') }}</p>
														</div>
													</div>
												</div>
												
												<div class="col-md-12 col-lg-4">
													<div class="dash-widget">
														<div class="circle-bar circle-bar3">
															<div class="circle-graph3" data-percent="50">
																<img src="{{asset('template')}}/assets/img/icon-03.png" class="img-fluid" alt="Patient">
															</div>
														</div>
														<div class="dash-widget-info">
															<h6>Today Appoinments</h6>
															<h3>{{ $today_appointment_count }} </h3>
															<p class="text-muted">{{ date('d F Y') }}</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Patient Appoinment</h4>
									<div class="appointment-tab">
									
										<!-- Appointment Tab -->
										<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
											<!-- <li class="nav-item">
												<a class="nav-link " href="#upcoming-appointments" data-toggle="tab">Upcoming</a>
											</li> -->
											<li class="nav-item">
												<a class="nav-link active" href="#today-appointments" data-toggle="tab">Today</a>
											</li> 
										</ul>
										<!-- /Appointment Tab -->
										
										<div class="tab-content">
										
											<!-- Upcoming Appointment Tab -->
											<div class="tab-pane show " id="upcoming-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Patient Name</th>
																		<th>Appt Date</th>
																		<th>Purpose</th>
																		<th>Type</th>
																		<th class="text-center">Paid Amount</th>
																		<th></th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('template')}}/assets/img/patients/patient.jpg" alt="User Image"></a>
																				<a href="patient-profile.html">Richard Wilson <span>#PT0016</span></a>
																			</h2>
																		</td>
																		<td>11 Nov 2019 <span class="d-block text-info">10.00 AM</span></td>
																		<td>General</td>
																		<td>New Patient</td>
																		<td class="text-center">$150</td>
																		<td class="text-right">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('template')}}/assets/img/patients/patient1.jpg" alt="User Image"></a>
																				<a href="patient-profile.html">Charlene Reed <span>#PT0001</span></a>
																			</h2>
																		</td>
																		<td>3 Nov 2019 <span class="d-block text-info">11.00 AM</span></td>
																		<td>General</td>
																		<td>Old Patient</td>
																		<td class="text-center">$200</td>
																		<td class="text-right">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('template')}}/assets/img/patients/patient2.jpg" alt="User Image"></a>
																				<a href="patient-profile.html">Travis Trimble  <span>#PT0002</span></a>
																			</h2>
																		</td>
																		<td>1 Nov 2019 <span class="d-block text-info">1.00 PM</span></td>
																		<td>General</td>
																		<td>New Patient</td>
																		<td class="text-center">$75</td>
																		<td class="text-right">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('template')}}/assets/img/patients/patient3.jpg" alt="User Image"></a>
																				<a href="patient-profile.html">Carl Kelly <span>#PT0003</span></a>
																			</h2>
																		</td>
																		<td>30 Oct 2019 <span class="d-block text-info">9.00 AM</span></td>
																		<td>General</td>
																		<td>Old Patient</td>
																		<td class="text-center">$100</td>
																		<td class="text-right">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('template')}}/assets/img/patients/patient4.jpg" alt="User Image"></a>
																				<a href="patient-profile.html">Michelle Fairfax <span>#PT0004</span></a>
																			</h2>
																		</td>
																		<td>28 Oct 2019 <span class="d-block text-info">6.00 PM</span></td>
																		<td>General</td>
																		<td>New Patient</td>
																		<td class="text-center">$350</td>
																		<td class="text-right">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																	<tr>
																		<td>
																			<h2 class="table-avatar">
																				<a href="patient-profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('template')}}/assets/img/patients/patient5.jpg" alt="User Image"></a>
																				<a href="patient-profile.html">Gina Moore <span>#PT0005</span></a>
																			</h2>
																		</td>
																		<td>27 Oct 2019 <span class="d-block text-info">8.00 AM</span></td>
																		<td>General</td>
																		<td>Old Patient</td>
																		<td class="text-center">$250</td>
																		<td class="text-right">
																			<div class="table-action">
																				<a href="javascript:void(0);" class="btn btn-sm bg-info-light">
																					<i class="far fa-eye"></i> View
																				</a>
																				
																				<a href="javascript:void(0);" class="btn btn-sm bg-success-light">
																					<i class="fas fa-check"></i> Accept
																				</a>
																				<a href="javascript:void(0);" class="btn btn-sm bg-danger-light">
																					<i class="fas fa-times"></i> Cancel
																				</a>
																			</div>
																		</td>
																	</tr>
																</tbody>
															</table>		
														</div>
													</div>
												</div>
											</div>
											<!-- /Upcoming Appointment Tab -->
									   
											<!-- Today Appointment Tab -->
											<div class="tab-pane active show" id="today-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
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
																	<th>Action</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
															@if(!empty($appointment_booked))
						 									 @foreach($appointment_booked as $doctor)
																<tr>
																	<?php 
																	      $timestramp = strtotime($doctor->date_of_birth); 
                                                                          $year = date('Y',$timestramp);
                                                                    ?>
																	<td>{{ $doctor->patient_name }}<br>
																		<span style="font-size: 12px;">{{ ucfirst($doctor->patient_gender) }}  <?php echo date('Y')-$year;?> Years</span>
																	</td>
																	<td>
																		<h2 class="table-avatar">
																			<a  href="{{ url('patient_profile_view') }}/{{ base64_encode(base64_encode($doctor->id)) }}" target="_blank" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="{{asset('patient_files')}}/{{ $doctor->profile_picture }}" alt="User Image">
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
																	<td class="text-right">
																		<div class="table-action">
																			<!-- <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a> -->
																		@if($doctor->appointment_status==0)
																			<a patient_name="{{ $doctor->patient_name }}" doctor_fee="{{ $doctor->doctor_fee }}" appointment_on="<?php echo date('d F Y',$timestramp); ?> {{ $doctor->appointment_slot }}" booking_id="{{ $doctor->app_id }}" href="{{ url('doctor_appointments_status/1/'.base64_encode($doctor->app_id))}}" class="check_in_click"><button class="btn btn-sm btn-success">In</button></a>
																		@elseif($doctor->appointment_status==1)
																			<a href="{{ url('doctor_appointments_checkout_status/2/'.base64_encode($doctor->app_id))}}"><button class="btn btn-sm btn-info">Out</button></a>
																		@endif


																			<a href="{{ url('patient_invoice_view')}}/{{ base64_encode(base64_encode($doctor->id)) }} " class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i>
																			</a>
																			<a href="{{ url('patient_invoice_view')}}/{{ base64_encode(base64_encode($doctor->id)) }} " class="btn btn-sm bg-info-light">
																				<i class="fa fa-print"></i>
																			</a>
																		</div>
																	</td>
																</tr>
															 @endforeach
															@endif
																
															</tbody>
														</table>	
														</div>	
													</div>	
												</div>	
											</div>
											<!-- /Today Appointment Tab -->
											
										</div>
									</div>
								</div>
							</div>

</div>
      @section('scripts')
      <script src="{{asset('template')}}/admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="{{asset('template')}}/admin/assets/plugins/datatables/datatables.min.js"></script>
		<script  src="{{asset('template')}}/admin/assets/js/script.js"></script>
		<script src="{{asset('template/admin')}}/assets/js/form-validation.js"></script>

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





