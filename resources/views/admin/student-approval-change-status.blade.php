@extends('master') 
@section('title','Dashboard')
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
          <div class="col-md-12">
          <form role="form" method="post" action="{{ url('student-approval-change-status-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Student Approval Status</h3>
              </div>
               <div class="card-body">
<div class="row">
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title *</label>
                    <p>{{ $agent->title }}</p>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Gender *</label>
                    <p>{{ $agent->gender }}</p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Date Of Birth ('YYYY-MM-DD') *</label>
                   <p>{{ $agent->date_of_birth }}</p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Email *</label>
                    <p>{{$agent->student_email }}</p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Surname *</label>
                    <p>{{ $agent->surname }}</p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Given Name*</label>
                    <p>{{ $agent->given_name }}</p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Proffered Name*</label>
                    <p>{{ $agent->proffered_name }}</p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Passport Number *</label>
                    <p>{{ $agent->passport_number }}</p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number*</label>
                    <p>{{ $agent->phone_number }}</p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Postal Code*</label>
                    <p>{{ $agent->post_code }}</p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Town *</label>
                    <p>{{ $agent->town }}</p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">State*</label>
                    <p>{{ $agent->state }}</p>
                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Country *</label>
                    <p>{{ $agent->country }}</p>
                  </div>
                </div>
              </div>
              <input type="hidden" name="student_id" value="{{ $agent->student_id }}">
              <input type="hidden" name="student_email" value="{{ $agent->student_email }}">
              <div class="row">
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Approval Status *</label>
                    <select class="form-control" required="" name="approval_status">
                      <option  value="">Select Status</option>
                      <option {{ ($agent->approval_status)==0 ? "selected" : "" }} value="0">Pending</option>

                      <option {{ ($agent->approval_status)=='1' ? "selected" : "" }} value="1">Approved</option>

                      <option {{ ($agent->approval_status)=='2' ? "selected" : "" }} value="2">Decliend</option>
                      <option {{ ($agent->approval_status)=='3' ? "selected" : "" }} value="3">In-Process</option>
                      <option {{ ($agent->approval_status)=='4' ? "selected" : "" }} value="4">Completed</option>
                      <option {{ ($agent->approval_status)=='5' ? "selected" : "" }} value="5">Cancled</option>
                    </select>
                  </div>
                </div>
               
               
              </div>
            

              <div class="row">
                <div class="col-md-11">
                  
                </div>
                <div class="col-md-1">
                   <div class="form-group">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </div>

              </div>
            </div>
              <!-- /.card-header -->
              <!-- form start -->
              </form>
            </div>
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