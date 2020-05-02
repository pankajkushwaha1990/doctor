@extends('master') 
@section('title','Dashboard')
@section('styles')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
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
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-5"><h3 class="card-title">Agent Commissions</h3></div>
                <div class="col-md-6"><h3 class="card-title">
                  @if(session()->get('success'))
                    <span class="text-success">
                      {{ session()->get('success') }}  
                    </span>
                  @endif</h3>
                </div>


                @if($session->type!='agent')
                 <div class="col-md-1"><a href="{{url('/request-for-invoice')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Request</button></a></div>
                @endif

                
              </div>
              
            </div>
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
                  <th>Commission Rate</th>

                  <th>Agent Commission</th>
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

                          <div class="col-md-3">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Total Agent Commission</label>
                             <div><?php echo array_sum($totalAgentComission); ?></div>
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Total Paid Commission</label>
                              <div><?php echo array_sum($totalPaidComission); ?></div>
                                                          </div>
                          </div>
                           <div class="col-md-3">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Total Pending Commission</label>
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
</script>
  @endsection