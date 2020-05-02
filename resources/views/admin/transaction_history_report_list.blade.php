@extends('master') 
@section('title','Dashboard')
@section('styles')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
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

         <section class="content">
      <div class="row">
        <div class="col-12">

          <form role="form" method="get" action="{{ url('transaction-history-report-list') }}">
          
          <div class="card">
                  <div class="card-body">
                    <div class="row">
                       <div class="col-md-3">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Select User</label>
                        <?php 
                        $start_date = $end_date ='';
                        $users_id_get = 'all';
                        if(isset($_GET['user_id'])){
                          $users_id_get     = $_GET['user_id'];
                          $start_date       = $_GET['start_date'];
                          $end_date         = $_GET['end_date'];
                        }
                        ?>
                        <select name="user_id" class="form-control">
                            <option  value="">Select User</option>
                          @foreach($user_filter as $agent_id => $users)
                            <option {{ $users_id_get==$users->id ? "selected" : "" }} value="{{ $users->id }}">{{ $users->name }}</option>
                          @endforeach
                          </select>
                      </div>
                    </div>
                     <div class="col-md-3">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Select Package</label>
                        <?php 
                        $agent_details = [];
                        $start_date = $end_date ='';
                        $package_id_get = 'all';
                        if(isset($_GET['package_id'])){
                          $package_id_get   = $_GET['package_id'];
                          $start_date       = $_GET['start_date'];
                          $end_date         = $_GET['end_date'];
                        }
                        ?>
                        <select name="package_id" class="form-control">
                            <option  value="">Select Package</option>
                          @foreach($package_filter as $agent_id => $packages)
                            <option {{ $package_id_get==$packages->id ? "selected" : "" }} value="{{ $packages->id }}">{{ $packages->package_name }}</option>
                          @endforeach
                          </select>
                      </div>
                    </div>  
                     <div class="col-md-2">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Start Date</label>
                          <input name="start_date" type="text" class="form-control datepicker" placeholder="Select Start Date" value="{{ $start_date }}" >
                         </div>
                      </div>
                      <div class="col-md-2">
                         <div class="form-group">
                          <label for="exampleInputEmail1">End Date</label>
                          <input name="end_date" type="text" class="form-control datepicker" placeholder="Select End Date" value="{{ $end_date }}" >
                        </div>
                      </div>
                       
                    <div class="col-md-1">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Find</label>
                            <button  type="submit" class="form-control btn btn-success findStudent">Search</button>
                          </div>
                    </div> 
                     <div class="col-md-1">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Reset</label>
                      <a href="{{url('/transaction-history-report-list')}}"><button type="button" class="btn btn-block btn-primary">Reset</button></a>
                    </div>
                    </div>

                                    <!--  <div class="col-md-1"><a href="{{url('/requestForInvoiceFilter')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Request</button></a></div> -->

                  </div> 
                </form>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>

    <!-- Main content -->
        <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-4"><h3 class="card-title">User Report List</h3></div>
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

               <!--  <div class="col-md-2"><a href="{{url('/user-package-create')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Book Package</button></a></div> -->
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>User Name</th>
                  <th>Package Name</th>
                  <!-- <th>D/N</th> -->
                  <!-- <th>Amenities</th> -->
                  <!-- <th>Hotel</th> -->
                  <!-- <th>Flight</th> -->
                  <!-- <th>Itinerary</th> -->
                  <!-- <th>Coupon</th> -->
                  <!-- <th>Cost Break</th> -->
                  <th>Paid Amount</th>
                  <th>Payment Staus</th>
                  <th>Payment Type</th>
                  <th>Paid Date</th>
                  <!-- <th>Action</th> -->

                  <!-- <th>Date</th> -->
                </tr>
                </thead>
                <tbody>
                @foreach($transaction_lists as $transaction)
        <tr>
            <td>{{ ucfirst($transaction->user_details->name) }}</td>
            <td>{{ ucfirst($transaction->package_details->package_name) }}</td>
            <td>{{ $transaction->paid_amount }}</td>

            <td>{{ ucfirst($transaction->payment_status) }}</td>
            <td>{{ ucfirst($transaction->payment_type) }}</td>

           
          
        
          
            <td>{{ date('d/m/Y',strtotime($transaction->paid_date)) }}</td>

        
        </tr>
        @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

     <div class="modal fade" id="paid_amount_history" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Make Payment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
               <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">User Name *</label>
                    <div class="user_name_modal">Pankaj</div>
                    <input type="hidden" name="user_id" class="user_id_modal" value="">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Package Name *</label>
                    <div class="package_name_modal">Pankaj</div>
                    <input type="hidden" name="package_id" class="package_id_modal" value="">
                  </div>
                </div>
             </div>
             <div class="row">
             <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Paid Amount</th>
                  <th>Payment Status</th>
                  <th>Payment Mode</th>
                  <th>Payment Date</th> 
                </tr>
                </thead>
                <tbody class="paid_amount_history_content">

                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
      
  @endsection
  @section('scripts')
  <script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({"aaSorting": []});
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

     $(function () {
      $('.datepicker').datepicker({
        format: 'dd/mm/yyyy'
     });
    });

   $(function(){
    $('.paid_amount_history').click(function(){
      var paid_history = $(this).attr('paid_amount_history');
      var paid_amount_history = $.parseJSON(atob(paid_history));
      var paid_amount_history_table = '';
      for(var p=0;p<paid_amount_history.length;p++){
         paid_amount_history_table+='<tr><td>'+paid_amount_history[p].paid_amount+'</td><td>'+paid_amount_history[p].payment_status+'</td><td>'+paid_amount_history[p].payment_type+'</td><td>'+paid_amount_history[p].paid_date+'</td></tr>'
      }
      $('.paid_amount_history_content').html(paid_amount_history_table);
      $('.user_name_modal').html($(this).attr('user_name'));
      $('.package_name_modal').html($(this).attr('package_name'));
      $('#paid_amount_history').modal('show');


    })
  })

</script>
  @endsection