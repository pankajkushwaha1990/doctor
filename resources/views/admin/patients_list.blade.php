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
                <h3 class="page-title">List of Patient</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                  <li class="breadcrumb-item active">Patient</li>
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
                    <div class="table-responsive">
                    <table class="datatable table table-hover table-center mb-0">
                      <thead>
                        <tr>
                          <th>Patient ID</th>
                          <th>Patient Name</th>
                          <th>DOB</th>
                          <th>Address</th>
                          <th>Phone</th>
                          <th>Registred On</th>
                          <th class="text-right">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                       @if($list)
                        @foreach($list as $patient) 
                        <tr>
                          <td>#PT{{ $patient->id }}</td>
                          <td>
                            <h2 class="table-avatar">
                              <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('patient_files')}}/{{ $patient->profile_picture }}" alt="User Image"></a>
                              <a href="profile.html">{{ $patient->name }}</a>
                            </h2>
                          </td>
                          <td>{{ $patient->date_of_birth }}</td>
                          <td>{{ $patient->city }}, {{ $patient->state }}</td>
                          <td>{{ $patient->mobile }}</td>
                          <td>{{ $patient->created_at }}</td>
                           @if($patient->status =='1')         
                              <td><a href="{{ url('admin_patient_change_status/0/'.base64_encode($patient->id))}}"><button class="btn btn-sm btn-success">Active</button></a></td>         
                            @else
                            <td><a href="{{ url('admin_patient_change_status/1/'.base64_encode($patient->id))}}"><button class="btn btn-sm btn-danger">Deactive</button></a></td>        
                           @endif
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
      </div>
      <!-- /Page Wrapper -->
      @section('scripts')
      <script src="{{asset('template/admin')}}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="{{asset('template/admin')}}/assets/plugins/datatables/datatables.min.js"></script>
      <script  src="{{asset('template/admin')}}/assets/js/script.js"></script>
      @endsection      
   
@endsection