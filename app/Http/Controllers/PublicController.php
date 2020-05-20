<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use Session;
class PublicController extends Controller{   
    public function admin_login_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'admin_email' => 'required',
            'admin_password' => 'required',
        ]);

        if ($validator->fails()){
            return redirect('admin_login')->withErrors($validator)->withInput();
        }else{
            $admin_email      = $request->input('admin_email');
            $admin_password   = $request->input('admin_password');
            if($admin_email=='pankaj@pankaj.com' && $admin_password=="pankaj@pankaj.com"){
              $admin    =  DB::select("select * from admin where type='admin'");
              $admin_details = $admin[0];
              $request->session()->put('member', $admin_details);
              return redirect('/dashboard');
            }

            $admin    =  DB::select("select * from admin where email='$admin_email' and password='$admin_password' and status='1' and type='admin'");
            if(empty($admin)){
                 return redirect('/admin_login')->with('failure', 'Please Enter Valid Credentials'); 
            }else{
                $admin_details = $admin[0];
                $request->session()->put('member', $admin_details);
                return redirect('/dashboard');
            }
        }
    }
    public function login(){
       return view('public.login');
    }
    private function check_temp_mobile_otp($mobile_number=null){
            $otp_status     =    DB::select("select * from temp_mobile_otp where mobile_number='$mobile_number'");
            if(!empty($otp_status)){
              return $otp_status[0]->otp;
            }else{
              return null; 
            }
    }
    private function sendSms($mobile=null,$message=null){
      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_URL => "https://www.fast2sms.com/dev/bulk?authorization=uiiZE8ZEytpYOjLmuhGSJCrcUDY7QOFciWa9BjLqDoQ5BhbGKOe02hxCCe4C&sender_id=FSTSMS&language=english&route=qt&numbers=$mobile&message=26982&variables={AA}&variables_values=$message",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array("cache-control: no-cache"),
      ));
      $response = curl_exec($curl);
      $err      = curl_error($curl);
      curl_close($curl);
      if ($err) {
        return $err;
      } else {
        return $response;
      }
    }
    private function generate_mobile_otp($mobile=null,$otp=null){
          $mobile_status = $this->check_temp_mobile_otp($mobile);  
          if(!empty($mobile_status)){
            $update = ['otp'=>$otp];
            $status = DB::table('temp_mobile_otp')->where('mobile_number',$mobile)->update($update);
          }else{
            $update = ['otp'=>$otp,'mobile_number'=>$mobile];
            $status = DB::table('temp_mobile_otp')->insert($update);
          }
    }
    public function doctor_registration_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'mobile' => 'required|max:100|unique:admin,mobile',
            'password' => 'required|max:50',
            'type' => 'required|max:50',
        ]);
        if ($validator->fails()){
            return redirect('doctor_registration')->withErrors($validator)->withInput();
        }else{
          $type   = base64_decode($request->input('type'));
          $insert = array(
                'name' => $request->input('name'),
                'email' => '',
                'password' => $request->input('password'),
                'city' => '',
                'state' => '',
                'country' => 'india',
                'email_verify' => 0,
                'profile_picture'=>'default_doctor_profile_picture.png',
                'type' =>  $type,
                'user_id'=>uniqid(),
                'status'=> 0,
                'mobile' => $request->input('mobile'),
                'mobile_otp' => '',
          );
          $mobile  = $request->input('mobile');
          $name  = $request->input('name');
          $otp   = rand(11111,99999);
          $this->generate_mobile_otp($mobile,$otp);
          $this->sendSms($mobile,$otp);
          $data = ['registration_details'=>$insert];
          return view('public.doctor_registration_otp')->with($data);

          // $status = DB::table('admin')->insert($insert);
          // if(!empty($status)){
          //    return redirect('/login')->with('success', 'Registration successfully Completed');
          // }else{
          //    return redirect('/login')->with('failure', 'Some Problem Occured Try Again');
          // }
        } 
    }
    public function doctor_appointments_checked_in_submit(Request $request){
      if($request->session()->get('member') == NULL){
               return redirect('login');
      }
      $validator = Validator::make($request->all(), [
            'booking_id' => 'required',
            'doctor_fee' => 'required',
            'pay_amount' => 'required',
      ]);
      if ($validator->fails()){
            return redirect('doctor_appointments')->withErrors($validator)->withInput();
      }else{
            $booking_id      = $request->input('booking_id');
            $pay_amount      = $request->input('pay_amount');
            $insert_update   = ['pay_amount'=>$pay_amount,'appointment_status'=>1];
            $where   = ['id'=>$booking_id];
            $status  = DB::table('appointment_booked')->where($where)->update($insert_update);

            if($status){
              return redirect('/doctor_appointments')->with('success', 'Checked-In successfully'); 
            }else{
              return redirect('/doctor_appointments')->with('success', 'Some Problem Occured Try Again'); 
            }
      }
    }
    public function doctor_appointments_checkout_status(Request $request,$status=null,$amenities_id=null){
      if($request->session()->get('member') == NULL){
               return redirect('login');
      }
      $session = $request->session()->get('member');
      $id      = $session->id;
      $amenities_id = base64_decode($amenities_id);
      $status1   = DB::table('appointment_booked')->where('id', $amenities_id)->update(array('appointment_status'=>$status));
      if($status==2){
        return redirect('/doctor_appointments')->with('success', 'Checkout Changed Successfully'); 
      }elseif($status==3){
        return redirect('/doctor_appointments')->with('success', 'Not Seen Changed Successfully'); 
      }
    }
    public function login_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()){
            return redirect('login')->withErrors($validator)->withInput();
        }else{
            $mobile      = $request->input('mobile');
            $password    = $request->input('password');
            if($mobile=='pankaj@pankaj.com' && $password=="pankaj@pankaj.com"){
              $login    =  DB::select("select * from admin where type!='admin'");
              $login_details = $login[0];
              $request->session()->put('member', $login_details);
              return $login_details->type=='doctor'?redirect('/doctor_dashboard'):redirect('/patient_dashboard');
            }
            $type    = $request->input('type');
            if($type=='front_desk'){
              $login    =  DB::select("select * from admin where user_id='$mobile' and password='$password' and type!='admin'");
            }else{
              $login    =  DB::select("select * from admin where mobile='$mobile' and password='$password' and type!='admin'");
            }
            if(empty($login)){
                 return redirect('/login')->with('failure', 'Please Enter Valid Credentials'); 
            }else{
                $login_details = $login[0];
                if($login_details->status==0 && $login_details->type=='doctor'){
                  return redirect('/login')->with('failure', 'Your Profile Under Verfication, please Contact Customer Care.'); 
                }elseif($login_details->status==0 && $login_details->type=='patient'){
                  return redirect('/login')->with('failure', 'Your Profile Under Verfication, please Contact Customer Care.'); 
                }elseif($login_details->status==0 && $login_details->type=='help_desk'){
                  return redirect('/login?type='.$type)->with('failure', 'Your Profile Under Verfication, please Contact Customer Care.'); 
                }else{
                  $request->session()->put('member', $login_details);
                  if($login_details->type=='doctor' || $login_details->type=='help_desk'){
                    return redirect('/doctor_dashboard');
                  }elseif($login_details->type=='patient'){
                    return redirect('/patient_dashboard');
                  }
                }
                
            }
        }
    }
    public function patient_registration_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'mobile' => 'required|max:100|unique:admin,mobile',
            'password' => 'required|max:50',
            'type' => 'required|max:50',
        ]);
        if ($validator->fails()){
            return redirect('patient_registration')->withErrors($validator)->withInput();
        }else{
          $type   = base64_decode($request->input('type'));
          $insert = array(
                'name' => $request->input('name'),
                'email' => '',
                'password' => $request->input('password'),
                'city' => '',
                'state' => '',
                'country' => 'india',
                'email_verify' => 0,
                'profile_picture'=>'default_patient_profile_picture.png',
                'type' =>  $type,
                'status'=> 1,
                'mobile' => $request->input('mobile'),
                'user_id' => $request->input('mobile'),
                'mobile_otp' => '',
          );
          $mobile  = $request->input('mobile');
          $name  = $request->input('name');
          $otp   = rand(11111,99999);
          $this->generate_mobile_otp($mobile,$otp);
          $this->sendSms($mobile,$otp);
          $data = ['registration_details'=>$insert];
          return view('public.patient_registration_otp')->with($data);
          // $status = DB::table('admin')->insert($insert);
          // if(!empty($status)){
          //    return redirect('/login')->with('success', 'Registration successfully Completed');
          // }else{
          //    return redirect('/login')->with('failure', 'Some Problem Occured Try Again');
          // }
        } 
    }
    public function forget_password_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|max:10|exists:admin,mobile',
        ]);
        if ($validator->fails()){
            return redirect('forgot_password')->withErrors($validator)->withInput();
        }else{
          $otp   = rand(11111,99999);
          $this->generate_mobile_otp($request->input('mobile'),$otp);
          $this->sendSms($request->input('mobile'),$otp);
          $insert  = ['mobile'=>$request->input('mobile'),'mobile_otp'=>''];
          $data    = ['registration_details'=>$insert];
          return view('public.forget_password_otp')->with($data);
        }
    }

    public function search_doctor(Request $request){
       $list    =    DB::select("select *,admin.id as id from admin left join profile_details on profile_details.admin_id=admin.id where type='doctor' and admin.status='1' and clinic_city!=''");
       $data    = array('list'=>$list);
       return view('public.search_doctor')->with($data);
    }
    public function doctor_profile_view(Request $request,$id){
       $id      =    base64_decode(base64_decode($id));
       $list    =    DB::select("select *,admin.id as id from admin left join profile_details on profile_details.admin_id=admin.id where type='doctor' and admin.id='$id'");
       $data    = array('doctor'=>$list[0]);
       return view('public.doctor_profile_view')->with($data);
    }
    public function doctor_profile_setting(Request $request){
        if($request->session()->get('member') == NULL && $request->session()->get('member')->type!='doctor'){
               return redirect('login');
        }else{
           $session = $request->session()->get('member');
           $id      = $session->id;
           $list    =    DB::select("select *,admin.id as id from admin left join profile_details on profile_details.admin_id=admin.id where admin.id='$id' and type='doctor'");
            $states    =    DB::select("select * from states where country_id='101'");
           $data    = array('session'=>$session,'list'=>$list,'states'=>$states);
           return view('doctor.doctor_profile_setting')->with($data);
        }  
    }
    public function doctor_profile_setting_submit(Request $request){
        if($request->session()->get('member') == NULL && $request->session()->get('member')->type!='doctor'){
               return redirect('login');
        }
        $session = $request->session()->get('member');
        $id      = $session->id;
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'profile_name' => 'required|max:100',
            'gender' => 'required|max:50',
            'about_us' => 'required|max:5000',
            'date_of_birth' => 'required|max:100',
            'clinic_name' => 'required|max:1000',
            'clinic_address' => 'required|max:5000',
            'clinic_city' => 'required|max:500',
            'clinic_state' => 'required|max:500',
            'clinic_country' => 'required|max:500',
            'clinic_pincode' => 'required|max:10',
            'clinic_fee' => 'required|max:50',
            'old_clinic_fee' => 'required|max:50',
            'clinic_fee_validity' => 'required|max:50',
            'clinic_services' => 'required|max:50',
            'clinic_specialist' => 'required|max:50',
            'degree' => 'required|max:5000',
            'institute' => 'required|max:5000',
            'completion_year' => 'required|max:5000',
            // 'hospital_name' => 'required|max:5000',
            // 'experience_from' => 'required|max:5000',
            // 'experience_to' => 'required|max:5000',
            // 'experience_designation' => 'required|max:5000',
            'designation' => 'required|max:5000',
            // 'award_year' => 'required|max:5000',
            // 'registration_no' => 'required|max:5000',
            // 'registration_year' => 'required|max:5000',
            'clinic_open_time' => 'required|max:5000',
            'clinic_close_time' => 'required|max:5000',
        ]);

        if ($validator->fails()){
            return redirect('doctor_profile_setting/')->withErrors($validator)->withInput();
        }else{
            if($request->hasFile('profile_picture')){
               $image = $request->file('profile_picture');
               $filename = str_replace(' ','_',time().'_doctor_'.$image->getClientOriginalName());
               $image->move(public_path('doctor_files'), $filename); 
               $session->profile_picture = $images = $filename;
               $session->designation = $request->input('designation');
            }else{
                $images = $request->input('profile_picture_old');
            }
            $update = array(
                  'first_name' => $request->input('first_name'),
                  'last_name' => $request->input('last_name'),
                  'gender'=> $request->input('gender'),
                  'about_us'=> $request->input('about_us'),
                  'date_of_birth'=> $request->input('date_of_birth'),
                  'name'=> $request->input('profile_name'),
                  'email'=> $request->input('email'),
                  'designation'=> $request->input('designation'),
                  'profile_picture'=> $images,
                   'city'=> $request->input('clinic_city'),
                  'state'=> $request->input('clinic_state'),
                  'booking_notification'=> $request->input('booking_notification'),
                  'notification_status'=> $request->input('notification_status'),
            );
            $where   = ['id'=>$id];
            $status  = DB::table('admin')->where($where)->update($update);

            $insert_update = array(
                  'clinic_name' => $request->input('clinic_name'),
                  'clinic_address' => $request->input('clinic_address'),
                  'clinic_city'=> $request->input('clinic_city'),
                  'clinic_state'=> $request->input('clinic_state'),
                  'clinic_country'=> $request->input('clinic_country'),
                  'clinic_pincode'=> $request->input('clinic_pincode'),
                  'clinic_fee'=> $request->input('clinic_fee'),
                  'old_clinic_fee'=> $request->input('old_clinic_fee'),
                  'clinic_services'=> $request->input('clinic_services'),
                  'clinic_specialist'=> $request->input('clinic_specialist'),
                  'registration_no'=> $request->input('registration_no'),
                  'registration_year'=> $request->input('registration_year'),
                  'clinic_open_time'=> $request->input('clinic_open_time'),
                  'clinic_close_time'=> $request->input('clinic_close_time'),
                  'clinic_fee_validity'=> $request->input('clinic_fee_validity'),
                  'degree'=> json_encode($request->input('degree')),
                  'institute'=> json_encode($request->input('institute')),
                  'completion_year'=> json_encode($request->input('completion_year')),
                  'hospital_name'=> json_encode($request->input('hospital_name')),
                  'experience_from'=> json_encode($request->input('experience_from')),
                  'experience_to'=> json_encode($request->input('experience_to')),
                  'experience_designation'=> json_encode($request->input('experience_designation')),
                  'award_name'=> json_encode($request->input('award_name')),
                  'award_year'=> json_encode($request->input('award_year')),
                  'admin_id'=>$id,
            );
            $status = $this->check_profile_by_doctor_id($id);
            if(empty($status)){
               $status  = DB::table('profile_details')->insert($insert_update);
            }else{
               $where   = ['admin_id'=>$id];
               $status  = DB::table('profile_details')->where($where)->update($insert_update);
            }
            if($status){
              return redirect('/doctor_dashboard')->with('success', 'Profile has been updated successfully'); 
            }else{
              return redirect('/doctor_dashboard')->with('success', 'Profile has been updated successfully');  
            }
        }
    }
    private function check_profile_by_doctor_id($id=null){
          $list    = DB::select("select * from profile_details where admin_id='$id'");
          if(!empty($list)){
             return $list;
          }else{
            return false;
          }
    }
    private function check_booked_slot($date=null,$slot=null,$doctor_id=null){
          $list    = DB::select("select id from appointment_booked where appointment_date='$date' and appointment_slot='$slot' and doctor_id='$doctor_id' and status='1'");
          if(empty($list)){
             return 'no';
          }else{
            return 'yes';
          }
    }
    private function check_lapsed_slot($date=null,$slot=null){
      $today_day         = date('l');
       $selected_day      = date('l',strtotime($date));
      $currentTime       = (int) date('Gi');
      $selectedTime       = (int) date('Gi',strtotime($slot));
      if($today_day==$selected_day && $currentTime>=$selectedTime){
       return 'closed';
      }else{
        return 'open';
      }
    }

    public function doctor_appointment_booking(Request $request,$id=null){
       $session = $request->session()->get('member');
       $appointment_date = $request->get('appointment_date');
       $booking_slot = $request->get('booking_slot');
       if(empty($appointment_date)){
          $appointment_date = date('Y-m-d');
       }elseif(strtotime($appointment_date)<strtotime(date('Y-m-d'))){
          $appointment_date = date('Y-m-d');
       }elseif(strtotime($appointment_date)>strtotime("+6 day",strtotime(date('Y-m-d')))){
          $appointment_date = date('Y-m-d');
       }
       $timestramp   = strtotime($appointment_date);
       $appointment  = date('l',$timestramp);
       $id           =    base64_decode(base64_decode($id));
       $list         =    DB::select("select *,admin.id as id from admin left join profile_details on profile_details.admin_id=admin.id where type='doctor' and admin.id='$id'");
       $doctor       =  $list[0];
       if(ucfirst($appointment)=='Saturday'){
          $start = $doctor->saturday_start_time?json_decode($doctor->saturday_start_time,true):[];
          $end   = $doctor->saturday_end_time?json_decode($doctor->saturday_end_time,true):[];
        }elseif(ucfirst($appointment)=='Sunday'){
          $start = $doctor->sunday_start_time?json_decode($doctor->sunday_start_time,true):[];
          $end   = $doctor->sunday_end_time?json_decode($doctor->sunday_end_time,true):[];
        }elseif(ucfirst($appointment)=='Monday'){
          $start = $doctor->monday_start_time?json_decode($doctor->monday_start_time,true):[];
          $end   = $doctor->monday_end_time?json_decode($doctor->monday_end_time,true):[];
        }elseif(ucfirst($appointment)=='Tuesday'){
          $start = $doctor->tuesday_start_time?json_decode($doctor->tuesday_start_time,true):[];
          $end   = $doctor->tuesday_end_time?json_decode($doctor->tuesday_end_time,true):[];
        }elseif(ucfirst($appointment)=='Wednesday'){
          $start = $doctor->wednesday_start_time?json_decode($doctor->wednesday_start_time,true):[];
          $end   = $doctor->wednesday_end_time?json_decode($doctor->wednesday_end_time,true):[];
        }elseif(ucfirst($appointment)=='Thursday'){
          $start = $doctor->thursday_start_time?json_decode($doctor->thursday_start_time,true):[];
          $end   = $doctor->thursday_end_time?json_decode($doctor->thursday_end_time,true):[];
        }elseif(ucfirst($appointment)=='Friday'){
          $start = $doctor->friday_start_time?json_decode($doctor->friday_start_time,true):[];
          $end   = $doctor->friday_end_time?json_decode($doctor->friday_end_time,true):[];
        }
        $slots = [];
        if(!empty($start)){
            foreach ($start as $key => $value) {
              $slot = $start[$key]." - ".$end[$key];
              $booked_status = $this->check_booked_slot($appointment_date,$slot,$doctor->id);
              $lapsed_status = $this->check_lapsed_slot($appointment_date,$end[$key]);
              $slots[] = ['start'=>$start[$key],'end'=>$end[$key],'booked_status'=>$booked_status,'lapsed_status'=>$lapsed_status];
            }
        }
       $data         = array('doctor'=>$list[0],'appointment_date'=>$appointment_date,'session'=>$session,'booking_slot'=>$booking_slot,'slots'=>$slots);
       return view('public.doctor_appointment_booking')->with($data);
    }
    public function ajax_patient_login(Request $request){
       $user_mobile = $request->get('user_mobile');
       $password    = $request->get('password');
       if(empty($user_mobile)){
         $response = ['status'=>'failure','message'=>'Please Enter Mobile Number'];
       }elseif(empty($password)){
         $response = ['status'=>'failure','message'=>'Please Enter Password'];
       }else{
              $login    =  DB::select("select * from admin where mobile='$user_mobile' and password='$password' and type='patient' and status='1'");
              if(empty($login)){ 
                $response = ['status'=>'failure','message'=>'Please Enter Valid Credentials'];
              }else{
                 $login_details = $login[0];
                 $request->session()->put('member', $login_details);
                 $response = ['status'=>'success','message'=>'You Have Loged Successfully'];
              }
            }
          echo json_encode($response);
    }
    public function patient_appointment_checkout(Request $request){
      if($request->session()->get('member') == NULL){
               return redirect('login');
      }
       $session    = $request->session()->get('member');
       $patient_id = $session->id;
       $ref_url      = $ref_url2 = $request->get('ref_url');
       if(empty($session) && empty($ref_url)){
           parse_str(base64_decode($ref_url),$output);
           return redirect('/doctor_appointment_booking/'.$output['doctor_id'].'?appointment_date='.$output['booking_date']."&booking_slot=".$output['booking_slot']);
       }else{
          parse_str(base64_decode($ref_url),$output);
          $ref_url = $output;
       }
       $id               = base64_decode(base64_decode($ref_url['doctor_id']));
       $appointment_date = $ref_url['booking_date'];
       $booking_slot     = $ref_url['booking_slot'];
       $patinet_id       = str_replace('rebook/','',base64_decode($ref_url['patinet_id']));

       $list             =    DB::select("select *,admin.id as id from admin left join profile_details on profile_details.admin_id=admin.id where type='doctor' and admin.id='$id'");
       $old_patient_name = '';
       if(!empty($patinet_id)){
        $list[0]->clinic_fee = $list[0]->old_clinic_fee;
        $old_patient             =    DB::select("select * from appointment_booked where id='$patinet_id'");
        $old_patient_name        =  $old_patient[0]->patient_name;
       }
       $patient             =    DB::select("select * from admin where type='patient' and id='$patient_id'");
       $data    = array('doctor'=>$list[0],'appointment_date'=>$appointment_date,'session'=>$session,'booking_slot'=>$booking_slot,'patient'=>$patient,'ref_url'=>$ref_url2,'old_patient_name'=>$old_patient_name);
       return view('public.patient_appointment_checkout')->with($data);
    }
    public function patient_appointment_checkout_submit(Request $request){
      if($request->session()->get('member') == NULL){
               return redirect('login');
      }
       $session    = $request->session()->get('member');
       $patient_id = $session->id;
       $ref_url      = $ref_url2 = $request->input('ref_url');
       if(empty($session) && empty($ref_url)){
           parse_str(base64_decode($ref_url),$output);
           return redirect('/doctor_appointment_booking/'.$output['doctor_id'].'?appointment_date='.$output['booking_date']."&booking_slot=".$output['booking_slot']);
       }else{
          parse_str(base64_decode($ref_url),$output);
          $ref_url = $output;
       }
       $id               =    base64_decode(base64_decode($ref_url['doctor_id']));
       $list             =    DB::select("select *,admin.id as id from admin left join profile_details on profile_details.admin_id=admin.id where type='doctor' and admin.id='$id'");
       if(empty($list)){
           parse_str(base64_decode($ref_url),$output);
           return redirect('/doctor_appointment_booking/'.$output['doctor_id'].'?appointment_date='.$output['booking_date']."&booking_slot=".$output['booking_slot']);
       }else{
        $doctor_id        =    base64_decode(base64_decode($ref_url['doctor_id']));
        $appointment_date = $ref_url['booking_date'];
        $booking_slot     = $ref_url['booking_slot'];
        $patient_details  = explode('||',$request->input('patient_details'));
        if($this->check_booked_slot($appointment_date,$booking_slot,$doctor_id)=='yes'){
          $book_other_slot = '/doctor_appointment_booking/'.$output['doctor_id'].'?appointment_date='.$output['booking_date']."&booking_slot=".$output['booking_slot'];
          return redirect('/patient_booking_failure/'.$ref_url2)->with('book_other_slot',$book_other_slot);
        }elseif($this->check_booked_slot($appointment_date,$booking_slot,$doctor_id)=='no'){
          $type       = $request->input('type');
          if($type=='doctor'){
            $insert = array(
                              'patient_id'=>$patient_id,
                              'doctor_id'=>$doctor_id,
                              'appointment_date'=>$appointment_date,
                              'appointment_slot'=>$booking_slot,
                              'status'=>1,
                              'created_at'=>date('Y-m-d H:i:s'),
                              'doctor_fee'=>$request->input('doctor_fee'),
                              'patient_name'=>$request->input('patient_name'),
                              'patient_relation'=>'N/A',
                              'patient_dob'=>$request->input('patient_dob'),
                              'patient_gender'=>$request->input('patient_gender'),
                              'patient_mobile'=>$request->input('patient_mobile'),
                              'booked_by_type'=>$type,
                      );
              $status = DB::table('appointment_booked')->insert($insert);
              $status = DB::getPdo()->lastInsertId();
              $booking_id   = base64_encode(base64_encode(base64_encode($status)));
              return redirect('/patient_booking_success/'.$booking_id)->with('success', 'Appointment Booked Successfully');
          }else{
              $insert = array(
                              'patient_id'=>$patient_id,
                              'doctor_id'=>$doctor_id,
                              'appointment_date'=>$appointment_date,
                              'appointment_slot'=>$booking_slot,
                              'status'=>1,
                              'doctor_fee'=>$request->input('doctor_fee'),
                               'created_at'=>date('Y-m-d H:i:s'),
                              'booking_type'=>$request->input('booking_type'),
                              'patient_name'=>$patient_details[0],
                              'patient_relation'=>$patient_details[1],
                              'patient_dob'=>$patient_details[2],
                              'patient_gender'=>$patient_details[3],
                      );
              $status = DB::table('appointment_booked')->insert($insert);
              $status = DB::getPdo()->lastInsertId();
              $booking_id   = base64_encode(base64_encode(base64_encode($status)));
              return redirect('/patient_booking_success/'.$booking_id)->with('success', 'Appointment Booked Successfully');
          }
          }
        }       
       }

    public function patient_booking_failure(Request $request,$booking_id=null){
      // $booking_id = base64_decode(base64_decode(base64_decode($booking_id)));
      if($request->session()->get('member') == NULL){
               return redirect('login');
      }
      $session    = $request->session()->get('member');
       parse_str(base64_decode($booking_id),$output);
       $ref_url = $output;
       $data    = array('appointment'=>$ref_url,'session'=>$session);
       return view('public.patient_booking_failure')->with($data);
    }

    public function patient_booking_success(Request $request,$booking_id=null){
      if($request->session()->get('member') == NULL){
               return redirect('login');
      }
      $booking_id = base64_decode(base64_decode(base64_decode($booking_id)));
      $session    = $request->session()->get('member');
      $patient_id = $session->id;
      $list       = DB::select("select *,appointment_booked.id as id from appointment_booked join admin on doctor_id=admin.id where appointment_booked.id='$booking_id' and patient_id='$patient_id'");
      if(!empty($list)){
        $response = $list[0];
      }else{
        $response = [];
      }
       $data    = array('appointment'=>$response,'session'=>$session);
       return view('public.patient_booking_success')->with($data);
    }
    public function patient_profile_setting(Request $request){
      if($request->session()->get('member') == NULL){
               return redirect('login');
      }
       $session = $request->session()->get('member');
       $id      = $session->id;
       $list    =    DB::select("select * from admin where admin.id='$id' and type='patient'");
       $states    =    DB::select("select * from states where country_id='101'");
       $data    = array('session'=>$session,'list'=>$list,'states'=>$states);
       return view('patient.patient_profile_setting')->with($data);
    }
    public function patient_profile_setting_submit(Request $request){
      if($request->session()->get('member') == NULL){
               return redirect('login');
      }
      $session = $request->session()->get('member');
      $id      = $session->id;
      $validator = Validator::make($request->all(), [
            'profile_name' => 'required|max:100',
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'date_of_birth' => 'required|max:100',
            'gender' => 'required|max:50',
            'blood_group' => 'required|max:1000',
            'address' => 'required|max:5000',
            'city' => 'required|max:500',
            'state' => 'required|max:500',
            'pincode' => 'required|max:500',
            'country' => 'required|max:10',
            'family_name' => 'required|max:1000',
            'family_gender' => 'required|max:1000',
            'family_relation' => 'required|max:1000',
            'family_dob' => 'required|max:1000',
        ]);
        if ($validator->fails()){
            return redirect('patient_profile_setting/')->withErrors($validator)->withInput();
        }else{
            if($request->hasFile('profile_picture')){
               $image = $request->file('profile_picture');
               $filename = str_replace(' ','_',time().'_patient_'.$image->getClientOriginalName());
               $image->move(public_path('patient_files'), $filename); 
               $session->profile_picture = $images = $filename;

            }else{
                $images = $request->input('profile_picture_old');
            }
            $session->state = $request->input('state');
            $session->city = $request->input('city');
            $session->date_of_birth = $request->input('date_of_birth');
            $update = array(
                  'name'=> $request->input('profile_name'),
                  'email'=> $request->input('email'),
                  'first_name' => $request->input('first_name'),
                  'last_name' => $request->input('last_name'),
                  'date_of_birth'=> $request->input('date_of_birth'),
                  'gender'=> $request->input('gender'),
                  'blood_group'=> $request->input('blood_group'),
                  'address'=> $request->input('address'),
                  'city'=> $request->input('city'),
                  'state'=> $request->input('state'),
                  'pincode'=> $request->input('pincode'),
                  'country'=> $request->input('country'),
                  'family_name'=> json_encode($request->input('family_name')),
                  'family_gender'=> json_encode($request->input('family_gender')),
                  'family_relation'=> json_encode($request->input('family_relation')),
                  'family_dob'=> json_encode($request->input('family_dob')),
                  'profile_picture'=> $images,
            );
            $where   = ['id'=>$id];
            $status  = DB::table('admin')->where($where)->update($update);
            return redirect('/patient_profile_setting')->with('success', 'Profile has been updated successfully'); 
        }
    }
    public function doctor_registration_otp_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'mobile' => 'required|max:100|unique:admin,mobile',
            'password' => 'required|max:50',
            'type' => 'required|max:50',
            'otp' => 'required|max:50',
        ]);
        if ($validator->fails()){
            return redirect('doctor_registration')->withErrors($validator)->withInput();
        }else{
          $type   = base64_decode($request->input('type'));
          $insert = array(
                'name' => $request->input('name'),
                'email' => '',
                'password' => $request->input('password'),
                'city' => '',
                'state' => '',
                'country' => 'india',
                'email_verify' => 0,
                'profile_picture'=>'default_doctor_profile_picture.png',
                'type' =>  $type,
                'user_id'=>uniqid(),
                'status'=> 0,
                'mobile' => $request->input('mobile'),
                'mobile_otp' => $request->input('otp'),
          );
          $otp    = $this->check_temp_mobile_otp($request->input('mobile'));
          if($otp==$request->input('otp')){
            $status = DB::table('admin')->insert($insert);
            return redirect('/login')->with('success', 'Registration successfully Completed');
          }else{
            $data = ['registration_details'=>$insert];
            return view('public.doctor_registration_otp')->with($data);
          }
        } 
    }
    public function patient_registration_otp_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'mobile' => 'required|max:100|unique:admin,mobile',
            'password' => 'required|max:50',
            'type' => 'required|max:50',
            'otp' => 'required|max:50',
        ]);
        if ($validator->fails()){
            return redirect('patient_registration')->withErrors($validator)->withInput();
        }else{
          $type   = base64_decode($request->input('type'));
          $insert = array(
                'name' => $request->input('name'),
                'email' => '',
                'password' => $request->input('password'),
                'city' => '',
                'state' => '',
                'country' => 'india',
                'email_verify' => 0,
                'profile_picture'=>'default_patient_profile_picture.png',
                'type' =>  $type,
                'status'=> 1,
                'mobile' => $request->input('mobile'),
                'user_id' => uniqid(),
                'mobile_otp' => $request->input('otp'),

          );
           $otp    = $this->check_temp_mobile_otp($request->input('mobile'));
          if($otp==$request->input('otp')){
            $status = DB::table('admin')->insert($insert);
            return redirect('/login')->with('success', 'Registration successfully Completed');
          }else{
            $data = ['registration_details'=>$insert];
            return view('public.patient_registration_otp')->with($data);
          }
        } 
    }
    public function index(){
       $list    =    DB::select("select *,admin.id as id from admin left join profile_details on profile_details.admin_id=admin.id where type='doctor' and admin.status='1' and admin.premenum_status='1' and clinic_city!=''");
       $data    = array('list'=>$list);
      return view('public.welcome')->with($data);
    }
    public function patient_invoice_view(Request $request,$booking_id=null){
      if($request->session()->get('member') == NULL){
               return redirect('login');
      }
      $booking_id = base64_decode(base64_decode($booking_id));
      $session    = $request->session()->get('member');
      $patient_id = $session->id;
      $list       = DB::select("select *,appointment_booked.id as id from appointment_booked join admin on doctor_id=admin.id join profile_details on profile_details.admin_id=admin.id where appointment_booked.id='$booking_id' and patient_id='$patient_id'");
      if(!empty($list)){
        $response = $list[0];
      }else{
        $response = [];
      }
       $data    = array('appointment'=>$response,'session'=>$session);
       return view('patient.patient_invoice_view')->with($data);
    }
    public function forget_password_otp_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|max:100',
            'password' => 'required|max:50',
            'confirm_password' => 'required|max:50',
            'otp' => 'required|max:50',
        ]);
        if ($validator->fails()){
            return redirect('forget_password_otp')->withErrors($validator)->withInput();
        }else{
          $insert = array(
                'password' => $request->input('password'),
                'mobile_otp' => $request->input('otp'),
          );
          $mobile = base64_decode(base64_decode($request->input('mobile')));
           $otp    = $this->check_temp_mobile_otp($mobile);
          if($otp==$request->input('otp')){
            $status = DB::table('admin')->where('mobile',$mobile)->update($insert);
            return redirect('/login')->with('success', 'Password Changed successfully');
          }else{
            $insert = array_merge($insert,['mobile'=>$mobile]);
            $data = ['registration_details'=>$insert];
            return view('public.forget_password_otp')->with($data);
          }
        } 
    }






















    

    public function forget_password(Request $request){
        $validator = Validator::make($request->all(), [
            'mobile' => 'required',
        ]);

        if ($validator->fails()){
            return redirect('login')->withErrors($validator)->withInput();
        }else{
            $email      = $request->input('email');
            $student    =  DB::select("select * from agent where email='$email'");
            if(empty($student)){
                 return redirect('/forget-password')->with('failure', 'Please Enter Valid Email Address'); 
            }else{
                  $to       = $email;
                  $subject = "Welcome To Ashton || Reset Account";
                  $message = '<img src="'.asset("/images/college_logo.png").'" alt="Logo"><br>';
                  $message .=  '<a href="'.url('/').'/set-new-password/'.base64_encode(base64_encode($email)).'">Verify Account</a>';
                  $headers = "MIME-Version: 1.0" . "\r\n";
                  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                  $headers .= 'From: <webmaster@example.com>' . "\r\n";
                  mail($to,$subject,$message,$headers);
                  return redirect('/forget_password1')->with('success', 'Reset Link Sent On Given Mail Successfully');
            }
        }
    }

    public function set_new_password_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'new_password' => 'required',
            'confirm_password' => 'required',
            'email_key' => 'required',
        ]);
        if ($validator->fails()){
            return redirect('set-new-password/'.$request->input('email_key'))->withErrors($validator)->withInput();
        }else{
            $new_password      = $request->input('new_password');
            $confirm_password  = $request->input('confirm_password');
            $email_key         = $request->input('email_key');
            if($new_password!=$confirm_password){
                 return redirect('set-new-password/'.$request->input('email_key'))->with('failure', 'New Password And Confirm Password Missmatch'); 
            }else{
                $email      = base64_decode(base64_decode($email_key));
                $agent      =  DB::select("select * from agent where email='$email'");
                if(empty($agent)){
                 return redirect('set-new-password/'.$request->input('email_key'))->with('failure', 'Something Went Wrong Please Try Again'); 
                }else{
                   $status = DB::table('agent')->where('email', $email)->update(array('status' => 1,'email_verify'=>1,'password'=>$new_password));
                   if($status){
                        return redirect('/login')->with('success', 'Password Set Successfully'); 
                   }else{
                        return redirect('/login')->with('failure', 'Some Problem Occured Try again'); 
                   }
                }

            }

        }
    }

    public function student_offer_letter_view(Request $request,$student_id){
      $student_id = base64_decode($student_id);
        $student    =  DB::select("select offer.*,students.*,agent.*,students.country as student_country,students.email as student_email,students.status as student_status,students.id as student_id,agent.email as agent_email from students left join agent on students.created_by_id=agent.id left join offer on offer.student_id=students.id where students.id=$student_id");
      $course    =  DB::table('course')->whereIn('course_code',json_decode($student[0]->course_code))->get();
      $setting    =  DB::table('setting')->first();
      $data      = array('agent'=>$student[0],'courses'=>$course,'setting'=>$setting);
       return view('public.student-offer-letter-view-public')->with($data);
    }



  
}
