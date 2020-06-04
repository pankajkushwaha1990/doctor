@extends('patient_master') 
@section('title','Dashboard') 
@section('styles')

@endsection
@section('content')
      <!-- Page Wrapper -->
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="row">
								<div class="col-md-3">Name:-</div>
								<div class="col-md-3">{{ $list[0]->patient_name }}</div>
								<div class="col-md-3">Relation:-</div>
								<div class="col-md-3">{{ $list[0]->patient_relation }}</div>
							</div>
							<br>
							<br>
							<div class="row">
								<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Patient</th>
																	<th>Doctor</th>
																	<th>Appt Date</th>
																	<th>Booking Date</th>
																	<th>Amount</th>
																	<!-- <th>Status</th> -->
																	<th></th>
																</tr>
															</thead>
															<tbody>
									
								

								@if(!empty($list))
						 				@foreach($list as $doctor)
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
																			<a href="{{ url('doctor_profile_view') }}/{{ base64_encode(base64_encode($doctor->doc_id)) }}" target="_blank" class="avatar avatar-sm mr-2">
																				<img class="avatar-img rounded-circle" src="{{asset('doctor_files')}}/{{ $doctor->profile_picture }}" alt="User Image">
																			</a>
																			<a href="{{ url('doctor_profile_view') }}/{{ base64_encode(base64_encode($doctor->doc_id)) }}">{{ $doctor->name }} <span>{{ $doctor->designation }}</span></a>
																		</h2>
																	</td>
																	<?php 
															     
																	 ?>
																	<?php 
																	$created_at = strtotime($doctor->created_at);
																	$timestramp = strtotime($doctor->appointment_date);

																	 ?>
																	<td><?php echo date('d F Y',$timestramp); ?><span class="d-block text-info">{{ $doctor->appointment_slot }}</span></td>
																	<td><?php echo date('d F Y',$created_at); ?></td>
																	<td>{{ $doctor->doctor_fee }} Rs.</td>

															  
																	<td class="text-right">
																		<div class="table-action">
																			<!-- <a href="javascript:void(0);" class="btn btn-sm bg-primary-light">
																				<i class="fas fa-print"></i> Print
																			</a> -->
																			<a href="{{ url('patient_invoice_view')}}/{{ base64_encode(base64_encode($doctor->id)) }} " class="btn btn-sm bg-info-light">
																				<i class="far fa-eye"></i> View
																			</a>
																		</div>
																	</td>
																</tr>
								@endforeach
								@endif

							</table>
								

								
								
							</div>
						</div>
      <!-- /Page Wrapper -->
      @section('scripts')

      @endsection
   
@endsection


