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
                <div class="col-md-5"><h3 class="card-title">Students Enrolled at Ashton</h3></div>
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

                <div class="col-md-1"><a href="{{url('student-create')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Add</button></a></div>
              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Date Of Birth</th>
                  <th>Email</th>
                  <th>Country</th>
                  <th>Created By</th>

                  <th>Action</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $course)
        <tr>
            <td style="font-size: 14px";>{{$course->title.' '.$course->surname.' '.$course->given_name }}</td>
            <td style="font-size: 14px";>{{$course->date_of_birth}}</td>
            <td style="font-size: 14px";>{{$course->student_email}}</td>
            <td style="font-size: 14px";>{{$course->country}}</td>
            <td style="font-size: 14px";>{{ ucfirst($course->type) }}</td>
            

            <td>
                <form action="{{ url('student', $course->id)}}" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="DELETE">
                  
                  @if($session->type =='agent' && ($course->student_status =='0' || $course->student_status =='2'))
                  <a href="{{ url('student-edit/'.base64_encode($course->student_id))}}">
                    <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-pen" aria-hidden="true"></i></button>
                  </a>
                  @endif

                   @if($session->type !='agent')
                  <a href="{{ url('student-edit/'.base64_encode($course->student_id))}}">
                    <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-pen" aria-hidden="true"></i></button>
                  </a>
                  @endif

                   @if($session->type !='agent')
                    <a onclick="return confirm('Are You Sure To Delete?');" href="{{ url('student-delete/'.base64_encode($course->student_id))}}"><button class="btn btn-sm btn-danger" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </a>
                  @endif


                  <a href="{{ url('student-view/'.base64_encode($course->student_id))}}">
                    <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>
                  </a>
                </form>
            </td>
            <td>
             @if($course->student_status =='0')         
              <button status="0" class="btn btn-sm btn-info openStatusModel" studentId='{{$course->student_id}}' studentName="{{$course->title.' '.$course->surname.' '.$course->given_name }}" messageToAdmin="{{$course->message}}" studentEmail="{{$course->student_email}}" agentName="{{$course->name}}">Pending</button>
            @elseif($course->student_status =='3')
            <button status="3" class="btn btn-sm btn-warning openStatusModel" studentId='{{$course->student_id}}' studentName="{{$course->title.' '.$course->surname.' '.$course->given_name }}" messageToAdmin="{{$course->message}}" studentEmail="{{$course->student_email}}" agentName="{{$course->name}}">Processing</button>          
            @elseif($course->student_status =='1')
            <button status="1" class="btn btn-sm btn-success openStatusModel" studentId='{{$course->student_id}}' studentName="{{$course->title.' '.$course->surname.' '.$course->given_name }}" messageToAdmin="{{$course->message}}" studentEmail="{{$course->student_email}}" agentName="{{$course->name}}">Approved</button>
            @elseif($course->student_status =='2')
            <button status="2" class="btn btn-sm btn-danger openStatusModel" studentId='{{$course->student_id}}' studentName="{{$course->title.' '.$course->surname.' '.$course->given_name }}" messageToAdmin="{{$course->message}}" studentEmail="{{$course->student_email}}" title="{{$course->message}}" agentName="{{$course->name}}">Rejected</button>
           @endif
           @if($session->type !='agent')
           <button class="btn btn-sm btn-success openStatusModelMail" studentId='{{$course->student_id}}' studentName="{{$course->title.' '.$course->surname.' '.$course->given_name }}" messageToAdmin="{{$course->message}}" studentEmail="{{$course->student_email}}" agentEmail="{{$course->agent_email}}" messageText="Welcome To Ashton" agentName="{{$course->name}}"><i class="fa fa-envelope" aria-hidden="true"></i></button>
           @endif  
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

<!-- end modal -->
  </div>
      <!-- Modal -->
<div id="openStatusModel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width: 150%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Application Status</h4>
      </div>
      <div class="modal-body" >
       <form role="form" method="post" action="{{ url('student-status-change') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="col-md-3"><b>Student Name</b></div>
          <div class="col-md-3 studentName"></div>
          <div class="col-md-3"><b>Student Email</b></div>
          <div class="col-md-3 studentEmail"></div>
        </div>
        <input type="hidden" name="student_id" id="studentId" value=''>
        <div class="row">
          <div class="col-md-3"><b>Agent Name</b></div>
          <div class="col-md-3 agentName"></div>
          <div class="col-md-3"><b>Change Status</b></div>
          <div class="col-md-3">
            <div class="form-group">
                    
                    <select class="form-control status" required="" name="status">
                      <option  value="">Select Status</option>
                      <option  value="0">Pending</option>
                      <option  value="3">Processing</option>
                      <option  value="1">Approved</option>
                      <option  value="2">Rejected</option>
                    </select>
                  </div>
          </div>
        </div>

        <div class="row messageToAdminView" style="display: none;" >
          <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Message To Sender *</label>
                    <textarea type="text" name="message" class="form-control" id="messageToAdmin" placeholder="Enter Your Message" ></textarea>
                    @if ($errors->has('message')) <p style="color:red;">{{ $errors->first('message') }}</p> @endif

                  </div>
                </div>
        </div>
        <div class="row">
                <div class="col-md-6">
                  
                </div>
                <div class="col-md-1">
                   <div class="form-group">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </div>

              </div>

              </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>

      <!-- Modal -->
<div id="openStatusModelMail" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width: 150%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Send Mail</h4>
      </div>
      <div class="modal-body" >
       <form role="form" method="post" action="{{ url('student-mail-send') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
          <div class="col-md-2"><b>To</b></div>
          <div class="col-md-1">Student:</div>
          <div class="col-md-4" id="studentEmailNew"></div>
          <input type="hidden" name="toEmail[]" class="studentEmailNew">
          <div class="col-md-1">Agent:</div>
          <div class="col-md-4" id="agentEmailNew"></div>
          <input type="hidden" name="toEmail[]" class="agentEmailNew">


        </div>
        <br>
        <div class="row">
          <div class="col-md-2"><b>CC</b></div>
          <div class="col-md-10"><input type="text" class="form-control" name="toEmail[]"></div>
        </div>
        <input type="hidden" name="student_id" id="studentId" value=''>
        <br>
        <div class="row">
          <div class="col-md-2"><b>Message</b></div>
          <div class="col-md-10"><textarea class="form-control" name="message" id="messageTextNew"></textarea></div>
        </div>

       <br>
        <div class="row">
                <div class="col-md-10">
                  
                </div>
                <div class="col-md-1">
                   <div class="form-group">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </div>

              </div>

              </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
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
<?php 
if($session->type=="admin" || $session->type=="employee"){
 ?>
<script type="text/javascript">
  $(function(){
    $('.openStatusModel').click(function(){
      $('.studentName').text($(this).attr('studentName'));
      $('.studentEmail').text($(this).attr('studentEmail'));
      $('.agentName').text($(this).attr('agentName'));
      $('.status').val($(this).attr('status'));
      if($(this).attr('status')=='2'){
        $('.messageToAdminView').show();
      }else{
        $('.messageToAdminView').hide();
      }
      $('#studentId').val($(this).attr('studentId'));
      $('#messageToAdmin').val($(this).attr('messageToAdmin'));
      $('#openStatusModel').modal('toggle');
    })

    $('.openStatusModelMail').click(function(){
      var studentEmail = $(this).attr('studentEmail');
      var agentEmail   = $(this).attr('agentEmail');
      var messageText  = $(this).attr('messageText');

      $('#studentEmailNew').text(studentEmail);
      $('.studentEmailNew').val(studentEmail);
      $('#agentEmailNew').text(agentEmail);
      $('.agentEmailNew').val(agentEmail);
      $('#messageTextNew').text(messageText);
      $('#openStatusModelMail').modal('toggle');
    })

    $('.status').change(function(){
      var status = $(this).val();
      if(status=='2'){
        $('.messageToAdminView').show();
      }else{
        $('.messageToAdminView').hide();
      }
    })
  })
</script>
<?php } ?>
  @endsection