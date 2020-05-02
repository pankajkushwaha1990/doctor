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
                <div class="col-md-6"><h3 class="card-title">
                  @if(session()->get('success'))
                    <span class="text-success">
                      {{ session()->get('success') }}  
                    </span>
                  @endif</h3>
                </div>

                <!-- <div class="col-md-1"><a href="{{url('/student/create')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Add</button></a></div> -->
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Assign ID</th>

                  <th>Name</th>
                  <th>DOB</th>
                  <th>Email</th>
                  <th>Country</th>
                  <th>Created By</th>
                  <th>Action</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $course)
        <tr>
            <td>{{$course->assign_id }}</td>
            <td>{{$course->title.' '.$course->surname.' '.$course->given_name }}</td>
            <td>{{$course->date_of_birth}}</td>
            <td>{{$course->student_email}}</td>
            <td>{{$course->country}}</td>
            <td>{{ ucfirst($course->type) }}</td>
            <td>
              @if($course->student_status =='1' && $session->type!='agent')
                  <a href="{{ url('student-assign-edit/'.base64_encode($course->student_id))}}">
                    <button type="button" class="btn btn-sm btn-primary">Assign</button>
                  </a>
              @endif

            </td>
            @if($course->student_status =='0')         
              <td><button class="btn btn-sm btn-info">Pending</button></td>         
            @elseif($course->student_status =='1')
            <td><button class="btn btn-sm btn-success">Approved</button></td>
            @elseif($course->student_status =='2')
            <td><button title="{{$course->message}}" class="btn btn-sm btn-danger">Rejected</button></td>  
            @elseif($course->student_status =='3')
            <td><button class="btn btn-sm btn-warning">Processing</button></td>        
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