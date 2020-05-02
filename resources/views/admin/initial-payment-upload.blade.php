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
          <form role="form"  enctype="multipart/form-data" method="post" action="{{ url('initial-payment-upload-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Upload Payment </h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                     
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                          <div class="col-md-4">
                             <div class="form-group">
                                <label for="exampleInputEmail1">Download Sample</label>
                                   <a download href="{{ url('').'/images/payment-upload-sample.csv' }}">Download</a>
                                
                              </div>
                            
                          </div>    
                           <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputFile">Upload Payment File</label>
                              <div class="input-group">
                                <div class="custom-file1">
                                  <input type="file" name="payment_file" class="custom-file-input2" id="exampleInputFile" required="">
                                  <!-- <label class="custom-file-label3" for="exampleInputFile">Choose Attachment</label> -->
                                </div>
                              </div>
                            </div>
                          </div>    
                          <div class="col-md-4">
                            
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
  @endsection