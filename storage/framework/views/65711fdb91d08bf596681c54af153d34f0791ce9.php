 
<?php $__env->startSection('title','Dashboard'); ?> 
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('template')); ?>/assets/plugins/select2/css/select2.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
		                                                  <?php if(session()->get('success')): ?>
		                                                    <span class="text-success">
		                                                      <?php echo e(session()->get('success')); ?>  
		                                                    </span>
		                                                  <?php endif; ?>
		                                                   <?php if(session()->get('failure')): ?>
		                                                    <span class="text-danger">
		                                                      <?php echo e(session()->get('failure')); ?>  
		                                                    </span>
		                                                  <?php endif; ?>
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
																		<a class="edit-link" days="monday" data-toggle="modal" href="#edit_time_slot"><i class="fa fa-edit mr-1"></i>Edit</a>
																	</h4>
																	
																	<!-- Slot List -->
																	<div class="doc-times">
																		<div class="doc-slot-list">
																			8:00 pm - 11:30 pm
																			<a href="javascript:void(0)" class="delete_schedule">
																				<i class="fa fa-times"></i>
																			</a>
																		</div>
																		<div class="doc-slot-list">
																			11:30 pm - 1:30 pm
																			<a href="javascript:void(0)" class="delete_schedule">
																				<i class="fa fa-times"></i>
																			</a>
																		</div>
																		<div class="doc-slot-list">
																			3:00 pm - 5:00 pm
																			<a href="javascript:void(0)" class="delete_schedule">
																				<i class="fa fa-times"></i>
																			</a>
																		</div>
																		<div class="doc-slot-list">
																			6:00 pm - 11:00 pm
																			<a href="javascript:void(0)" class="delete_schedule">
																				<i class="fa fa-times"></i>
																			</a>
																		</div>
																	</div>
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


      	
      <?php $__env->startSection('scripts'); ?>
        <script src="<?php echo e(asset('template')); ?>/assets/plugins/select2/js/select2.min.js"></script>
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
        	})

        </script>
         <div class="modal fade custom-modal" id="add_time_slot">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Time Slots</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="needs-validation" enctype="multipart/form-data" novalidate class="needs-validation" method="post" action="<?php echo e(url('doctor_schedule_timings_submit')); ?>">
          	 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
              <div class="hours-info">
                <div class="row form-row hours-cont">
                  <div class="col-12 col-md-10">
                    <div class="row form-row">
                      <input type="hidden" name='duration' value="" class="submit_duration">
                      <input type="hidden" name='days' value="" class="submit_days">
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
      <?php $__env->stopSection(); ?>
   
<?php $__env->stopSection(); ?>



<?php echo $__env->make('doctor_master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>