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
                <div class="col-md-5"><h3 class="card-title">Package List</h3></div>
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

                <div class="col-md-1"><a href="{{url('/package-create')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Add</button></a></div>
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Package Name</th>
                  <th>Days/Night</th>
                  <th>Cost</th>
                  <th>Amenities</th>
                  <th>Hotel</th>
                  <th>Flight</th>
                  <th>Itinerary</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($package_list as $package)
        <tr>
            <td>{{ ucfirst($package->package_name) }}</td>
            <td>{{$package->package_days."/".$package->package_night }}</td>
            <td>{{$package->package_cost}}</td>
            <td>
              <?php 
              if($package->amenities){
                foreach ($package->amenities as $key => $amenities) { ?>
                  <button type="button" class="btn btn-primary btn-sm"><?php echo $amenities->amenities_name; ?></button>
                <?php }
              } ?>
            </td>
            <td>{{$package->hotel_category." *"}}</td>
             <td>
              <?php 
              if($package->flights){
                foreach ($package->flights as $key => $flights) { ?>
                  <button type="button" class="btn btn-warning btn-sm"><?php echo $flights->flight_name; ?></button>
                <?php }
              } ?>
            </td>
            <td>
              <?php 
              if($package->itinerary){
                foreach ($package->itinerary as $key => $itinerary) {
                   if($itinerary->itinerary_default_status==0){
                 ?>
                  <button type="button" class="btn btn-primary btn-sm"><?php echo $itinerary->itinerary_title; ?> <span class="badge"><?php echo $itinerary->itinerary_cost; ?></span></button>
                <?php }else{ ?>
                  <button type="button" class="btn btn-danger btn-sm"><?php echo $itinerary->itinerary_title; ?> <span class="badge"><?php echo $itinerary->itinerary_cost; ?></span></button>
                <?php }
              } 
            } ?>
            </td>
            <td>
           
                  @if($package->status =='1')         
                        <a href="{{ url('package-change-status/0/'.base64_encode($package->id))}}"><button class="btn btn-sm btn-success">Active</button></a>         
                  @else
                  <a href="{{ url('package-change-status/1/'.base64_encode($package->id))}}"><button class="btn btn-sm btn-danger">Deactive</button></a>      
                 @endif
                 <!--  <a href="{{ url('member-edit/'.base64_encode($package->id))}}">
                    <button type="button" class="btn btn-sm btn-primary">Edit</button>
                  </a>
                  <a onclick="return confirm('Are You Sure To Delete?');" href="{{ url('member-delete/'.base64_encode($package->id))}}">
                  <button class="btn btn-sm btn-danger" type="button">Delete</button>
                </a> -->
               
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