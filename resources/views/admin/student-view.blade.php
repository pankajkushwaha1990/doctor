@extends('master') 
@section('title','Dashboard')
@section('styles')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.3.200/pdf.js" integrity="sha256-WpyZntIney4QnkFnP2qOwoLJsCTFFpLyi08ZWh/LXPE=" crossorigin="anonymous"></script>
<style type="text/css">
@media print and (color) {
   * {
      -webkit-print-color-adjust: exact;
      print-color-adjust: exact;
   }

   * {
      font-size: 20px;
   }

  .removePrint,.main-footer,.hidePdf {
    display: none !important;
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
                    <h6><img  style="height: 80px;width: 350px;" src="{{ url('').'/offer_docs/logo.png' }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            PH: +61 3 9349 2488, 9349 2344
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            Email: info@ashtoncollege.edu.au
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            www.ashtoncollege.edu.au</h6>
          </div>
          <div class="row">
              
            <div class="col-md-4 offset-md-5"><b>Enrolment Form</b></div>
            <div class="col-md-3">Student ID:</div>
          </div>
          <div class="row">
            <div style="font-size: small;" class="col-md-9 offset-md-0">Note: Please fully complete this form accurately and entirely.  Missing information can lead to delays in the enrolment process.</div>
            <div class="col-md-3"><sup>(office use only)</sup><sup>____{{ $agent->assign_id }}____</sup></div>
          </div>
          <div class="row" style="background-color: #002060;color: white;">
            <div class="col-md-9 offset-md-0">Section A - Personal Details</div>
            <div class="col-md-3">Checked by admissions</div>
          </div>
          <div class="row">
            <div class="col-md-2" style="background-color: #d7d7d7;">Title:</div>
            <div class="col-md-1">{{ $agent->title }}</div>
            <div class="col-md-1" style="background-color: #d7d7d7;">Gender:</div>
            <div class="col-md-2">{{ $agent->gender }}</div>
            <div class="col-md-2" style="background-color: #d7d7d7;">Date Of Birth:</div>
            <div class="col-md-4">{{ $agent->date_of_birth }}</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-2" style="background-color: #d7d7d7;">Surname:</div>
            <div class="col-md-4">{{ $agent->surname }}</div>
            <div class="col-md-2" style="background-color: #d7d7d7;">Given Name:</div>
            <div class="col-md-4">{{ $agent->given_name }}</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-2" style="background-color: #d7d7d7;">Preferred Name:</div>
            <div class="col-md-4">{{ $agent->proffered_name }}</div>
            <div class="col-md-2" style="background-color: #d7d7d7;">Passport Number::</div>
            <div class="col-md-4">{{ $agent->passport_number }}</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-2" style="background-color: #d7d7d7;">Email Address:</div>
            <div class="col-md-10">{{ $agent->email }}</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-2" style="background-color: #d7d7d7;">Street Address:</div>
            <div class="col-md-10">{{ $agent->street_address }}</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-2" style="background-color: #d7d7d7;">Suburb / Town::</div>
            <div class="col-md-4">{{ $agent->town }}</div>
            <div class="col-md-1" style="background-color: #d7d7d7;">State:</div>
            <div class="col-md-2">{{ $agent->state }}</div>
            <div class="col-md-2" style="background-color: #d7d7d7;">Post Code:</div>
            <div class="col-md-1">{{ $agent->post_code }}</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-4" style="background-color: #d7d7d7;">Postal Address: (if different from above):</div>
            <div class="col-md-8">{{ $agent->street_address }}</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-2" style="background-color: #d7d7d7;">Country of Birth:</div>
            <div class="col-md-4">{{ $agent->birth_country }}</div>
            <div class="col-md-2" style="background-color: #d7d7d7;">Town / City of Birth:</div>
            <div class="col-md-4">{{ $agent->town_city_birth }}</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-4" style="background-color: #d7d7d7;">Do you have a valid Australian visa?</div>
            <div class="col-md-2">{{ $agent->valid_australian_visa }}</div>
            <div class="col-md-2" style="background-color: #d7d7d7;">If yes, subclass:</div>
            <div class="col-md-4">{{ $agent->australian_visa_details }}</div>
          </div>
          <div class="row" style="background-color: #002060;color: white;">
            <div class="col-md-9 offset-md-0">Section B: Emergency Contact Detail</div>
            <div class="col-md-3">Checked by admissions</div>
          </div>
         <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-2" style="background-color: #d7d7d7;">Contact Name:</div>
            <div class="col-md-4">{{ $agent->emergency_contact_name }}</div>
            <div class="col-md-2" style="background-color: #d7d7d7;">Relationship to you:</div>
            <div class="col-md-4">{{ $agent->emergency_relation_to_you }}</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-2" style="background-color: #d7d7d7;">Contact Number:</div>
            <div class="col-md-10">{{ $agent->emergency_contact_number }}</div>
          </div>
           <div class="row" style="background-color: #002060;color: white;">
            <div class="col-md-12 offset-md-0">Section C: Language and Cultural Diversity</div>
          </div>
         <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-5" style="background-color: #d7d7d7;">Do you speak a language other than English at home?</div>
            <div class="col-md-2">{{ $agent->other_than_english }}</div>
            <div class="col-md-2" style="background-color: #d7d7d7;">Yes, specify:</div>
            <div class="col-md-3">{{ $agent->other_than_english_specify }}</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-5" style="background-color: #d7d7d7;">Are you of Aboriginal or Torres Strait Islander origin?</div>
            <div class="col-md-7">{{ $agent->islander_origin }}</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-12" style="background-color: #d7d7d7;">Do you consider yourself to have a permanent/significant disability and/or learning difficulty?</div>
          </div>
          <div class="row">
            <div class="col-md-12" style="background-color: #d7d7d7;font-size: small;">(Please refer to the Disability Supplement on the official Ashton College website for an explanation of the following terms.)</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-1"><input type="checkbox"  {{ $agent->significant_disability=='No' ? "checked" : "" }} name="">No</div>
            <div class="col-md-2"><input type="checkbox" {{ $agent->significant_disability=='Yes' ? "checked" : "" }} name="">Yes, please indicate:</div>
          </div>
          <?php 
                $disArray = $temp =   json_decode($agent->disability_value,true);
                $disSpeci =  end($temp);
                $finalDids = end($disSpeci);
          ?>
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2"><input {{ in_array('Hearing',$disArray) ? "checked" : "" }} type="checkbox" name="">Hearing / Deaf</div>
            <div class="col-md-2"><input {{ in_array('Physical',$disArray) ? "checked" : "" }} type="checkbox" name="">Physical</div>
            <div class="col-md-2"><input {{ in_array('Intellectual',$disArray) ? "checked" : "" }} type="checkbox" name="">Intellectual</div>
            <div class="col-md-2"><input {{ in_array('Learning',$disArray) ? "checked" : "" }} type="checkbox" name="">Learning</div>
          </div>
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2"><input  {{ in_array('Vision',$disArray) ? "checked" : "" }} type="checkbox" name="">Vision</div>
            <div class="col-md-2"><input {{ in_array('Mental',$disArray) ? "checked" : "" }} type="checkbox" name="">Mental illness</div>
            <div class="col-md-2"><input {{ in_array('Medical',$disArray) ? "checked" : "" }} type="checkbox" name="">Medical condition</div>
            <div class="col-md-2"><input {{ $finalDids!='' ? "checked" : "" }} type="checkbox" name="">Other, specify:</div>
            <div class="col-md-3">{{ $finalDids }}</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-12" style="background-color: #d7d7d7;">Have you undertaken an English Language Test?</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-2" style="background-color: #d7d7d7;">Yes, specify:</div>
            <div class="col-md-2">{{ $agent->english_test_specify }}</div>
            <div class="col-md-1" style="background-color: #d7d7d7;">Score:</div>
            <div class="col-md-2">{{ $agent->english_score }}</div>
            <div class="col-md-2" style="background-color: #d7d7d7;">Date undertaken:</div>
            <div class="col-md-2">{{ $agent->english_date }}</div>
          </div>
           <div class="row" style="background-color: #002060;color: white;">
            <div class="col-md-9 offset-md-0">Section D: Overseas Student Health Cover</div>
            <div class="col-md-3">Checked by admissions</div>
          </div>
         <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-12" style="background-color: #d7d7d7;">Do you require Ashton College to arrange Overseas Student Health Cover for you (OSHC)?</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-4"><input {{ $agent->health_cover=='No' ? "checked" : "" }} type="checkbox" name="">No.  If, "no" please provide your membership no.:</div>
            <div class="col-md-3">_______{{ $agent->mambership_no }}_________</div>
            <div class="col-md-3">Policy expiry date:</div>
            <div class="col-md-2">{{ $agent->policy_expire }}</div>
          </div>
          <div class="row">
            <div class="col-md-5"><input {{ $agent->health_cover=='Yes' ? "checked" : "" }} type="checkbox" name="">Yes.  If "yes", what type of OSHC policy will you require?</div>
            <div class="col-md-3">_______{{ $agent->policy_no }}_________</div>
          </div>
          <div class="row">
            <div class="col-md-5" style="font-size: small;">For more information please visit https://oshcaustralia.com.au</div>
          </div>
          <div class="row" style="background-color: #002060;color: white;">
            <div class="col-md-9 offset-md-0">Section E: Education and Experience</div>
            <div class="col-md-3">Checked by admissions</div>
          </div>

          <?php 
                if(!empty($agent->highest_school) && $agent->highest_school!='null'){
                  $highArray = json_decode($agent->highest_school,true);
                }else{
                  $highArray = array();
                }
          ?>

         <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-12" style="background-color: #d7d7d7;">What is your highest COMPLETED school level?</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-3"><input {{ in_array('12 eq',$highArray) ? "checked" : "" }} type="checkbox" name="">Year 12 eq</div>
            <div class="col-md-3"><input {{ in_array('11 eq',$highArray) ? "checked" : "" }} type="checkbox" name="">Year 11 eq</div>
            <div class="col-md-3"><input {{ in_array('10 eq',$highArray) ? "checked" : "" }} type="checkbox" name="">Year 10 or below</div>
            <div class="col-md-3"><input {{ in_array('N/A',$highArray) ? "checked" : "" }} type="checkbox" name="">N/A</div>
          </div>
           <div class="row" style="border-top: 1px solid #101010;border-bottom: 1px solid #101010;">
            <div class="col-md-2" style="background-color: #d7d7d7;">Year level completed:</div>
            <div class="col-md-4">{{ $agent->year_completed }}</div>
            <div class="col-md-2" style="background-color: #d7d7d7;">Country:</div>
            <div class="col-md-4">{{ $agent->completion_country }}</div>
          </div>
  <br>
<p style="font-size:10px;">Enrolment Form&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Page 1 of 5
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Version 9
             <br>Ashton College ABN: 48 110 049 270  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
             RTO 22234, CRICOS 03142F&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             #AC0406</p>

        </div>
      </div>
    </div>
  </div>
<br>
<br>
   <div class="row breakPage">
    <div class="col-12">
       <div class="card">
         <div class="card-body">
             <div class="row">
                    <h6><img  style="height: 80px;width: 350px;" src="{{ url('').'/offer_docs/logo.png' }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            PH: +61 3 9349 2488, 9349 2344
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            Email: info@ashtoncollege.edu.au
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            www.ashtoncollege.edu.au</h6>
          </div>
          <div class="row">
              
            <div class="col-md-4 offset-md-5"><b>Enrolment Form</b></div>
          </div>
          <div class="row">
            <div style="font-size: small;" class="col-md-12 offset-md-0">Note: Please fully complete this form accurately and entirely. Missing information can lead to delays in the enrolment process.</div>
          </div>
          <div class="row" style="background-color: #002060;color: white;">
            <div class="col-md-9 offset-md-0">Section E: Education and Experience (Continued)</div>
            <div class="col-md-3">Checked by admissions</div>
          </div>

          <?php 
              if(isset($agent->completed_qualification) && $agent->completed_qualification!='null'){
                $compArray = json_decode($agent->completed_qualification,true);
              }else{
                $compArray = array();
              } 
                
          ?>

         <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-12" style="background-color: #d7d7d7;">Have you successfully completed any of the below listed qualifications?</div>
          </div>
          
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-1"><input {{ $agent->is_completed_qualification=='No' ? "checked" : "" }} type="checkbox" name="">No</div>
            <div class="col-md-10"><input {{ $agent->is_completed_qualification=='Yes' ? "checked" : "" }} type="checkbox" name="">Yes (If yes, tick all applicable boxes)</div>
          </div>
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4"><input {{ in_array('Bachelor degree or higher degree',$compArray) ? "checked" : "" }} type="checkbox" name="">Bachelor degree or higher degree</div>
            <div class="col-md-3"><input {{ in_array('Certificate IV',$compArray) ? "checked" : "" }} type="checkbox" name="">Certificate IV</div>
            <div class="col-md-3"><input {{ in_array('Certificate I',$compArray) ? "checked" : "" }} type="checkbox" name="">Certificate I</div>
          </div>
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4"><input {{ in_array('Advanced diploma or associate degree',$compArray) ? "checked" : "" }} type="checkbox" name="">Advanced diploma or associate degree</div>
            <div class="col-md-3"><input {{ in_array('Certificate III/Trade Certificate',$compArray) ? "checked" : "" }} type="checkbox" name="">Certificate III/Trade Certificate</div>
            <div class="col-md-3"><input {{ in_array('Other education',$compArray) ? "checked" : "" }} type="checkbox" name="">Other education</div>
          </div> <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4"><input {{ in_array('Diploma or associate diploma',$compArray) ? "checked" : "" }} type="checkbox" name="">Diploma or associate diploma</div>
            <div class="col-md-3"><input {{ in_array('Certificate II',$compArray) ? "checked" : "" }} type="checkbox" name="">Certificate II</div>
          </div>
          <?php 
              if(!empty($agent->country_qualification) && $agent->country_qualification!='null'){
                $cntqaArray = json_decode($agent->country_qualification);
              }else{
                $cntqaArray = array();
              } 
          ?>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-6" style="background-color: #d7d7d7;">If you ticked any of the above, is your qualification:</div>
            <div class="col-md-2"><input {{ in_array('Australian',$cntqaArray) ? "checked" : "" }} type="checkbox" name="">Australian</div>
            <div class="col-md-2"><input {{ in_array('Australian equivalent',$cntqaArray) ? "checked" : "" }} type="checkbox" name="">Australian equivalent</div>
            <div class="col-md-2"><input {{ in_array('International',$cntqaArray) ? "checked" : "" }} type="checkbox" name="">International</div>
          </div>
           <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-12" style="background-color: #d7d7d7;">Select one category which best describes the main reason you are undertaking study:</div>
          </div>
          <?php 
              if(!empty($agent->reason_qualification) && $agent->reason_qualification!='null'){
                $reasaArray = json_decode($agent->reason_qualification,true);
              }else{
                $reasaArray = array();
              } 
          ?>

          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-4"><input {{ in_array('To get a job',$reasaArray) ? "checked" : "" }} type="checkbox" name="">To get a job</div>
            <div class="col-md-4"><input {{ in_array('To start my own business',$reasaArray) ? "checked" : "" }} type="checkbox" name="">To start my own business</div>
            <div class="col-md-4"><input {{ in_array('To develop my existing business',$reasaArray) ? "checked" : "" }} type="checkbox" name="">To develop my existing business</div>
          </div>
          <div class="row">
            <div class="col-md-4"><input {{ in_array('To try a different career',$reasaArray) ? "checked" : "" }} type="checkbox" name="">To try a different career</div>
            <div class="col-md-4"><input {{ in_array('I want extra skills for my job',$reasaArray) ? "checked" : "" }} type="checkbox" name="">I want extra skills for my job</div>
            <div class="col-md-4"><input {{ in_array('It was a requirement of my job',$reasaArray) ? "checked" : "" }} type="checkbox" name="">It was a requirement of my job</div>
          </div> 
          <div class="row">
            <div class="col-md-12"><input {{ in_array('Other reasons',$reasaArray) ? "checked" : "" }} type="checkbox" name="">Other reasons:</div>
          </div>

           <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-12" style="background-color: #d7d7d7;">Select which best describes your current employment status:</div>
          </div>

           <?php 
           if(!empty($agent->employment_status) && $agent->employment_status!='null'){
                $statusArray = json_decode($agent->employment_status,true);
           }else{
               $statusArray = array();
           }
          ?>
          

          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-4"><input {{ in_array('Full time employee',$statusArray) ? "checked" : "" }} type="checkbox" name="">Full time employee</div>
            <div class="col-md-4"><input {{ in_array('Part time employee',$statusArray) ? "checked" : "" }} type="checkbox" name="">Part time employee</div>
            <div class="col-md-4"><input {{ in_array('Self employed',$statusArray) ? "checked" : "" }} type="checkbox" name="">Self employed</div>
          </div>
          <div class="row">
            <div class="col-md-4"><input {{ in_array('Employer',$statusArray) ? "checked" : "" }} type="checkbox" name="">Employer</div>
            <div class="col-md-4"><input {{ in_array('Unemployed',$statusArray) ? "checked" : "" }} type="checkbox" name="">Unemployed</div>
            <div class="col-md-4"><input {{ in_array('Not employed/not seeking employment',$statusArray) ? "checked" : "" }} type="checkbox" name="">Not employed/not seeking employment</div>
          </div> 



          

           <div class="row" style="background-color: #002060;color: white;">
            <div class="col-md-9 offset-md-0">Section F: Course Information</div>
            <div class="col-md-3">Checked by admissions</div>
          </div>
         <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-12" style="background-color: #d7d7d7;">Please tick the course/s that you wish to enrol in.</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-12">
             <div class="row" style="border-top: 1px solid #101010;">
              <div class="col-md-4">Course Code</div>
              <div class="col-md-4">Course Name</div>
              <div class="col-md-4">Duration</div>
             </div>
             <?php 
                if(!empty($agent->course_code) && $agent->course_code!='null'){
                $courseArray = json_decode($agent->course_code);

                }else{
                $courseArray = array();

                }
          ?>


             
          @foreach($course as $cours)
            <?php 
            if(in_array( $cours->course_code,$courseArray)){?>
                 <div class="row" style="border-top: 1px solid #101010;">
              <div class="col-md-4"><input {{ in_array( $cours->course_code,$courseArray) ? "checked" : "" }} type="checkbox" name="">{{ $cours->course_code }}</div>
              <div class="col-md-4">{{ $cours->course_name }}</div>
              <div class="col-md-4">
                 <?php 
                              $weeks          = explode('/',$cours->course_duration);
                              $course_amount  = explode('/',$cours->course_amount);
                              $material_amount = explode('/',$cours->material_amount);
                              $checked = "";     
                              $selcted = 0;  
                              $final = array();
                              if($agent->course_details!='null'){
                                  
                                  $details = json_decode($agent->course_details,true);
                              foreach ($details as $key => $value) {
                                      foreach ($value as $key => $courseDe) {
                                          $final[] = $key."||".$courseDe;
                                      }
                              }
                                  
                              }
                              

                              $checked = "";
                              foreach ($weeks as $key => $week) {
                                if(!in_array($cours->course_code,$courseArray)){
                                  $cours->course_code = null;
                                }
                                $match = $cours->course_code."||".$week."||".$course_amount[$key]."||".$material_amount[$key]."||". $selcted;
                                if(in_array($match, $final)){ ?>
                                  
                                  <label ><?php echo $week;?> Weeks</label>&nbsp;&nbsp;&nbsp;&nbsp;

                               <?php }
                               $selcted++;

                               ?>
                                
                                
                              
                              <?php $checked = ''; } ?>
              </div>
             </div>
           <?php } ?>
            @endforeach









            

            </div>
            <div class="col-md-3">
              
            </div>
          </div>



          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-12">*Please select the number of weeks from the drop down you wish to undertake. 10 week blocks only. The number of weeks for an English course will be determined after you have undertaken the placement test and/or based on the English attainment you have gained from
your previous studies/test. You will be contacted by enrolment officer to confirm this.<br>
**The 42-week duration indicated for Certificate IV in Commercial Cookery is based on students who have completed the Certificate III in
Commercial Cookery program at Ashton College and have subsequently received credit transfers for equivalent units. The Certificate IV in
Commercial Cookery then consist of 12 units. Without Credit transfers the total no. of units included in the course is 33 and is 72 weeks in
duration. Students who have completed Certificate III in Commercial Cookery elsewhere may have a varied duration dependant on the
electives completed. Students will be advised of the duration and cost dependent on the above in their letter of offcier.<br>
***The 14-week duration indicated for Diploma of Hospitality Management is based on students who have completed the Certificate III in
Commercial Cookery and Certificate IV in Commercial Cookery program at Ashton College and have subsequently received credit
transfers for equivalent units. Diploma of Hospitality Management then consist of 4 units. Without Credit transfers the total no. of units is
28 and is 72 weeks in duration. Students who have completed Certificate III in Commercial Cookery and or Certificate IV in Commercial
Cookery elsewhere may have a varied duration dependent on the electives completed. Students will be advised of the duration and cost
depending on the above in their letter of officer.</div>
          </div>
          <p style="font-size:10px;">Enrolment Form&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Page 2 of 5
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Version 9
             <br>Ashton College ABN: 48 110 049 270  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
             RTO 22234, CRICOS 03142F&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             #AC0406</p>

        </div>
      </div>
    </div>
  </div>



<br>







    <div class="row breakPage">
    <div class="col-12">
       <div class="card">
         <div class="card-body">
             <div class="row">
                    <h6><img  style="height: 80px;width: 350px;" src="{{ url('').'/offer_docs/logo.png' }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            PH: +61 3 9349 2488, 9349 2344
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            Email: info@ashtoncollege.edu.au
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            www.ashtoncollege.edu.au</h6>
          </div>
          <div class="row">
            <div class="col-md-12 offset-md-5"><b>Enrolment Form</b></div>
          </div>
          <div class="row">
            <div style="font-size: small;" class="col-md-12 offset-md-0">Note: Please fully complete this form accurately and entirely. Missing information can lead to delays in the enrolment process.</div>
          </div>
          <div class="row" style="background-color: #002060;color: white;">
            <div class="col-md-9 offset-md-0">Section F: Course Information (Continued)</div>
            <div class="col-md-3">Checked by admissions</div>
          </div>
          <?php 
          if(!empty($agent->credit_transfer) && $agent->credit_transfer!='null'){
                $creditArray = json_decode($agent->credit_transfer);

          }else{
                $creditArray = array();

          }
          ?>
          <div class="row">
            <div class="col-md-5" style="background-color: #d7d7d7;">Are you applying for credit transfers from previous studies?:</div>
            <div class="col-md-2"></div>
            <div class="col-md-2"><input {{ in_array('No',$creditArray) ? "checked" : "" }} type="checkbox" name="">No</div>
            <div class="col-md-2"><input {{ in_array('Yes',$creditArray) ? "checked" : "" }} type="checkbox" name="">Yes</div>
          </div>
           <?php 
           if(!empty($agent->previous_studies) && $agent->previous_studies!='null'){
            $prevArray = json_decode($agent->previous_studies);
          }else{
            $prevArray = array();
          }
                
          ?>
           <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-5" style="background-color: #d7d7d7;">Are you applying for RPL from previous studies?</div>
            <div class="col-md-2"></div>
            <div class="col-md-2"><input {{ in_array('No',$prevArray) ? "checked" : "" }} type="checkbox" name="">No</div>
            <div class="col-md-2"><input {{ in_array('Yes',$prevArray) ? "checked" : "" }} type="checkbox" name="">Yes</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-12">If Yes for Credit transfers and/or RPL, one of our staff will contact you for further information.</div>
          </div>
           <div class="row" style="background-color: #002060;color: white;">
            <div class="col-md-9 offset-md-0">Section G: Airport Pickup and Accommodation</div>
            <div class="col-md-3">Checked by admissions</div>
          </div>
          <?php  
          if(!empty($agent->require_airport) && $agent->require_airport!='null'){
            $airArray = json_decode($agent->require_airport);
          }else{
            $airArray = array();
          }
                
          ?>
          <div class="row">
            <div class="col-md-7" style="background-color: #d7d7d7;">Do you require Ashton College to arrange for you to be collected from the Airport?</div>
            <div class="col-md-1"></div>
            <div class="col-md-2"><input {{ in_array('No',$airArray) ? "checked" : "" }} type="checkbox" name="">No</div>
            <div class="col-md-2"><input {{ in_array('Yes',$airArray) ? "checked" : "" }} type="checkbox" name="">Yes*</div>
          </div>
           <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-7" style="background-color: #d7d7d7;">Do you require assistance with arranging accommodation in Melbourne?</div>
            <?php 
            if(!empty($agent->require_assistance) && $agent->require_assistance!='null'){
                $assiArray = json_decode($agent->require_assistance);
            }else{
              $assiArray = array();
            }
          ?>
            <div class="col-md-1"></div>
            <div class="col-md-2"><input {{ in_array('No',$assiArray) ? "checked" : "" }} type="checkbox" name="">No</div>
            <div class="col-md-2"><input {{ in_array('Yes',$assiArray) ? "checked" : "" }} type="checkbox" name="">Yes</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-12">*If you answered "Yes" to either of the above, please complete the Airport Pick Up and Homestay Placement Application form
            online. Additional charges apply.</div>
          </div>
           <div class="row" style="background-color: #002060;color: white;">
            <div class="col-md-9 offset-md-0">Section H: Unique Student Identifier (USI)</div>
            <div class="col-md-3">Checked by admissions</div>
          </div>
          <div class="row">
            <div class="col-md-12">From 1 January 2015, Ashton College is required to include your USI in the data we submit to NCVER. If you have not yet
          obtained a USI you can apply for it directly by visiting www.usi.gov.au.</div>
          </div>
           <div class="row">
            <div class="col-md-12">You may already have a USI if you have done any nationally recognised training, which could include training at work, completing
        a first aid course or RSA (Responsible Service of Alcohol) course, getting a white card, or studying at a TAFE or training
        organisation. It is important that you try to find out whether you already have a USI before trying to create a new one. You must
        not have more than one USI. To check if you already have a USI, use the 'Forgotten USI' link on the USI website:
        www.usi.gov.au/faws/i-have-forgotten-my-usi/.</div>
          </div>
         <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-2" style="background-color: #d7d7d7;">Your USI:</div>
            <div class="col-md-10">{{ $agent->usi_code  }}</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-12">USI application through Ashton College (if you do not already have one)</div>
          </div>
          <div class="row">
            <div class="col-md-12">Application for Unique Student Identifier (USI)</div>
          </div>
          <div class="row">
            <div class="col-md-12">If you would like Ashton College to apply for a USI on your behalf, you must authorise us to do so and declare that you have read
      the privacy policy information at www.usi.gov.au/documents/privacy-notice-when-rto-applies-their-behalf.</div>
          </div>
          <div class="row">
            <div class="col-md-12">I <b>{{ $agent->surname." ".$agent->given_name  }}</b> authorise Ashton College to apply pursuant to sub-section 9(2) of the
Student Identifiers Act 2014, for a USI on my behalf.</div>
          </div>
<div class="row">
            <div class="col-md-12">We need to verify your identity to create the USI. We will use your personal details as provided in Section A of this enrolment
form.</div>
          </div>
<div class="row">
            <div class="col-md-12">In accordance with section 11 of the Student Identifiers Act 2014 Cth (SI Act), we will securely destroy personal information which
we collect from clients solely for the purpose of applying for a USI on your behalf as soon as is practicable after the USI
application has been made of the information is no longer needed for that
purpose, unless we are required by or under any law to retain it.</div>
          </div>
<div class="row" style="border-top: 1px solid #101010;border-bottom: 1px solid #101010;">
            <div class="col-md-12"><input checked="" type="checkbox">I have read and I consent to the collection, use and disclosure of my personal information (which may include sensitive
information) pursuant to the information detailed at <https://www.usi.gov.au/documents/privacy-notice-when-rto-applies-theirbehalf>.</div>

<p style="font-size:10px;">Enrolment Form&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Page 3 of 5
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Version 9
             <br>Ashton College ABN: 48 110 049 270  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
             RTO 22234, CRICOS 03142F&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             #AC0406</p>
          </div>
        </div>
      </div>
    </div>
  </div>
<br>
    <div class="row breakPage">
    <div class="col-12">
       <div class="card">
         <div class="card-body">
             <div class="row">
                    <h6><img  style="height: 80px;width: 350px;" src="{{ url('').'/offer_docs/logo.png' }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            PH: +61 3 9349 2488, 9349 2344
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            Email: info@ashtoncollege.edu.au
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            www.ashtoncollege.edu.au</h6>
          </div>
          <div class="row">
            <div class="col-md-12 offset-md-5"><b>Enrolment Form</b></div>
          </div>
          <div class="row">
            <div style="font-size: small;" class="col-md-12 offset-md-0">Note: Please fully complete this form accurately and entirely. Missing information can lead to delays in the enrolment process.</div>
          </div>
          <div class="row" style="background-color: #002060;color: white;">
            <div class="col-md-12 offset-md-0">Section I: Privacy Statement</div>
          </div>
          <div class="row">
            <div class="col-md-12">Ashton College respects the privacy and confidentiality of its students and operates in compliance with the Australian Privacy Principles (APPs).</div>
          </div>

           <div class="row">
            <div class="col-md-12">Under the Data Provision Requirements 2012, Ashton College is required to collect personal information about you and to disclose that personal information to
the National Centre for Vocational Education Research Ltd (NCVER). Your personal information (including the personal information contained on this enrolment
form), may be used or disclosed by Ashton College for statistical, administrative, regulatory and research purposes to:</div>
          </div>


           <div class="row">
            <div class="col-md-12"><li>Commonwealth and State/territory government departments and authorised agencies; and</li></div>
          </div>
          <div class="row">
            <div class="col-md-12"><li>NCVER
Personal information that has been disclosed to NCVER may be used or disclosed by NCVER for the following purposes:</li></div>
          </div><div class="row">
            <div class="col-md-12"><li>populating authenticated VET transcripts;</li></div>
          </div><div class="row">
            <div class="col-md-12"><li>facilitating statistics and research relating to education, including surveys and data linkage;</li></div>
          </div><div class="row">
            <div class="col-md-12"><li>pre-populating RTO student enrolment forms;</li></div>
          </div><div class="row">
            <div class="col-md-12"><li>understanding how the VET market operates, for policy, workforce planning and consumer information; and</li></div>
          </div><div class="row">
            <div class="col-md-12"><li>administering VET, including program administration, regulation, monitoring and evaluation.</li></div>
          </div>


           <div class="row">
            <div class="col-md-12">You may receive a student survey which may be administered by a government department or NCVER employee, agent or third-party contractor or other
authorised agencies. You can opt out of the survey at any time of being contacted.</div>
          </div>



           <div class="row">
            <div class="col-md-12">NCVER will collect, hold, use and disclose your personal information in accordance with the Privacy Act 1988 (Cth), the National VET Data Policy and all NCVER
policies and protocols (including those published on NCVER's website at www.ncver.edu.au).</div>
          </div>


           <div class="row">
            <div class="col-md-12">For information about how Ashton College collects, uses and discloses your personal information, including how you can make a complaint about a breach of
privacy, please refer to Ashton College's privacy policy which can be found at</div>
          </div> 

 <div class="row" style="background-color: #002060;color: white;">
            <div class="col-md-9 offset-md-0">Section J: Applicant Declaration</div>
            <div class="col-md-3">Checked by admissions</div>
          </div>
          <div class="row">
            <div class="col-md-12">Please read each statement and click circles to indicate your agreement.</div>
          </div>
           <div class="row">
            <div class="col-md-12"><input checked="" type="radio">I confirm that by signing this declaration, I am applying for a place in the course/s as outlined within this enrolment form.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input checked="" type="radio">I declare that information provided to Ashton College in application for study is to the best of my knowledge true, correct and complete at the time of my
enrolment/application.</div>
          </div>
          <div class="row">
            <div class="col-md-12"><input checked="" type="radio">I acknowledge that providing any false information and/or failing to disclose any information relevant to my application for enrolment and/or failure to fully
complete an enrolment form may result in the delay in processing my application.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input checked="" type="radio">I have read Ashton College's pre-enrolment documentation including the refund policy along with information on credit transfer, recognition of prior learning
(RPL) and living in Melbourne.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input checked="" type="radio">I understand that conditions for deferring, suspending and cancelling my enrolment and the impact these actions may have on my student visa.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input checked="" type="radio">I understand the conditions enabling me to change provider and the impact these actions may have on my student visa.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input checked="" type="radio">I understand that an ELICOS course has 20 hours of face-to-face tuition per week (if applicable)</div>
          </div>
<div class="row">
            <div class="col-md-12"><input checked="" type="radio">I understand that I must maintain satisfactory course progress and attendance during my studies at Ashton College and the impact of not doing so may have
on my enrolment and student visa.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input checked="" type="radio">I declare that I am a genuine temporary entrant and genuine student and that I have read and understood conditions relating to requirements outlined on
www.borders.gov.au.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input checked="" type="radio">I am aware of the tuition and living costs of my stay in Australia and have the financial capacity to meet such costs for the duration of my course. I will make
timely payments of any fees or associated costs.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input checked="" type="radio">I agree to inform Ashton College if I change my home address during the period of my enrolment.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input checked="" type="radio">I agree to maintain Overseas Student Health Cover for the entire duration of my enrolment.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input checked="" type="radio">I have disclosed to Ashton College any special needs which may affect my learning.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input checked="" type="radio">I have read and understood the privacy statement above. This agreement, and the availability of the College complaints and appeal process, does not alter
my right to action under Australia's consumer protection laws.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input checked="" type="radio">I agree to complete my studies in accordance with Ashton College policies and procedures and Code of Conduct when studying at Ashton College.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input checked="" type="radio">I understand that I may receive a National Centre for Vocational Education Research (NCVER) student survey.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input checked="" type="radio">I have read and understood the course information pertaining to my chosen course/s including the list of units on Ashton College’s website.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input checked="" type="radio">I understand that if I do not comply with the College policies and procedures and Code of Conduct, my enrolment and student visa may be affected.</div>
          </div>
<div class="row" style="border-bottom: 1px solid #101010;">
            <div class="col-md-12"><input checked="" type="radio">I understand that Ashton College takes pictures and videos of classes and students from time to time for use in newsletters, our website, social media sites
and marketing material to promote and celebrate achievement. I will inform Ashton College in writing if I do not wish for my picture/image to be included in
any of the above.</div>
<p style="font-size:10px;">Enrolment Form&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Page 4 of 5
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Version 9
             <br>Ashton College ABN: 48 110 049 270  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
             RTO 22234, CRICOS 03142F&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             #AC0406</p>
</div>     
        </div>
      </div>
    </div>
  </div>




<br>

<div class="row breakPage">
    <div class="col-12">
       <div class="card">
         <div class="card-body">
             <div class="row">
                    <h6><img  style="height: 80px;width: 350px;" src="{{ url('').'/offer_docs/logo.png' }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            PH: +61 3 9349 2488, 9349 2344
            <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
            Email: info@ashtoncollege.edu.au
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            www.ashtoncollege.edu.au</h6>
          </div>
          <div class="row">
            <div class="col-md-12 offset-md-5"><b>Enrolment Form</b></div>
          </div>
          <div class="row">
            <div style="font-size: small;" class="col-md-12 offset-md-0">Note: Please fully complete this form accurately and entirely. Missing information can lead to delays in the enrolment process.</div>
          </div>
          <div class="row" style="background-color: #002060;color: white;">
            <div class="col-md-9 offset-md-0">Section K: Applicant Checklist</div>
            <div class="col-md-3">Checked by admissions</div>
          </div>
          <div class="row">
            <div class="col-md-12">Before submitting this application to Ashton College, please attach the following documents (if applicable):</div>
          </div>

           <div class="row">
            <div class="col-md-6"><input {{ !empty($agent->passport_file) ? "checked" : "" }} type="checkbox" name="">Certified copy of passport</div>
            <div class="col-md-6"><input {{ !empty($agent->qualification_file) ? "checked" : "" }} type="checkbox" name="">Certified copies of your academic qualifications</div>
          </div>
           <div class="row">
            <div class="col-md-6"><input {{ !empty($agent->language_file) ? "checked" : "" }} type="checkbox" name="">Evidence of your English Language ability</div>
            <div class="col-md-6"><input {{ !empty($agent->oshc_file) ? "checked" : "" }} type="checkbox" name="">Evidence of OSHC (if already purchased)</div>
          </div>


          <div class="row">
            <div class="col-md-12">Documents in languages other than English</div>
          </div>
           <div class="row">
            <div class="col-md-12">If your overseas qualification is in a language other than English, you must provide a certified copy of the original document (in the original language) and a
certified copy of a translation by a NAATI accredited authority such as a consulate or official translation service. See National Accreditation Authority for
Translators and Interpreters (NAATI) (www.naati.com.au).</div>
          </div>
           <div class="row">
            <div class="col-md-12">Fraud is a serious offence and will not be tolerated by Ashton College. If you have submitted certified documentation with your application for admission, you are
required to bring your original documents to Australia and make them available for inspection to Ashton College on orientation day. Failure to provide original
documentation when requested could result in cancelation of your enrolment.</div>
          </div>
          <div class="row">
            <div class="col-md-12"><i>Please review the details you have provided in this document and ensure they are accurate and complete. Then save this form.</i></div>
          </div>
           <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-2" style="background-color: #d7d7d7;">Student print name:</div>
            <div class="col-md-10">{{ $agent->surname." ".$agent->given_name }}</div>
          </div>
           <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-3" style="background-color: #d7d7d7;">Student signature:</div>
            <div class="col-md-4"><img style="width: 72%;height: 48%;" src="{{ url('').'/student_docs/'.$agent->student_signature_file }}"></div>
            <div class="col-md-2" style="background-color: #d7d7d7;">Date:</div>
            <div class="col-md-3">{{ $agent->submit_date }}</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-12"><i>Please ensure that you have completed each section fully. Incomplete application forms can lead to a delay in processing your
file.</i></div>
          </div>





           <div class="row" style="background-color: #002060;color: white;">
            <div class="col-md-9 offset-md-0">Section L: Education Agent Details (if applicable)</div>
            <div class="col-md-3">Checked by admissions</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;">
            <div class="col-md-3" style="background-color: #d7d7d7;">Agent name:</div>
            <div class="col-md-4">{{ @$employee->name }}</div>
            <div class="col-md-2" style="background-color: #d7d7d7;">Agency name:</div>
            <div class="col-md-3">{{ @$employee->company }}</div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;border-bottom: 1px solid #101010;">
            <div class="col-md-2" style="background-color: #d7d7d7;">Agent email address:</div>
            <div class="col-md-10"> {{ @$employee->email }} </div>
          </div>
 <div class="row">
            <div class="col-md-12"><b>Agent declaration: </b><i>(Please click all of the circles to indicate your agreement)</i></div>
          </div>
<div class="row">
            <div class="col-md-12">As the Education Agent of this student seeking to apply for enrolment at Ashton College, I confirm:</div>
          </div>

           <div class="row">
            <div class="col-md-12"><input type="radio" checked="">That I comply with the standards of the ESOS framework (including the Education Services for Overseas Students (ESOS) Act 2000 and the The National
Code of Practice for Providers of Education and Training to Overseas Students 2018 .</div>
          </div>
<div class="row">
            <div class="col-md-12"><input type="radio" checked="">That the information contained within this application form is accurate, and that the supporting documentation including, but not limited to the "certified copy"
of the applicant's academic record is correct and has not been altered in any way.</div>
          </div>
          <div class="row">
            <div class="col-md-12"><input type="radio" checked="">That any Enrolment Fees paid to me by the student to support this application will be immediately transferred to Ashton College so that Ashton College can
uphold its commitment to ESOS legislation with regards to enhancing the refund policy where appropriate.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input type="radio" checked="">That I understand Ashton College expects Education Agents to act ethically in dealings with the Overseas Students and their families.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input type="radio" checked="">That I understand Ashton College expects Education Agents to ensure that each student applying for entry to Ashton College is familiar with the information
contained in: The Application Form, Overseas Student Pre-Enrolment Information and the Client Information Handbook.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input type="radio" checked="">I confirm the student has signed this application form.</div>
          </div>
<div class="row">
            <div class="col-md-12"><input type="radio" checked="">I have provided the student’s personal email address and residential address, as disclosed to me by the student.</div>
          </div>
 <div class="row" style="border-top: 1px solid #101010;border-bottom: 1px solid #101010;">
            <div class="col-md-3" style="background-color: #d7d7d7;">Agent signature / stamp:</div>
            <div class="col-md-9"><img style="width: 20%;height: 57%;" src="{{ url('').'/agent_docs/'.@$employee->signature_file }}"></div>
          </div>

          <div class="row">
            <div class="col-md-12" style="background-color: #ffdb2d;"><center>OFFICE USE ONLY</center></div>
          </div>
          <div class="row" style="border-top: 1px solid #101010;border-bottom: 1px solid #101010;">
            <div class="col-md-3" style="background-color: #d7d7d7;">Date Received:</div>
            <div class="col-md-4"></div>
            <div class="col-md-2" style="background-color: #d7d7d7;">Staff signature:</div>
            <div class="col-md-3"></div>
          </div>
         
         <div class="row" style="background-color: #002060;color: white;">
            <div class="col-md-9 offset-md-0">Section M: Application Submission</div>
          </div>
          <div class="col-md-12"><b>Please send your application to:</b> Email: info@ashtoncollege.edu.au<br>
or<br>
Ashton College, Melbourne Footscray Campus: 213 Nicholson Street, Footscray VIC 3011. AUSTRALIA<br>
Phone: + 61 3 9349 2488, website: www.ashtoncollege.edu.au</div>
         
          <p style="font-size:10px;">Enrolment Form&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Page 1 of 5
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             Version 9
             <br>Ashton College ABN: 48 110 049 270  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             
             RTO 22234, CRICOS 03142F&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             #AC0406</p>

<br>

@if(!empty($agent->passport_file))

  @if(strpos($agent->passport_file,'.pdf')===false)
        <div class="breakPage"></div>
        <div class="row">
                    <div class="col-md-12" style="background-color: grey;"><center>Passport Attachment</center></div>
                  </div>
        <br>

          <div class="row">
            <div class="col-md-12">
              <img src="{{ url('').'/student_docs/'.$agent->passport_file }}">
            </div>
      </div>
  @else 
   <div class="row hidePdf">
                    <div class="col-md-12" style="background-color: grey;"><center>Passport Attachment</center></div>
                  </div>
  <embed
    src="{{ url('').'/student_docs/'.$agent->passport_file }}"
    width="1040px"
    height="1000px"
    style="border: none;"
    class="hidePdf"
    type="application/pdf" />
  </embed>
  @endif
<br>

@endif

@if(!empty($agent->qualification_file))


@if(strpos($agent->qualification_file,'.pdf')===false)
         <div class="breakPage"></div>
           <div class="row">
            <div class="col-md-12" style="background-color: grey;"><center>Qualification Attachment</center></div>
          </div>
<br>
          <div class="row">
            <div class="col-md-12">
              <img src="{{ url('').'/student_docs/'.$agent->qualification_file }}">
            </div>
      </div>
  @else 
   <div class="row hidePdf">
            <div class="col-md-12" style="background-color: grey;"><center>Qualification Attachment</center></div>
          </div>
 <embed
    src="{{ url('').'/student_docs/'.$agent->qualification_file }}"
    width="1040px"
    height="1000px"
    style="border: none;"
    class="hidePdf"
    type="application/pdf" />
  @endif
<br>
@endif

@if(!empty($agent->language_file))



@if(strpos($agent->language_file,'.pdf')===false)
<div class="breakPage"></div>
           <div class="row">
            <div class="col-md-12" style="background-color: grey;"><center>Language Evidance Attachment</center></div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <img src="{{ url('').'/student_docs/'.$agent->language_file }}">
            </div>
      </div>
  @else 
  <div class="row hidePdf">
            <div class="col-md-12" style="background-color: grey;"><center>Language Evidance Attachment</center></div>
          </div>
 <embed
    src="{{ url('').'/student_docs/'.$agent->language_file }}"
    width="1040px"
    height="1000px"
    style="border: none;"
    class="hidePdf"
    type="application/pdf" />
  @endif
<br>
@endif
@if(!empty($agent->oshc_file))



@if(strpos($agent->oshc_file,'.pdf')===false)
<div class="breakPage"></div>
           <div class="row">
            <div class="col-md-12" style="background-color: grey;"><center>OSHC Attachment</center></div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <img src="{{ url('').'/student_docs/'.$agent->oshc_file }}">
            </div>
      </div>
  @else 
  <div class="row hidePdf">
            <div class="col-md-12" style="background-color: grey;"><center>OSHC Attachment</center></div>
          </div>
 <embed
    src="{{ url('').'/student_docs/'.$agent->oshc_file }}"
    width="1040px"
    height="1000px"
    style="border: none;"
    class="hidePdf"
    type="application/pdf" />
  @endif

<br>
@endif
@if(!empty($agent->student_other_file))



          @if(strpos($agent->student_other_file,'.pdf')===false)
          <div class="breakPage"></div>
           <div class="row">
            <div class="col-md-12" style="background-color: grey;"><center>Other Attachment</center></div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <img src="{{ url('').'/student_docs/'.$agent->student_other_file }}">
            </div>
      </div>
  @else 
   <div class="row hidePdf">
            <div class="col-md-12" style="background-color: grey;"><center>Other Attachment</center></div>
          </div>
 <embed
    src="{{ url('').'/student_docs/'.$agent->student_other_file }}"
    width="1040px"
    height="1000px"
    class="hidePdf"
    style="border: none;"
    type="application/pdf" />


  @endif

@endif
<br>
<br>
<br>
          <div class="row removePrint">
            <div class="col-md-12">
          <center><button onClick="window.print();" type="button" class="btn btn-success">Print</button></center>
              
            </div>
          </div>

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