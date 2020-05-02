@extends('master') 
@section('title','Dashboard')
@section('content')
<link rel="stylesheet" href="https://www.jquery-az.com/boots/css/bootstrap-multiselect/bootstrap-multiselect.css" type="text/css">
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
          <form role="form" enctype="multipart/form-data" method="post" action="{{ url('notification-create-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">New Notification</h3>    
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                     
                    <div class="col-md-12">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input name="enquery_subject" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Notification Title" value="" required="">

                      </div>
                    </div>      
                  </div>
                  <div class="row">
                    <div class="col-md-9">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Details</label>
                        <textarea rows="10" name="enquery_message"  class="form-control" id="exampleInputEmail1" placeholder="Enter Notification Details" required=""></textarea>

                      </div>
                    </div>
                    <div class="col-md-3">
                       <div class="form-group">
                              <label for="exampleInputFile">Attachment</label>
                              <div class="input-group">
                                <div class="custom-file2">
                                  <input type="file" name="notification_attchment" class="custom-file-input2" id="src">
                                  <!-- <label class="custom-file-label2" for="exampleInputFile">Choose Attachment</label> -->
                                </div>
                              </div>
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
    $(function(){
      $('.findStudent').click(function(){
        alert();
      })
    })
  </script>
  <script type="text/javascript" src="https://www.jquery-az.com/boots/js/bootstrap-multiselect/bootstrap-multiselect.js"></script>
  <script type="text/javascript">
        $(document).ready(function() {
            $('#option-droup-demo').multiselect({
            enableClickableOptGroups: true,
            enableFiltering: true,
            includeSelectAllOption: true,
            nonSelectedText: 'Select Agent/Student',
            buttonWidth: '400px'
        });
        });
    </script>
  @endsection

  @endsection