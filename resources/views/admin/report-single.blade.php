@extends('master') 
@section('title','Dashboard')
@section('styles')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

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

          <form role="form" method="get" action="{{ url('report-single') }}">
          
          <div class="card">
                  <div class="card-body">
                    <div class="row">
                       <div class="col-md-3">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Select Agent</label>
                        <?php 
                        $agent_details = [];
                        $start_date = $end_date ='';
                        $agent_id_get = 'all';
                        if(isset($_GET['agent_id'])){
                          $agent_id_get = $_GET['agent_id'];
                          $start_date       = $_GET['start_date'];
                          $end_date       = $_GET['end_date'];
                        }
                        foreach($students as $course){
                          $agent_details[$course->created_by_id] = $course->name." (".$course->agent_email.")";
                        }
                        ?>
                        <select name="agent_id" class="form-control" required="">
                            <option  value="">Select Agent</option>
                          @foreach($agent_details as $agent_id => $agents)
                            <option {{ $agent_id_get==$agent_id ? "selected" : "" }} value="{{ $agent_id }}">{{ $agents }}</option>
                          @endforeach
                          </select>
                      </div>
                    </div> 
                     <div class="col-md-3">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Start Date</label>
                          <input name="start_date" type="text" class="form-control datepicker" placeholder="Select Start Date" value="{{ $start_date }}" required="">
                         </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                          <label for="exampleInputEmail1">End Date</label>
                          <input name="end_date" type="text" class="form-control datepicker" placeholder="Select End Date" value="{{ $end_date }}" required="">
                        </div>
                      </div>
                       
                    <div class="col-md-2">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Find</label>
                            <button  type="submit" class="form-control btn btn-success findStudent">Search</button>
                          </div>
                    </div> 
                     <div class="col-md-1">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Reset</label>
                      <a href="{{url('/report-single')}}"><button type="button" class="btn btn-block btn-primary">Reset</button></a>
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
           
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Student Name</th>
                  <th>Student Email</th>
                  <!-- <th>Created By</th> -->
                  <th>Agent Email</th>

                  <th>Fee</th>
                  <th>Payment Date</th>
                  <th>Comission Rate</th>

                  <th>Agent Comission</th>
                  <th>Agent Payment Status</th>
                  <!-- <th>Action</th> -->
                </tr>
                </thead>
                <tbody>
                  <?php $totalPaidComission[] = 0;$totalUnpaidComission[] = 0;$totalFee[] = 0;  $totalAgentComission[] = 0;    ?>
        @foreach($students as $course)
        <tr>
            <td style="font-size: 14px;">{{$course->title.' '.$course->surname.' '.$course->given_name }}</td>
            <td style="font-size: 14px;">{{$course->student_email }}</td>
            <!-- <td style="font-size: 12px;">{{ ucfirst($course->type) }}</td> -->
            <td style="font-size: 14px;">{{$course->agent_email }}</td>

            <td style="font-size: 14px;">{{ $totalFee[] = $course->debit_fee }}</td>
            <td style="font-size: 14px;">{{date('d/m/Y',strtotime($course->payment_date)) }}</td>
            <td style="font-size: 14px;">{{ $course->agent_commision_percentage }} %</td>
            <td style="font-size: 14px;">{{ $totalAgentComission[] =  ($course->debit_fee *  $course->agent_commision_percentage)/100 }}</td>
             @if($course->agent_commision_payment_status=='null' || $course->agent_commision_payment_status=='0')     
              <td>
                <button class="btn btn-sm btn-danger">Pending</button>
              @if($session->type!='agent')
                <a href="{{ url('agent-commision-change-payment-status/'.base64_encode($course->payment_id))}}/1"><button class="btn btn-sm btn-success">Pay</button></a>
                @endif
            </td>
              <input type="hidden" value="<?php $totalUnpaidComission[] = ($course->debit_fee *  $course->agent_commision_percentage)/100;?>">
            @elseif($course->agent_commision_payment_status =='1')
            <td>
              <button class="btn btn-sm btn-success">Paid</button>
              @if($session->type!='agent')
                <a href="{{ url('agent-commision-change-payment-status/'.base64_encode($course->payment_id))}}/0"><button class="btn btn-sm btn-info">Hold</button></a></td>
                @endif

             <input type="hidden" value="<?php $totalPaidComission[] = ($course->debit_fee *  $course->agent_commision_percentage)/100;?>">
           @endif
        </tr>
        @endforeach
                </tbody>
              </table>
            </div>


            <!-- /.card-body -->
          </div>
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Total Summary</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                     
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Total Fee</label>
                              <div><?php echo array_sum($totalFee); ?></div>
                              
                            </div>
                          </div>

                          <div class="col-md-2">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Total Agent Comission</label>
                             <div><?php echo array_sum($totalAgentComission); ?></div>
                            </div>
                          </div>
                          <div class="col-md-2">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Total Paid Comission</label>
                              <div><?php echo array_sum($totalPaidComission); ?></div>
                                                          </div>
                          </div>
                           <div class="col-md-3">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Total Pending Comission</label>
                              <div><?php echo array_sum($totalUnpaidComission); ?></div>
                                                          </div>
                          </div>
                        </div>
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
  <script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.js"></script>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.datepicker').datepicker({
              format: 'dd/mm/yyyy'
           });
        });
        
</script>
<script>
  $(function () {
    $("#example1").DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'print'
        ]
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
  @endsection