      <!-- Page Content -->
      <div class="content">
        <div class="container-fluid">

          <div class="row">
            
            <!-- Profile Sidebar -->
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
              <div class="profile-sidebar">
                <div class="widget-profile pro-widget-content">
                  <div class="profile-info-widget">
                    <a href="{{ url('patient_dashboard') }}" class="booking-doc-img">
                      <img src="{{asset('patient_files')}}/{{ $session->profile_picture }}" alt="User Image">
                    </a>
                    <div class="profile-det-info">
                      <h3>{{ $session->name }}</h3>
                      <div class="patient-details">
                    <?php 
                       if(!empty($session->date_of_birth)){ 
                        if(strpos($session->date_of_birth,'/')>0){
                          $dob = explode('/',$session->date_of_birth);
                        }elseif(strpos($session->date_of_birth,'-')>0){
                          $dob = explode('-',$session->date_of_birth);

                        }
                        $session->date_of_birth = $dob[2]."-".$dob[1]."-".$dob[0];
                         $timestramp = strtotime($session->date_of_birth); 
                         $year = date('Y',$timestramp); ?>
                          <h5><i class="fas fa-birthday-cake"></i> <?php echo date('d M Y',$timestramp); ?>, <?php echo date('Y')-$year;?> Years</h5>
                       <?php }   ?>
                     <?php 
                       if(!empty($session->city)){ ?>                       
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i>{{ $session->city }} , {{ $session->state }}</h5>
                    <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="dashboard-widget">
                  <nav class="dashboard-menu">
                    <ul>
                      <li class="active">
                        <a href="{{ url('patient_dashboard') }}">
                          <i class="fas fa-columns"></i>
                          <span>Dashboard</span>
                        </a>
                      </li>
                       <li class="">
                        <a href="{{ url('') }}">
                          <i class="fas fa-columns"></i>
                          <span>Book Appointment</span>
                        </a>
                      </li>
                       <li class="">
                        <a  href="{{ url('patient_my_appointment') }}">
                          <i class="fas fa-columns"></i>
                          <span>My Appointment</span>
                        </a>
                      </li>
                      <li class="">
                        <a  href="{{ url('patient_member') }}">
                          <i class="fas fa-columns"></i>
                          <span>My Member</span>
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
                        <a href="{{ url('patient_profile_setting') }}">
                          <i class="fas fa-user-cog"></i>
                          <span>Profile Settings</span>
                        </a>
                      </li>
                      <li>
                        <a href="patient_change_password">
                          <i class="fas fa-lock"></i>
                          <span>Change Password</span>
                        </a>
                      </li>
                      <li>
                        <a href="{{ url('patient_logout') }}">
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