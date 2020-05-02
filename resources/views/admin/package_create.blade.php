@extends('master') 
@section('title','Dashboard')
@section('content')
<style type="text/css">
 
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
          <form role="form" enctype="multipart/form-data" method="post" action="{{ url('package-create-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Package</h3>
              </div>
               <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Package Name *</label>
                      <input type="text" name="package_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Name" value="{{ old('package_name') }}" required="">
                      @if ($errors->has('package_name')) <p style="color:red;">{{ $errors->first('package_name') }}</p> @endif
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Package Days *</label>
                      <input type="number" name="package_day" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Days" value="{{ old('package_day') }}" required="">
                      @if ($errors->has('package_day')) <p style="color:red;">{{ $errors->first('package_day') }}</p> @endif
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Package Nights *</label>
                      <input type="number" name="package_night" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Nights" value="{{ old('package_day') }}" required="">
                      @if ($errors->has('package_night')) <p style="color:red;">{{ $errors->first('package_night') }}</p> @endif
                    </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Package Cost *</label>
                      <input name="package_cost" type="number" class="form-control" placeholder="Enter Package Cost" value="{{ old('package_cost') }}" required="">
                      @if ($errors->has('package_cost')) <p style="color:red;">{{ $errors->first('package_cost') }}</p> @endif
                  </div>
                  </div>
                  <div class="col-md-2">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Purchase Limit *</label>
                      <input name="package_purchase_limit" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Limit" value="{{ old('package_purchase_limit') }}" required="">
                      @if ($errors->has('package_purchase_limit')) <p style="color:red;">{{ $errors->first('package_purchase_limit') }}</p> @endif
                  </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                     <label for="exampleInputEmail1">Amenities List *</label>
                      <select class="selectpicker form-control" data-live-search="true" multiple="" name="amenities_list[]" required="">
                        @if(!empty($amenities_list))
                          @foreach($amenities_list as $amenities)
                           <option value="{{ $amenities->id }}" >{{ $amenities->amenities_name }}</option>
                          @endforeach
                        @endif
                      </select>
                        @if ($errors->has('amenities_list')) <p style="color:red;">{{ $errors->first('amenities_list') }}</p> @endif
                     </div>
                    </div>

                    <div class="col-md-3">
                     <div class="form-group">
                      <label for="exampleInputEmail1">Hotel Category *</label>
                      <select name="hotel_category" class="form-control" required="">
                        <option selected="" value="1">1 * Star</option>
                        <option  value="2">2 * Star</option>
                        <option  value="3">3 *  Star</option>
                        <option  value="4">4 * Star</option>
                        <option  value="5">5 * Star</option>
                        <!-- <option value="1">Admin</option> -->
                      </select>
                      @if ($errors->has('email_verify')) <p style="color:red;">{{ $errors->first('email_verify') }}</p> @endif
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                     <label for="exampleInputEmail1">Flight List *</label>
                      <select class="selectpicker form-control" data-live-search="true" name="flights_list[]" multiple="" required="">
                        @if(!empty($flights_list))
                          @foreach($flights_list as $flight)
                           <option value="{{ $flight->id }}" >{{ $flight->flight_name }}</option>
                          @endforeach
                        @endif
                      </select>
                        @if ($errors->has('flights_list')) <p style="color:red;">{{ $errors->first('flights_list') }}</p> @endif
                     </div>
                    </div>


                  </div>

                  <div class="row">
                     <div class="col-md-6">
                      <div class="form-group">
                       <label for="exampleInputEmail1">Package Image *</label>
                     </div>
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                       <input name="package_image_title[]" type="text" class="form-control" placeholder="Enter Title" value="" required="">
                       </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                       <input name="package_image_description[]" type="text" class="form-control"  placeholder="Enter Description" value="" required="">
                       </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                       <input name="package_image[]" type="file" class="form-control package_image_select" ids="package_image_select" placeholder="Enter Description" value="" required="">
                       </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <img src="" id="package_image_select">
                       </div>
                    </div>
                     <div class="col-md-1">
                      <div class="form-group">
                        <button type="button" class="btn btn-success addMorePackageImageClick">+</button>
                       </div>
                    </div>
                  </div>

                 <div class="addMorePackageImage">
                  
                 </div>

                <div class="row">
                     <div class="col-md-6">
                      <div class="form-group">
                       <label for="exampleInputEmail1">Iternity Add*</label>
                     </div>
                    </div>
                     <div class="col-md-3">
                      <div class="form-group">
                       <label for="exampleInputEmail1"></label>
                     </div>
                    </div>
                     <div class="col-md-3">
                      <div class="form-group">
                       <label for="exampleInputEmail1">Default  - Optional</label>
                     </div>
                    </div>
                    
                  </div>

                  <div class="row">


                  <div class="col-md-3">
                    <div class="form-group">
                     <input name="iternity_title[]" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title" value="" required="">
                     </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                     <input name="iternity_description[]" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" value="" required="">
                     </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                     <input name="iternity_cost[]" class="form-control" id="" placeholder="Enter Amount" value="" required="">
                     </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <input type="range" name="iternity_default_status[]" value="1" name="0" min="0" max="1">
                     </div>
                  </div>
                   <div class="col-md-1">
                    <div class="form-group">
                      <button type="button" class="btn btn-success addMorePackageIternity">+</button>
                     </div>
                  </div>
                </div>

                 <div class="addMorePackageIternityContent">
                  
                </div>

                <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Package Description *</label>
                    <textarea name="package_description" required="" class="form-control textareaeditor" placeholder="Enter Amenities Description"> </textarea>
                                      </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Terms & Conditions *</label>
                    <textarea name="package_term_condition" required="" class="form-control" placeholder="Enter Amenities Description"> </textarea>
                                      </div>
                </div>
              </div>


 
               

              </div>

              <div class="row">
                <div class="col-md-11">
                  
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
    $('body').on('change','.package_image_select',function(e){
         var ids = $(this).attr('ids');
         readURL(this,ids);
    })


    function readURL(input,ids) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#'+ids).attr('src', e.target.result).width(32).height(32);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
  </script>
  <script type="text/javascript">
    $(function(){
      $('.addMorePackageImageClick').click(function(){
        var lengths = $('input').length;
        var html = '<div class="row"><div class="col-md-3"><div class="form-group"><input name="package_image_title[]" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title" value="" required=""></div></div><div class="col-md-3"><div class="form-group"><input name="package_image_description[]" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" value="" required=""></div></div><div class="col-md-3"><div class="form-group"><input name="package_image[]" type="file" class="form-control package_image_select" ids="'+lengths+'" placeholder="Enter Description" value="" required=""></div></div><div class="col-md-2"><div class="form-group"><img src="" id="'+lengths+'"></div></div><div class="col-md-1"><div class="form-group"><button type="button" class="btn btn-danger removeMorePackageImageClick">-</button></div></div></div>';
        $('.addMorePackageImage').append(html);
      })

      $('body').on('click','.removeMorePackageImageClick',function(){
        $(this).parent().parent().parent().remove();
      })

      $('.addMorePackageIternity').click(function(){
        var html2 ='<div class="row"><div class="col-md-3"><div class="form-group"><input name="iternity_title[]" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Title" value="" required=""></div></div><div class="col-md-3"><div class="form-group"><input name="iternity_description[]" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" value="" required=""></div></div><div class="col-md-3"><div class="form-group"><input name="iternity_cost[]" class="form-control" id="" placeholder="Enter Amount" value="" required=""></div></div><div class="col-md-2"><div class="form-group"><input type="range" name="iternity_default_status[]" value="1" name="0" min="0" max="1"></div></div><div class="col-md-1"><div class="form-group"><button class="btn btn-danger rempoveMorePackageIternity">-</button></div></div></div>';
        $('.addMorePackageIternityContent').append(html2);
      })

      $('body').on('click','.rempoveMorePackageIternity',function(){
        $(this).parent().parent().parent().remove();
      })


    })
  </script>
  @endsection