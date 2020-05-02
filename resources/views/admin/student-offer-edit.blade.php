@extends('master') 


@section('styles')
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
@endsection


@section('title','Dashboard')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  <section class="content">
      <div class="row">
          <div class="col-md-12">
          <form role="form" method="post" action="{{ url('student-offer-edit-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Offer Letter</h3>
              </div>
               <div class="card-body">
<div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title *</label>
                    <div>{{ $agent->title }}</div>
                    @if ($errors->has('title')) <p style="color:red;">{{ $errors->first('title') }}</p> @endif

                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Surname *</label>
                    <div>{{ $agent->surname }}<input type="hidden" name="student_id" value="{{ base64_encode($agent->student_id) }}"></div>
                    @if ($errors->has('surname')) <p style="color:red;">{{ $errors->first('surname') }}</p> @endif
                  </div>
                </div>
              <div class="col-md-2">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Given Name*</label>
                    <div>{{ $agent->given_name }}</div>
                    @if ($errors->has('given_name')) <p style="color:red;">{{ $errors->first('given_name') }}</p> @endif
                  </div>
                </div>
                <div class="col-md-2">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Date Of Birth *</label>
                    <div>{{ $agent->date_of_birth }}</div>
                    @if ($errors->has('date_of_birth')) <p style="color:red;">{{ $errors->first('date_of_birth') }}</p> @endif
                  </div>
                </div>
                <div class="col-md-2">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Created By Name *</label>
                    <div>{{ $agent->name }}<input type="hidden" name="agent_id" value="{{ $agent->created_by_id }}"></div>
                    @if ($errors->has('date_of_birth')) <p style="color:red;">{{ $errors->first('date_of_birth') }}</p> @endif
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Offer No *</label>
                    <input name="offer_no" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Offer No." value="{{ $agent->assign_id }}" required="" readonly="">
                    @if ($errors->has('offer_no')) <p style="color:red;">{{ $errors->first('offer_no') }}</p> @endif
                  </div>
                </div>

                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Date Of Issue *</label>
                    <input name="date_of_issue" type="text" class="form-control datepicker" id="exampleInputEmail1" placeholder="Enter Date Of Issue" value="{{ $agent->date_of_issue }}" required="">
                    @if ($errors->has('date_of_issue')) <p style="color:red;">{{ $errors->first('date_of_issue') }}</p> @endif
                  </div>
                </div>

                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Orientation Date *</label>
                    <input name="orientation_date" type="text" class="form-control datepicker" id="exampleInputEmail1" placeholder="Enter Orientation Date" value="{{ $agent->orientation_date }}" required="">
                    @if ($errors->has('orientation_date')) <p style="color:red;">{{ $errors->first('orientation_date') }}</p> @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <table class="table">
                    <thead>
                      <tr>
                        <th>Code</th>
                        <th>Course Name</th>
                        <th style="width: 200px;">Duration (Week)</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Tuition Fee</th>
                        <th>Material Fee</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $courseDet = json_decode($agent->course_details,true);
                    $final     = array();
                    foreach ($courseDet as $key => $courseses) {
                      foreach ($courseses as $keys => $lists) {
                         $final[$keys] = $keys."||".$lists;
                      }
                    }
                   ?>
                      @foreach($courses as $course)
                      <tr>
                        <?php 
                        ?>
                          <td>{{$course->course_code}}<input type="hidden" class="form-control" value="{{$course->course_code}}" name="course_code[]"></td>
                          <td>{{$course->course_name }}<input type="hidden" name="course_name[]" class="form-control" value="{{$course->course_name}}" required=""></td>
                          <td>

                             <?php 
                              $weeks          = explode('/',$course->course_duration);
                              $course_amount  = explode('/',$course->course_amount);
                              $material_amount = explode('/',$course->material_amount);
                              $checked = "";     
                              $selcted = 0;                     

                                $coursa  = 0;
                                $materialwa = 0;
                                $finalWeek = 0;
                              foreach ($weeks as $key => $week) {
                                $match = $course->course_code."||".$week."||".$course_amount[$key]."||".$material_amount[$key]."||". $selcted;
                                if(in_array($match, $final)){
                                  $checked = "checked";
                                  $finalWeek = $week;
                                  $coursa = $course_amount[$key];
                                  $materialwa = $material_amount[$key];
                                }

                              ?>
                                <input <?php echo $checked;?>  type="radio" name="course_duration[]{{$course->course_code}}" value="{{ $week }}" id="{{ $course->course_code.$week }}" class="course_duration" perWeek="<?php echo (float) ($course_amount[$key]/$week);?>" MaterialFee="{{$material_amount[$key]}}">
                                <label for="{{ $course->course_code.$week }}"><?php echo $week;?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                              <?php $selcted++; $checked = ''; } ?>
                          </td>
                          <td><input type="text" name="start_date[]" class="form-control start_date" value="{{ date('Y-m-d') }}" required="" perWeek="<?php echo (float) ($coursa/$week);?>" data-date-format="yyyy-mm-dd"></td>
                          <td><input type="text" readonly="" name="end_date[]" class="form-control" value="{{ date('Y-m-d',strtotime('+'.$finalWeek.' weeks', strtotime(date('Y-m-d')))) }}" required=""></td>
                          <td><input type="text" readonly="" name="course_amount[]" class="form-control" value="{{$coursa}}" required=""></td>
                          <td><input type="text" readonly="" name="material_amount[]" class="form-control" value="{{$materialwa}}" required=""></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>



              <?php 
              if(!empty($agent->require_assistance)){
                if(in_array('Yes',json_decode($agent->require_assistance,true))){
                 ?>
              <div class="row">
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Homestay Week *</label>
                    <input name="homestay_week" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Week" value="{{ $agent->homestay_week }}" required="">
                    @if ($errors->has('homestay_week')) <p style="color:red;">{{ $errors->first('homestay_week') }}</p> @endif
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Placement fee *</label>
                    <input name="placement_amount" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Placement Fee" value="{{ $agent->placement_amount }}" required="">
                    @if ($errors->has('placement_amount')) <p style="color:red;">{{ $errors->first('placement_amount') }}</p> @endif
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Homestay fee *</label>
                    <input name="homestay_amount" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Homestay Fee" value="{{ $agent->homestay_amount }}" required="">
                    @if ($errors->has('homestay_amount')) <p style="color:red;">{{ $errors->first('homestay_amount') }}</p> @endif
                  </div>
                </div>
              </div>
                 
               <?php }
              }
              ?>

                          <div class="row">
              <?php 
              if(!empty($agent->require_airport)){
                if(in_array('Yes',json_decode($agent->require_airport,true))){ ?>
                  <div class="col-md-6">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Airport Pickup Fee*</label>
                    <input name="airport_amount" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Ariport Amount" value="{{ $agent->airport_amount }}" required="">
                    @if ($errors->has('airport_amount')) <p style="color:red;">{{ $errors->first('airport_amount') }}</p> @endif
                  </div>
                </div>                 
               <?php }
              }
              ?>
              <?php 
              if(!empty($agent->health_cover)){
                if($agent->health_cover=='Yes'){ ?>
                <div class="col-md-6">
                   <div class="form-group">
                    <label for="exampleInputEmail1">OSHC Amount *</label>
                    <input name="oshc_amount" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter OSHC Amount" value="{{ $setting->oshc_amount }}" required="">
                    @if ($errors->has('oshc_amount')) <p style="color:red;">{{ $errors->first('oshc_amount') }}</p> @endif
                  </div>
                </div>
                 
               <?php }
              }
              ?>
            </div>
<input name="application_fee" type="hidden" value="{{ $setting->application_fee }}" required="">
              <div class="row">
                  <div class="col-md-6">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Prior to issuance of COE Minimum Balance*</label>
                    <input name="prior_amount" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter COE Amount" value="{{ $agent->prior_amount }}" required="">
                    @if ($errors->has('prior_amount')) <p style="color:red;">{{ $errors->first('prior_amount') }}</p> @endif
                  </div>
                </div>

                <div class="col-md-6">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Discount *</label>
                    <input name="discount_amount" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Discount" value="{{ $agent->discount_amount }}" required="">
                    @if ($errors->has('discount_amount')) <p style="color:red;">{{ $errors->first('discount_amount') }}</p> @endif
                  </div>
                </div>
              </div>



























             
              <div class="row">
                <div class="col-md-11">
                  
                </div>
                <div class="col-md-1">
                   <div class="form-group">
                    <button type="Submit" class="btn btn-success">Submit</button>
                  </div>
                </div>

              </div>
            </div>
              <!-- /.card-header -->
              <!-- form start -->
              </form>
            </div>
          </div>
            <!-- /.card -->

          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  @endsection
@section('scripts')
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
    $(function(){
      $('.course_duration').click(function(){
        var new_duration = $(this).val();
        var per_week_fee = parseFloat($(this).attr('perWeek'));
        var materialfee = parseFloat($(this).attr('materialfee'));
        var final_course_fee = parseFloat(new_duration*per_week_fee);
        $(this).parent().next().next().next().children().val(final_course_fee);
        $(this).parent().next().next().next().next().children().val(materialfee);

        var StartDate = new Date($(this).parent().next().children().val());
        var date = add_weeks(StartDate,new_duration);  
        $(this).parent().next().next().children().val(date);



      })
    })
  </script>
<script type="text/javascript">
 function add_weeks(dt, n){
    return formatDate(new Date(dt.setDate(dt.getDate() + (n * 7))));      
 }
 function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}
                $(function () {
                    $('.start_date').datepicker({autoclose: true,startDate: '-0d'}).on('changeDate', function(ev){
                        var SelectedDate = new Date(ev.date);
                        var SelectedWeek = $(this).parent().prev().children().filter(':checked').val();
                        
                        var date = add_weeks(SelectedDate,SelectedWeek);                         
                        $(this).parent().next().children().val(date);
                      });
                });
$('.datepicker').datepicker({
              format: 'dd/mm/yyyy'
           });
</script>
  @endsection
