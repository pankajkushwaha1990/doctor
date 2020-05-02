@extends('master') 
@section('title','Dashboard')
@section('styles')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">

@endsection 
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

         <section class="content">
      <div class="row">
        <div class="col-12">

          <form role="form" method="get" action="{{ url('purchased-package-report-list') }}">
          
          <div class="card">
                  <div class="card-body">
                    <div class="row">
                       <div class="col-md-3">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Select Package</label>
                        <?php 
                        $agent_details = [];
                        $start_date = $end_date ='';
                        $package_id_get = 'all';
                        if(isset($_GET['package_id'])){
                          $package_id_get   = $_GET['package_id'];
                          $start_date       = $_GET['start_date'];
                          $end_date         = $_GET['end_date'];
                        }
                        ?>
                        <select name="package_id" class="form-control">
                            <option  value="">Select Package</option>
                          @foreach($package_filter as $agent_id => $packages)
                            <option {{ $package_id_get==$packages->id ? "selected" : "" }} value="{{ $packages->id }}">{{ $packages->package_name }}</option>
                          @endforeach
                          </select>
                      </div>
                    </div> 
                     <div class="col-md-3">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Start Date</label>
                          <input name="start_date" type="text" class="form-control datepicker" placeholder="Select Start Date" value="{{ $start_date }}" >
                         </div>
                      </div>
                      <div class="col-md-3">
                         <div class="form-group">
                          <label for="exampleInputEmail1">End Date</label>
                          <input name="end_date" type="text" class="form-control datepicker" placeholder="Select End Date" value="{{ $end_date }}" >
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
                      <a href="{{url('/purchased-package-report-list')}}"><button type="button" class="btn btn-block btn-primary">Reset</button></a>
                    </div>
                    </div>

                                    <!--  <div class="col-md-1"><a href="{{url('/requestForInvoiceFilter')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Request</button></a></div> -->

                  </div> 
                </form>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>

    <!-- Main content -->
        <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-4"><h3 class="card-title">Package Report List</h3></div>
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

               <!--  <div class="col-md-2"><a href="{{url('/user-package-create')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Book Package</button></a></div> -->
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>User Name</th>
                  <th>Package Name</th>
                  <!-- <th>D/N</th> -->
                  <!-- <th>Amenities</th> -->
                  <!-- <th>Hotel</th> -->
                  <!-- <th>Flight</th> -->
                  <th>Itinerary</th>
                  <th>Coupon</th>
                  <th>Cost Break</th>
                  <th>Final Cost </th>
                  <th>Pending Cost </th>
                  <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($package_list as $package)
        <tr>
            <td>{{ ucfirst($package->user_details->name) }}</td>
            <td>{{ ucfirst($package->package_details->package_name) }}</td>
            <!-- <td>{{$package->package_details->package_days."/".$package->package_details->package_night }}</td> -->
            <!-- <td>
              <?php 
              if($package->package_details->amenities){
                foreach ($package->package_details->amenities as $key => $amenities) { ?>
                  <button type="button" class="btn btn-primary btn-sm"><?php echo $amenities->amenities_name; ?></button>
                <?php }
              } ?>
            </td> -->
            <!-- <td>{{$package->package_details->hotel_category." *"}}</td> -->
            <!--  <td>
              <?php 
              if($package->package_details->flights){
                foreach ($package->package_details->flights as $key => $flights) { ?>
                  <button type="button" class="btn btn-warning btn-sm"><?php echo $flights->flight_name; ?></button>
                <?php }
              } ?>
            </td> -->
            <td>
              <?php 
              if($package->final_cost){
                $total = 0;
                foreach ($package->final_cost as $key => $itinerary) {
                  $total += $itinerary->itinerary_cost;
                 ?>
                  <button type="button" class="btn btn-primary btn-sm"><?php echo $itinerary->itinerary_title; ?> <span class="badge"><?php echo $itinerary->itinerary_cost; ?></span></button>
               
                <?php 
              } 
            } ?>
            </td>
            <?php 
            $final_package_cost = $package->package_cost+$total;
            if(!empty($package->coupon_discount)){
                if($package->coupon_discount[0]->coupon_type=='percentage'){
                  $coupon_value         = $package->coupon_discount[0]->coupon_value;
                  $final_package_cost   =  ($final_package_cost*$coupon_value)/100;
                  $coupon_show          =  $coupon_value." %";
                }elseif($package->coupon_discount[0]->coupon_type=='flat'){
                  $coupon_value         = $package->coupon_discount[0]->coupon_value;
                  $final_package_cost   =   $coupon_value;
                  $coupon_show          =  "- ".$coupon_value; 
                }
            }
            ?>


            <td><button type="button" class="btn btn-info btn-sm">{{ $package->coupon_code }} ({{ $coupon_show }})</button></td>
            <td>{{ $package->package_cost."+".$total."-".$final_package_cost}}</td>
            <td>{{ $package->final_package_cost }}</td>
            <td>{{ $package->pending_amount }}</td>
            <td>{{ date('d/m/Y',strtotime($package->created_at)) }}</td>

            <!-- <td> -->
           
                 <!--  @if($package->status =='1')         
                        <a href="{{ url('package-change-status/0/'.base64_encode($package->id))}}"><button class="btn btn-sm btn-success">Active</button></a>         
                  @else
                  <a href="{{ url('package-change-status/1/'.base64_encode($package->id))}}"><button class="btn btn-sm btn-danger">Deactive</button></a>      
                 @endif -->
                 <!--  <a href="{{ url('member-edit/'.base64_encode($package->id))}}">
                    <button type="button" class="btn btn-sm btn-primary">Edit</button>
                  </a>
                  <a onclick="return confirm('Are You Sure To Delete?');" href="{{ url('member-delete/'.base64_encode($package->id))}}">
                  <button class="btn btn-sm btn-danger" type="button">Delete</button>
                </a> -->
               
            <!-- </td> -->
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
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

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

     $(function () {
      $('.datepicker').datepicker({
        format: 'dd/mm/yyyy'
     });
    });

</script>
  @endsection