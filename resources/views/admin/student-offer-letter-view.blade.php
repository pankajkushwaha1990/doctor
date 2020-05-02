@extends('master') 
@section('title','Dashboard')
@section('styles')
<style type="text/css">
@media print and (color) {
   * {
      -webkit-print-color-adjust: exact;
      print-color-adjust: exact;
   }

     .removePrint,.main-footer {
    display: none !important;
  }
  *{
    font-size: 13px;
  }

  .breakPage {page-break-after: always;}
}
</style>
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
       <div class="card">
         <div class="card-body">
          <div class="row">
           <img  style="height: 80px;width: 350px;" src="{{ url('').'/offer_docs/logo.png' }}">
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PH: +61 3 9349 2488, 9349 2344 | Email: info@ashtoncollege.edu.au | www.ashtoncollege.edu.au</h5>
          </div>
          <div class="row">
            <div class="col-md-2">Offer No.:</div>
            <div class="col-md-4">{{ $agent->offer_no }}</div>
            <div class="col-md-2">Date of Issue:</div>
            <div class="col-md-4">{{ $agent->date_of_issue }}</div>
          </div>
          <div class="row">
            <div class="col-md-2">Student Name:</div>
            <div class="col-md-4">{{ $agent->title." ".$agent->given_name." ".$agent->surname }}</div>
            <div class="col-md-2">Date of Birth:</div>
            <div class="col-md-4">{{ $agent->date_of_birth }}</div>
          </div>
          <div class="row">
            <div class="col-md-2">Agent Name:</div>
            @if($agent->type=='agent')
            <div class="col-md-4">{{ $agent->name }}</div>
            @endif
            @if($agent->type!='agent')
            <div class="col-md-4"></div>
            @endif
            <div class="col-md-2">Orientation Date:</div>
            <div class="col-md-4">
            <?php echo $date = $agent->orientation_date ;?>
                </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12"><strong><p>Dear {{ $agent->title." ".$agent->surname}}</p></strong></div>
          </div>
           <div class="row">
            <div class="col-md-12"><p><b>RE: LETTER OF OFFER FOR COURSE ENROLMENT</b>
            <br>Thank you for your application to study at Ashton College.I am pleased to offer you a place (subject to meeting the terms and conditions as set out in this enrolment offer) in the course/s as outlined below:</p>
            </div>
          </div>
         <!-- <br>
           <div class="row">
            <img style="height: 73px;width: 1059px;" src="{{ url('').'/offer_docs/capture2.jpg' }}">
          </div> -->
        
         <div class="row">
                <table class="table">
                    <thead>
                      <tr>
                        <th>CRICOS Code</th>
                        <th>National Code & Qualification/Course Name</th>
                        <th>Duration (in weeks)</th>
                        <th>Course Start Date</th>
                        <th>Course Completion Date</th>
                        <th>Tuition Fees (A)</th>
                        <th>Material Fees (B)</th>
                      </tr>
                    </thead><?php 
                    $A = array();
                    $B = array();
                    ?>

                    <tbody>
                    @if(empty($agent->student_id))
                      @foreach($courses as $course)
                      <tr>
                          <td>{{$course->course_code}} <input type="hidden" class="form-control" value="{{$course->course_code}}" name="course_code[]"></td>
                          <td>{{$course->course_name }}<input type="hidden" name="course_name[]" class="form-control" value="{{$course->course_name}}" required=""></td>
                          <td><input type="number" name="course_duration[]" class="form-control" value="{{$course->course_duration}}" required=""></td>
                          <td><input type="text" name="start_date[]" class="form-control" value="{{ date('Y-m-d') }}" required=""></td>
                          <td><input type="text" readonly="" name="end_date[]" class="form-control" value="{{ date('Y-m-d',strtotime('+'.$course->course_duration.' weeks', strtotime(date('Y-m-d')))) }}" required=""></td>
                          <td><input type="text" readonly="" name="course_amount[]" class="form-control" value="{{$course->course_amount}}" required=""></td>
                          <td><input type="text" readonly="" name="material_amount[]" class="form-control" value="{{$course->material_amount }}" required=""></td>
                      </tr>
                      @endforeach
                      @endif

                      <?php 
                      if(!empty($agent->course_code_o)){ 
                        $courseCode     = json_decode($agent->course_code_o,true);
                        $courseName     = json_decode($agent->course_name_o,true);
                        $courseDuration = json_decode($agent->course_duration,true);
                        $startDate      = json_decode($agent->start_date,true);
                        $endDate       = json_decode($agent->end_date,true);
                        $Amount        = json_decode($agent->course_amount,true);
                        $Material        = json_decode($agent->material_amount,true);





                        $p = 0;
                        foreach ($courseCode as $key => $course) { ?>
                        <tr>
                          <td>{{$course }} </td>
                           <td>{{$courseName[$p] }}</td>
                           <td>{{$courseDuration[$p]}}</td>
                            <td>{{ date('d/m/Y',strtotime($startDate[$p])) }}</td>
                            <td>{{ date('d/m/Y',strtotime($endDate[$p])) }}</td>
                          <td>{{ $A[] = $Amount[$p] }}</td>
                          <td>{{ $B[] = $Material[$p] }}</td>
                        <?php  $p++; } ?>                                          
                          
                      </tr>

                      <?php } ?>


                    </tbody>
                  </table>
                </div>
             
           <div class="row">
                <table class="table">
                    <thead>
                      <tr>
                        <th colspan="2">Course Fee Structure</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                          <td>Application Fees</td>
                          <td><?php echo $app = $agent->application_fee;?></td>
                      </tr>
                      <tr>
                          <td>Total Tuition Fees (A)</td>
                          <td><?php echo $a = array_sum($A);?></td>
                      </tr>
                      <tr>
                          <td>Total Material Fees (B)</td>
                          <td><?php echo $b = array_sum($B);?></td>
                      </tr>
                       <tr>
                          <td>Total Fee due (C):</td>
                          <td><?php echo $app+$a+$b;?></td>
                      </tr>
                      <?php 
                      if(!empty($agent->homestay_week) && $agent->homestay_week>0){ ?>
                      <tr>
                          <td>Homestay {{ $agent->homestay_week }} Weeks(Placement fee {{ $agent->placement_amount }} +Homestay fee {{ $agent->homestay_amount }})</td>
                          <td>{{ $agent->placement_amount+$agent->homestay_amount }}</td>
                      </tr>

                      <?php } ?>    
                       <?php 
                      if(!empty($agent->airport_amount) && $agent->airport_amount>0){ ?>
                      <tr>
                          <td>Airport Pickup</td>
                          <td>{{ $agent->airport_amount }}</td>
                      </tr>

                      <?php } ?>   
                      <?php 
                      if(!empty($agent->oshc_amount) && $agent->oshc_amount>0){ ?>
                      <tr>
                          <td>OSHC</td>
                          <td>{{ $agent->oshc_amount }}</td>
                      </tr>

                      <?php } ?>                     
                      <tr>
                          <td></td>
                          <td></td>
                      </tr>
                     
                      <tr>
                          <td>Minimum Balance Due Now (prior to issuance of COE) (D):</td>
                          <td>{{ $agent->prior_amount }}</td>
                      </tr>
                      <tr>
                          <td>Balance Due (paid in monthly instalments):</td>
                          <td><?php echo ($app+$a+$b+$agent->placement_amount+$agent->homestay_amount+$agent->airport_amount+$agent->oshc_amount)-$agent->prior_amount;?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="row">
            <div class="col-md-12"><b><p style="font-size:12px;">Conditions:</b>
            <br>a) This offer letter is valid for 60 days from the date of the issue or 14 days prior to commencement of the first course whichever is applicable.
            If this offer expires, another Enrolment Fee (non-refundable) will be applicable/transferred to a new offer.<br>
            b) You must demonstrate an adequate level of proficiency in the English language to the level acceptable by the Australian Department of
            Home Affairs and as published in Ashton College's pre‐enrolment course/s information on our website.<br>
            c) If you are currently studying at another provider and have completed less than 6 months of the principal course, a Release must be obtained from your current 
            provider and release documentation submitted to Ashton College with the acceptance of this offer prior to issuance of COE(s).<br>
            d) While you undertake your course, you must ensure that your current visa allows you to study in Australia.<br>
            e) If enrolling in ELICOS programs, you must undertake the English Placement Test (EPT) to determine the entrance level required.
             The schedule of your EPT will be advised to you by our Admissions Officer.</p>
             <p style="font-size:12px;"><b>Ashton College Payment Details<br>					
https://www.payway.com.au/make-payment	<br>			
Biller code: 264911<br>
OR	<br>						
Pay to: Ashton College, Westpac Bank, BSB: 033005 ACCOUNT NUMBER: 363119, Swift Code: WPACAU2S</b>
            <br>Please ensure that you have read and understood Ashton College's Fees and Refunds policy and procedure as well as the other policy and procedures as shown on the college website.  In order to accept this offer, please sign the attached Enrolment Acceptance and return a copy to the College.  You must retain a copy for your records.  Please read the Client Information Handbook on our website in order for you to know your rights and responsibilities while being one of our highly valued students.  We look forward to welcoming you to Ashton College where you will be provided with high quality training and support.  
            Should you have any queries please do not hesitate to contact Student Services.</p>
             <p>Yours sincerely,<br>
             <img src="{{ url('').'/offer_docs/sign.png' }}">
             <br>Navinder Gujral<br>Chief Executive Officer</p>
            <p style="font-size:10px;"> Offer Letter and Enrolment Acceptance- - #AC0286  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Version: 3.3
             <br>Ashton College RTO:  22234 CRICOS: 03142F  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
             
             Page 1 of 10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Approved By: CEO</p>
            
            </div>
          </div>
                   </div>
    </div>
  </div>
   
      </div>
        <!-- /.row -->
    </section>

   <div class="breakPage"></div>
          
    <section class="content ">
  <div class="row ">
    <div class="col-12">
       <div class="card">
         <div class="card-body">
                
                <div class="row">
           <img  style="height: 80px;width: 350px;" src="{{ url('').'/offer_docs/logo.png' }}">
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PH: +61 3 9349 2488, 9349 2344 | Email: info@ashtoncollege.edu.au | www.ashtoncollege.edu.au</h5>
          </div>

          
            <div class="col-md-12"><strong><p>CONDITIONS OF ACCEPTANCE (STUDENT RESPONSIBILITIES)</strong>
            <br>This document contains your Offer for Course / Courses and Terms and Conditions of Enrolment at Ashton College. When signed by you, this document will serve as a legally binding agreement between you and Ashton College. Please ensure that you fully understand and agree with the terms of this Agreement before signing it.You are responsible for retaining a copy of this written agreement as supplied by Ashton College, and receipts of any payments of tuition fees or non-tuition fees.
</p>
</div>



<div class="col-md-12"><strong><p>Instructions:</strong>
<br>•	Before accepting this offer into the course/s make sure you are satisfied that you have received and understood all information required to make a decision as to where and what you will study. We recommend that you visit www.ashtoncollege.edu.au to view information about our courses, general information, fees and refunds, ESOS information and other relavant policies and procedures.
<br>•	You must sign and date the last page of this document indicating acceptance and agreement of this offer. 
<br>•	Return all pages of the completed agreement to Ashton College, email: info@ashtoncollege.edu.au or to your authorised agent.</p>
</div>


<div class="row">
<div class="col-md-12"><strong><p>Please read the below terms and conditions carefully:</strong>
<br>Your enrolment in a <strong>full-time registered course</strong>, which is a course with a minimum of <strong> 20 scheduled course contact hours (face to face)</strong> per week.
<br>You must participate in scheduled classes in accordance with course timetables to make satisfactory course progress, and if you don’t satisfactorily progress in your course, you will be in breach of a condition of your student visa.
<br>If you don’t attend scheduled classes, but is making satisfactory progress in your course, then the course duration set is not suitable for you. Ashton College may need to reassess your course duration. You may already have the skills, knowledge and experience to progress in your course without receiving structured training and we may shorten your course duration. This may impact the duration of your course and consequently affect your student visa.
<br>The Department of Home Affairs may cancel your student’s visa if you fail to maintain your enrolment and student visa conditions.</p>
</div>


<div class="col-md-12"><strong><p>CHANGE OF ADDRESS</strong>
While in Australia and studying with Ashton College, students must notify Ashton College of their contact details including:
<br>•	current residential address, mobile number (if any) and email address (if any)
<br>•	who to contact in case of an emergency
<br>•	any changes to those details, within 7 days of the change</p>
</div>


<div class="col-md-12"><strong><p>COMPLAINTS AND APPEALS</strong>
<br>Should students have concerns with any aspect of their training they should bring these concern/s to the attention of their trainer or another Ashton College staff member.  Ashton College staff will endeavour to resolve the matter in an informal manner to the student’s satisfaction.
<br>If the student is not satisfied with the resolution of the informal complaint they originally made, they may lodge a formal complaint by completing the formal Complaints and Appeals Form available from student services and Ashton College's website.  This will be dealt with in accordance with the Complaints and Appeals policy, which is located on Ashton College’s website.
<br>Students have the right to appeal the outcome of a complaint or the outcome of assessment decisions if they are dissatisfied and feel they have been dealt with unjustly.  Appeals can be made by completing the Complaints and Appeals Form.  The appeal will be dealt with in accordance with the Complaints and Appeals policy and procedure, located on Ashton College's website.
<br>If submitting a formal complaint or appeal, students must provide reasons and supporting evidence justifying their grounds for the complaint or appeal.
<br>If the student is still dissatisfied by the outcome of an internal appeal they have the right to access the external complaints and appeals process.  An external party named the Overseas Student Ombudsman is an</p>
</div>

   
                 <p style="font-size:10px;"> Offer Letter and Enrolment Acceptance- - #AC0286  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Version: 3.3
             <br>Ashton College RTO:  22234 CRICOS: 03142F  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
             
             Page 2 of 10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Approved By: CEO</p>
          </div>
                   </div>
    </div>
  </div>
   
      </div>
        <!-- /.row -->
    </section>
        
             <div class="breakPage"></div> 
          
  <section class="content breakPage">
  <div class="row">
    <div class="col-12">
       <div class="card">
         <div class="card-body">
                
                <div class="row">
           <img  style="height: 80px;width: 350px;" src="{{ url('').'/offer_docs/logo.png' }}">
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PH: +61 3 9349 2488, 9349 2344 | Email: info@ashtoncollege.edu.au | www.ashtoncollege.edu.au</h5>
          </div>
          <br>
          
          
            <div class="col-md-12"><p>independent party available for students to access who investigate unresolved complaints from overseas students about private education providers. They are contactable on 1300 362 072 within Australia.  For further information or to lodge a complaint online please visit www.ombudsman.gov.au.
<br>Students have the right to seek advice from and be represented by external parties at any time during the complaints and appeals process.  The cost of which will be incurred by the student.
<br>Further information on the policy and procedures can be found on Ashton College's website.</p>
</div>

<div class="col-md-12"><strong><p>ACCESS TO RECORDS</strong>
<br>Students are entitled, free of cost, to a formal Statement of Attainment upon withdrawal, cancellation or transfer, prior to completing their qualification, provided the student has paid in full for the tuition related to the units of competency to be shown on the Statement of Attainment.  Students are also entitled to access their student file free of cost upon request.  Application forms may be obtained and submitted to reception (Ashton College, 213 Nicholson Street, Footscray VIC 3011) or requests can be made by emailing admin@ashtoncollege.edu.au.  The administration team will arrange an appointment within 5 working days to view the records and ask the student to bring confirmation of identity.
</p>
</div>
<div class="col-md-12"><strong><p>AMENDING YOUR ENROLMENT</strong>
<br>Students may apply to defer, suspend or cancel their enrolment by submitting an application to the College.  Application forms may be obtained and submitted to reception (Ashton College, 213 Nicholson Street, Footscray VIC 3011) or requests can be emailed to admin@ashtoncollege.edu.au.  The College may also initiate the deferral, suspension or cancellation of a student’s enrolment and will do so in writing.
<br>Ashton College may only defer, suspend or cancel a student’s enrolment under compassionate or compelling circumstances.
<br>Compassionate or compelling circumstances are generally those beyond the control of the student and which have an impact on the student’s course progress or wellbeing. These could include, but are not limited to:
<br>•	Serious illness or injury, where a medical certificate states that the student was unable to attend classes.
<br>•	Bereavement of close family members such as parents, siblings or grandparents.
<br>•	Major political upheaval or natural disaster in the student’s home country requiring emergency travel when this has impacted on the student’s studies.
<br>•	A traumatic experience which could include: 
	Involvement in, or witnessing of a serious accident 
	Witnessing or being the victim of a serious crime
<br>•	Where the College was unable to offer a pre-requisite unit.
<br>•	Inability to begin studying on the course commencement date due to delay in receiving a student visa.
<br>•	If an approved deferral of commencement of studies or the suspension of study has been approved in compliance with the College's Deferment, Suspension or Cancellation of Enrolment policy and procedure.

<br>The above circumstances are only some of examples of what may be considered compassionate or compelling circumstances.  The CEO will use his professional judgment to assess each case on its individual merits. When determining whether compassionate or compelling circumstances exist, the college considers documentary evidence provided to support the claim, and stores copies of these documents in the student’s file. Students may also have their enrolment suspended or cancelled by the college due to non payment of fees, unsatisfactory course progress, unsatisfactory attendance, misbehaviour or breaching the college procedures. Further information on the policy and procedures can be found on Ashton College's website. 
</p>
</div>

<div class="col-md-12"><strong><p>COMPLETION WITHIN EXPECTED DURATION</strong>
<br>Students are required to complete their course within the expected duration as indicated on their CoE.  The College only extends the duration of a student’s enrolment if the circumstances in the section above ‘Amending Your Enrolment’ exist or if a student is at risk of not achieving satisfactory course progress and the college is implementing its intervention strategy that requires the period of study to be extended. Further information on the policy and procedures can be found on Ashton College's website. 
</p>
</div>


<div class="col-md-12"><strong><p>TRANSFERRING BETWEEN PROVIDERS</strong>
<br>Students seeking to transfer between Australian providers must complete 6 months in their principal course of study prior to seeking enrolment in or release from an Ashton College course of study unless specific circumstances apply.  The principal course of study is the highest qualification (normally the last course) covered by the student’s visa. Standard 7 also applies to all courses of study prior to the student’s principal course.  6 months is defined as completion of six calendar months of the principal course of study from the date that the student commences the course.  All applications are processed in compliance with Ashton College's Transfer between providers’ policy and procedure.  Contact reception at Ashton College, 213 Nicholson Street, Footscray
VIC 3011 or email admin@ashtoncollege.edu.au for further information and application forms.  Further information on the policies and procedures can be found on Ashton College's website.
</p>
</div>

   
                <p style="font-size:10px;"> Offer Letter and Enrolment Acceptance- - #AC0286  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Version: 3.3
             <br>Ashton College RTO:  22234 CRICOS: 03142F  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
             
             Page 3 of 10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Approved By: CEO</p>
               
                </div>
                   </div>
    </div>
  </div>
   
     
        <!-- /.row -->
    </section>
               
          
  <section class="content breakPage">
  <div class="row">
    <div class="col-12">
       <div class="card">
         <div class="card-body">
                
                <div class="row">
           <img  style="height: 80px;width: 350px;" src="{{ url('').'/offer_docs/logo.png' }}">
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PH: +61 3 9349 2488, 9349 2344 | Email: info@ashtoncollege.edu.au | www.ashtoncollege.edu.au</h5>
          </div>
          <br>
          
          
          <div class="col-md-12"><strong><p>ASSESSMENT/MARKING CRITERIA</strong>
<br>For Vet courses, student’s performance will be assessed in accordance with the guidelines outlined in the relevant AQF training package unit of competence.  This may be in the form of answering questions in writing, verbally and/or through practical demonstrations of knowledge and skills developed.
<br>Each unit of competency will usually involve two or three assessments and after each assessment the students submission will be marked S – Satisfactory or NS – Not Satisfactory.
<br>Students must demonstrate satisfactory performance in each assessment task to be deemed competent in the unit.
<br>Students are given 1 attempt for re-assessment, however If they are still unable to demonstrate competency at this point they will be deemed Not Yet Competent (NYC), they then must re-enrol and undertake the training again.  This will incur a fee.
For ELICOS programs, exams are graded based on the marking guide detailed in the ELICOS Training and Assessment policy.  If a student does not meet the minimum Pass (PA) grade of 50% and subsequently fails the exam or does not attempt the assessment they are marked NS.  Students are given 1 attempt for re-assessment however if they do not receive a Pass grade at re assessment they must re-enrol to undertake the exam again and may require additional classes which will incur a fee.
<br>Students are permitted a period of 2 weeks past the submission date to submit late work.  Approval must be sought from the teacher before late work is accepted.
</p>
</div>


<div class="col-md-12"><strong><p>COURSE PROGRESS (VET COURSES)</strong>
<br>Ashton College will monitor students course progress and provide ¬assistance if the student is experiencing difficulties and not progressing through their course as per the course schedule.  Student Services will arrange a time to meet with students who are not progressing satisfactorily and ascertain the reasons for this. 

<br>Access to appropriate supports services will then be provided to assist the student in successfully completing their course within the scheduled duration.  Ashton College may refer students to external sources if they are unable to sufficiently provide support for students learning needs.  Ashton College may refer students to external organisations if they are experiencing personal/welfare issues that are affecting their course progress.

<br>Ashton College takes all reasonable and feasible steps to assist students, so they can successfully complete their course within the course schedule.

<br>It is a requirement of The National Code 2018 Standard 8 that the Ashton College reports students who do not achieve satisfactory course progress over two consecutive study periods. This can lead to a student's visa being cancelled.

<br>Please contact the college via email at admin@ashtoncollege.edu.au or visit website to see the Client Support policy and procedure for further details on how your course progress may impact your student visa.
</p>
</div>



<div class="col-md-12"><strong><p>ATTENDANCE MONITORING (ELICOS PROGRAMS)</strong>
<br>Ashton College will monitor student’s attendance and provide assistance if the student is experiencing difficulties and not progressing through their course as per the course schedule.  The Director of Studies will arrange a time to meet with students who are not progressing satisfactorily and ascertain the reasons for this. 
<br>Access to appropriate support services will then be provided to assist the student in successfully completing their course within the scheduled duration.  Ashton College may refer students to external sources if they are unable to sufficiently provide support for students learning needs.  Ashton College may refer students to external organisations if they are experiencing personal/welfare issues that are affecting their course progress.
<br>Ashton College takes all reasonable and feasible steps to assist students, so they can successfully complete their course within the course schedule.
<br>It is a requirement of National Code of Practice 2018 Standard 8 that the college reports students who do not maintain satisfactory attendance. This can lead to a student's visa being cancelled.
<br>Please contact the college at admin@ashtoncollege.edu.au  or visit website www.ashtoncollege.edu.au to see the ELICOS Client Support policy and procedure and ELICOS Attendance Monitoring policy and procedure for further details.
</p>
</div>
          
   
                 <p style="font-size:10px;"> Offer Letter and Enrolment Acceptance- - #AC0286  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Version: 3.3
             <br>Ashton College RTO:  22234 CRICOS: 03142F  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
             
             Page 4 of 10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Approved By: CEO</p>
                </div>
                   </div>
    </div>
  </div>
   
     
        <!-- /.row -->
    </section>
                  <br>
        
     <section class="content breakPage">
  <div class="row">
    <div class="col-12">
       <div class="card">
         <div class="card-body">
                
                <div class="row">
           <img  style="height: 80px;width: 350px;" src="{{ url('').'/offer_docs/logo.png' }}">
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PH: +61 3 9349 2488, 9349 2344 | Email: info@ashtoncollege.edu.au | www.ashtoncollege.edu.au</h5>
          </div>
          <br>
          
          
          <div class="col-md-12"><strong><p>ACADEMIC MISCONDUCT</strong>
<br>Students are expected to approach learning and assessment activities in an ethical manner.Students are required to adhere to Ashton College’s policies and procedures.  If a student is found to have acted in a way that Ashton College deems to be misconduct, it may impair their successful completion of the course.
<br>At Ashton College our students strive to conduct themselves with integrity and do not engage in plagiarism or cheating.  Confusion in relation to the definitions of both plagiarism and cheating can often occur and have been detailed below to avoid this occurrence and to eliminate their happening due to confusion. 
</p>
<div class="col-md-12"><strong><p>•	Cheating</strong>
<br>Cheating is the use of any means to gain an unfair advantage during the assessment process.  Cheating may be (but not limited too) copying another students answers, using mobile phones or other electronic devises during closed book assessments, bringing in and referring to pre prepared written answers in a closed book assessment and referring to texts during closed book assessments amongst others.  
<br>Cheating in any form during assessments will result in the student’s assessment submission being invalidated. 
</p>
</div>
<div class="col-md-12"><strong><p>•	Plagiarism</strong>
<br>Plagiarism is the wrongful close imitation, or copying and publication, of another person’s language, thoughts, ideas, or expressions, and the representation of them as one's own.  This includes copying all or pieces of another students work and presenting it as one's own.  Plagiarism will also lead to the submission of the applicable work being invalidated. 
<br>If students are including other people’s work in submissions e.g. passages from books or websites, then reference should be made to the source. For further information on what constitutes plagiarism please refer to:  http://www.plagiarism.org/. 
<br>Cheating and or plagiarism during assessments will be treated as a breach and are deemed to be ‘Academic Misconduct’ and may lead to the student being removed from the course.  No refund is applicable to the student in such circumstances. Further information on the policy and procedures can be found on Ashton College's website. 
</p>
</div>
</div>


<div class="col-md-12"><strong><p>ESOS FRAMEWORK – STUDENT’S RIGHTS AND RESPONSIBILITIES</strong>
<br>The Australian Government wants overseas students in Australia to have a safe, enjoyable and rewarding place to study.  Australia’s laws promote quality education and consumer protection for overseas students. These laws are known as the ESOS framework and they include the Education Services for Overseas Students (ESOS) Act 2000 and The National Code 2018.
<br>Further information on the ESOS Framework is provided in the following link:
<br>https://internationaleducation.gov.au/Regulatory-Information/Pages/Regulatoryinformation.aspx
</p>
</div>


<div class="col-md-12"><strong><p>FEES AND REFUNDS</strong>
<br>Ashton College will charge a range of fees for both award and non-award courses. Fee information is provided to students before enrolment and it is also available on the college website (www.ashtoncollege.edu.au).
This policy is implemented in compliance with the requirements of the Standards for Registered Training Organisations (2015) clause 5.3 and 7.3 and National Code of Practice for Providers of Education and Training to Overseas Students 2018 (The National Code 2018).
</p>
</div>

<div class="col-md-12"><strong><p>Definitions:
<br>Tuition fees: </strong>
<br>The term ‘tuition fees’ refers to the fees Ashton College receives directly or indirectly from a student or intending student (or another person who pays the fees on behalf of a student) that are 	‘directly related to the provision of the course that the college is providing, or offering toprovide, to the student’. In this context ‘tuition’ takes its common meaning – that is, a charge or fee for educational instruction. Tuition Fees are defined in section 7 of the ESOS Act.

<br><b>Non-tuition Fees:</b> The term ‘non-tuition fees’ refers to the fees Ashton College receives directly or indirectly from a student or intending student (or another person who pays the fees on behalf of a student) which constitutes any other additional fees charged by Ashton College that are not included in tuition fees. Non – tuition fees cover other items not directly related to tuition and may be compulsory or discretionary.  E.g. application fees and course material fees. 

<br><b>Study Period:</b>  For the purpose of refund calculation, a study period is defined as 6-months duration of a course.

<br><b>Short Course Period:</b> For the purpose of refund calculation, a short course period is defined as a 6 month or less than 6-month duration of a course.
</p>
</div>
          
   
                <p style="font-size:10px;"> Offer Letter and Enrolment Acceptance- - #AC0286  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Version: 3.3
             <br>Ashton College RTO:  22234 CRICOS: 03142F  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
             
             Page 5 of 10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Approved By: CEO</p>
                </div>
                   </div>
    </div>
  </div>
   
     
        <!-- /.row -->
    </section>
        
  
            
    <section class="content breakPage">
  <div class="row">
    <div class="col-12">
       <div class="card">
         <div class="card-body">
                
                <div class="row">
           <img  style="height: 80px;width: 350px;" src="{{ url('').'/offer_docs/logo.png' }}">
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PH: +61 3 9349 2488, 9349 2344 | Email: info@ashtoncollege.edu.au | www.ashtoncollege.edu.au</h5>
          </div>
          
          
          
<div class="col-md-12"><strong><p> Fees:</strong>
<div class="col-md-12">1.	Applicable tuition and non-tuition fees are collected prior to course commencement.  Students must pay Ashton College the fees indicated on the Letter of Offer prior to the generation of a Confirmation of Enrolment (CoE). 
<br>2.	Fees are collected and deposited in the College bank account within 5 working days of collection.
<br>3.	International students' fees paid prior to course commencement are placed in a ‘holding account’ and not accessed until the students commence their course.
<br>4.	All students are provided with receipts for fees paid.
<br>5.	No more than 50% of the tuition fee is collected in advance of course commencement from a student enrolling in a course with a duration of more than 6 months.
<br>6.	Full tuition fees and non tuition fees can be collected for short courses (e.g. ELICOS) with duration of less than 6 months. 
<br>7.	Students may pay ongoing tuition and non tuition fees in instalments, periodically agreed upon at orientation.
<br>8.	Students who wish to pay ongoing tuition and non tuition fees in advance of the next study period can only do so up to a maximum of two weeks in advance of the commencement of that study period.
<br>9.	Students will be informed of their payment plan at orientation.
<br>10.	Students will be given the option to have fees debited directly from their bank account.
<br>11.	Students who opt for Direct Debit receive a debit notification two (2) days before the scheduled direct debit date.
<br>12.	Students are required to pay all fees related to their study at Ashton College within the time periods indicated.  
<br>13.	For those who fail to make a payment within the scheduled payment plan:
<br><div class="col-md-12">a)	A direct debit dishonour fee of $12.50 will be charged by the direct debit provider. 
<br>b)	An email will be sent by the direct debit provider regarding the payment dishonour advising student to contact Ashton College immediately.
<br>c)	Ashton College will request that the student clear the amount due within 7 working days from the date of payment dishonour, otherwise a late processing fee of $100 will be applied after 7 days.
<br>d)	Students are advised to make pending dishonour payments by contacting the finance department at Ashton College.
<br>e)	A pending fee notice will be sent to students advising them to make payment immediately or contact the finance department if they have any issues. </div>
<br>14.	Students will have 20 working days starting from the date on the Pending Fee Notice to pay the due fees with applicable penalties.  Non-payment of the fees within this due time violates the terms and conditions of the student agreement and might result in termination of enrolment with Ashton College.  
<br>15.	For any outstanding debts, Ashton College will use an external Debt Collection agency to collect the owed monies and students will be responsible for the payment of external costs associated to use the services of debt collection agencies.
<br>16.	If a student is paying fees via a monthly payment plan and decides to withdraw from course, full study period fees are payable.
<br>17.	There is no limit to the amount or time condition in relation to the collection of outstanding debts.
<br>18.	Ashton College reserve the right to commence/ continue legal proceedings in order to recover the outstanding debt without any further notice to the student.
<br>19.	This written agreement, and the right to make complaints and seek appeals of decisions and action under various processes, does not affect the rights of the student to take action under the Australian Consumer Law if the Australian Consumer Law applies.
<br>20.	Fees offered at Ashton College are in Australian dollars.
<br>21.	Ashton College reserves the right to alter the fees as per quarterly reviews and/or special promotions. However, if you have been offered an enrolment to study at Ashton College, we guarantee the original offered price to stay the same.
<br>22.	In the case of human or computer error, Ashton College reserves the right to re-offer the correct fee. </div>
</p>
</div>
 <div class="col-md-12"><strong><p>Additional Non-tuition Charges: </strong>
<div class="col-md-12">a)Re-Issue of Student ID Card $15.00
<br>b)	Re-Issue of Certificate and/ or Statement of Attainment $50.00 
<br>c)	Re-issue of Enrolment Offer after the expiry date $50.00
<br>d)	Airport pickup fee $150.00
<br>e)	Homestay placement fee $250.00
<br>f)	Bank Account transaction fee for debit card $0.88	
<br>g)	Visa/MasterCard transaction fee 1.9% (min $0.88)
<br>h)	Amex/Diners transaction fee 3.65% (min $0.88)
<br>i)	Offshore payment processing fee $20.00</div>
</p>
</div>                 <p style="font-size:10px;"> Offer Letter and Enrolment Acceptance- - #AC0286  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Version: 3.3
             <br>Ashton College RTO:  22234 CRICOS: 03142F  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
             
             Page 6 of 10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Approved By: CEO</p>
                </div>
                   </div>
    </div>
  </div>
   
     
        <!-- /.row -->
    </section>
                

      <section class="content breakPage">
  <div class="row">
    <div class="col-12">
       <div class="card">
         <div class="card-body">
                
                <div class="row">
           <img  style="height: 80px;width: 350px;" src="{{ url('').'/offer_docs/logo.png' }}">
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PH: +61 3 9349 2488, 9349 2344 | Email: info@ashtoncollege.edu.au | www.ashtoncollege.edu.au</h5>
          </div>
          <br>
          
          
<div class="col-md-12"><p><div class="col-md-12">
<br>j)	Payer Dishonour Fee $12.50
<br>k)	Change of Enrolment/eCOE $50.00 per eCOE
<br>l)	Change of Batch after course start date $250.00
<br>m)	A charge of $200 per unit for reassessment of theory only units will apply and $250 for unit reassessments that include practical assessments will apply. For further information please see training& assessment policy & procedures.
</div>
</p>
</div>

<div class="col-md-12"><strong><p>Refunds: </strong>
<br><div class="col-md-12">1.	Ashton College has a fair and equitable refund policy.
<br>2.	The refund policy is available under the ‘Forms and Policies’ heading on Ashton College’s website.
<br>3.	The application fee is non refundable in all circumstances (except provider default).
</div>
</p>
</div>

<div class="col-md-12"><strong><p>Fees/Refunds terms and conditions:</strong>
<br><div class="col-md-12">1.	A Refund Application form must be submitted along with supporting documentation to reception at Ashton College's Main Campus or by email to finance@ashtoncollege.edu.au.
<br>2.	If a student is paying fees in monthly instalments and decides to withdraw/be released from the course, full study period fees are payable.
<br>3.	For short courses, if an enrolment is cancelled more than 7 days prior to commencement of the course date, there will be a cancellation fee payable to Ashton College equivalent to 20% of the total tuition fee.
<br>4.	For short courses, if a continuing student requests to withdraw/be released from the course, study term tuition fees are payable to Ashton College. 
<br>5.	For vocational courses, if anew enrolment is cancelled more than 7 days prior to commencement of the course date, there will be a cancellation fee payable to Ashton College equivalent to 20% of the total tuition fee.
<br>6.	For vocational courses, if a continuing student requests to withdraw/be released from the course, study term tuition fees are payable to Ashton College.
<br>7.	For full fee-paying domestic students, if an enrolment is cancelled within 28 days of commencement of the course date or the student does not commence on the agreed date or withdraws from the course once it has commenced there will be no refund of fees paid to date.
<br>8.	If an application for a student visa is rejected for an international student applying for enrolment from offshore, then all tuition and non-tuition fees (except application fees) will be refunded in full provided that documentary evidence is supplied. The student must submit the visa refusal letter as documentary evidence.  A refund will be provided by electronic transfer within 20 working days of receiving the refusal letter. 
<br>9.	If an enrolment is cancelled (non-visa refusal) more than 28 days prior to commencement of the course date there will be a cancellation fee equivalent to 20% of the total tuition fees paid.
<br>10.	If an enrolment is cancelled within 28 days of commencement of the course date (non visa refusal) or a student does not commence on the agreed date, or withdraws from the course once it has commenced there will be no refund of fees paid to date.
<br>11.	A full refund, less any application fee will be provided to the student prior to commencement where:<br>
<div class="col-md-12">a) illness or disability prevents a student from taking up the course;
<br>b)	there is death of a close family member of the student (parent, sibling, spouse or child); or
<br>c)	other special or extenuating circumstances, including political, civil or natural events, are accepted at the discretion of the CEO of Ashton College, or a nominated delegate, as preventing a student from taking up the course
<br>Students must provide original and verifiable documentary evidence to Ashton College in support of the grounds listed in paragraph 11 a), b) and c).
</div>
<br>12.	In the unlikely event where a student experiences compelling circumstances (listed in point 11) after the commencement of the course, a refund of the tuition fee will be made for the proportion of the course not completed, less the application fee.
Refunds paid under section 47E of the ESOS Act are calculated under the Education Services for Overseas Students (Calculation of Refund) specification 2014.
<br>13.	It is the responsibility of the student to provide written advice of withdrawal, by completing an application to amend enrolment form. This form is available from student services at Ashton College. Advice of withdrawal made by telephone will not be accepted.
<br>14.	The application fee is non-refundable in all circumstances except if Ashton College fails to deliver the course on the agreed start date and the student claims a refund.
</div>
</p>
</div>
                <p style="font-size:10px;"> Offer Letter and Enrolment Acceptance- - #AC0286  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Version: 3.3
             <br>Ashton College RTO:  22234 CRICOS: 03142F  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
             
             Page 7 of 10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Approved By: CEO</p>
                </div>
                   </div>
    </div>
  </div>
   
     
        <!-- /.row -->
    </section>
        
            
        <section class="content breakPage">
  <div class="row">
    <div class="col-12">
       <div class="card">
         <div class="card-body">
                
                <div class="row">
           <img  style="height: 80px;width: 350px;" src="{{ url('').'/offer_docs/logo.png' }}">
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PH: +61 3 9349 2488, 9349 2344 | Email: info@ashtoncollege.edu.au | www.ashtoncollege.edu.au</h5>
          </div>
          
<div class="col-md-12"><p>
<div class="col-md-12">        
15.	Courses can be deferred to the next available intake where extenuating circumstances exist.
<br>16.	The refund decision will be made within 20 working days on receiving the application.
<br>17.	Students can appeal to the college on refund decisions by accessing the Complaints and Appeals policy and procedure.
<br>18.	This written agreement, and the right to make complaints and seek appeals of decisions and action under various processes, does not affect the rights of the student to take action under the Australian Consumer Law if the Australian Consumer Law applies.
</div>
</p>
</div>


<div class="col-md-12"><strong><p>Extenuating circumstances</strong>
<br>Students may have extenuating circumstances that prevent them from attending scheduled course dates. These circumstances may include (but are not limited to):
<div class="col-md-12">•	Illness
<br>•	Family or personal matters
<br>•	Other extraordinary reasons
</div>

Where evidence can be successfully provided to support the student’s circumstances, tuition fees may be transferred to the next available course where applicable.  This decision of assessing the extenuating circumstances rests with the CEO and shall be assessed on a case by case situation.  The student must provide supporting evidence as mentioned above in "Fees/Refunds Terms and Conditions".
</p>
</div>


<div class="col-md-12"><strong><p>Applying, processing and payment of refunds</strong>
<div class="col-md-12">1.	All students. If fees have been paid, can apply for refunds by completing the refund application form.
<br>2.	Refund application forms can be requested from reception at Ashton College's Main Campus or by email from finance@ashtoncollege.edu.au.
<br>3.	Students requiring assistance with completing a refund application form may contact reception at Ashton College Main Campus or finance@ashtoncollege.edu.au.
<br>4.	A Refund application form must be submitted along with supporting documentation to reception at Ashton College Main Campus or by email to finance@ashtoncollege.edu.au.
<br>5.	Refund requests will be approved/ denied within in 20 working days of receipt.
<br>6.	Refunds are made in the same manner in which fees were paid. For example, if a student paid fees through credit card, the refund amount will be credited to the credit card; and same holds for other methods of payments.
<br>7.	Students will be notified in writing of the outcome of their application along with reasons why it was declined (if applicable).
<br>8.	Students have the right to access the complaints/appeals policy if they wish to appeal the refund application outcome.
<br>9.	The student agreement, and the availability of the Complaints and Appeals policy, does not remove the right of the student to take action under Australia’s Consumer Protection Law.
<br>10.	Refunds paid under section 47E of the ESOS Act are calculated under the Education Services for Overseas Students (Calculation of Refund) specification 2014.
</div>
</p>
</div>


<div class="col-md-12"><strong><p>Provider default</strong>
<div class="col-md-12">1.	In the unlikely event that Ashton College is unable to deliver the course in full; students will be offered a refund of all tuition fees paid to date. 
<br>2.	The following circumstances may be the cause of not providing the course in full:
<div class="col-md-12">•	The offered course does not start on the scheduled start date or an alternative agreed start date<br>
•	The course ceases to be provided after it starts but before the course is completed<br>
•	A course is not provided fully to a student because Ashton College has a sanction imposed by the National VET Regulator.
</div>3.	The refund will be paid within 14 days of the day in which the course ceased being provided. Alternatively, enrolment may be offered in an alternative course at Ashton College at no extra cost. Students have the right to choose whether to accept a full refund of course fees, or to accept a place in another course. If they choose placement in another course, students will be asked to sign a document indicating acceptance of the new placement at Ashton College.  

</p>
</div>



<div class="col-md-12"><strong><p>Tuition Fee Protection</strong>
<div class="col-md-12">1.	Ashton College is a member of the Australian Government endorsed Tuition Protection Service (TPS).
<br>2.	Ashton College will maintain membership of the Tuition Protection Service during its period of registration as a provider.
<br>3.	Ashton College will pay all subscriptions to the TPS in accordance with TPS requirements.
<br>4.	If due to unforeseen circumstances Ashton College is unable to complete the delivery of a course once commenced, and subsequently refund the student tuition fees unused and/ or offer them an acceptable place in another course at Ashton College, the Tuition Protection Service will attempt to secure a place for the student in a suitable course at another College. 
</div>
</p>
</div>
                 <p style="font-size:10px;"> Offer Letter and Enrolment Acceptance- - #AC0286  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Version: 3.3
             <br>Ashton College RTO:  22234 CRICOS: 03142F  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
             
             Page 8 of 10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Approved By: CEO</p>
                </div>
                   </div>
    </div>
  </div>
   
     
        <!-- /.row -->
    </section>

  
        <section class="content breakPage">
  <div class="row">
    <div class="col-12">
       <div class="card">
         <div class="card-body">
                
                <div class="row">
           <img  style="height: 80px;width: 350px;" src="{{ url('').'/offer_docs/logo.png' }}">
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PH: +61 3 9349 2488, 9349 2344 | Email: info@ashtoncollege.edu.au | www.ashtoncollege.edu.au</h5>
          </div>
          <br>
          
          <div class="col-md-12"><strong><p>GENERAL</strong>
<br> 
<div class="col-md-12">1.	This written agreement, and the right to make complaints and seek appeals of decisions and action under various processes, does not affect the rights of the student to take action under the Australian Consumer Law if the Australian Consumer Law applies.
<br>2.	Students who breach the Code of Conduct may be excluded from the course.  Ashton College will review each case on its individual merits when deciding whether to pay a refund in such circumstances.
<br> 3.	Financial data will be recorded and stored in compliance with Standard Accounting Practice.
</div>
</p>
</div>


<div class="col-md-12"><strong><p>PRIVACY</strong>
<br>
<div class="col-md-12"> Ashton College respects the privacy and confidentiality of our students and operates in compliance with the Australian Privacy Principles (APPs). 

Under the Data Provision Requirements 2012, Ashton College is required to collect personal information about students and to disclose that personal information to the National Centre for Vocational Education Research Ltd (NCVER).  Your personal information may be used or disclosed by Ashton College for statistical, administrative, regulatory and research purposes to:
<div class="col-md-12">•	Commonwealth and State/territory government departments and authorised agencies; and
<br>•	NCVER
<br>Personal information that has been disclosed to NCVER may be used or disclosed by NCVER for the following purposes:
<br>•	populating authenticated VET transcripts;
<br>•	facilitating statistics and research relating to education, including surveys and data linkage;
<br>•	pre-populating RTO student enrolment forms;
<br>•	understanding how the VET market operates, for policy, workforce planning and consumer information; and
<br>•	administering VET, including program administration, regulation, monitoring and evaluation.</div>
<br>You may receive a student survey which may be administered by a government department or NCVER employee, agent or third-party contractor or other authorised agencies.  You can opt out of the survey at any time of being contacted.
</div>
<br>NCVER will collect, hold, use and disclose your personal information in accordance with the Privacy Act 1988 (Cth), the National VET Data Policy and all NCVER policies and protocols (including those published on NCVER's website at www.ncver.edu.au).

<br>For information about how Ashton College collects, uses and discloses your personal information, including how you can make a complaint about a breach of privacy, please refer to Ashton College's privacy policy which can be found at www.ashtoncollege.edu.au.
</p>
</div>

<div class="col-md-12"><strong><p>DISCLAIMER AND LIMITATION OF LIABILITY</strong>
<br>
<div class="col-md-12">•	Ashton College strives to ensure the accuracy and reliability of the information provided to you in this Letter of Offer, Conditions of Acceptance and the information pertaining to the college’s courses. 
<br>•	Ashton College reserves the right to change or alter at any time, without notice, any of the course information. This includes any information about courses, units of study, entry requirements and/or tuition and non-tuition fees. 
<br>•	To the extent permitted by the law, Ashton College will have no liability for any loss or damage however arising from the use or reliance on any of the information. 
</div>
</p>
</div>
<div class="col-md-12">
<img src="{{ url('').'/offer_docs/sign.png' }}">
<br><p>Signature of Authorised Person
<br>On behalf of Ashton College</p>                                        
</div>
               <p style="font-size:10px;"> Offer Letter and Enrolment Acceptance- - #AC0286  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Version: 3.3
             <br>Ashton College RTO:  22234 CRICOS: 03142F  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
             
             Page 9 of 10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Approved By: CEO</p>
             </div>
                   </div>
    </div>
  </div>
   
     
        <!-- /.row -->
    </section>
  

        <section class="content breakPage">
  <div class="row">
    <div class="col-12">
       <div class="card">
         <div class="card-body">
                
                <div class="row">
           <img  style="height: 80px;width: 350px;" src="{{ url('').'/offer_docs/logo.png' }}">
            <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PH: +61 3 9349 2488, 9349 2344 | Email: info@ashtoncollege.edu.au | www.ashtoncollege.edu.au</h5>
          </div>
          <br>
          
          <div class="col-md-12"><strong><p>STUDENT DECLARATION:</strong>
<br>I, <b>{{ $agent->title." ".$agent->given_name." ".$agent->surname }}</b> agree that by signing this declaration, I am accepting the offer of a place in the course/s detailed this document.  
<br>I further acknowledge that:  
<div class="col-md-12">•	The information provided to Ashton College in my application for study is to best of my knowledge true, correct and complete at the time of my enrolment/application.
<br>•	I understand that I am required to attend orientation prior to commencing study.
<br>•	I have read Ashton College's pre-enrolment documentation including course/s information, the refund policy along with information on credit transfers (CT), recognition of prior learning (RPL), living in Melbourne and student work rights.
<br>•	I understand the conditions for deferring, suspending and cancelling my enrolment and the impact these actions may have on my student visa.
<br>•	I understand the conditions enabling me to change provider and the impact that this action may have on my student visa.
<br>•	I understand that my enrolment at Ashton College in a full-time registered course, which is a course with a minimum of 20 scheduled course contact hours (face to face) per week.
<br>•	I understand that I must maintain satisfactory course progress (VET students) during my studies at Ashton College and the impact of not doing so may have on my enrolment and student visa.
<br>•	I understand that I must maintain satisfactory attendance as per attendance monitoring policy and procedure (ELICOS students only) during my studies at Ashton College and the impact of not doing so may have on my enrolment and student visa.
<br>•	I agree to inform the College if I change my address during the period of enrolment.  
<br>•	I also agree to maintain Overseas Student Health Cover for the period of my enrolment.
<br>•	I have disclosed to Ashton College any special needs which may affect my learning.
<br>•	I acknowledge that any school aged dependents accompanying me to Australia will be required to attend school and this will incur additional charges.
<br>•	I agree to complete my studies in accordance with Ashton College policies and procedures and terms and conditions mentioned above.  I understand that if I do not comply with the College policies and procedures my enrolment and student visa may be affected.
<br>•	I understand that if I don't pay my fees on time penalties will apply. These may include: Late payment charges, Withdrawal from future classes, and/or Cancellation of enrolment.
<br>•	I understand that, under subsection 19(2) of the ESOS Act, Ashton College is required to notify the Commonwealth (Department of Home Affairs) when overseas students have breached their student visa conditions.
<br>•	I acknowledge that Ashton College may use electronic communication methods to deliver information relevant to my studies, personal safety ad otherwise. I consent to the sending and receiving of electronic messages for the purposes of the SPAM Act 2003 (Cth).
</div>
</p>
</div>

<div class="col-md-12"><strong><p>This Letter of Offer, and terms and conditions of this Acceptance agreement, together constitute your written agreement with Ashton College, as required by Standard 3 of The National Code of Practice for Providers of Education and Training to Overseas Students 2018.
</strong>
<br>This written agreement, and the right to make complaints and seek appeals of decisions and action under various processes, does not affect the rights of the student to take action under the Australian Consumer Law if the Australian Consumer Law applies.
<br><strong>By signing this agreement, I declare and agree with the statements and terms listed above. The signature below is my signature and has not been signed on my behalf by another person, including my agent or sponsor.
</strong>
</p>
</div>
<br>
<br>
<br>
<div class="row"> 
  <div class="col-md-6">
  <!-- <p><img style="width: 157px;height: 34px;" src="{{ url('').'/student_docs/'.$agent->student_signature_file }}"></p>           -->
  </div>
</div>
<div class="row"> 
  <div class="col-md-6">
  <p>Signature of student	</p>					
  </div>
  <div class="col-md-6">
      	<p>Date: </p>
  </div>
</div>
<div class="col-md-12"><p>Please retain a copy of this signed agreement for your own records and return the completed signed agreement (all pages) to Ashton College.</p>
<div class="col-md-12">
<br>Congratulations on your admission to Ashton College. We look forward to welcoming you. If you have any questions please feel free to contact the admissions department on: +61 3 9349 2488, or email: admin@ashtoncollege.edu.au.
<br>
<br>Sincerely,
<br>The Ashton College Team
<br>
<br>Address: Ashton College, 213 Nicholson Street, Footscray VIC 3011, Melbourne. Australia.
</div>
</p>
</div>
    <p style="font-size:10px;"> Offer Letter and Enrolment Acceptance- - #AC0286  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Version: 3.3
             <br>Ashton College RTO:  22234 CRICOS: 03142F  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
             
             Page 10 of 10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Approved By: CEO</p>      
                </div>
                   </div>
    </div>
  </div>

  <div class="row removePrint">
            <div class="col-md-12">
          <center><button onClick="window.print();" type="button" class="btn btn-success">Print</button></center>
              
            </div>
          </div>
   
     
        <!-- /.row -->
    </section>
  
  
  
        </div>
      </div>
    </div>
  </div>
   
      </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
    @section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
    <script type="text/javascript">
      var doc = new jsPDF();
        var specialElementHandlers = {
            '#editor': function (element, renderer) {
                return true;
            }
        };

        $('.offset-md-5').click(function () {
            doc.fromHTML($('.card-body').html(), 15, 15, {
                'width': 170,
                    'elementHandlers': specialElementHandlers
            });
            doc.save('sample-file.pdf');
        });
    </script>
    @endsection
  @endsection