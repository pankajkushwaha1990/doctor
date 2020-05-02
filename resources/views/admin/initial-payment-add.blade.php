@extends('master') 
@section('title','Dashboard')
@section('styles')
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
@endsection
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
          <form role="form" method="get" action="{{ url('initial-payment-add') }}">
          
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Add Payment </h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-5">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Enter Student (Assign Id)*</label>
                        <input name="search_student" type="search" class="form-control" id="exampleInputEmail1" placeholder="Enter Student Assign Id" value="{{ @$students->assign_id }}" required="">
                      </div>
                    </div>
                     <div class="col-md-5">
                    @if ($record!=null) <p style="color:red;">{{ $record }}</p> @endif 
                    </div>    
                    <div class="col-md-2">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Find</label>
                            <button  type="submit" class="form-control btn btn-success findStudent">Search</button>
                          </div>
                          </div> 
                  </div> 
                </form>
              <form role="form"  enctype="multipart/form-data" method="post" action="{{ url('initial-payment-add-submit') }}">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="row">
                      <div class="col-md-1">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title *</label>
                          <div>{{ @$students->title }}</div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Full Name *</label>
                          <div>{{ @$students->surname." ".@$students->given_name }}</div>
                        </div>
                      </div>
                      <div class="col-md-2">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <div>{{ @$students->student_email }}</div>
                          
                         </div>
                      </div>
                      <div class="col-md-2">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Mobile *</label>
                          <div>{{ @$students->phone_number}}</div>
                          
                         </div>
                      </div>
                      <div class="col-md-2">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Agent Name *</label>
                          <div>{{ @$students->name}}</div>
                          
                         </div>
                      </div>
                   </div>                                               
                </div>
          </div>
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Payment Details</h3>    
                    <div class="card-tools">
                      @if ($record!=null) <p style="color:red;">{{ $record }}</p> @endif
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                  </div>
                @if ($record!=null)
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-3">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Amount</label>
                        <input name="debit_fee" type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter Amount" value="" required="">
                        <input name="offer_assign" type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Enter Amount" value="{{ @$students->assign_id }}" required="">
                        <input name="invoice_no" type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Enter Amount" value="N/A" >
                        <input name="agent_commision" type="hidden" class="form-control" id="exampleInputEmail1" placeholder="Enter Amount" value="{{ @$students->agent_commision }}" >
                      </div>
                    </div> 
                    <div class="col-md-3">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Payment Date</label>
                        <input name="payment_date" type="text" class="form-control datepicker" id="exampleInputEmail1" placeholder="Enter Payment Date" value="" required="">
                      </div>
                    </div>
                    <div class="col-md-3">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Payment Status</label>
                        <br>
                        <input name="payment_status" type="radio" class="" id="exampleInputEmail55" placeholder="Enter Description" value="Success" checked="">Success
                        <input name="payment_status" type="radio"  class="" id="exampleInputEmail1" placeholder="Enter Description" value="Dishonoured">Dishonoured

                      </div>
                    </div>  
                    <div class="col-md-3">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Payment Description</label>
                        <input name="payment_description" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" value="">
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
          @endif
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
    $(function(){
      $('.findStudent').click(function(){
        alert();
      })
    })
  </script>
  @endsection
@section('scripts')
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
                $(function () {
                    $('.datepicker').datepicker({
              format: 'dd/mm/yyyy'
           });
                });
</script>
  @endsection