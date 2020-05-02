@extends('master') 
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
          <form role="form" method="post" enctype="multipart/form-data" action="{{ url('coupon-edit-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Coupon</h3>
              </div>
<div class="card-body">
               
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Coupon Name *</label>
                    <input type="text" name="coupon_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Amenities Name" value="{{ $coupon->coupon_name }}" required="">
                    <input type="hidden" name="coupon_id" class="form-control" id="exampleInputEmail1" placeholder="Enter Amenities Name" value="{{ $coupon->id }}" required="">
                    @if ($errors->has('coupon_name')) <p style="color:red;">{{ $errors->first('coupon_name') }}</p> @endif
                  </div>
                </div>
                 <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Coupon Code *</label>
                    <input type="text" name="coupon_code" class="form-control" id="exampleInputEmail1" placeholder="Enter Amenities Name" value="{{ $coupon->coupon_code }}" required="">
                    @if ($errors->has('coupon_code')) <p style="color:red;">{{ $errors->first('coupon_code') }}</p> @endif
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Coupon Type *</label>
                    <select class="selectpicker form-control" name="coupon_type" required="">
                       <option value="flat" <?php if($coupon->coupon_type=='flat'){ echo "selected";}?>>Flat</option>
                       <option value="percentage" <?php if($coupon->coupon_type=='percentage'){ echo "selected";}?>>Percentage</option>
                    </select>

                    @if ($errors->has('coupon_type')) <p style="color:red;">{{ $errors->first('coupon_type') }}</p> @endif
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Amount/Percentage *</label>
                    <input type="text" name="coupon_value" class="form-control" id="exampleInputEmail1" placeholder="Enter Amenities Name" value="{{ $coupon->coupon_value }}" required="">
                    @if ($errors->has('coupon_value')) <p style="color:red;">{{ $errors->first('coupon_value') }}</p> @endif
                  </div>
                </div>
                 <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Coupon Limit *</label>
                    <input type="text" name="coupon_limit" class="form-control" id="exampleInputEmail1" placeholder="Enter Amenities Name" value="{{ $coupon->coupon_limit }}" required="">
                    @if ($errors->has('coupon_limit')) <p style="color:red;">{{ $errors->first('coupon_limit') }}</p> @endif
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
    <script type="text/javascript">
    function showImage(src,target) {
  var fr=new FileReader();
  // when image is loaded, set the src of the image where you want to display it
  fr.onload = function(e) { target.src = this.result; };
  src.addEventListener("change",function() {
    // fill fr with image data    
    fr.readAsDataURL(src.files[0]);
  });
}

var src = document.getElementById("src");
var target = document.getElementById("target");
showImage(src,target);
  </script>
  @endsection