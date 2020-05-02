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
                <div class="col-md-5"><h3 class="card-title">Member List</h3></div>
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

                <div class="col-md-1"><a href="{{url('/member-create')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Add</button></a></div>
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Type</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Country</th>
                  <th>Email Verify</th>
                  <th>Assign Menu</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($agents as $course)
        <tr>
            <td>{{ ucfirst($course->type) }}</td>
            <td>{{$course->name}}</td>
            <td>{{$course->email}}</td>
            <td>{{$course->city}}</td>
            <td>{{$course->state}}</td>
            <td>{{$course->country}}</td>
            @if($course->email_verify =='1')         
              <td><button class="btn btn-sm btn-success">Yes</button></td>         
            @else
            <td><button class="btn btn-sm btn-danger">No</button></td>        
           @endif
            <td><a href="{{ url('member-assign-menu/'.base64_encode($course->id))}}"><button class="btn btn-sm btn-warning">Assign</button></a></td>

            <td>
                <form action="{{ url('agent', $course->id)}}" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="DELETE">
                  <a href="{{ url('member-edit/'.base64_encode($course->id))}}">
                    <button type="button" class="btn btn-sm btn-primary">Edit</button>
                  </a>
                  <a onclick="return confirm('Are You Sure To Delete?');" href="{{ url('member-delete/'.base64_encode($course->id))}}">
                  <button class="btn btn-sm btn-danger" type="button">Delete</button>
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