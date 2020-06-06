@extends('master') 
@section('title','Dashboard') 
@section('content')
        @section('styles')
          <link rel="stylesheet" href="{{asset('template/admin')}}/assets/plugins/datatables/datatables.min.css">
        @endsection
        <!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
        
          <!-- Page Header -->
<!--           <div class="page-header">
            <div class="row">
              <div class="col-sm-12">
                <h3 class="page-title">List of Doctors</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                  <li class="breadcrumb-item active">Doctor</li>
                </ul>
              </div>
            </div>
          </div> -->
          <!-- /Page Header -->
          
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="datatable table table-hover table-center mb-0">
                      <thead>
                        <tr>
                          <th>Doctor ID</th>
                          <th>Doctor Name</th>
                          <th>Speciality</th>
                          <th>Address</th>
                          <th>Mobile</th>
                          <th>Registred On</th>
                          <th class="text-right">Action</th>
                          <th class="text-right">Premium</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @if(!empty($list))
                          @foreach($list as $doctor)
                        <tr>
                          <td>#DR{{ $doctor->id }}</td>

                          <td>
                            <h2 class="table-avatar">
                              <a target="_blank" href="{{ url('doctor_profile_view') }}/{{ base64_encode(base64_encode($doctor->id)) }}" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('doctor_files')}}/{{ $doctor->profile_picture }}" alt="User Image"></a>
                              <a href="{{ url('doctor_profile_view') }}/{{ base64_encode(base64_encode($doctor->id)) }}">{{ $doctor->name }}</a>
                            </h2>
                          </td>
                          <td>{{ $doctor->clinic_specialist }}</td>
                          <td>{{ $doctor->city }}, {{ $doctor->state }}</td>
                          <td>{{ $doctor->mobile }}</td>

                          
                         
                          
                           <td>{{ $doctor->created_at }}</td>

                           @if($doctor->status =='1')         
                              <td><a href="{{ url('admin_doctor_change_status/0/'.base64_encode($doctor->id))}}"><button class="btn btn-sm btn-success">Active</button></a></td>         
                            @else
                            <td><a href="{{ url('admin_doctor_change_status/1/'.base64_encode($doctor->id))}}"><button class="btn btn-sm btn-danger">Deactive</button></a></td>        
                           @endif

                            @if($doctor->premenum_status =='1')         
                              <td><a href="{{ url('admin_doctor_change_premium_status/0/'.base64_encode($doctor->id))}}"><button class="btn btn-sm btn-success">Active</button></a></td>         
                            @else
                            <td><a href="{{ url('admin_doctor_change_premium_status/1/'.base64_encode($doctor->id))}}"><button class="btn btn-sm btn-danger">Deactive</button></a></td>        
                           @endif


                        </tr>
                        </tr>
                        @endforeach
                      @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>      
          </div>
          
        </div>      
      </div>
      <!-- /Page Wrapper -->
      @section('scripts')
      <script src="{{asset('template/admin')}}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="{{asset('template/admin')}}/assets/plugins/datatables/datatables.min.js"></script>
      <script  src="{{asset('template/admin')}}/assets/js/script.js"></script>
      @endsection      
   
@endsection