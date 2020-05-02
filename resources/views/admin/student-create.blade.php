@extends('master') 
@section('title','Dashboard')
@section('styles')
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

    <!-- Main content -->
  <section class="content">
      <div class="row">
          <div class="col-md-12">
          <form role="form"  enctype="multipart/form-data" method="post" action="{{ url('student-create-submit') }}">
           <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Section A - Personal Details</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  
                </div>
              </div>
             <div class="card-body">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Title *</label>
                          <select name="title" class="form-control" required="">
                            <option value="">Select Title</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Mrs.">Mrs.</option>
                          </select>
                          @if ($errors->has('title')) <p style="color:red;">{{ $errors->first('title') }}</p> @endif

                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Gender *</label>
                          <select name="gender" class="form-control" required="">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Intermediate">Intermediate</option>
                          </select>
                          @if ($errors->has('gender')) <p style="color:red;">{{ $errors->first('gender') }}</p> @endif

                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Date Of Birth *</label>
                          <input name="date_of_birth" type="text" class="form-control datepicker" id="exampleInputEmail1" placeholder="Enter Date Of Birth" value="{{ old('date_of_birth') }}" required="">
                          @if ($errors->has('date_of_birth')) <p style="color:red;">{{ $errors->first('date_of_birth') }}</p> @endif
                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Email *</label>
                          <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email Address" value="{{ old('email') }}" required="">
                          @if ($errors->has('email')) <p style="color:red;">{{ $errors->first('email') }}</p> @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Surname *</label>
                          <input type="text" name="surname" class="form-control" id="exampleInputEmail1" placeholder="Enter Surname" value="{{ old('surname') }}" required="">
                          @if ($errors->has('surname')) <p style="color:red;">{{ $errors->first('surname') }}</p> @endif

                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Given Name*</label>
                          <input type="text" name="given_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Given Name" value="{{ old('given_name') }}" required="">
                          @if ($errors->has('given_name')) <p style="color:red;">{{ $errors->first('given_name') }}</p> @endif
                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Preferred Name</label>
                          <input type="text" name="proffered_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Preffered Name" value="{{ old('proffered_name') }}">
                          @if ($errors->has('proffered_name')) <p style="color:red;">{{ $errors->first('proffered_name') }}</p> @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Passport Number *</label>
                          <input type="text" name="passport_number" class="form-control" id="exampleInputEmail1" placeholder="Enter Passport Number" value="{{ old('passport_number') }}" required="">
                          @if ($errors->has('passport_number')) <p style="color:red;">{{ $errors->first('passport_number') }}</p> @endif

                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Phone Number*</label>
                          <input type="text" name="phone_number" class="form-control" id="exampleInputEmail1" placeholder="Enter Phone Number" value="{{ old('phone_number') }}" required="">
                          @if ($errors->has('phone_number')) <p style="color:red;">{{ $errors->first('phone_number') }}</p> @endif
                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Postal Code*</label>
                          <input type="text" name="post_code" class="form-control" id="exampleInputEmail1" placeholder="Enter Postal Code" value="{{ old('post_code') }}" required="">
                          @if ($errors->has('post_code')) <p style="color:red;">{{ $errors->first('post_code') }}</p> @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Town *</label>
                          <input type="text" name="town" class="form-control" id="exampleInputEmail1" placeholder="Enter Town" value="{{ old('town') }}" required="">
                          @if ($errors->has('town')) <p style="color:red;">{{ $errors->first('town') }}</p> @endif

                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">State*</label>
                          <input type="text" name="state" class="form-control" id="exampleInputEmail1" placeholder="Enter State" value="{{ old('state') }}" required="">
                          @if ($errors->has('state')) <p style="color:red;">{{ $errors->first('state') }}</p> @endif
                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Country *</label>
                          <input type="text" name="country" class="form-control" id="exampleInputEmail1" placeholder="Enter Country" value="{{ old('country') }}" required="">
                          @if ($errors->has('country')) <p style="color:red;">{{ $errors->first('country') }}</p> @endif
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Town/City Of Birth *</label>
                          <input type="text" name="town_city_birth" class="form-control" id="exampleInputEmail1" placeholder="Enter Town/City" value="{{ old('town_city_birth') }}" required="">
                          @if ($errors->has('town_city_birth')) <p style="color:red;">{{ $errors->first('town_city_birth') }}</p> @endif

                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Birth Country*</label>
                          <input type="text" name="birth_country" class="form-control" id="exampleInputEmail1" placeholder="Enter Birth Country" value="{{ old('birth_country') }}" required="">
                          @if ($errors->has('birth_country')) <p style="color:red;">{{ $errors->first('birth_country') }}</p> @endif
                        </div>
                      </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="exampleInputEmail1">Do you have a valid Australian visa?</label>
                          <select name="valid_australian_visa" class="form-control valid_australian_visa">
                            <option value="">Select Type</option>
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                          </select>
                          @if ($errors->has('valid_australian_visa')) <p style="color:red;">{{ $errors->first('valid_australian_visa') }}</p> @endif
                        </div>
                      </div>
                    </div>
                  
                   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Street Address *</label>
                          <textarea type="text" name="street_address" class="form-control" id="exampleInputEmail1" placeholder="Enter Street Address" value="" required="">{{ old('street_address') }}</textarea>
                          @if ($errors->has('street_address')) <p style="color:red;">{{ $errors->first('street_address') }}</p> @endif
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Australian Visa Details</label>
                          <textarea type="text" name="australian_visa_details" class="form-control australian_visa_details" id="exampleInputEmail1" placeholder="Enter Visa Details" value="">{{ old('australian_visa_details') }}</textarea>
                          @if ($errors->has('australian_visa_details')) <p style="color:red;">{{ $errors->first('australian_visa_details') }}</p> @endif
                        </div>
                      </div>

                    </div>
               </div>
          </div>
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Section B: Emergency Contact Details</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                     
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Contact Name *</label>
                              <input type="text" name="emergency_contact_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Contact Name" value="{{ old('emergency_contact_name') }}" required="">
                              @if ($errors->has('emergency_contact_name')) <p style="color:red;">{{ $errors->first('emergency_contact_name') }}</p> @endif

                            </div>
                          </div>

                          <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Relationship to you*</label>
                              <input name="emergency_relation_to_you" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="{{ old('emergency_relation_to_you') }}" required="">
                              @if ($errors->has('emergency_relation_to_you')) <p style="color:red;">{{ $errors->first('emergency_relation_to_you') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Contact Number*</label>
                              <input name="emergency_contact_number" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Contact Number" value="{{ old('emergency_contact_number') }}" required="">
                              @if ($errors->has('emergency_contact_number')) <p style="color:red;">{{ $errors->first('emergency_contact_number') }}</p> @endif
                            </div>
                          </div>
                        </div>
                  </div>
          </div>
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Section C: Language and Cultural Diversity</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                      
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                          <div class="col-md-5">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Do you speak a language other than English at home? *</label><br>

                              
                                <input type="radio"  name="other_than_english" {{ old('other_than_english')=='Yes' ? "checked" : "" }} id="yes" value="Yes">
                                <label for="yes">Yes</label>
                             
                                <input type="radio" id="no" {{ old('other_than_english')=='No' ? "checked" : "" }} name="other_than_english" value="No">
                                <label for="no">No</label>
                              
                              @if ($errors->has('other_than_english')) <p style="color:red;">{{ $errors->first('other_than_english') }}</p> @endif

                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Yes, specify: *</label>
                              <input type="text" name="other_than_english_specify" class="form-control" id="exampleInputEmail1" placeholder="Specify" value="{{ old('other_than_english_specify') }}">
                              @if ($errors->has('other_than_english_specify')) <p style="color:red;">{{ $errors->first('other_than_english_specify') }}</p> @endif

                            </div>
                          </div>
                           <div class="col-md-5">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Are you of Aboriginal or Torres Strait Islander origin? *</label>
                              <select name="islander_origin" class="form-control">
                                <option>Neither</option>
                                <option>Yes, Aboriginal</option>
                                <option>No, T.S. Islander</option>
                              </select>
                              @if ($errors->has('islander_origin')) <p style="color:red;">{{ $errors->first('islander_origin') }}</p> @endif

                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Do you consider yourself to have a permanent/significant disability and/or learning difficulty?</label>
                              <br><small><sup>(Please refer to the Disability Supplement on the official Ashton College website for an explanation of the following terms.)</sup></small>
                            </div>
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                              <input type="radio" {{ old('significant_disability')=='No' ? "checked" : "" }}  name="significant_disability" id="no1" value="No">
                                <label for="no1">No</label>
                              @if ($errors->has('significant_disability')) <p style="color:red;">{{ $errors->first('significant_disability') }}</p> @endif

                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                             <input type="radio" value="Yes" {{ old('significant_disability')=='Yes' ? "checked" : "" }}  id="yes1" name="significant_disability">
                                <label for="yes1">Yes, please indicate:</label>
                              @if ($errors->has('significant_disability')) <p style="color:red;">{{ $errors->first('significant_disability') }}</p> @endif

                            </div>
                          </div>
                        </div>
                        <?php 
                              $disArray = old('disability_value');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                                 $finalDids = end($disArray[7]);
                              }else{
                                $disArray = array();
                                $finalDids = '';
                              }
                        ?>
                         <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                             <input type="checkbox" {{ in_array('Hearing',$disArray) ? "checked" : "" }}  id="h" name="disability_value[]" value="Hearing">
                                <label for="h">Hearing / Deaf</label>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                             <input type="checkbox" {{ in_array('Physical',$disArray) ? "checked" : "" }}  id="p" name="disability_value[]" value="Physical">
                                <label for="p">Physical </label>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                             <input type="checkbox" {{ in_array('Intellectual',$disArray) ? "checked" : "" }}  id="i" name="disability_value[]" value="Intellectual">
                                <label for="i">Intellectual </label>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                             <input type="checkbox" {{ in_array('Learning',$disArray) ? "checked" : "" }}  id="l" name="disability_value[]" value="Learning">
                                <label for="l">Learning</label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                             <input type="checkbox" {{ in_array('Vision',$disArray) ? "checked" : "" }}   id="v" name="disability_value[]" value="Vision">
                                <label for="v">Vision</label>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                             <input type="checkbox" {{ in_array('Mental',$disArray) ? "checked" : "" }}  id="m" name="disability_value[]" value="Mental">
                                <label for="m">Mental illness </label>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                             <input type="checkbox" {{ in_array('Medical',$disArray) ? "checked" : "" }}  id="c" name="disability_value[]" value="Medical">
                                <label for="c">Medical condition </label>
                            </div>
                          </div>      
                          <div class="col-md-2">
                            <div class="form-group"><label>Other, specify:</label>
                               </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">

                              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Specify" value="<?php echo $finalDids;?>" name="disability_value[7]['specify']">
                            </div>
                          </div>
                        </div>


                         <div class="row">
                          <div class="col-md-5">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Have you undertaken an English Language Test?</label>
                              <br>

                              
                                <input type="radio" {{ old('english_test')=='Yes' ? "checked" : "" }}  name="english_test" id="yes99" value="Yes">
                                <label for="yes99">Yes</label>
                             
                                <input type="radio" name="english_test" id="no99" {{ old('english_test')=='No' ? "checked" : "" }} value="No">
                                <label for="no99">No</label>
                              
                              @if ($errors->has('english_test')) <p style="color:red;">{{ $errors->first('english_test') }}</p> @endif

                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Yes, specify: *</label>

                               <select name="english_test_specify" class="form-control">
                                <option>IELTS</option>
                                <option>PTE Academic</option>
                                <option>TOEFL (Paper Based)</option>
                                <option>TOEFL (Internet Based)</option>
                                <option>Cambridge English (FCE)</option>
                                <option>Cambridge English (CAE)</option>
                                <option>Cambridge English (CPE)</option>
                                <option>Other</option>
                              </select>
                              @if ($errors->has('english_test_specify')) <p style="color:red;">{{ $errors->first('english_test_specify') }}</p> @endif

                            </div>
                          </div>
                           <div class="col-md-2">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Score:</label>
                              <input type="text" name="english_score" class="form-control" id="exampleInputEmail1" placeholder="Enter Score" value="{{ old('english_score') }}">
                              @if ($errors->has('english_score')) <p style="color:red;">{{ $errors->first('english_score') }}</p> @endif

                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Date undertaken:</label>
                              <input type="text" name="english_date" class="form-control datepicker" id="exampleInputEmail1" placeholder="Enter Date" value="{{ old('english_date') }}">
                              @if ($errors->has('english_date')) <p style="color:red;">{{ $errors->first('english_date') }}</p> @endif

                            </div>
                          </div>
                        </div>



                  </div>
          </div>
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Section D: Overseas Student Health Cover</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                      
                    </div>
                  </div>
                  <div class="card-body">
                                             <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Do you require Ashton College to arrange Overseas Student Health Cover for you (OSHC)?</label>
                              <br>

                              
                                <input type="radio" {{ old('health_cover')=='Yes' ? "checked" : "" }} name="health_cover" value="Yes" id="yes101">
                                <label for="yes101">Yes</label>
                             
                                <input type="radio" name="health_cover" value="No" id="no101" {{ old('health_cover')=='No' ? "checked" : "" }}>
                                <label for="no101">No</label>
                              
                              @if ($errors->has('health_cover')) <p style="color:red;">{{ $errors->first('health_cover') }}</p> @endif

                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="exampleInputEmail1">No, provide your membership no</label>
                              <input type="text" name="mambership_no" class="form-control" id="exampleInputEmail1" placeholder="Membership No" value="{{ old('mambership_no') }}">
                              @if ($errors->has('mambership_no')) <p style="color:red;">{{ $errors->first('mambership_no') }}</p> @endif

                            </div>
                          </div>
                           <div class="col-md-3">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Please Provide Policy expiry date:</label><br>
                              <input type="text" name="policy_expire" class="form-control datepicker" id="exampleInputEmail1" placeholder="Enter Date" value="{{ old('policy_expire') }}">
                              @if ($errors->has('policy_expire')) <p style="color:red;">{{ $errors->first('policy_expire') }}</p> @endif

                            </div>
                          </div>
                          
                           <div class="col-md-2">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Yes, type of OSHC policy:</label>
                              <input type="text" name="policy_no" class="form-control" id="exampleInputEmail1" placeholder="Policy" value="{{ old('policy_no') }}">
                              @if ($errors->has('policy_no')) <p style="color:red;">{{ $errors->first('policy_no') }}</p> @endif

                            </div>
                          </div>
                         
                        </div>
                  </div>
          </div>
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Section E: Education and Experience</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                     
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                             <h6>What is your highest COMPLETED school level?</h6>
                            </div>
                          </div>
                    </div>

                    <?php 
                              $disArray = old('highest_school');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                              }else{
                                $disArray = array();
                              }
                        ?>

                    <div class="row">
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="highest_school[]" {{ in_array('12 eq',$disArray) ? "checked" : "" }} type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="12 eq">Year 12 eq
                              @if ($errors->has('highest_school')) <p style="color:red;">{{ $errors->first('highest_school') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="highest_school[]" {{ in_array('11 eq',$disArray) ? "checked" : "" }} type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="11 eq">Year 11 eq
                              @if ($errors->has('highest_school')) <p style="color:red;">{{ $errors->first('highest_school') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="highest_school[]" {{ in_array('10 eq',$disArray) ? "checked" : "" }} type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="10 eq">Year 10 or below
                              @if ($errors->has('highest_school')) <p style="color:red;">{{ $errors->first('highest_school') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="highest_school[]" {{ in_array('N/A',$disArray) ? "checked" : "" }} type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="N/A">N/A
                              @if ($errors->has('highest_school')) <p style="color:red;">{{ $errors->first('highest_school') }}</p> @endif
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Year level completed:</label>
                              <input type="text" name="year_completed" class="form-control" id="exampleInputEmail1" placeholder="Enter Year Completed" value="{{ old('year_completed') }}" required="">
                              @if ($errors->has('year_completed')) <p style="color:red;">{{ $errors->first('year_completed') }}</p> @endif

                            </div>
                          </div>

                          <div class="col-md-6">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Country:</label>
                              <input name="completion_country" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Country" value="{{ old('completion_country') }}" required="">
                              @if ($errors->has('completion_country')) <p style="color:red;">{{ $errors->first('completion_country') }}</p> @endif
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <h6>Have you successfully completed any of the below listed qualifications?</h6>
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-2">
                             <div class="form-group">
                              <input name="is_completed_qualification" {{ old('is_completed_qualification')=='No' ? "checked" : "" }} type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="No">No
                              @if ($errors->has('is_completed_qualification')) <p style="color:red;">{{ $errors->first('is_completed_qualification') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="is_completed_qualification" {{ old('is_completed_qualification')=='Yes' ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Yes">Yes (If yes, tick all applicable boxes)
                              @if ($errors->has('is_completed_qualification')) <p style="color:red;">{{ $errors->first('is_completed_qualification') }}</p> @endif
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-2">
                             <div class="form-group">
                             
                            </div>
                          </div>

                          <?php 
                              $disArray = old('completed_qualification');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                              }else{
                                $disArray = array();
                              }
                        ?>

                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="completed_qualification[]" {{ in_array('Bachelor degree or higher degree',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Bachelor degree or higher degree">Bachelor degree or higher degree
                              @if ($errors->has('completed_qualification')) <p style="color:red;">{{ $errors->first('completed_qualification') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="completed_qualification[]" {{ in_array('Certificate IV',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Certificate IV">Certificate IV
                              @if ($errors->has('completed_qualification')) <p style="color:red;">{{ $errors->first('completed_qualification') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="completed_qualification[]" {{ in_array('Certificate I',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Certificate I">Certificate I
                              @if ($errors->has('completed_qualification')) <p style="color:red;">{{ $errors->first('completed_qualification') }}</p> @endif
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-2">
                             <div class="form-group">
                             
                            </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="completed_qualification[]" {{ in_array('Advanced diploma or associate degree',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Advanced diploma or associate degree">Advanced diploma or associate degree
                              @if ($errors->has('completed_qualification')) <p style="color:red;">{{ $errors->first('completed_qualification') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="completed_qualification[]" {{ in_array('Certificate III/Trade Certificate',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Certificate III/Trade Certificate">Certificate III/Trade Certificate
                              @if ($errors->has('completed_qualification')) <p style="color:red;">{{ $errors->first('completed_qualification') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="completed_qualification[]" {{ in_array('Other education',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Other education">Other education
                              @if ($errors->has('completed_qualification')) <p style="color:red;">{{ $errors->first('completed_qualification') }}</p> @endif
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-2">
                             <div class="form-group">
                             
                            </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="completed_qualification[]" {{ in_array('Diploma or associate diploma',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Diploma or associate diploma">Diploma or associate diploma
                              @if ($errors->has('completed_qualification')) <p style="color:red;">{{ $errors->first('completed_qualification') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="completed_qualification[]" {{ in_array('Certificate II',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Certificate II">Certificate II
                              @if ($errors->has('completed_qualification')) <p style="color:red;">{{ $errors->first('completed_qualification') }}</p> @endif
                            </div>
                          </div>
                    </div>

                    <?php 
                              $disArray = old('country_qualification');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                              }else{
                                $disArray = array();
                              }
                        ?>

                    <div class="row">
                          <div class="col-md-4">
                             <div class="form-group">
                             <b>If you ticked any of the above, is your qualification:</b>
                            </div>
                          </div>
                          <div class="col-md-2">
                             <div class="form-group">
                              <input name="country_qualification[]" {{ in_array('Australian',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Australian">Australian
                              @if ($errors->has('country_qualification')) <p style="color:red;">{{ $errors->first('country_qualification') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="country_qualification[]" {{ in_array('Australian equivalent',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Australian equivalent">Australian equivalent
                              @if ($errors->has('country_qualification')) <p style="color:red;">{{ $errors->first('country_qualification') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-2">
                             <div class="form-group">
                              <input name="country_qualification[]" {{ in_array('International',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="International">International
                              @if ($errors->has('country_qualification')) <p style="color:red;">{{ $errors->first('country_qualification') }}</p> @endif
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                             <b>Select one category which best describes the main reason you are undertaking study:</b>
                            </div>
                          </div>
                    </div>
                    <?php 
                              $disArray = old('reason_qualification');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                                 $finalDids = end($disArray[7]);
                              }else{
                                $disArray = array();
                                $finalDids = '';
                              }
                        ?>
                    <div class="row">
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="reason_qualification[]" {{ in_array('get a job',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="get a job">To get a job
                              @if ($errors->has('reason_qualification')) <p style="color:red;">{{ $errors->first('reason_qualification') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="reason_qualification[]" {{ in_array('To start my own business',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="To start my own business">To start my own business
                              @if ($errors->has('reason_qualification')) <p style="color:red;">{{ $errors->first('reason_qualification') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="reason_qualification[]" {{ in_array('To develop my existing business',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="To develop my existing business">To develop my existing business
                              @if ($errors->has('reason_qualification')) <p style="color:red;">{{ $errors->first('reason_qualification') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="reason_qualification[]" {{ in_array('To try a different career',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="To try a different career">To try a different career
                              @if ($errors->has('reason_qualification')) <p style="color:red;">{{ $errors->first('reason_qualification') }}</p> @endif
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="reason_qualification[]" {{ in_array('I want extra skills for my job',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="I want extra skills for my job">I want extra skills for my job
                              @if ($errors->has('reason_qualification')) <p style="color:red;">{{ $errors->first('reason_qualification') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="reason_qualification[]" {{ in_array('It was a requirement of my job',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="It was a requirement of my job">It was a requirement of my job
                              @if ($errors->has('reason_qualification')) <p style="color:red;">{{ $errors->first('reason_qualification') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                            <input name="reason_qualification[]" {{ in_array('Other reasons',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Other reasons">Other reasons:
                              @if ($errors->has('reason_qualification')) <p style="color:red;">{{ $errors->first('reason_qualification') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="reason_qualification[7]['reason']" type="text"  id="exampleInputEmail1" placeholder="Enter reason" value="<?php echo $finalDids;?>" class="form-control">
                              @if ($errors->has('reason_qualification')) <p style="color:red;">{{ $errors->first('reason_qualification') }}</p> @endif
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-12">
                             <div class="form-group">
                             <b>Select which best describes your current employment status:</b>
                            </div>
                          </div>
                    </div>
                     <?php 
                              $disArray = old('employment_status');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                              }else{
                                $disArray = array();
                              }
                        ?>
                    <div class="row">
                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="employment_status[]" {{ in_array('Full time employee',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Full time employee">Full time employee
                              @if ($errors->has('employment_status')) <p style="color:red;">{{ $errors->first('employment_status') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="employment_status[]" {{ in_array('Part time employee',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Part time employee">Part time employee
                              @if ($errors->has('employment_status')) <p style="color:red;">{{ $errors->first('employment_status') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="employment_status[]" {{ in_array('Self employed',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Self employed">Self employed
                              @if ($errors->has('employment_status')) <p style="color:red;">{{ $errors->first('employment_status') }}</p> @endif
                            </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="employment_status[]" {{ in_array('Employer',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Employer">Employer
                              @if ($errors->has('employment_status')) <p style="color:red;">{{ $errors->first('employment_status') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="employment_status[]" {{ in_array('Unemployed',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Unemployed">Unemployed
                              @if ($errors->has('employment_status')) <p style="color:red;">{{ $errors->first('employment_status') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                              <input name="employment_status[]" {{ in_array('Not employed/not seeking employment',$disArray) ? "checked" : "" }} type="checkbox"  id="exampleInputEmail1" placeholder="Enter reason" value="Not employed/not seeking employment" >Not employed/not seeking employment
                              @if ($errors->has('employment_status')) <p style="color:red;">{{ $errors->first('employment_status') }}</p> @endif
                            </div>
                          </div>
                    </div>

                  </div>
          </div>
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Section F: Course Information</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                     
                    </div>
                  </div>

                  <div class="card-body">
                    <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                             <b>Course Code</b>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                             <b>Course Name</b>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                             <b>Duration (Weeks)</b>
                            </div>
                          </div>
                    </div>
                    <?php 
                              $disArray = old('course_code');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                              }else{
                                $disArray = array();
                              }
                        ?>
                      @foreach($course as $cours)
                          <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                             <input name="course_code[]" type="checkbox" id="{{ $cours->course_code }}" placeholder="Enter Relationship to you" value="{{ $cours->course_code }}" {{ in_array($cours->course_code,$disArray) ? "checked" : "" }} ><label for="{{ $cours->course_code }}">{{ $cours->course_code }}</label</>
                              
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                            {{ $cours->course_name }}
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <?php 
                              $weeks          = explode('/',$cours->course_duration);
                              $course_amount  = explode('/',$cours->course_amount);
                              $material_amount = explode('/',$cours->material_amount);
                              $checked = "";     
                              $selcted = 0;                     

                              foreach ($weeks as $key => $week) { ?>
                                <input <?php echo $checked;?>  type="radio" name="course_duration[][{{ $cours->course_code }}]" value="{{ $week }}||{{ $course_amount[$key] }}||{{ $material_amount[$key] }}||{{ $selcted++ }}" id="{{ $cours->course_code.$week }}">
                                <label for="{{ $cours->course_code.$week }}"><?php echo $week;?></label>&nbsp;&nbsp;&nbsp;&nbsp;
                              
                              <?php $checked = ''; } ?>
                             
                            </div>
                          </div>
                    </div>
                      @endforeach
                      
                      @if ($errors->has('course_code')) <p style="color:red;">{{ $errors->first('course_code') }}</p> @endif
                      @if ($errors->has('course_duration')) <p style="color:red;">{{ $errors->first('course_duration') }}</p> @endif

                    
                    <div class="row">
                          <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputEmail1">Preferred Start Date</label>
                              <input name="course_start_date" type="text" class="form-control datepicker" id="exampleInputEmail1" placeholder="Enter Start Date" value="{{ old('course_start_date') }}" required="">
                              @if ($errors->has('course_start_date')) <p style="color:red;">{{ $errors->first('course_start_date') }}</p> @endif
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                             <b>Are you applying for credit transfers from previous studies?</b>
                            </div>
                          </div>
                          <?php 
                              $disArray = old('credit_transfer');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                              }else{
                                $disArray = array();
                              }
                        ?>
                           <div class="col-md-3">
                             <div class="form-group">
                              <input name="credit_transfer[]" type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="No" {{ in_array('No',$disArray) ? "checked" : "" }}> No
                              @if ($errors->has('credit_transfer')) <p style="color:red;">{{ $errors->first('credit_transfer') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="credit_transfer[]" type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Yes" {{ in_array('Yes',$disArray) ? "checked" : "" }}> Yes
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                             <b>Are you applying for RPL from previous studies?</b>
                            </div>
                          </div>
                           <?php 
                              $disArray = old('previous_studies');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                              }else{
                                $disArray = array();
                              }
                        ?>

                           <div class="col-md-3">
                             <div class="form-group">
                              <input name="previous_studies[]" type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="No" {{ in_array('No',$disArray) ? "checked" : "" }}> No
                              @if ($errors->has('previous_studies')) <p style="color:red;">{{ $errors->first('previous_studies') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="previous_studies[]" type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Yes" {{ in_array('Yes',$disArray) ? "checked" : "" }}> Yes
                            </div>
                          </div>
                        </div>
                  </div>
          </div>
           <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Section G: Airport Pickup and Accommodation</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                     
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                             <b>Do you require Ashton College to arrange for you to be collected from the Airport?</b>
                            </div>
                          </div>
                          <?php 
                              $disArray = old('require_airport');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                              }else{
                                $disArray = array();
                              }
                        ?>
                           <div class="col-md-3">
                             <div class="form-group">
                              <input name="require_airport[]" type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="No" {{ in_array('No',$disArray) ? "checked" : "" }}> No
                              @if ($errors->has('require_airport')) <p style="color:red;">{{ $errors->first('require_airport') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                            <input name="require_airport[]" type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Yes" {{ in_array('Yes',$disArray) ? "checked" : "" }}> Yes*
                            </div>
                          </div>
                        </div>
                         <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                             <b>Do you require assistance with arranging accommodation in Melbourne?</b>
                            </div>
                          </div>
                          <?php 
                              $disArray = old('require_assistance');
                              if(!empty($disArray)){
                                 $disArray =  (array) @$disArray;
                              }else{
                                $disArray = array();
                              }
                        ?>
                           <div class="col-md-3">
                             <div class="form-group">
                              <input name="require_assistance[]" type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="No" {{ in_array('No',$disArray) ? "checked" : "" }}> No
                              @if ($errors->has('require_assistance')) <p style="color:red;">{{ $errors->first('require_assistance') }}</p> @endif
                            </div>
                          </div>
                          <div class="col-md-3">
                             <div class="form-group">
                              <input name="require_assistance[]" type="checkbox" id="exampleInputEmail1" placeholder="Enter Relationship to you" value="Yes" {{ in_array('Yes',$disArray) ? "checked" : "" }}> Yes*
                            </div>
                          </div>
                        </div>
                  </div>
          </div>
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Section H: Unique Student Identifier (USI)</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                     
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                          <div class="col-md-6">
                             <div class="form-group">
                             <b>Your USI</b>
                            </div>
                          </div>
                           <div class="col-md-3">
                             <div class="form-group">
                              <input name="usi_code" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Unique Student Identifier" value="{{ old('usi_code') }}" >
                              @if ($errors->has('usi_code')) <p style="color:red;">{{ $errors->first('usi_code') }}</p> @endif
                            </div>
                          </div>
                          
                        </div>
                         
                  </div>
          </div>
          <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Section K: Applicant Checklist</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                     
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                          <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputFile">Passport Attachment</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="passport_file" class="custom-file-input1" id="exampleInputFile" required="">
                                  <!-- <label class="custom-file-label" for="exampleInputFile">Choose Passport</label> -->
                                </div>
                              </div>
                            </div>
                          </div>    
                           <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputFile">Academic Qualifications Attachment</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="qualification_file" class="custom-file-input1" id="exampleInputFile" required="">
                                  <!-- <label class="custom-file-label" for="exampleInputFile">Choose Attachment</label> -->
                                </div>
                              </div>
                            </div>
                          </div>    
                          <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputFile">Language Evidance Attachment</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="language_file" class="custom-file-input1" id="exampleInputFile">
                                  <!-- <label class="custom-file-label" for="exampleInputFile">Choose Attachment</label> -->
                                </div>
                              </div>
                            </div>
                          </div>                         
                        </div>
                                            <div class="row">
                          <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputFile">Evidence of OSHC</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="oshc_file" class="custom-file-input1" id="exampleInputFile">
                                  <!-- <label class="custom-file-label" for="exampleInputFile">Choose Attachment</label> -->
                                </div>
                              </div>
                            </div>
                          </div>    
                           <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputFile">Student Signature Attachment</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="student_signature_file" class="custom-file-input1" id="exampleInputFile" required="">
                                  <!-- <label class="custom-file-label" for="exampleInputFile">Choose Attachment</label> -->
                                </div>
                              </div>
                            </div>
                          </div>  
                          <div class="col-md-4">
                             <div class="form-group">
                              <label for="exampleInputFile">Other Documents</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="student_other_file" class="custom-file-input1" id="exampleInputFile">
                                  <!-- <label class="custom-file-label" for="exampleInputFile">Choose Attachment</label> -->
                                </div>
                              </div>
                            </div>
                          </div>      
                          <div class="col-md-4">
                             <div class="form-group">
                               <label for="exampleInputEmail1">Date:</label><br>
                              <input type="text" name="submit_date" class="form-control datepicker" id="exampleInputEmail1" placeholder="Enter Date" value="{{ old('submit_date') }}" required="">
                                                          </div>
                          </div>                         
                        </div>
                         
                  </div>
          </div>

           
              <!-- /.card-header -->
              <div class="row">
                <div class="col-md-11">
                  
                </div>
                <div class="col-md-1">
                   <div class="form-group">
                    <button class="btn btn-success">Submit</button>
                  </div>
                </div>

              </div>
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
@section('scripts')
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.datepicker').datepicker({
              format: 'dd/mm/yyyy'
           });
            $('.valid_australian_visa').change(function(){
               var visaStatus = $(this).val();
               if(visaStatus=='' || visaStatus=='No'){
                 $('.australian_visa_details').prop('required',false).prop('readonly',true).val('');

               }else{
                 $('.australian_visa_details').prop('required',true).prop('readonly',false).val('');
               }
            })
        });
        
</script>
<script type="text/javascript">
  $(function(){
    $('[name="other_than_english"]').click(function(){
      var otherThan = $(this).val();
      if(otherThan=='Yes'){
         $('[name="other_than_english_specify"]').prop('readonly',false);
        // $('[name="islander_origin"]').prop('readonly',false);
      }else{
        $('[name="other_than_english_specify"]').prop('readonly',true);
        $('[name="other_than_english_specify"]').val('');

        // $('[name="islander_origin"]').prop('readonly',true);
        // $('[name="islander_origin"]').val('');
        
      }
    })

    $('[name="significant_disability"]').click(function(){
      var otherThan = $(this).val();
      if(otherThan=='Yes'){
         $('[name="disability_value[]"]').prop('readonly',false);
        $('[name="disability_value[]"]').prop('disabled',false);        

      }else{
        $('[name="disability_value[]"]').attr('disabled','disabled');        
        $('[name="disability_value[]"]').prop('checked',false);        
      }
    })

    $('[name="english_test"]').click(function(){
      var otherThan = $(this).val();
      if(otherThan=='Yes'){
         $('[name="english_test_specify"]').prop('disabled',false);
         $('[name="english_score"]').prop('readonly',false);
         $('[name="english_date"]').prop('readonly',false);
      }else{
       $('[name="english_test_specify"]').prop('disabled',true).val('');
         $('[name="english_score"]').prop('readonly',true).val('');
         $('[name="english_date"]').prop('readonly',true).val('');
        
      }
    })

    $('[name="health_cover"]').click(function(){
      var otherThan = $(this).val();
      if(otherThan=='No'){
         $('[name="mambership_no"]').prop('readonly',false);
         $('[name="policy_no"]').prop('readonly',true);
         $('[name="policy_expire"]').prop('readonly',false);
      }else{
       $('[name="mambership_no"]').prop('readonly',true).val('');
         $('[name="policy_no"]').prop('readonly',false).val('');
         $('[name="policy_expire"]').prop('readonly',true).val('');
        
      }
    })

    $('[name="highest_school[]"]').click(function(){
      var otherThan = $(this).val();
      if(otherThan!='N/A'){
         $('[name="year_completed"]').prop('readonly',false);
         $('[name="completion_country"]').prop('readonly',false);
         var cindex = $('[name="highest_school[]"]').index($(this));
         $('[name="highest_school[]"]').not(':eq('+cindex+')').prop('checked',false); 
      }else{
       $('[name="year_completed"]').prop('readonly',true).val('');
         $('[name="completion_country"]').prop('readonly',true).val('');
          var cindex = $('[name="highest_school[]"]').index($(this));
         $('[name="highest_school[]"]').not(':eq('+cindex+')').prop('checked',false);
        
      }
    })
    


    $('[name="is_completed_qualification"]').click(function(){
      var otherThan = $(this).val();
       if(otherThan=='Yes'){
        $('[name="is_completed_qualification"]').eq(0).prop('checked',false); 
         $('[name="completed_qualification[]"]').prop('readonly',false);
        $('[name="completed_qualification[]"]').prop('disabled',false);    

        $('[name="country_qualification[]"]').prop('readonly',false);
        $('[name="country_qualification[]"]').prop('disabled',false);    

      }else{
        $('[name="is_completed_qualification"]').eq(1).prop('checked',false); 

        $('[name="completed_qualification[]"]').prop('disabled',true);
        $('[name="completed_qualification[]"]').prop('checked',false);    

        $('[name="country_qualification[]"]').prop('disabled',true);
        $('[name="country_qualification[]"]').prop('checked',false);      
      }
    })

    $('[name="reason_qualification[]"]').click(function(){
      var cindex = $('[name="reason_qualification[]"]').index($(this));
     $('[name="reason_qualification[]"]').not(':eq('+cindex+')').prop('checked',false); 
    })

    $('[name="employment_status[]"]').click(function(){
      var cindex = $('[name="employment_status[]"]').index($(this));
     $('[name="employment_status[]"]').not(':eq('+cindex+')').prop('checked',false); 
    })

    $('[name="credit_transfer[]"]').click(function(){
      var cindex = $('[name="credit_transfer[]"]').index($(this));
     $('[name="credit_transfer[]"]').not(':eq('+cindex+')').prop('checked',false); 
    })

    $('[name="previous_studies[]"]').click(function(){
      var cindex = $('[name="previous_studies[]"]').index($(this));
     $('[name="previous_studies[]"]').not(':eq('+cindex+')').prop('checked',false); 
    })

    $('[name="require_airport[]"]').click(function(){
      var cindex = $('[name="require_airport[]"]').index($(this));
     $('[name="require_airport[]"]').not(':eq('+cindex+')').prop('checked',false); 
    })

    $('[name="require_assistance[]"]').click(function(){
      var cindex = $('[name="require_assistance[]"]').index($(this));
     $('[name="require_assistance[]"]').not(':eq('+cindex+')').prop('checked',false); 
    })


  })
</script>
  @endsection