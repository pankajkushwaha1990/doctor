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

                    <div class="col-md-12"><h3 class="card-title">
                  @if(session()->get('success'))
                    <span class="text-success">
                      <center>{{ session()->get('success') }}  </center>
                    </span>
                  @endif</h3>
                </div>

      <div class="row">
          <div class="col-md-12">
          <form role="form" method="post" enctype="multipart/form-data" action="{{ url('update-profile-submit') }}">
         {{ csrf_field() }}
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Profile</h3>
              </div>
               <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <div>{{ $agent->name }}</div>
                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                     <label for="exampleInputEmail1">Email </label>
                   <div>{{ $agent->email }}</div>
                  </div>
                </div>

              </div>

              <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                 <label for="exampleInputEmail1">Company</label>
                  <div>{{ $agent->company }}</div>
                </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Branch</label>
                    <div>{{ $agent->branch }}</div>
                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Mobile</label>
                    <div>{{ $agent->mobile }}</div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">City *</label>
                    <div>{{ $agent->city }}</div>
                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <label for="exampleInputEmail1">State  *</label>
                    <div>{{ $agent->state }}</div>
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Country *</label>
                    <div>{{ $agent->country }}</div>
                  </div>
                </div>
                <div class="col-md-3">
                             <div class="form-group">
                              <label for="exampleInputFile">Signature (200*50)px</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="agent_signature_file" class="custom-file-input" id="src" {{ empty($agent->signature_file) ? "required" : "" }}>
                                  <input type="hidden" name="old_agent_signature_file" value="{{ $agent->signature_file }}">
                                  <label class="custom-file-label" for="exampleInputFile">Choose Attachment</label>
                                </div>
                              </div>
                            </div>
                          </div>  
                          <div class="col-md-3">
                             <div class="form-group">
                              <label for="exampleInputFile">Signature Preview</label>
                              <img id="target" src="{{ url('').'/agent_docs/'.$agent->signature_file }}" style="width: 191px;height: 50px;"/>
                              </div>
                            </div>

              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Commision % *</label>
                    <div>{{ $agent->agent_commision }}</div>
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