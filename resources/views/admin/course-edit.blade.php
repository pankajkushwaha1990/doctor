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
          <form role="form" method="post" action="{{ url('course-edit-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Course</h3>
              </div>
               <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Course Name *</label>
                    <input type="text" name="course_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Course Name" value="{{ $course->course_name }}" required="">
                    @if ($errors->has('course_name')) <p style="color:red;">{{ $errors->first('course_name') }}</p> @endif

                  </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Course Code  *</label>
                    <input name="course_code" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Course Code" value="{{ $course->course_code }}" readonly="">
                    @if ($errors->has('course_code')) <p style="color:red;">{{ $errors->first('course_code') }}</p> @endif
                  </div>
                </div>
<div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Duration (Week) *</label>
                    <input type="text" name="course_duration" class="form-control" id="exampleInputEmail1" placeholder="Enter Duration In Week" value="{{ $course->course_duration }}">
                    @if ($errors->has('course_duration')) <p style="color:red;">{{ $errors->first('course_duration') }}</p> @endif
                  </div>
                </div>

              </div>
            
             <div class="row">
                
                <div class="col-md-6">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Amount  *</label>
                    <input name="course_amount" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Course Amount" value="{{ $course->course_amount }}" required="">
                     @if ($errors->has('course_amount')) <p style="color:red;">{{ $errors->first('course_amount') }}</p> @endif
                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Material Amount  *</label>
                    <input name="material_amount" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Material Amount" value="{{ $course->material_amount }}" required="">

                    <input name="course_id" type="hidden" value="{{ $course->id }}" required="">

                     @if ($errors->has('material_amount')) <p style="color:red;">{{ $errors->first('material_amount') }}</p> @endif
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