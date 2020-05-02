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
          <form role="form" method="post" enctype="multipart/form-data" action="{{ url('flight-edit-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Flight</h3>
              </div>
<div class="card-body">
               
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Flight Name *</label>
                    <input type="text" name="flight_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Flight Name" value="{{ $flight->flight_name }}" required="">
                    @if ($errors->has('flight_name')) <p style="color:red;">{{ $errors->first('flight_name') }}</p> @endif
                  </div>
                </div>
                 <div class="col-md-3">
                             <div class="form-group">
                              <label for="exampleInputFile">Flight Logo (32*32)px</label>
                              <div class="input-group">
                                <div class="custom-file2">
                                  <input type="file" name="flight_image" class="custom-file-input2" id="src">
                                  <label class="custom-file-label2" for="exampleInputFile">Choose Attachment</label>
                                  <input type="hidden" name="flight_image_old" value="{{ $flight->flight_logo }}" id="src">
                                  <input type="hidden" name="flight_id" value="{{ $flight->id }}" required="">
                                  
                                </div>
                              </div>
                            </div>
                          </div>  
                          <div class="col-md-3">
                             <div class="form-group">
                              <label for="exampleInputFile">Logo Preview</label>
                              <img src="{{ url('').'/flights_image/'.$flight->flight_logo }}" id="target" style="width: 64px;height: 64px;"/>
                              </div>
                            </div>
                          </div>  
                <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description *</label>
                    <textarea name="flight_description" class="form-control" placeholder="Enter Amenities Description">{{ $flight->flight_description }} </textarea>
                    @if ($errors->has('flight_description')) <p style="color:red;">{{ $errors->first('flight_description') }}</p> @endif
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