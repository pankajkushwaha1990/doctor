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
          <form role="form" enctype="multipart/form-data" method="post" action="{{ url('user-create-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add User</h3>
              </div>
               <div class="card-body">
               
             <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">User Name *</label>
                    <input type="text" name="user_name" class="form-control" id="exampleInputEmail1" placeholder="Enter User Name" value="" required="">
                    @if ($errors->has('user_name')) <p style="color:red;">{{ $errors->first('user_name') }}</p> @endif
                  </div>
                </div>
                 
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">User Mobile *</label>
                    <input type="text" name="user_mobile" class="form-control" id="exampleInputEmail1" placeholder="Enter User Mobile" value="" required="">
                    @if ($errors->has('user_mobile')) <p style="color:red;">{{ $errors->first('user_mobile') }}</p> @endif
                  </div>
                </div>
                 <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Send OTP *</label>
                    <div><button type="button" class="btn btn-success">Send</button></div>
                    @if ($errors->has('user_mobile')) <p style="color:red;">{{ $errors->first('user_mobile') }}</p> @endif
                  </div>
                </div>
                 <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter OTP *</label>
                    <input type="text" name="user_mobile_otp" class="form-control" id="exampleInputEmail1" placeholder="OTP" value="" required="">
                    @if ($errors->has('user_mobile_otp')) <p style="color:red;">{{ $errors->first('user_mobile_otp') }}</p> @endif
                  </div>
                </div>

              </div>
              <div class="row">

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Create Password *</label>
                    <input type="text" name="user_password" class="form-control" id="exampleInputEmail1" placeholder="Enter User Password" value="" required="">
                    @if ($errors->has('user_city')) <p style="color:red;">{{ $errors->first('user_city') }}</p> @endif
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">User Email *</label>
                    <input type="email" name="user_email" class="form-control" id="exampleInputEmail1" placeholder="Enter User Email" value="" required="">
                    @if ($errors->has('user_email')) <p style="color:red;">{{ $errors->first('user_email') }}</p> @endif
                  </div>
                </div>
                 <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Send OTP *</label>
                    <div><button type="button" class="btn btn-success">Send</button></div>
                    @if ($errors->has('user_mobile')) <p style="color:red;">{{ $errors->first('user_mobile') }}</p> @endif
                  </div>
                </div>
                 <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Enter OTP *</label>
                    <input type="text" name="user_email_otp" class="form-control" id="exampleInputEmail1" placeholder="OTP" value="" required="">
                    @if ($errors->has('user_email_otp')) <p style="color:red;">{{ $errors->first('user_email_otp') }}</p> @endif
                  </div>
                </div>
              </div>  

               <div class="row">
                

                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">User City *</label>
                    <input type="text" name="user_city" class="form-control" id="exampleInputEmail1" placeholder="Enter User City" value="" required="">
                    @if ($errors->has('user_city')) <p style="color:red;">{{ $errors->first('user_city') }}</p> @endif
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">User State *</label>
                    <input type="text" name="user_state" class="form-control" id="exampleInputEmail1" placeholder="Enter User State" value="" required="">
                    @if ($errors->has('user_state')) <p style="color:red;">{{ $errors->first('user_state') }}</p> @endif
                  </div>
                </div>
                 <div class="col-md-2">
                             <div class="form-group">
                              <label for="exampleInputFile">Adhaar File</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="user_adhaar_file" class="custom-file-input1" id="exampleInputFile">
                                  <!-- <label class="custom-file-label" for="exampleInputFile">Choose Attachment</label> -->
                                </div>
                              </div>
                            </div>
                </div> 

                <div class="col-md-2">
                             <div class="form-group">
                              <label for="exampleInputFile">PAN File</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="user_pan_file" class="custom-file-input1" id="exampleInputFile">
                                  <!-- <label class="custom-file-label" for="exampleInputFile">Choose Attachment</label> -->
                                </div>
                              </div>
                            </div>
                </div> 
                <div class="col-md-2">
                             <div class="form-group">
                              <label for="exampleInputFile">Passport File</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="user_passport_file" class="custom-file-input1" id="exampleInputFile">
                                  <!-- <label class="custom-file-label" for="exampleInputFile">Choose Attachment</label> -->
                                </div>
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