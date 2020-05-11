@extends('doctor_master') 
@section('title','Dashboard') 
@section('styles')

@endsection
@section('content')
      <!-- Page Wrapper -->
						<div class="col-md-7 col-lg-8 col-xl-9">
						
							<div class="row row-grid">
								@if(!empty($appointment_booked))
						 		 @foreach($appointment_booked as $doctor)

								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="card widget-profile pat-widget-profile">
										<div class="card-body">
											<div class="pro-widget-content">
												<div class="profile-info-widget">
													<a href="{{ url('patient_profile_view') }}/{{ base64_encode(base64_encode($doctor->id)) }}" target="_blank" class="booking-doc-img">
														<img src="{{asset('patient_files')}}/{{ $doctor->profile_picture }}" alt="User Image">
													</a>
													<div class="profile-det-info">
														<h3><a href="{{ url('patient_profile_view') }}/{{ base64_encode(base64_encode($doctor->id)) }}" target="_blank">{{ $doctor->name }}</a></h3>
														
														<div class="patient-details">
															<h5><b>Patient ID :</b> #PT{{ $doctor->id }}</h5>
															<h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>{{ $doctor->city }}, {{ $doctor->state }}</h5>
														</div>
													</div>
												</div>
											</div>
											<div class="patient-info">
												<?php 
												$timestramp = strtotime($doctor->date_of_birth); 
                                                $year = date('Y',$timestramp);
                                                ?>
												<ul>
													<li>Phone <span>+91 {{ $doctor->mobile }}</span></li>
													<li>Age <span><?php echo date('Y')-$year;?> Years, {{ ucfirst($doctor->gender) }}</span></li>
													<li>Blood Group <span>{{ $doctor->blood_group }}</span></li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								@endforeach
								@endif


							</div>

						</div>
      <!-- /Page Wrapper -->

      	
      @section('scripts')

      @endsection
   
@endsection


