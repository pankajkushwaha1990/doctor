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
                <div class="col-md-5"><h3 class="card-title">Flight List</h3></div>
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

                <div class="col-md-1"><a href="{{url('/flight-create')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Add</button></a></div>
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Flight Name</th>
                  <th>Flight Logo</th>
                  <th>Flight Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($flights_list as $flight)
                  <tr>
                      <td>{{$flight->flight_name}}</td>                      
                      <td><img src="{{ url('').'/flights_image/'.$flight->flight_logo }}"></td>
                      <td>{{$flight->flight_description}}</td>
                      @if($flight->status =='1')         
                        <td><a href="{{ url('flight-change-status/0/'.base64_encode($flight->id))}}"><button class="btn btn-sm btn-success">Active</button></a></td>         
                      @else
                      <td><a href="{{ url('flight-change-status/1/'.base64_encode($flight->id))}}"><button class="btn btn-sm btn-danger">Deactive</button></a></td>        
                     @endif
                      <td>
                          <form action="{{ url('agent', $flight->id)}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <a href="{{ url('flight-edit/'.base64_encode($flight->id))}}">
                              <button type="button" class="btn btn-sm btn-primary">Edit</button>
                            </a>
                            <a onclick="return confirm('Are You Sure To Delete?');" href="{{ url('flight-delete/'.base64_encode($flight->id))}}">
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