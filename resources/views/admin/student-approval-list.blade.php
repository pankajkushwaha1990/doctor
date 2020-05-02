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
                <div class="col-md-5"><h3 class="card-title">Student List</h3></div>
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

               <!--  <div class="col-md-1"><a href="{{url('/student/create')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Add</button></a></div> -->
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Date Of Birth</th>
                  <th>Email</th>
                  <th>Country</th>
                  <th>Created By</th>
                  <th>Action</th>
                  <th>Approval Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $course)
        <tr>
            <td>{{$course->assign_id}}</td>
            <td>{{$course->title.' '.$course->surname.' '.$course->given_name }}</td>
            <td>{{$course->date_of_birth}}</td>
            <td>{{$course->student_email}}</td>
            <td>{{$course->country}}</td>
            <td>{{ ucfirst($course->type) }}</td>
            <td>
              @if($session->type!='agent')
                <form action="{{ url('student', $course->id)}}" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="DELETE">
                  <a href="{{ url('student-approval-change-status/'.base64_encode($course->student_id))}}">
                    <button type="button" class="btn btn-sm btn-primary">Change Status</button>
                  </a>
                </form>
                @endif

            </td>
             @if($course->approval_status == null || $course->approval_status == 0)         
              <td><button class="btn btn-sm btn-danger">Pending</button></td> 
            @elseif($course->approval_status =='3')
            <td><button class="btn btn-sm btn-info">In-Process</button></td>        
            @elseif($course->approval_status =='1')
            <td><button class="btn btn-sm btn-success">Approved</button></td>
            @elseif($course->approval_status =='2')
            <td><button class="btn btn-sm btn-danger">Decliend</button></td> 
            @elseif($course->approval_status =='4')
            <td><button class="btn btn-sm btn-default">Completed</button></td> 
            @elseif($course->approval_status =='5')
            <td><button class="btn btn-sm btn-warning">Cancled</button></td>        
           @endif


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