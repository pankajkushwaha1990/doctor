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
          <form role="form" method="post" enctype="multipart/form-data" action="{{ url('member-edit-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Member ({{ $agent->type }})</h3>
              </div>
               <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Member Name *</label>
                    <input type="text" name="agent_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Agent Name" value="{{ $agent->name }}">
                    @if ($errors->has('agent_name')) <p style="color:red;">{{ $errors->first('agent_name') }}</p> @endif

                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                     <label for="exampleInputEmail1">Member Email  *</label>
                    <input name="agent_email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Agent Email" value="{{ $agent->email }}">
                    @if ($errors->has('agent_email')) <p style="color:red;">{{ $errors->first('agent_email') }}</p> @endif
                  </div>
                </div>

              </div>

              <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                 <label for="exampleInputEmail1">Company *</label>
                  <input type="text" name="agent_company" class="form-control" id="exampleInputEmail1" placeholder="Enter Company Name" value="{{ $agent->company }}" required="">
                    @if ($errors->has('agent_company')) <p style="color:red;">{{ $errors->first('agent_company') }}</p> @endif
                </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Branch *</label>
                    <input type="text" name="agent_branch" class="form-control" id="exampleInputEmail1" placeholder="Enter Branch Name" value="{{ $agent->branch }}" required="">
                    @if ($errors->has('agent_branch')) <p style="color:red;">{{ $errors->first('agent_branch') }}</p> @endif

                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Mobile  *</label>
                    <input name="agent_mobile" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Mobile Number" value="{{ $agent->mobile }}" required="">
                    @if ($errors->has('agent_mobile')) <p style="color:red;">{{ $errors->first('agent_mobile') }}</p> @endif
                  </div>
                </div>
              </div>
            
            

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">City *</label>
                    <input type="text" name="agent_city" class="form-control" id="exampleInputEmail1" placeholder="Enter Agent City" value="{{ $agent->city }}">
                    @if ($errors->has('agent_city')) <p style="color:red;">{{ $errors->first('agent_city') }}</p> @endif
                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <label for="exampleInputEmail1">State  *</label>
                    <input type="text" name="agent_state" class="form-control" id="exampleInputEmail1" placeholder="Enter Agent State" value="{{ $agent->state }}">
                     @if ($errors->has('agent_state')) <p style="color:red;">{{ $errors->first('agent_state') }}</p> @endif
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Country *</label>
                    <input type="text" name="agent_country" class="form-control" id="exampleInputEmail1" placeholder="Enter Agent Country" value="{{ $agent->country }}">
                    @if ($errors->has('agent_country')) <p style="color:red;">{{ $errors->first('agent_country') }}</p> @endif
                  </div>
                </div>
                <div class="col-md-3">
                             <div class="form-group">
                              <label for="exampleInputFile">Agent Signature (200*50)px</label>
                              <div class="input-group">
                                <div class="custom-file2">
                                  <input type="file" name="agent_signature_file" class="custom-file-input2" id="src">
                                  <input type="hidden" name="old_agent_signature_file" value="{{ $agent->signature_file }}">
                                  <label class="custom-file-label2" for="exampleInputFile">Choose Attachment</label>
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
                    <label for="exampleInputEmail1">Member Commision % *</label>
                    <input type="text" name="agent_commision" class="form-control" id="exampleInputEmail1" placeholder="Enter Comission In Percent" value="{{ $agent->agent_commision }}" required="">
                    <input type="hidden" name="member_id" value="{{ $agent->id }}" required="">
                    @if ($errors->has('agent_commision')) <p style="color:red;">{{ $errors->first('agent_commision') }}</p> @endif
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