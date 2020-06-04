<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link href="{{asset('template')}}/assets/img/favicon.png" rel="icon">
    <link rel="stylesheet" href="{{asset('template')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="{{asset('template')}}/assets/css/style.css">  
    <style type="text/css">
#mobileshow { 
display:none; 
}
@media screen and (max-width: 500px) {
#mobileshow { 
display:block; }
}
</style>
    <meta http-equiv="Refresh" content="300">
     @yield('styles')
  </head>
  <body>
    <div class="main-wrapper">
      @include('doctor_partials.navbar')
      @include('doctor_partials.sidebar')
      @yield('content')
      @include('doctor_partials.footer')
    </div>
      <!-- Appointment Details Modal -->
    <div class="modal fade custom-modal" id="appt_details">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Appointment Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ul class="info-details">
              <li>
                <div class="details-header">
                  <div class="row">
                    <div class="col-md-6">
                      <span class="title">#APT0001</span>
                      <span class="text">21 Oct 2019 10:00 AM</span>
                    </div>
                    <div class="col-md-6">
                      <div class="text-right">
                        <button type="button" class="btn bg-success-light btn-sm" id="topup_status">Completed</button>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <span class="title">Status:</span>
                <span class="text">Completed</span>
              </li>
              <li>
                <span class="title">Confirm Date:</span>
                <span class="text">29 Jun 2019</span>
              </li>
              <li>
                <span class="title">Paid Amount</span>
                <span class="text">$450</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- /Appointment Details Modal -->
        <!-- Add Time Slot Modal -->
   
    <!-- /Add Time Slot Modal -->
    
    <!-- Edit Time Slot Modal -->
    <div class="modal fade custom-modal" id="edit_time_slot">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Time Slots</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="hours-info">
                <div class="row form-row hours-cont">
                  <div class="col-12 col-md-10">
                    <div class="row form-row">
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label>Start Time</label>
                          <select class="form-control">
                            <option>-</option>
                            <option selected>12.00 am</option>
                            <option>12.30 am</option>  
                            <option>1.00 am</option>
                            <option>1.30 am</option>
                          </select>
                        </div> 
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label>End Time</label>
                          <select class="form-control">
                            <option>-</option>
                            <option>12.00 am</option>
                            <option selected>12.30 am</option>  
                            <option>1.00 am</option>
                            <option>1.30 am</option>
                          </select>
                        </div> 
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row form-row hours-cont">
                  <div class="col-12 col-md-10">
                    <div class="row form-row">
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label>Start Time</label>
                          <select class="form-control">
                            <option>-</option>
                            <option>12.00 am</option>
                            <option selected>12.30 am</option>
                            <option>1.00 am</option>
                            <option>1.30 am</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label>End Time</label>
                          <select class="form-control">
                            <option>-</option>
                            <option>12.00 am</option>
                            <option>12.30 am</option>
                            <option selected>1.00 am</option>
                            <option>1.30 am</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
                </div>
                
                <div class="row form-row hours-cont">
                  <div class="col-12 col-md-10">
                    <div class="row form-row">
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label>Start Time</label>
                          <select class="form-control">
                            <option>-</option>
                            <option>12.00 am</option>
                            <option>12.30 am</option>
                            <option selected>1.00 am</option>
                            <option>1.30 am</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="form-group">
                          <label>End Time</label>
                          <select class="form-control">
                            <option>-</option>
                            <option>12.00 am</option>
                            <option>12.30 am</option>
                            <option>1.00 am</option>
                            <option selected>1.30 am</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>
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
    <!-- /Edit Time Slot Modal -->
    <script src="{{asset('template')}}/assets/js/jquery.min.js"></script>
    <script src="{{asset('template')}}/assets/js/popper.min.js"></script>
    <script src="{{asset('template')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{asset('template')}}/assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
    <script src="{{asset('template')}}/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
    <script src="{{asset('template')}}/assets/js/circle-progress.min.js"></script>
    @yield('scripts')
    <script src="{{asset('template')}}/assets/js/script.js"></script> 
      <script type="text/javascript">
      var path = window.location.pathname;
      $('.dashboard-menu ul li').removeClass('active');
      $('.dashboard-menu ul li a').each( function( index, element ){
          var href = $( this ).attr('href');
          if(href.indexOf(path) !== -1){
            $(this).parent().addClass('active');
          }else{
            $(this).parent().addClass('');
          }
      });
 
    </script>
  </body>
</html>   
