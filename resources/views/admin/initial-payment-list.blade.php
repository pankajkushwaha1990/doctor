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
                <div class="col-md-4"><h3 class="card-title">Student Payment List</h3></div>
                <div class="col-md-4">
                    <h5 class="card-title">
                  @if(session()->get('success'))
                    <span class="text-success">
                      {{ session()->get('success') }}  
                    </span>
                  @endif
                   @if(session()->get('failure'))
                   <br>
                    <span class="text-danger">
                      {{ session()->get('failure') }}  
                    </span>
                  @endif
              </h5>
                </div>

                @if($session->type!='agent')
                <div class="col-md-2"><a href="{{url('/initial-payment-add')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Add Payment</button></a></div>

                <div class="col-md-2"><a href="{{url('/initial-payment-upload')}}"><button type="button" class="btn btn-block btn-sm btn-primary">Upload Payment</button></a></div>
                @endif


              </div>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Assign Id</th>
                  <th>Invoice No</th>
                  <th>Fee</th>
                  <th>Date Of Payment</th>
                  <th>Payment Status</th>
                  <th>Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $course)
        <tr>
            <td>{{$course->offer_assign }}</td>
            <td>{{$course->invoice_no}}</td>
            <td>{{$course->debit_fee}}</td>
            <td>{{ date('d/m/Y',strtotime($course->payment_date)) }}</td>
            <td>{{$course->payment_status}}</td>
            <td>

              @if($session->type!='agent')
              <a href="{{ url('initial-payment-edit/'.base64_encode($course->payment_id))}}">
                    <button type="button" class="btn btn-sm btn-primary"><i class="fa fa-pen" aria-hidden="true"></i></button>
              </a>
              <a onclick="return confirm('Are You Sure To Delete?');" href="{{ url('initial-payment-delete/'.base64_encode($course->payment_id))}}"><button class="btn btn-sm btn-danger" type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </a>

               <button class="btn btn-sm btn-success openStatusModelMail" studentId='{{$course->student_id}}' studentName="{{$course->title.' '.$course->surname.' '.$course->given_name }}" messageToAdmin="{{$course->message}}" studentEmail="{{$course->student_email}}" agentEmail="{{$course->agent_email}}" messageText="Welcome To Ashton" agentName="{{$course->name}}"><i class="fa fa-envelope" aria-hidden="true"></i></button>
               @endif

             </td>
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
          <div class="col-md-1"><b>To</b></div>
          <div class="col-md-1">Student:</div>
          <div class="col-md-4" id="studentEmailNew"></div>
          <input type="hidden" name="toEmail[]" class="studentEmailNew">
          <div class="col-md-1">Agent:</div>
          <div class="col-md-4" id="agentEmailNew"></div>
          <input type="hidden" name="toEmail[]" class="agentEmailNew">


        </div>
        <br>
        <div class="row">
          <div class="col-md-1"><b>CC</b></div>
          <div class="col-md-10"><input type="text" class="form-control" name="toEmail[]"></div>
        </div>
        <input type="hidden" name="studentId" id="studentId" value=''>
        <br>
        <div class="row">
          <div class="col-md-1"><b>Message</b></div>
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
        
  });
</script>
  @endsection