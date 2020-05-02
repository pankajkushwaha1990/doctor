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
          <input name="_method" type="hidden" value="PATCH">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Enquiry</h3>
              </div>
               <div class="card-body">


              <div class="row">
              <div class="col-md-10">
                <div class="form-group">
                 <label for="exampleInputEmail1">Subject</label>
                  <div>{{ $agent->notification_subject }}</div>
                </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Date</label>
                    <div>{{ date('d/m/Y H:i:s A',strtotime($agent->created_at)) }}</div>
                  </div>
                </div>
                
              </div>

              <div class="row">
              <div class="col-md-10">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Message</label>
                    <div>{{ $agent->notification_message }}</div>
                  </div>
                
              </div>


              <div class="col-md-2">
                   <div class="form-group">
                    @if(!empty($agent->attachment))
                    <label for="exampleInputEmail1">Attachment</label>
                    <div><a href="{{ url('').'/notification_docs/'.$agent->attachment }}" download="">Download</a></div>
                    @endif
                  </div>
                </div>

            </div>


             
            
              <div class="row">
                <div class="col-md-11">
                  
                </div>
               <!--  <div class="col-md-1">
                   <div class="form-group">
                    <a href="{{ url('notification-list') }}"><button class="btn btn-success">Back</button></a>
                  </div>
                </div> -->

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