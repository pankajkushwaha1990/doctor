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
           <form role="form" enctype="multipart/form-data" method="post" action="{{ url('setting-edit-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit General Settings</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  
                </div>
              </div>
             <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Application Fee *</label>
                          <input type="number" name="application_fee" class="form-control" id="exampleInputEmail1" placeholder="Enter Application Fee" value="{{ $agent->application_fee }}" required="">
                          @if ($errors->has('application_fee')) <p style="color:red;">{{ $errors->first('application_fee') }}</p> @endif
                          <input type="hidden" name="setting_id" value="{{ $agent->id }}">

                        </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail2">OSHC Fee *</label>
                          <input type="number" name="oshc_amount" class="form-control" id="exampleInputEmail2" placeholder="Enter OSHC Fee" value="{{ $agent->oshc_amount }}" required="">
                          @if ($errors->has('oshc_amount')) <p style="color:red;">{{ $errors->first('oshc_amount') }}</p> @endif

                        </div>
                      </div>
                    </div>
               </div>
          </div>

           
              <!-- /.card-header -->
              <div class="row">
                <div class="col-md-11">
                  
                </div>
                <div class="col-md-1">
                   <div class="form-group">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </div>

              </div>
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
    @section('scripts')
    <script type="text/javascript">
      $("[name='date_of_birth']").datepicker({autoclose: true,startDate: '-0d'});
    </script>
    @endsection
    @endsection