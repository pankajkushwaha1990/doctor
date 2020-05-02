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
          <form role="form" method="post" action="{{ url('initial-payment-edit-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <input type="hidden" name="payment_id" value="{{ base64_encode($agent->payment_id) }}">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Student Payment</h3>
              </div>
               <div class="card-body">
<div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title *</label>
                    <p>{{ $agent->title }}</p>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gender *</label>
                    <p>{{ $agent->gender }}</p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Date Of Birth ('YYYY-MM-DD') *</label>
                   <p>{{ $agent->date_of_birth }}</p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Email *</label>
                    <p>{{$agent->student_email }}</p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Surname *</label>
                    <p>{{ $agent->surname }}</p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Given Name*</label>
                    <p>{{ $agent->given_name }}</p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Proffered Name*</label>
                    <p>{{ $agent->proffered_name }}</p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Passport Number *</label>
                    <p>{{ $agent->passport_number }}</p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number*</label>
                    <p>{{ $agent->phone_number }}</p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Postal Code*</label>
                    <p>{{ $agent->post_code }}</p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Town *</label>
                    <p>{{ $agent->town }}</p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">State*</label>
                    <p>{{ $agent->state }}</p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Country *</label>
                    <p>{{ $agent->country }}</p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Assign Id/Offer No *</label>
                    <input type="text" name="offer_assign" readonly="" class="form-control" id="exampleInputEmail1" placeholder="Enter Assign Id/Offer No" value="{{ $agent->offer_assign }}" required="">
                    @if ($errors->has('offer_assign')) <p style="color:red;">{{ $errors->first('offer_assign') }}</p> @endif

                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Invoice No *</label>
                    <input type="text" name="invoice_no" class="form-control" id="exampleInputEmail1" placeholder="Enter Invoice No" value="{{ $agent->invoice_no }}" required="">
                    @if ($errors->has('invoice_no')) <p style="color:red;">{{ $errors->first('invoice_no') }}</p> @endif

                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Amount *</label>
                    <input type="text" name="debit_fee" class="form-control" id="exampleInputEmail1" placeholder="Enter Amount" value="{{ $agent->debit_fee }}" required="">
                    @if ($errors->has('debit_fee')) <p style="color:red;">{{ $errors->first('debit_fee') }}</p> @endif

                  </div>
                </div>

                 <div class="col-md-2">
                       <div class="form-group">
                        <?php 
                        $date = explode('-',$agent->payment_date);
                        $payment_date = $date[2]."/".$date[1]."/".$date[0];
                        ?>
                        <label for="exampleInputEmail1">Payment Date *</label>
                        <input name="payment_date" type="text" class="form-control datepicker" id="exampleInputEmail1" placeholder="Enter Payment Date" value="{{  $payment_date }}" required="">
                        @if ($errors->has('payment_date')) <p style="color:red;">{{ $errors->first('payment_date') }}</p> @endif
                      </div>
                </div>
                <div class="col-md-2">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Payment Status</label>
                        <br>
                        <input name="payment_status" {{ ($agent->payment_status)=='Success' ? "checked" : "" }} type="radio" class="" id="exampleInputEmail55" placeholder="Enter Description" value="Success" checked="">Success<br>
                        <input name="payment_status" type="radio" {{ ($agent->payment_status)=='Dishonoured' ? "checked" : "" }}  class="" id="exampleInputEmail1" placeholder="Enter Description" value="Dishonoured">Dishonoured

                      </div>
                    </div>
                <div class="col-md-2">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Payment Description</label>
                        <input name="payment_description" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Description" value="{{ $agent->payment_description }}">
                        @if ($errors->has('payment_description')) <p style="color:red;">{{ $errors->first('payment_description') }}</p> @endif

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