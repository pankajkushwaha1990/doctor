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

          <form role="form" method="get" action="{{ url('request-for-invoice') }}">
          
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Filter Request Invoice</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                       <div class="col-md-4">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Select Agent</label>
                        <?php 
                        $agent_details = [];
                        $status        = 0120;
                        $agent_id_get = 'all';
                        if(isset($_GET['agent_id'])){
                          $agent_id_get = $_GET['agent_id'];
                          $status       = $_GET['request_for_invoice_status'];
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
                        <label for="exampleInputEmail1">Request For Invoice Status</label>
                         <select name="request_for_invoice_status" class="form-control" required="">
                            <option  value="">Select Status</option>
                            <option {{ $status=='0' ? "selected" : "" }}  value="0">Pending</option>
                            <option {{ $status=='1' ? "selected" : "" }} value="1">Generated</option>
                          </select>
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
                      <a href="{{url('/request-for-invoice')}}"><button type="button" class="btn btn-block btn-primary">Reset</button></a>
                    </div>
                    </div>

                    @if($session->type!='agent' && $agent_id_get!='all')
                    <div class="col-md-1">
                      <div class="form-group">
                              <label for="exampleInputEmail1">Request</label>
                      <button type="submit" name="send_request" value="yes" class="btn btn-block btn-info">Send</button>
                    </div>
                    </div>  
                    @endif

                                    <!--  <div class="col-md-1"><a href="{{url('/requestForInvoiceFilter')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Request</button></a></div> -->

                  </div> 
                </form>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
     <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-5"><h3 class="card-title">Request For Invoice</h3></div>
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
                <!--  <div class="col-md-1"><a href="{{url('/requestForInvoiceFilter')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Request</button></a></div> -->

                
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Student Name</th>
                  <th>Student Email</th>
                  <th>Agent</th>
                  <th>Agent Email</th>

                  <th>Fee</th>
                  <th>Payment Date</th>
                  <th>Request For Invoice</th>
                  <!-- <th>Action</th> -->
                </tr>
                </thead>
                <tbody>
                @foreach($students as $course)
        <tr>
            <td style="font-size: 12px;">{{$course->title.' '.$course->surname.' '.$course->given_name }}</td>
            <td style="font-size: 12px;">{{$course->student_email }}</td>
            <td style="font-size: 12px;">{{ ucfirst($course->type) }}</td>
            <td style="font-size: 12px;">{{$course->agent_email }}</td>

            <td style="font-size: 12px;">{{ $totalFee[] = $course->debit_fee }}</td>
            <td style="font-size: 12px;">{{date('d/m/Y',strtotime($course->payment_date)) }}</td>
             @if($course->request_for_invoice_status =='0')         
              <td><button class="btn btn-sm btn-danger">Pending</button></td>         
            @elseif($course->request_for_invoice_status =='1')
            <td><button class="btn btn-sm btn-success">Generated</button></td>    
           @endif
           <!--  <td>
                <form action="{{ url('student', $course->id)}}" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="DELETE">
                  <a href="{{ url('setting',$course->id)}}/edit">
                    <button type="button" class="btn btn-sm btn-primary">Edit</button>
                  </a>
                </form>
            </td> -->
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
  @endsection
  @section('scripts')
  <script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
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