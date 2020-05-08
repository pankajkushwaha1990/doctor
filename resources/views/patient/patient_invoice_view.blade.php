@extends('patient_master') 
@section('title','Dashboard') 
@section('styles')
<style>
	.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#0C9;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}

.my-float{
	margin-top:22px;
}

@media print {
	
    #print-me { display: block;margin: 2px; }
     .header-nav, .theiaStickySidebar,.footer { display: none; }*/
}



</style>
@endsection
@section('content')
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
						<div class="col-lg-7 printing" id="print-me">
							<div class="invoice-content">
								<div class="invoice-item">
									<div class="row">
										<div class="col-md-6">
											<div class="invoice-logo">
												<img src="{{asset('template')}}/assets/img/logo.png" alt="logo">
											</div>
										</div>
										<div class="col-md-6">
											<p class="invoice-details">
												<strong>Order:</strong> #INV{{ $appointment->id }} <br>
												<strong>Issued:</strong> {{ $appointment->created_at }}
											</p>
										</div>
									</div>
								</div>
								
								<!-- Invoice Item -->
								<div class="invoice-item">
									<div class="row">
										<div class="col-md-6">
											<div class="invoice-info">
												<strong class="customer-text">Invoice From</strong>
												<p class="invoice-details invoice-details-two">
													{{ $appointment->name }} <br>
													 {{ ucfirst($appointment->clinic_address) }}, <br>
													{{ ucfirst($appointment->clinic_city) }},{{ ucfirst($appointment->clinic_state) }},<br>
												</p>
											</div>
										</div>
										<div class="col-md-6">
											<div class="invoice-info invoice-info2">
												<strong class="customer-text">Invoice To</strong>
												<p class="invoice-details">
													{{ $session->name }} <br>
													{{ $session->address }}, <br>
													{{ $session->city }}, {{ $session->state }}<br>
												</p>
											</div>
										</div>
									</div>
								</div>
								<!-- /Invoice Item -->
								
								<!-- Invoice Item -->
								<div class="invoice-item">
									<div class="row">
										<div class="col-md-12">
											<div class="invoice-info">
												<?php 
												$year = date('Y',strtotime($appointment->patient_dob));
												$dob  = date('Y')-$year;
												?>
												<strong class="customer-text">Paitent Details</strong>
												<p class="invoice-details invoice-details-two">
													{{ $appointment->patient_name }} <br>
													{{ ucfirst($appointment->patient_gender) }} ({{ $dob }}) Years<br>
													Relation: {{ $appointment->patient_relation }}<br>
												</p>
											</div>
										</div>
									</div>
								</div>
								<!-- /Invoice Item -->
								
								<!-- Invoice Item -->
								<div class="invoice-item invoice-table-wrap">
									<div class="row">
										<div class="col-md-12">
											<div class="table-responsive">
												<table class="invoice-table table table-bordered">
													<thead>
														<tr>
															<th>Description</th>
															<th class="text-center">Quantity</th>
															<th class="text-right">Total</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>General Consultation</td>
															<td class="text-center">1</td>
															<td class="text-right">{{ $appointment->doctor_fee }} Rs.</td>
														</tr>
														
													</tbody>
												</table>
											</div>
										</div>
										<div class="col-md-6 col-xl-4 ml-auto">
											<div class="table-responsive">
												<table class="invoice-table-two table">
													<tbody>
												<!-- 	<tr>
														<th>Subtotal:</th>
														<td><span>$350</span></td>
													</tr> -->
													<!-- <tr>
														<th>Discount:</th>
														<td><span>-10%</span></td>
													</tr> -->
													<tr>
														<th>Total Amount:</th>
														<td><span>{{ $appointment->doctor_fee }} Rs.</span></td>
													</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<!-- /Invoice Item -->
								
								<!-- Invoice Information -->
								<div class="other-info">
									<h4>Other information</h4>
									<p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut a ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum, eu scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus pellentesque libero.</p>
								</div>
								<!-- /Invoice Information -->
								
							</div>
						</div>

						<a href="#" class="float" onclick="window.print()">
						  <i class="fa fa-print my-float" ></i>
						</a>
					
   
			<!-- Footer -->
		  @section('scripts')

      @endsection
   
@endsection


