 
<?php $__env->startSection('title','Dashboard'); ?> 
<?php $__env->startSection('content'); ?>
      <!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
          
          <!-- Page Header -->
         <!--  <div class="page-header">
            <div class="row">
              <div class="col">
                <h3 class="page-title">Profile</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                  <li class="breadcrumb-item active">Profile</li>
                </ul>
              </div>
            </div>
          </div> -->
          <!-- /Page Header -->
          
          <div class="row">
            <div class="col-md-12">
              <div class="profile-header">
                <div class="row align-items-center">
                  <div class="col-auto profile-image">
                    <a href="#">
                      <img class="rounded-circle" alt="User Image" src="<?php echo e(asset('template/admin')); ?>/assets/img/profiles/avatar-01.jpg">
                    </a>
                  </div>
                  <div class="col ml-md-n2 profile-user-info">
                    <h4 class="user-name mb-0"><?php echo e(ucfirst($list[0]->name)); ?></h4>
                    <h6 class="text-muted"><?php echo e(ucfirst($list[0]->email)); ?></h6>
                    <div class="user-Location"><i class="fa fa-map-marker"></i> <?php echo e(ucfirst($list[0]->state)); ?>, <?php echo e(ucfirst($list[0]->country)); ?></div>
                    <div class="about-text"><?php echo e(ucfirst($list[0]->about_us)); ?></div>
                  </div>
                  <div class="col-auto profile-btn">
                    
                    <a href="#" class="btn btn-primary">
                      Edit
                    </a>
                  </div>
                </div>
              </div>
              <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
                  </li>
                </ul>
              </div>  
              <div class="tab-content profile-tab-cont">
                
                <!-- Personal Details Tab -->
                <div class="tab-pane fade show active" id="per_details_tab">
                
                  <!-- Personal Details -->
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title d-flex justify-content-between">
                            <span>Personal Details</span> 
                            <a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>Edit</a>
                          </h5>
                          <div class="row">
                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Name</p>
                            <p class="col-sm-10"><?php echo e(ucfirst($list[0]->name)); ?></p>
                          </div>
                          <div class="row">
                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Date of Birth</p>
                            <p class="col-sm-10"><?php echo e($list[0]->date_of_birth); ?></p>
                          </div>
                          <div class="row">
                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email ID</p>
                            <p class="col-sm-10"><?php echo e($list[0]->email); ?></p>
                          </div>
                          <div class="row">
                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Mobile</p>
                            <p class="col-sm-10"><?php echo e($list[0]->mobile); ?></p>
                          </div>
                          <div class="row">
                            <p class="col-sm-2 text-muted text-sm-right mb-0">Address</p>
                            <p class="col-sm-10 mb-0"><?php echo e($list[0]->city); ?>,<br>
                            <?php echo e($list[0]->state); ?> - <?php echo e($list[0]->pincode); ?>,<br>
                            <?php echo e($list[0]->country); ?>.</p>
                          </div>
                        </div>
                      </div>
                      
                      <!-- Edit Details Modal -->
                      <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document" >
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Personal Details</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form id="needs-validation" novalidate class="needs-validation" method="post" action="<?php echo e(url('admin_login_submit')); ?>">
                                <div class="row form-row">
                                  <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                      <label>Full Name</label>
                                      <input type="text" class="form-control full_name" name="name" value="<?php echo e($list[0]->name); ?>" required="">
                                    </div>
                                  </div>
                                  <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                      <label>Date of Birth</label>
                                      <div class="cal-icon">
                                        <input type="text" required="" class="form-control date_of_birth" name="date_of_birth" value="<?php echo e($list[0]->date_of_birth); ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                      <label>Email ID</label>
                                      <input type="email" required="" readonly="" disabled="" class="form-control email" name="" value="<?php echo e($list[0]->email); ?>">
                                    </div>
                                  </div>
                                  <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                      <label>Mobile</label>
                                      <input type="text" required="" value="<?php echo e($list[0]->mobile); ?>" class="form-control mobile" name="mobile">
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <h5 class="form-title"><span>Address</span></h5>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group">
                                    <label>Address</label>
                                      <input type="text" required="" class="form-control address" name="address" value="<?php echo e($list[0]->address); ?>">
                                    </div>
                                  </div>
                                  <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                      <label>City</label>
                                      <input type="text" required="" class="form-control city" name="city" value="<?php echo e($list[0]->city); ?>">
                                    </div>
                                  </div>
                                  <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                      <label>State</label>
                                      <input type="text" required="" class="form-control state" name="state" value="<?php echo e($list[0]->state); ?>">
                                    </div>
                                  </div>
                                  <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                      <label>Pin Code</label>
                                      <input type="text" required="" class="form-control pincode" name="pincode" value="<?php echo e($list[0]->pincode); ?>">
                                    </div>
                                  </div>
                                  <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                      <label>Country</label>
                                      <input type="text" required="" class="form-control country" value="<?php echo e($list[0]->country); ?>" name="country">
                                    </div>
                                  </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /Edit Details Modal -->
                      
                    </div>

                  
                  </div>
                  <!-- /Personal Details -->

                </div>
                <!-- /Personal Details Tab -->
                
                <!-- Change Password Tab -->
                <div id="password_tab" class="tab-pane fade">
                
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Change Password</h5>
                      <div class="row">
                        <div class="col-md-10 col-lg-6">
                          <form>
                            <div class="form-group">
                              <label>Old Password</label>
                              <input type="password" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>New Password</label>
                              <input type="password" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Confirm Password</label>
                              <input type="password" class="form-control">
                            </div>
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Change Password Tab -->
                
              </div>
            </div>
          </div>
        
        </div>      
      </div>
      <!-- /Page Wrapper -->
      <?php $__env->startSection('scripts'); ?>
       <script src="<?php echo e(asset('template/admin')); ?>/assets/js/form-validation.js"></script>

       <script type="text/javascript">
         $(function(){
          $('.edit-link').click(function(){
            
          })
         })
       </script>
      <?php $__env->stopSection(); ?>      
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>