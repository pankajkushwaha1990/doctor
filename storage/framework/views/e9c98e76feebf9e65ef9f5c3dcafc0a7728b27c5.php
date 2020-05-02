      <!-- Page Content -->
      <div class="content">
        <div class="container-fluid">

          <div class="row">
            
            <!-- Profile Sidebar -->
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
              <div class="profile-sidebar">
                <div class="widget-profile pro-widget-content">
                  <div class="profile-info-widget">
                    <a href="#" class="booking-doc-img">
                      <img src="<?php echo e(asset('patient_files')); ?>/<?php echo e($session->profile_picture); ?>" alt="User Image">
                    </a>
                    <div class="profile-det-info">
                      <h3><?php echo e($session->name); ?></h3>
                      <div class="patient-details">
                    <?php 
                       if(!empty($session->date_of_birth)){ 
                         $timestramp = strtotime($session->date_of_birth); 
                         $year = date('Y',$timestramp); ?>
                          <h5><i class="fas fa-birthday-cake"></i> <?php echo date('d M Y',$timestramp); ?>, <?php echo date('Y')-$year;?> Years</h5>
                       <?php }   ?>
                     <?php 
                       if(!empty($session->city)){ ?>                       
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i><?php echo e($session->city); ?> , <?php echo e($session->state); ?></h5>
                    <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="dashboard-widget">
                  <nav class="dashboard-menu">
                    <ul>
                      <li class="active">
                        <a href="<?php echo e(url('patient_dashboard')); ?>">
                          <i class="fas fa-columns"></i>
                          <span>Dashboard</span>
                        </a>
                      </li>
                     <!--  <li>
                        <a href="favourites.html">
                          <i class="fas fa-bookmark"></i>
                          <span>Favourites</span>
                        </a>
                      </li> -->
                     <!--  <li>
                        <a href="chat.html">
                          <i class="fas fa-comments"></i>
                          <span>Message</span>
                          <small class="unread-msg">23</small>
                        </a>
                      </li> -->
                      <li>
                        <a href="<?php echo e(url('patient_profile_setting')); ?>">
                          <i class="fas fa-user-cog"></i>
                          <span>Profile Settings</span>
                        </a>
                      </li>
                      <li>
                        <a href="change-password.html">
                          <i class="fas fa-lock"></i>
                          <span>Change Password</span>
                        </a>
                      </li>
                      <li>
                        <a href="<?php echo e(url('patient_logout')); ?>">
                          <i class="fas fa-sign-out-alt"></i>
                          <span>Logout</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>

              </div>
            </div>
            <!-- / Profile Sidebar -->