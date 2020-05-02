@extends('master') 
@section('title','Dashboard')
@section('content')
<style>
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 13px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
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
          <form role="form" enctype="multipart/form-data" method="post" action="{{ url('user-package-create-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Package For User</h3>
              </div>
               <div class="card-body">
                  <div class="row">
                    <div class="col-md-6" style="border-width: 1px;border-color: black;border-style: solid;">

                      <div class="row">
                       <div class="col-md-12">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Select User *</label>
                            <select class="selectpicker form-control select_user" data-live-search="true" name="user_id" required="">
                              <option value="" >Select User</option>
                               @foreach($users_list as $users)
                                 <option value="{{ $users->id }}" >{{ $users->name }} ({{ $users->mobile }})</option>
                                @endforeach
                            </select>
                            @if ($errors->has('coupon_type')) <p style="color:red;">{{ $errors->first('coupon_type') }}</p> @endif
                          </div>
                       </div>
                     </div>
                     <div class="row">
                       <hr>
                     </div>
                     <div class="row">
                       <div class="col-md-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1">User Name:</label>                           
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="user_name"></label>                           
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Mobile:</label>                           
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="user_mobile"></label>                           
                        </div>
                      </div>
                    </div>
                     <div class="row">

                       <div class="col-md-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1">User Email:</label>                           
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="user_email"></label>                           
                        </div>
                      </div>
                       <div class="col-md-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1">User City:</label>                           
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="user_city"></label>                           
                        </div>
                      </div>
                    </div>
                     <div class="row">

                       <div class="col-md-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1">User State:</label>                           
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="user_state"></label>                           
                        </div>
                      </div>
                    </div>
                    </div>
                    <div class="col-md-6" style="border-width: 1px;border-color: black;border-style: solid;">
                       <div class="col-md-12">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Select Package *</label>
                            <select class="selectpicker form-control select_package" data-live-search="true" name="package_id" required="">
                              <option value="" >Select Package</option>

                               @foreach($packages_list as $packages)
                                 <option value="{{ $packages->id }}" >{{ $packages->package_name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('coupon_type')) <p style="color:red;">{{ $errors->first('coupon_type') }}</p> @endif
                          </div>
                       </div>

                       <div class="row">
                       <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Package Name:</label>                           
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="package_name"></label>                           
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Days/Night:</label>                           
                        </div>
                      </div>
                       <div class="col-md-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="package_days_night"></label>                           
                        </div>
                      </div>
                    </div>

                     <div class="row">
                       <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Package Cost:</label>                           
                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="package_cost"></label>
                          <input type="hidden" name="package_cost" class="package_cost_only" value="">                           
                          <input type="hidden" name="package_cost" class="final_cost_with_iternity" value="">                           
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Limit:</label>                           
                        </div>
                      </div>
                       <div class="col-md-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="package_limit"></label>                           
                        </div>
                      </div>
                    </div>

                    <div class="row">
                       <div class="col-md-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Amenities:</label>                           
                        </div>
                      </div>
                       <div class="col-md-9">
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="amenities_list"></label>                           
                        </div>
                      </div>
                     </div> 
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Flight List:</label>                           
                        </div>
                      </div>
                       <div class="col-md-5">
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="flight_list"></label>                           
                        </div>
                      </div>
                       <div class="col-md-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Hotel:</label>                           
                        </div>
                      </div>
                       <div class="col-md-1">
                        <div class="form-group">
                          <label for="exampleInputEmail1" class="hotel_category"></label>                           
                        </div>
                      </div>
                    </div>

                    <div class="row">                    
                       <div class="col-md-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Iternity :</label>                           
                        </div>
                      </div>
                       <div class="col-md-9">
                        <div class="form-group">
                           <div class="form-group itinerary_add">
                          </div>                           
                        </div>
                      </div>
                    </div>

                   <div class="row coupon_show_hide" style="display: none;">                    
                       <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Coupon:</label>                           
                        </div>
                      </div>
                       <div class="col-md-7">
                        <div class="form-group">
                            <select class="selectpicker form-control select_coupon" data-live-search="true" name="coupon_code">
                              <option value="" >Select Coupon</option>
                              <option value="NoCoupons" >Coupon Discard</option>
                               @foreach($coupon_list as $packages)
                                 @if($packages->coupon_type=='percentage')
                                  <option datas="<?php echo base64_encode(json_encode($packages));?>" value="{{ $packages->coupon_code }}" >{{ $packages->coupon_code }} {{ $packages->coupon_value }}%</option>
                                 @else
                                  <option datas="<?php echo base64_encode(json_encode($packages));?>" value="{{ $packages->coupon_code }}" >{{ $packages->coupon_code }} (-) {{ $packages->coupon_value }}</option>
                                 @endif 
                                @endforeach
                            </select>
                          </div>                           
                        </div>
                         <div class="col-md-2">
                   <div class="form-group">
                    <button class="btn btn-success" type="button">Apply</button>
                  </div>
                </div>
                      </div>
                    </div>
                     



                    </div>
                  </div>

               
 

              <div class="row">
                <div class="col-md-6">
                  
                </div>
                <div class="col-md-2">
                   <div class="form-group">
                          <label for="exampleInputEmail1">Final Amount:</label>                           
                        </div>
                </div>
                <div class="col-md-3">
                   <div class="form-group">
                          <label for="exampleInputEmail1" class="final_cost"></label>                           
                          <input type="hidden" class="package_iternity_default" value="">                           
                        </div>
                </div>
                <div class="col-md-1">
                   <div class="form-group">
                    <button class="btn btn-success">Submit</button>
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
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
  <script type="text/javascript">
    $(function(){
      $('.select_user').change(function(){
        var user_id = $(this).val();
        if(user_id!=''){
          $.ajax('<?php echo url('ajax-user-details-by-id');?>', {
                type: 'GET',  // http method
                data: { user_id:user_id },  // data to submit
                success: function (data, status, xhr) {
                    var user = $.parseJSON(data);
                    $('.user_name').text(user.name);
                    $('.user_mobile').text(user.mobile);
                    $('.user_email').text(user.email);
                    $('.user_city').text(user.city);
                    $('.user_state').text(user.state);
                },
                error: function (jqXhr, textStatus, errorMessage) {
                        alert('Please Select User Again');
                }
            });
        }
      })
    })
  </script>
  <script type="text/javascript">
    $(function(){
      $('.select_package').change(function(){
        var package_id = $(this).val();
        if(package_id!=''){
          $.ajax('<?php echo url('ajax-package-details-by-id');?>', {
                type: 'GET',  // http method
                data: { package_id:package_id },  // data to submit
                success: function (data, status, xhr) {
                    var package = $.parseJSON(data);
                    $('.package_name').text(package.package_name);
                    $('.package_days_night').text(package.package_days+" /"+package.package_night);
                    $('.package_cost').text(package.package_cost);
                    $('.package_cost_only').val(package.package_cost);
                    $('.package_limit').text(package.package_purchase_limit);
                    $('.hotel_category').text(package.hotel_category+" *");
                    var final_cost = 0;
                        final_cost += parseInt(package.package_cost);
                    var amenities = package.amenities;
                    var amenities_html = '';
                    for(var a=0;a<package.amenities.length;a++){
                        amenities_html += '<button type="button" style="padding: 2px;margin: 1px;" class="btn btn-primary btn-sm">'+amenities[a].amenities_name+'</button>' ;
                    }
                    $('.amenities_list').html(amenities_html);
                    var flights      = package.flights;
                    var flights_html = '';
                     for(var a=0;a<package.flights.length;a++){
                        flights_html += '<button type="button" style="padding: 2px;margin: 1px;" class="btn btn-primary btn-sm">'+flights[a].flight_name+'</button>' ;
                    }
                    $('.flight_list').html(flights_html);

                    var itinerary      = package.itinerary;
                    var itinerary_html = '';
                    var itinerary_add_html = '';
                     for(var a=0;a<package.itinerary.length;a++){
                       if(itinerary[a].itinerary_default_status=='0'){
                        var strings_value =  btoa(JSON.stringify(itinerary[a]));
                        itinerary_add_html += '<label class="container">'+itinerary[a].itinerary_title+' ('+itinerary[a].itinerary_cost+')<input type="checkbox" disabled readonly checked="checked" value='+strings_value+'><span class="checkmark"></span></label><input type="hidden" value='+strings_value+' name="itinerary_add[]">';
                        final_cost += parseInt(itinerary[a].itinerary_cost);

                       }else{
                        var strings_value = btoa(JSON.stringify(itinerary[a]));

                           itinerary_add_html += '<label class="container">'+itinerary[a].itinerary_title+' ('+itinerary[a].itinerary_cost+')<input type="checkbox" name="itinerary_add[]" class="itinerary_add_class" new_cost="'+itinerary[a].itinerary_cost+'" value='+strings_value+'><span class="checkmark"></span></label>';
                       }
                    }
                    $('.itinerary_list').html(itinerary_html);
                    $('.itinerary_add').html(itinerary_add_html);
                    $('.final_cost').html(final_cost);
                    $('.package_iternity_default').val(final_cost);
                    $('.coupon_show_hide').show();


                    
                    // $('.user_city').text(user.city);
                    // $('.user_state').text(user.state);
                },
                error: function (jqXhr, textStatus, errorMessage) {
                        alert('Please Select User Again');
                }
            });
        }
      })
    })
  </script>
  <script type="text/javascript">
    $(function(){
        $('body').on('click','.itinerary_add_class',function(){
           var additiona_cost = 0;
           $('.itinerary_add_class:checked').each(function( index ) {
              additiona_cost += parseInt($( this ).attr('new_cost'));
           });
           var final_cost = parseInt($('.package_iternity_default').val());
           $('.final_cost').html(final_cost+additiona_cost);
           $('.final_cost_with_iternity').val(final_cost+additiona_cost);
           $('.select_coupon').change();
        })
    })
  </script>
  <script type="text/javascript">
    $(function(){
      $('.select_coupon').change(function(){
        var coupon_code = $(this).val();
        if(coupon_code!='' && coupon_code!='NoCoupons'){
         var coupon_details = $(".select_coupon option:selected").attr('datas');
         var couponJson     = $.parseJSON(atob(coupon_details));
         if(couponJson.coupon_type=='percentage'){
          var costs   =  parseInt($('.final_cost_with_iternity').val());
          if(isNaN(costs)==true){
             costs   =  parseInt($('.package_iternity_default').val());
             console.log(costs);
          }
          var finalCost = (costs-(costs*couponJson.coupon_value)/100);
           $('.final_cost').html(finalCost);           
         }else{
          var costs   =  parseInt($('.final_cost_with_iternity').val());
          if(isNaN(costs)==true){
             costs   =  parseInt($('.package_iternity_default').val());
          }
          var finalCost = costs-couponJson.coupon_value;
           $('.final_cost').html(finalCost); 
         }
        }else if(coupon_code=='NoCoupons'){
           var costs   =  parseInt($('.final_cost_with_iternity').val());
           $('.final_cost').html(costs);
        }
      })
    })
  </script>
  @section('scripts')
   <script type="text/javascript">
     $('select.pankaj').selectpicker(); 
   </script>
  @endsection

  @endsection