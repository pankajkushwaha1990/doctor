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
                <div class="col-md-5"><h3 class="card-title">Coupons List</h3></div>
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

                <div class="col-md-1"><a href="{{url('/coupons-create')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Add</button></a></div>
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Coupon Name</th>
                  <th>Coupon Code</th>
                  <th>Amount/Percent</th>
                  <th>Coupon Type</th>
                  <th>coupon Limit</th>
                  <th>Create On</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($coupons_list as $coupons)
                  <tr>
                      <td>{{$coupons->coupon_name}}</td>                      
                      <td>{{$coupons->coupon_code}}</td>
                      <td>{{$coupons->coupon_value}}</td>
                      <td>{{ strtoupper($coupons->coupon_type) }}</td>
                      <td>{{ $coupons->coupon_limit }}</td>
                      <td>{{ $coupons->created_date }}</td>
                      @if($coupons->status =='1')         
                        <td><a href="{{ url('coupons-change-status/0/'.base64_encode($coupons->id))}}"><button class="btn btn-sm btn-success">Active</button></a></td>         
                      @else
                      <td><a href="{{ url('coupons-change-status/1/'.base64_encode($coupons->id))}}"><button class="btn btn-sm btn-danger">Deactive</button></a></td>        
                     @endif
                      <td>
                          <form action="{{ url('agent', $coupons->id)}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <a href="{{ url('coupons-edit/'.base64_encode($coupons->id))}}">
                              <button type="button" class="btn btn-sm btn-primary">Edit</button>
                            </a>
                            <a onclick="return confirm('Are You Sure To Delete?');" href="{{ url('coupons-delete/'.base64_encode($coupons->id))}}">
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