@extends('master') 
@section('title','Dashboard')
@section('content')
@section('styles')
<link rel="stylesheet" href="https://www.jqueryscript.net/demo/jQuery-Multiple-Select-Plugin-For-Bootstrap-Bootstrap-Multiselect/css/bootstrap-multiselect.css" type="text/css">
<style type="text/css">
  .multiselect-container {
    position: absolute;
    will-change: transform;
    top: 0px;
    left: 1px;
    transform: translate3d(0px, 38px, 0px);
    padding-left: 3px;
    width: 499px;
}
</style>

@endsection
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="card-header">
              <div class="row">
                <div class="col-md-5"></div>
               <div class="col-md-6">
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
                </div>

              </div>
              
            </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
  <section class="content">
      <div class="row">
          <div class="col-md-12">
          <form role="form" enctype="multipart/form-data" method="post" action="{{ url('email-compose-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Compose Email</h3>    
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Select Reciever</label>
                        <br>
                        <select name="to_array[]" class="form-control Reciever" required="" multiple="multiple">
                          @if(!empty($agent))
                          <optgroup label="Agent">
                          @foreach($agent as $agents)
                            <option value="{{ $agents->email }}">{{ $agents->name." (".$agents->email.")" }}</option>
                          @endforeach
                          </optgroup>
                          @endif

                          @if(!empty($employee))
                          <optgroup label="Employee">
                          @foreach($employee as $agents)
                            <option value="{{ $agents->email }}">{{ $agents->name." (".$agents->email.")" }}</option>
                          @endforeach
                          </optgroup>

                          @endif

                          @if(!empty($students))
                          <optgroup label="Students">
                          @foreach($students as $agents)
                            <option value="{{ $agents->email }}">{{ $agents->surname." (".$agents->email.")" }}</option>
                          @endforeach
                          </optgroup>
                          
                          @endif
                          </select>
                      </div>
                    </div> 
                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="exampleInputEmail1">CC</label>
                        <input name="to_array[]" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter CC Email" value="">
                      </div>
                    </div>      
                  </div>
                  <div class="row">
                  <div class="col-md-12">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Subject</label>
                        <input name="enquery_subject" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Message Subject" value="" required="">
                        <input name="message_to_type" type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Enter Message Subject" value="{{ $session->type }}" required="">
                        <input name="message_from_type" type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Enter Message Subject" value="admin" required="">

                      </div>
                    </div>      
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Message</label>
                        <textarea name="enquery_message"  class="form-control" id="exampleInputEmail1" placeholder="Enter Message Subject" required=""></textarea>

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
<script type="text/javascript" src="https://www.jqueryscript.net/demo/jQuery-Multiple-Select-Plugin-For-Bootstrap-Bootstrap-Multiselect/js/bootstrap-multiselect.js"></script>
  <script type="text/javascript">
    $(function(){
      $('.Reciever').multiselect({
        buttonWidth:'500px',
        includeSelectAllOption:true,
        enableFiltering:true,
        selectAllNumber:true,
        disableIfEmpty:true,




      });
      $('.findStudent').click(function(){
        alert();
      })
    })
  </script>
  @endsection
  @endsection