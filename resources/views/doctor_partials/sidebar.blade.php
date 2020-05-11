      <div class="content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
              
              <!-- Profile Sidebar -->
              <div class="profile-sidebar">
                <div class="widget-profile pro-widget-content">
                  <div class="profile-info-widget">
                    <a href="#" class="booking-doc-img">
                      <img src="{{asset('doctor_files')}}/{{ $session->profile_picture }}" alt="User Image">
                    </a>
                    <div class="profile-det-info">
                      <h3>{{ $session->name }}</h3>
                      
                      <div class="patient-details">
                        <h5 class="mb-0">{{ $session->designation }}</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="dashboard-widget">
                  <nav class="dashboard-menu">
                    <ul>
                      <li class="active">
                        <a href="{{ url('doctor_dashboard') }}">
                          <i class="fas fa-columns"></i>
                          <span>Dashboard</span>
                        </a>
                      </li>
                      <li>
                        <a href="{{ url('doctor_appointments') }}">
                          <i class="fas fa-calendar-check"></i>
                          <span>Appointments</span>
                        </a>
                      </li>
                      <li>
                        <a href="{{ url('doctor_patients') }}">
                          <i class="fas fa-user-injured"></i>
                          <span>My Patients</span>
                        </a>
                      </li>
                      <li>
                        <a href="{{ url('doctor_schedule_timings') }}">
                          <i class="fas fa-hourglass-start"></i>
                          <span>Schedule Timings</span>
                        </a>
                      </li>
<!--                       <li>
                        <a href="invoices.html">
                          <i class="fas fa-file-invoice"></i>
                          <span>Invoices</span>
                        </a>
                      </li> -->
  <!--                     <li>
                        <a href="reviews.html">
                          <i class="fas fa-star"></i>
                          <span>Reviews</span>
                        </a>
                      </li> -->
<!--                       <li>
                        <a href="chat-doctor.html">
                          <i class="fas fa-comments"></i>
                          <span>Message</span>
                          <small class="unread-msg">23</small>
                        </a>
                      </li> -->
                      <li>
                        <a href="{{ url('doctor_profile_setting') }}">
                          <i class="fas fa-user-cog"></i>
                          <span>Profile Settings</span>
                        </a>
                      </li>
                      <li>
                        <a href="{{ url('help_desk_profile_setting') }}">
                          <i class="fas fa-user-cog"></i>
                          <span>Front Desk Settings</span>
                        </a>
                      </li>
<!--                       <li>
                        <a href="social-media.html">
                          <i class="fas fa-share-alt"></i>
                          <span>Social Media</span>
                        </a>
                      </li> -->
                      <li>
                        <a href="{{ url('doctor_change_password') }}">
                          <i class="fas fa-lock"></i>
                          <span>Change Password</span>
                        </a>
                      </li>
                      <li>
                        <a href="{{ url('doctor_logout') }}">
                          <i class="fas fa-sign-out-alt"></i>
                          <span>Logout</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <!-- /Profile Sidebar -->
              
            </div>