@extends('master') 
@section('title','Dashboard') 
@section('content')
      <!-- Page Wrapper -->
            <div class="page-wrapper">
      
                <div class="content container-fluid">
          
          <!-- Page Header -->
          <div class="page-header">
            <div class="row">
          <div class="col-md-12">
          <form role="form" method="post" enctype="multipart/form-data" action="{{ url('admin_social_link_update') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Social Links  <div class="col-md-6">
                    <h5 class="card-title">
                  @if(session()->get('success'))
                    <span class="text-success">
                      {{ session()->get('success') }}  
                    </span>
                  @endif
                   @if(session()->get('failure'))
                    <span class="text-danger">
                      {{ session()->get('failure') }}  
                    </span>
                  @endif
              </h5>
                </div></h3>

              </div>
<div class="card-body">

   <div class="row">
               


              
                
              </div>

               
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Facebook Link *</label>
                    <input type="url" name="facebook" class="form-control" id="exampleInputEmail1" placeholder="Enter Facebook Link" value="{{ $list->facebook or '' }}" required="">
                    @if ($errors->has('facebook')) <p style="color:red;">{{ $errors->first('facebook') }}</p> @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Twitter Link *</label>
                    <input type="url" name="twitter" class="form-control" id="exampleInputEmail1" placeholder="Enter Twitter Link" value="{{ $list->twitter or '' }}" required="">
                    @if ($errors->has('twitter')) <p style="color:red;">{{ $errors->first('twitter') }}</p> @endif
                  </div>
                </div>
              </div>  

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Linkedin Link *</label>
                    <input type="url" name="linkedin" class="form-control" id="exampleInputEmail1" placeholder="Enter Linkedin Link" value="{{ $list->linkedin or '' }}" required="">
                    @if ($errors->has('linkedin')) <p style="color:red;">{{ $errors->first('linkedin') }}</p> @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Instagram Link *</label>
                    <input type="url" name="instagram" class="form-control" id="exampleInputEmail1" placeholder="Enter Instagram Link" value="{{ $list->instagram or '' }}" required="">
                    @if ($errors->has('instagram')) <p style="color:red;">{{ $errors->first('instagram') }}</p> @endif
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
      <!-- </div> -->
              
            </div>
          </div>
          
        </div>      
      </div>
      <!-- /Page Wrapper -->
      @section('scripts')
         <script src="{{asset('template/admin')}}/assets/plugins/morris/morris.min.js"></script>  
         <script src="{{asset('template/admin')}}/assets/js/chart.morris.js"></script>
         <script  src="{{asset('template/admin')}}/assets/js/script.js"></script>
      @endsection
   
@endsection