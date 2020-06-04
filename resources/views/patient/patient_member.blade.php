@extends('patient_master') 
@section('title','Dashboard') 
@section('styles')

@endsection
@section('content')
      <!-- Page Wrapper -->
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="row row-grid">

							@if(!empty($member_list->family_appointment))
							  @foreach($member_list->family_appointment as $member)	
								<div class="col-md-6 col-lg-4 col-xl-3">
									<div class="profile-widget">
										
										<div class="pro-content">
											<h3 class="title">
												<a href="doctor-profile.html">{{ $member['name'] }}</a> 
												<i class="fas fa-check-circle verified"></i>
											</h3>
											<p class="speciality">{{ $member['family_gender'] }}</p>
											
											<ul class="available-info">
												<li>
													<i class="fas fa-map-marker-alt"></i> {{ $member['family_relation'] }}
												</li>
												<li>
													<i class="far fa-clock"></i> {{ $member['family_dob'] }}
												</li>
												<!-- <li>
													<i class="far fa-money-bill-alt"></i> $300 - $1000 <i class="fas fa-info-circle" data-toggle="tooltip" title="" data-original-title="Lorem Ipsum"></i>
												</li> -->
											</ul>
											<div class="row row-sm">
												<div class="col-12">
													<a href="{{ url('patient_member_history') }}/{{ $member['name'] }}" class="btn view-btn">View History ({{ $member['appointment']}})</a>
												</div>
												<!-- <div class="col-6">
													<a href="booking.html" class="btn book-btn">Book Now</a>
												</div> -->
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


