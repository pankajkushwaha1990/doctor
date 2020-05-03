@include('public/navbar')
            <!-- /Header -->
            
            <!-- Home Banner -->
            <section class="section section-search">
                <div class="container-fluid">
                    <div class="banner-wrapper">
                        <div class="banner-header text-center">
                            <h1>Search Doctor, Make an Appointment</h1>
                            <p>Discover the best doctors, clinic & hospital the city nearest to you.</p>
                        </div>
                         
                        <!-- Search -->
                        <div class="search-box">
                            <form  role="form" enctype="multipart/form-data" method="get" action="{{ url('search_doctor') }}">
                                <div class="form-group search-location">
                                    <input type="text" class="form-control" placeholder="Search Location" name="location">
                                    <span class="form-text">Based on your Location</span>
                                </div>
                                <div class="form-group search-info">
                                    <input type="text" class="form-control" name="keywords" placeholder="Search Doctors, Clinics, Hospitals, Diseases Etc">
                                    <span class="form-text">Ex : Dental or Sugar Check up etc</span>
                                </div>
                                <button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Search</span></button>
                            </form>
                        </div>
                        <!-- /Search -->
                        
                    </div>
                </div>
            </section>
            <!-- /Home Banner -->
              
            <!-- Clinic and Specialities -->
<!--             <section class="section section-specialities">
                <div class="container-fluid">
                    <div class="section-header text-center">
                        <h2>Clinic and Specialities</h2>
                        <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-9"> -->
                            <!-- Slider -->
                            <!-- <div class="specialities-slider slider"> -->
                            
                                <!-- Slider Item -->
<!--                                 <div class="speicality-item text-center">
                                    <div class="speicality-img">
                                        <img src="{{asset('template/')}}/assets/img/specialities/specialities-01.png" class="img-fluid" alt="Speciality">
                                        <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                    </div>
                                    <p>Urology</p>
                                </div>   -->
                                <!-- /Slider Item -->
                                
                                <!-- Slider Item -->
<!--                                 <div class="speicality-item text-center">
                                    <div class="speicality-img">
                                        <img src="{{asset('template/')}}/assets/img/specialities/specialities-02.png" class="img-fluid" alt="Speciality">
                                        <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                    </div>
                                    <p>Neurology</p>    
                                </div>  -->                         
                                <!-- /Slider Item -->
                                
                                <!-- Slider Item -->
   <!--                              <div class="speicality-item text-center">
                                    <div class="speicality-img">
                                        <img src="{{asset('template/')}}/assets/img/specialities/specialities-03.png" class="img-fluid" alt="Speciality">
                                        <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                    </div>  
                                    <p>Orthopedic</p>   
                                </div>   -->                        
                                <!-- /Slider Item -->
                                
                                <!-- Slider Item -->
<!--                                 <div class="speicality-item text-center">
                                    <div class="speicality-img">
                                        <img src="{{asset('template/')}}/assets/img/specialities/specialities-04.png" class="img-fluid" alt="Speciality">
                                        <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                    </div>  
                                    <p>Cardiologist</p> 
                                </div>   -->                        
                                <!-- /Slider Item -->
                                
                                <!-- Slider Item -->
<!--                                 <div class="speicality-item text-center">
                                    <div class="speicality-img">
                                        <img src="{{asset('template/')}}/assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">
                                        <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                    </div>  
                                    <p>Dentist</p>
                                </div>     -->                      
                                <!-- /Slider Item -->
                                
                            <!-- </div> -->
                            <!-- /Slider -->
                            
<!--                         </div>
                    </div>
                </div>   
            </section>   --> 
            <!-- Clinic and Specialities -->
          
            <!-- Popular Section -->

                                @if(!empty($list))
                                            <section class="section section-doctor">
                <div class="container-fluid">
                   <div class="row">
<!--                         <div class="col-lg-4">
                            <div class="section-header ">
                                <h2>Book Our Doctor</h2>
                                <p>Lorem Ipsum is simply dummy text </p>
                            </div>
                            <div class="about-content">
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
                                <p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes</p>                 
                                <a href="javascript:;">Read More..</a>
                            </div>
                        </div> -->
                        <div class="col-lg-12">
                            <div class="doctor-slider slider">
                                @foreach($list as $doctor)
                            
                                <!-- Doctor Widget -->
                                <div class="profile-widget">
                                    <div class="doc-img">
                                        <a href="{{ url('doctor_profile_view') }}/{{ base64_encode(base64_encode($doctor->id)) }}">
                                            <img class="img-fluid" alt="User Image" src="{{asset('doctor_files')}}/{{ $doctor->profile_picture }}">
                                        </a>
                                        <a href="javascript:void(0)" class="fav-btn">
                                            <i class="far fa-bookmark"></i>
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="{{ url('doctor_profile_view') }}/{{ base64_encode(base64_encode($doctor->id)) }}">{{ $doctor->name }}</a> 
                                            <i class="fas fa-check-circle verified"></i>
                                        </h3>
                                        <p class="speciality">{{ $doctor->designation }}</p>
                                       <!--  <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <span class="d-inline-block average-rating">(17)</span>
                                        </div> -->
                                        
                                        <ul class="available-info">
                                            <li>
                                                <i class="fas fa-map-marker-alt"></i>{{ ucfirst($doctor->clinic_city) }},{{ ucfirst($doctor->clinic_state) }}
                                            </li>
                                            <li style="font-size: 12px;">
                                                <i class="far fa-clock"></i> Available on {{ ucfirst(date("h:i A", strtotime($doctor->clinic_open_time.' GMT+5:30'))) }} - {{ ucfirst(date("h:i A", strtotime($doctor->clinic_close_time.' GMT+5:30'))) }} 
                                            </li>
                                            <!-- <li>
                                                <i class="far fa-money-bill-alt"></i> $300 - $1000 
                                                <i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
                                            </li> -->
                                        </ul>
                                        <div class="row row-sm">
                                            <div class="col-6">
                                                <a href="{{ url('doctor_profile_view') }}/{{ base64_encode(base64_encode($doctor->id)) }}" class="btn view-btn">View Profile</a>
                                            </div>
                                            <div class="col-6">
                                                <a href="{{ url('doctor_appointment_booking') }}/{{ base64_encode(base64_encode($doctor->id)) }}?appointment_date={{ date('Y-m-d') }}" class="btn book-btn">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Doctor Widget -->
                                @endforeach
                                  </div>
                        </div>
                   </div>
                </div>
            </section>
                               @endif
                                
                          
            <!-- /Popular Section -->
           
           <!-- Availabe Features -->
           <section class="section section-features">
                <div class="container-fluid">
                   <div class="row">
                        <div class="col-md-5 features-img">
                            <img src="{{asset('template/')}}/assets/img/features/feature.png" class="img-fluid" alt="Feature">
                        </div>
                        <div class="col-md-7">
                            <div class="section-header">    
                                <h2 class="mt-2">Availabe Features in Our Clinic</h2>
                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                            </div>  
                            <div class="features-slider slider">
                                <!-- Slider Item -->
                                <div class="feature-item text-center">
                                    <img src="{{asset('template/')}}/assets/img/features/feature-01.jpg" class="img-fluid" alt="Feature">
                                    <p>Patient Ward</p>
                                </div>
                                <!-- /Slider Item -->
                                
                                <!-- Slider Item -->
                                <div class="feature-item text-center">
                                    <img src="{{asset('template/')}}/assets/img/features/feature-02.jpg" class="img-fluid" alt="Feature">
                                    <p>Test Room</p>
                                </div>
                                <!-- /Slider Item -->
                                
                                <!-- Slider Item -->
                                <div class="feature-item text-center">
                                    <img src="{{asset('template/')}}/assets/img/features/feature-03.jpg" class="img-fluid" alt="Feature">
                                    <p>ICU</p>
                                </div>
                                <!-- /Slider Item -->
                                
                                <!-- Slider Item -->
                                <div class="feature-item text-center">
                                    <img src="{{asset('template/')}}/assets/img/features/feature-04.jpg" class="img-fluid" alt="Feature">
                                    <p>Laboratory</p>
                                </div>
                                <!-- /Slider Item -->
                                
                                <!-- Slider Item -->
                                <div class="feature-item text-center">
                                    <img src="{{asset('template/')}}/assets/img/features/feature-05.jpg" class="img-fluid" alt="Feature">
                                    <p>Operation</p>
                                </div>
                                <!-- /Slider Item -->
                                
                                <!-- Slider Item -->
                                <div class="feature-item text-center">
                                    <img src="{{asset('template/')}}/assets/img/features/feature-06.jpg" class="img-fluid" alt="Feature">
                                    <p>Medical</p>
                                </div>
                                <!-- /Slider Item -->
                            </div>
                        </div>
                   </div>
                </div>
            </section>      
            <!-- /Availabe Features -->
            
            <!-- Blog Section -->
           <section class="section section-blogs">
                <div class="container-fluid">
                
                    <!-- Section Header -->
                    <div class="section-header text-center">
                        <h2>Blogs and News</h2>
                        <p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <!-- /Section Header -->
                    
                    <div class="row blog-grid-row">
                        <div class="col-md-6 col-lg-3 col-sm-12">
                        
                            <!-- Blog Post -->
                            <div class="blog grid-blog">
                                <div class="blog-image">
                                    <a href="blog-details.html"><img class="img-fluid" src="{{asset('template/')}}/assets/img/blog/blog-01.jpg" alt="Post Image"></a>
                                </div>
                                <div class="blog-content">
                                    <ul class="entry-meta meta-item">
                                        <li>
                                            <div class="post-author">
                                                <a href="doctor-profile.html"><img src="{{asset('template/')}}/assets/img/doctors/doctor-thumb-01.jpg" alt="Post Author"> <span>Dr. Ruby Perrin</span></a>
                                            </div>
                                        </li>
                                        <li><i class="far fa-clock"></i> 4 Dec 2019</li>
                                    </ul>
                                    <h3 class="blog-title"><a href="blog-details.html">Doccure – Making your clinic painless visit?</a></h3>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
                                </div>
                            </div>
                            <!-- /Blog Post -->
                            
                        </div>
                        <div class="col-md-6 col-lg-3 col-sm-12">
                        
                            <!-- Blog Post -->
                            <div class="blog grid-blog">
                                <div class="blog-image">
                                    <a href="blog-details.html"><img class="img-fluid" src="{{asset('template/')}}/assets/img/blog/blog-02.jpg" alt="Post Image"></a>
                                </div>
                                <div class="blog-content">
                                    <ul class="entry-meta meta-item">
                                        <li>
                                            <div class="post-author">
                                                <a href="doctor-profile.html"><img src="{{asset('template/')}}/assets/img/doctors/doctor-thumb-02.jpg" alt="Post Author"> <span>Dr. Darren Elder</span></a>
                                            </div>
                                        </li>
                                        <li><i class="far fa-clock"></i> 3 Dec 2019</li>
                                    </ul>
                                    <h3 class="blog-title"><a href="blog-details.html">What are the benefits of Online Doctor Booking?</a></h3>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
                                </div>
                            </div>
                            <!-- /Blog Post -->
                            
                        </div>
                        <div class="col-md-6 col-lg-3 col-sm-12">
                        
                            <!-- Blog Post -->
                            <div class="blog grid-blog">
                                <div class="blog-image">
                                    <a href="blog-details.html"><img class="img-fluid" src="{{asset('template/')}}/assets/img/blog/blog-03.jpg" alt="Post Image"></a>
                                </div>
                                <div class="blog-content">
                                    <ul class="entry-meta meta-item">
                                        <li>
                                            <div class="post-author">
                                                <a href="doctor-profile.html"><img src="{{asset('template/')}}/assets/img/doctors/doctor-thumb-03.jpg" alt="Post Author"> <span>Dr. Deborah Angel</span></a>
                                            </div>
                                        </li>
                                        <li><i class="far fa-clock"></i> 3 Dec 2019</li>
                                    </ul>
                                    <h3 class="blog-title"><a href="blog-details.html">Benefits of consulting with an Online Doctor</a></h3>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
                                </div>
                            </div>
                            <!-- /Blog Post -->
                            
                        </div>
                        <div class="col-md-6 col-lg-3 col-sm-12">
                        
                            <!-- Blog Post -->
                            <div class="blog grid-blog">
                                <div class="blog-image">
                                    <a href="blog-details.html"><img class="img-fluid" src="{{asset('template/')}}/assets/img/blog/blog-04.jpg" alt="Post Image"></a>
                                </div>
                                <div class="blog-content">
                                    <ul class="entry-meta meta-item">
                                        <li>
                                            <div class="post-author">
                                                <a href="doctor-profile.html"><img src="{{asset('template/')}}/assets/img/doctors/doctor-thumb-04.jpg" alt="Post Author"> <span>Dr. Sofia Brient</span></a>
                                            </div>
                                        </li>
                                        <li><i class="far fa-clock"></i> 2 Dec 2019</li>
                                    </ul>
                                    <h3 class="blog-title"><a href="blog-details.html">5 Great reasons to use an Online Doctor</a></h3>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
                                </div>
                            </div>
                            <!-- /Blog Post -->
                            
                        </div>
                    </div>
                    <div class="view-all text-center"> 
                        <a href="blog-list.html" class="btn btn-primary">View All</a>
                    </div>
                </div>
            </section>
            <!-- /Blog Section -->          
            
            <!-- Footer -->
            @include('public/footer')
            <!-- /Footer -->
           
       </div>
       <!-- /Main Wrapper -->
      
        <!-- jQuery -->
        <script src="{{asset('template/')}}/assets/js/jquery.min.js"></script>
        
        <!-- Bootstrap Core JS -->
        <script src="{{asset('template/')}}/assets/js/popper.min.js"></script>
        <script src="{{asset('template/')}}/assets/js/bootstrap.min.js"></script>
        
        <!-- Slick JS -->
        <script src="{{asset('template/')}}/assets/js/slick.js"></script>
        
        <!-- Custom JS -->
        <script src="{{asset('template/')}}/assets/js/script.js"></script>
        
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/template/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Apr 2020 18:08:34 GMT -->
</html>


                
