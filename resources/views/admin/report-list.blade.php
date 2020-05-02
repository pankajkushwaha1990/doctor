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
                <div class="col-md-5"><h3 class="card-title">Payment Reports</h3></div>
                <div class="col-md-5">
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
                 <div class="col-md-2"><a href="{{url('/report-single')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Single Report</button></a></div>

                
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Assign Id</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Agent</th>
                  <th>Total Fee</th>
                  <th>Paid Fee</th>
                  <th>Pending Fee</th>
                  <th>Action</th>
                  <!-- <th>Action</th> -->
                </tr>
                </thead>
                <tbody>
                @foreach($students as $course)
        <tr>
            <td>{{$course->assign_id }}</td>
            <td>{{$course->surname." ".$course->given_name }}</td>
            <td>{{$course->phone_number }}</td>
            <td>{{$course->agent_email }}</td>
            <td>{{$course->total_fee }}</td>
            <td>{{$course->paid_fee }}</td>
            <td>{{ $course->total_fee - $course->paid_fee }} </td>
           <td>
                <form action="{{ url('student', $course->id)}}" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="DELETE">
                  <a target="_blank" href="{{ url('report-list-details/'.base64_encode($course->assign_id))}}">
                    <button type="button" class="btn btn-sm btn-primary">Details</button>
                  </a>
                </form>
            </td>
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