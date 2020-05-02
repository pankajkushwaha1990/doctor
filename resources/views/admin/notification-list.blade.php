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
                <div class="col-md-5"><h3 class="card-title">Notification List</h3></div>
                <div class="col-md-5"><h3 class="card-title">
                  @if(session()->get('success'))
                    <span class="text-success">
                      {{ session()->get('success') }}  
                    </span>
                  @endif</h3>
                </div>

                @if($session->type!='agent')
                <div class="col-md-2"><a href="{{url('/notification-create')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Create New</button></a></div>
                @endif

                
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Subject</th>
                  <th>Message</th>
                  <th>Attachment</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $course)
        <tr>
            <td>{{ substr($course->notification_subject,0,75).".." }}</td>
            <td>{{ substr($course->notification_message,0,150).".." }}</td>
            <td>@if(!empty($course->attachment)){{"Yes"}} @else {{ "NO" }} @endif</td>
            <td>{{ date('d/m/Y',strtotime($course->created_at)) }}</td>

            

            <td>
                <form action="{{ url('student', $course->id)}}" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="DELETE">
                  <a href="{{ url('/notification-list-view/'.base64_encode($course->id))}}">
                    <button type="button" class="btn btn-sm btn-primary">View</button>
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