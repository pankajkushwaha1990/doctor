@extends('doctor_master') 
@section('title','Dashboard') 
@section('styles')
<link rel="stylesheet" href="{{asset('template')}}/assets/plugins/select2/css/select2.min.css">
@endsection
@section('content')
      <!-- Page Wrapper -->
						<div class="col-md-7 col-lg-8 col-xl-9">
						 
							<div class="row">
								<div class="col-sm-12">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Schedule Timings</h4>
											<div class="profile-box">
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


													<div class="col-lg-4">
														<div class="form-group">               
															<label>Timing Slot Duration</label>
															<select class="select form-control shedule_duration" required="" name="shedule_duration">
																<option value=''>Select Duration</option>
																<option value="1">1 mins</option>
																<option value="2">2 mins</option>
																<option value="5">5 mins</option>
																<option value="10">10 mins</option>
																<option value="15">15 mins</option>
																<option value="20">20 mins</option>
																<option value="30">30 mins</option>  
																<option value="45">45 mins</option>
															</select>
														</div>
													</div>

												</div>     
												<div class="row">
													<div class="col-md-12">
														<div class="card schedule-widget mb-0">
														
															<!-- Schedule Header -->
															<div class="schedule-header">
															
																<!-- Schedule Nav -->
																<div class="schedule-nav">
																	<ul class="nav nav-tabs nav-justified">
																		<li class="nav-item">
																			<a class="nav-link active" data-toggle="tab" href="#slot_sunday">Sunday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link " data-toggle="tab" href="#slot_monday">Monday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_tuesday">Tuesday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_wednesday">Wednesday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_thursday">Thursday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_friday">Friday</a>
																		</li>
																		<li class="nav-item">
																			<a class="nav-link" data-toggle="tab" href="#slot_saturday">Saturday</a>
																		</li>
																	</ul>
																</div>
																<!-- /Schedule Nav -->
																
															</div>
															<!-- /Schedule Header -->
															
															<!-- Schedule Content -->
															<div class="tab-content schedule-cont">
															
																<!-- Sunday Slot -->
																<div id="slot_sunday" class="tab-pane fade show active">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" days="sunday" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																<?php 
																if(!empty($list[0]->sunday_start_time)){ ?>
																	<div class="doc-times">
																   <?php 
																	$start_time = json_decode($list[0]->sunday_start_time,true);
																	$end_time   = json_decode($list[0]->sunday_end_time,true);
																	foreach ($start_time as $key => $value) { ?>
																		<div class="doc-slot-list">
																			<?php echo $start_time[$key]." - ". $end_time[$key]; ?>
																			<a href="javascript:void(0)" class="delete_schedule">
																				<!-- <i class="fa fa-times"></i> -->
																			</a>
																		</div>
																	<?php } ?>
																	</div>

																<?php }else{ ?>
																	<p class="text-muted mb-0">Not Available</p>

																<?php } ?>
																		
																		
																</div>
																<!-- /Sunday Slot -->

																<!-- Monday Slot -->
																<div id="slot_monday" class="tab-pane fade ">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" days="monday" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i>Add Slot</a>
																	</h4>
																	
																	<!-- Slot List -->
																	<?php 
																if(!empty($list[0]->monday_start_time)){ ?>
																	<div class="doc-times">
																   <?php 
																	$start_time = json_decode($list[0]->monday_start_time,true);
																	$end_time   = json_decode($list[0]->monday_end_time,true);
																	foreach ($start_time as $key => $value) { ?>
																		<div class="doc-slot-list">
																			<?php echo $start_time[$key]." - ". $end_time[$key]; ?>
																			<a href="javascript:void(0)" class="delete_schedule">
																				<!-- <i class="fa fa-times"></i> -->
																			</a>
																		</div>
																	<?php } ?>
																	</div>

																<?php }else{ ?>
																	<p class="text-muted mb-0">Not Available</p>

																<?php } ?>
																	<!-- /Slot List -->
																	
																</div>
																<!-- /Monday Slot -->

																<!-- Tuesday Slot -->
																<div id="slot_tuesday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" days="tuesday" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	<?php 
																		if(!empty($list[0]->tuesday_start_time)){ ?>
																			<div class="doc-times">
																		   <?php 
																			$start_time = json_decode($list[0]->tuesday_start_time,true);
																			$end_time   = json_decode($list[0]->tuesday_end_time,true);
																			foreach ($start_time as $key => $value) { ?>
																				<div class="doc-slot-list">
																					<?php echo $start_time[$key]." - ". $end_time[$key]; ?>
																					<a href="javascript:void(0)" class="delete_schedule">
																						<!-- <i class="fa fa-times"></i> -->
																					</a>
																				</div>
																			<?php } ?>
																			</div>

																		<?php }else{ ?>
																			<p class="text-muted mb-0">Not Available</p>

																		<?php } ?>
																</div>
																<!-- /Tuesday Slot -->

																<!-- Wednesday Slot -->
																<div id="slot_wednesday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" days="wednesday" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	<?php 
																		if(!empty($list[0]->wednesday_start_time)){ ?>
																			<div class="doc-times">
																		   <?php 
																			$start_time = json_decode($list[0]->wednesday_start_time,true);
																			$end_time   = json_decode($list[0]->wednesday_end_time,true);
																			foreach ($start_time as $key => $value) { ?>
																				<div class="doc-slot-list">
																					<?php echo $start_time[$key]." - ". $end_time[$key]; ?>
																					<a href="javascript:void(0)" class="delete_schedule">
																						<!-- <i class="fa fa-times"></i> -->
																					</a>
																				</div>
																			<?php } ?>
																			</div>

																		<?php }else{ ?>
																			<p class="text-muted mb-0">Not Available</p>

																		<?php } ?>
																</div>
																<!-- /Wednesday Slot -->

																<!-- Thursday Slot -->
																<div id="slot_thursday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" days="thursday" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	<?php 
																		if(!empty($list[0]->thursday_start_time)){ ?>
																			<div class="doc-times">
																		   <?php 
																			$start_time = json_decode($list[0]->thursday_start_time,true);
																			$end_time   = json_decode($list[0]->thursday_end_time,true);
																			foreach ($start_time as $key => $value) { ?>
																				<div class="doc-slot-list">
																					<?php echo $start_time[$key]." - ". $end_time[$key]; ?>
																					<a href="javascript:void(0)" class="delete_schedule">
																						<!-- <i class="fa fa-times"></i> -->
																					</a>
																				</div>
																			<?php } ?>
																			</div>

																		<?php }else{ ?>
																			<p class="text-muted mb-0">Not Available</p>

																		<?php } ?>
																</div>
																<!-- /Thursday Slot -->

																<!-- Friday Slot -->
																<div id="slot_friday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" days="friday" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	<?php 
																		if(!empty($list[0]->friday_start_time)){ ?>
																			<div class="doc-times">
																		   <?php 
																			$start_time = json_decode($list[0]->friday_start_time,true);
																			$end_time   = json_decode($list[0]->friday_end_time,true);
																			foreach ($start_time as $key => $value) { ?>
																				<div class="doc-slot-list">
																					<?php echo $start_time[$key]." - ". $end_time[$key]; ?>
																					<a href="javascript:void(0)" class="delete_schedule">
																						<!-- <i class="fa fa-times"></i> -->
																					</a>
																				</div>
																			<?php } ?>
																			</div>

																		<?php }else{ ?>
																			<p class="text-muted mb-0">Not Available</p>

																		<?php } ?>
																</div>
																<!-- /Friday Slot -->

																<!-- Saturday Slot -->
																<div id="slot_saturday" class="tab-pane fade">
																	<h4 class="card-title d-flex justify-content-between">
																		<span>Time Slots</span> 
																		<a class="edit-link" days="saturday" data-toggle="modal" href="#add_time_slot"><i class="fa fa-plus-circle"></i> Add Slot</a>
																	</h4>
																	<?php 
																		if(!empty($list[0]->saturday_start_time)){ ?>
																			<div class="doc-times">
																		   <?php 
																			$start_time = json_decode($list[0]->saturday_start_time,true);
																			$end_time   = json_decode($list[0]->saturday_end_time,true);
																			foreach ($start_time as $key => $value) { ?>
																				<div class="doc-slot-list">
																					<?php echo $start_time[$key]." - ". $end_time[$key]; ?>
																					<a href="javascript:void(0)" class="delete_schedule">
																						<!-- <i class="fa fa-times"></i> -->
																					</a>
																				</div>
																			<?php } ?>
																			</div>

																		<?php }else{ ?>
																			<p class="text-muted mb-0">Not Available</p>

																		<?php } ?>
																</div>
																<!-- /Saturday Slot -->

															</div>
															<!-- /Schedule Content -->
															
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
								
						</div>
      <!-- /Page Wrapper -->


      	
      @section('scripts')
        <script src="{{asset('template')}}/assets/plugins/select2/js/select2.min.js"></script>
        <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
        <script type="text/javascript">
        	$(function(){
        		$('.shedule_duration').change(function(){
        			var duration = $(this).val();
        		});

        		$('.edit-link').click(function(){
        			var duration  = $('.shedule_duration').val();
        			if(duration==''){
        				alert('please select duration');
        				return false;
        			}
        			var days      = $(this).attr('days');
        			$('.submit_duration').val(duration);
        			$('.submit_days').val(days);
        		});

        		$('body').on('change','.start_time',function(){
        			var index = $(this).index('.start_time');
        			var start = $(this).val();
        			var duration  = parseInt($('.shedule_duration').val());
        			var end = moment.utc(start,'hh:mm').add(duration,'minute').format('LT');
        			$('.end_time').eq(index).val(end);
        		})

        		$('.clone_slot').change(function(){
        			var days = $(this).val();
        			var url  = '<?php echo url('doctor_slot_clone');?>';
        			var slots = '';
        			$.ajax({
					  url: url+"/"+days,
					  success: function(html){
					  	var slot     = html;
					  	for(var p=0;p<slot.length;p++){
					  		slots+='<div class="row form-row hours-cont"><div class="col-12 col-md-10"><div class="row form-row"><div class="col-12 col-md-6"><div class="form-group"><label>Start Time1</label><input type="text" name="start_time[]" value="'+slot[p].start+'" class="form-control start_time" required=""></div></div><div class="col-12 col-md-6"><div class="form-group"><label>End Time</label><input type="text" name="end_time[]" value="'+slot[p].end+'" class="form-control end_time" required=""></div></div></div></div><div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div></div>';
					  	}
					  	$('.hours-info').html(slots);					  	
					  }
					});
        		})
        	})

        </script>
         <div class="modal fade custom-modal" id="add_time_slot">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
          	<div class="row" style="width: 100%;">
          		<div class="col-md-4">
            		<h5 class="modal-title">Add Slots</h5>
          		</div>
          		<div class="col-md-6">
                 <select class="select form-control clone_slot">
																<option value=''>Clone Slot From</option>
																<option value="Sunday">Sunday</option>
																<option value="Monday">Monday</option>
																<option value="Tuesday">Tuesday</option>
																<option value="Wednesday">Wednesday</option>
																<option value="Thursday">Thursday</option>
																<option value="Friday">Friday</option>  
																<option value="Saturday">Saturday</option>
															</select>
				</div> 
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                   </button>
                <!-- </div> -->
			</div>

           
          </div>
          <div class="modal-body">
            <form id="needs-validation" enctype="multipart/form-data" novalidate class="needs-validation" method="post" action="{{ url('doctor_schedule_timings_submit') }}">
          	 <input type="hidden" name="_token" value="{{ csrf_token() }}">
          	 <input type="hidden" name='duration' value="" class="submit_duration">
                      <input type="hidden" name='days' value="" class="submit_days">
              <div class="hours-info">
                <div class="row form-row hours-cont">
                  <div class="col-12 col-md-10">
                    <div class="row form-row">
                      
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label>Start Time</label>
                          <select class="form-control start_time" name="start_time[]" required="">
                            <option>-</option>
                            <option value="<?php echo $start = $list[0]->clinic_open_time;?>"><?php echo $start = $list[0]->clinic_open_time;?> </option>
                            <option value="<?php echo date('H:i', strtotime($start.'+1 hour')); ?>"><?php echo date('H:i', strtotime($start.'+1 hour')); ?></option>  
                            <option value="<?php echo date('H:i', strtotime($start.'+2 hour')); ?>"><?php echo date('H:i', strtotime($start.'+2 hour')); ?></option>
                            <option value="<?php echo date('H:i', strtotime($start.'+3 hour')); ?>"><?php echo date('H:i', strtotime($start.'+3 hour')); ?></option>
                            <option value="<?php echo date('H:i', strtotime($start.'+4 hour')); ?>"><?php echo date('H:i', strtotime($start.'+4 hour')); ?></option>
                            <option value="<?php echo date('H:i', strtotime($start.'+5 hour')); ?>"><?php echo date('H:i', strtotime($start.'+5 hour')); ?></option>
                          </select>
                        </div> 
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label>End Time</label>
                          <input type="text" name="end_time[]" value="" class="form-control end_time" required="">
                       <!--    <select class="">
                            <option>-</option>
                          </select> -->
                        </div> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="add-more mb-3">
                <a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
              </div>
              <div class="submit-section text-center">
                <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      @endsection
   
@endsection


