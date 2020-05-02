@extends('master') 
@section('title','Dashboard')
@section('content')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css" integrity="sha256-7stu7f6AB+1rx5IqD8I+XuIcK4gSnpeGeSjqsODU+Rk=" crossorigin="anonymous" />
<style type="text/css">
  .input-group-btn{
    display: none;
  }
</style>
@endsection
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
           <form role="form" enctype="multipart/form-data" method="post" action="{{ url('student-export-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Export Student Data</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  
                </div>
              </div>
             <div class="card-body">
                    <div class="row">
                      <div class="col-md-2">Select Student:</div>
                      <div class="col-md-2"> 
                          <select class="form-control export_status" name="export-status" required="">
                            <option <?php if($export_status=='all'){ echo "selected"; } ?> value="all">All</option>
                            <option <?php if($export_status=='new'){ echo "selected"; } ?> value="new">New</option>
                            <option <?php if($export_status=='old'){ echo "selected"; } ?> value="old">Old</option>
                          </select>
                      </div>
                      <div class="col-md-6">
                          <select class="form-control" id="multiselectStudent" multiple="" name="assign_id[]" required="">
                          <?php 
                          if(!empty($agent)){
                            foreach ($agent as $key => $student) { ?>
                              <option value="<?php echo $student->id;?>"><?php echo $student->given_name;?> (<?php echo $student->assign_id;?>) </option>
                           <?php }
                          } ?>
                          </select>
                      </div>
                       <div class="col-md-1">
                        <div class="form-group">
                          <button class="btn btn-success">Submit</button>
                        </div>
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
    @section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.js" integrity="sha256-gh5oDg46rxRDr9QF4nehk1UNULQ05EhbM9wOerElwRc=" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#multiselectStudent').multiselect({
            enableCaseInsensitiveFiltering: true,
            buttonWidth: '400px',
        });

        $('.export_status').change(function(){
          var selected = $(this).val();
           window.location.href = '<?php echo url('student-export');?>/'+selected;
        })
    });
</script>
    @endsection
    @endsection