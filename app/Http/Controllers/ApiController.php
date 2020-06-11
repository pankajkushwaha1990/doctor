<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller{
    const backup_host = 'http://appsfeature.com/';
    const config_host = 'http://appsfeature.com/';
    public function index(){
          $response = ['status'=>'failure','message'=>'Unauthozized Access'];
          return response()->json($response);
    }
    private function check_otp_record_by_mobile($mobile=null){
        $condition      =    ['mobile_number'=>$mobile];
        $otp_status     =    DB::table('temp_mobile_otp')->where($condition)->first();
        if(!empty($otp_status)){
           return $otp_status;
        }else{
           return false; 
        }
    }
    private function generate_random_otp(){
      $otp    = rand(11111,99999);
      return $otp;
    }
    private function insert_otp($mobile=null,$otp=null){
        $insert = ['otp'=>$otp,'mobile_number'=>$mobile];
        $status = DB::table('temp_mobile_otp')->insert($insert);
        if(!empty($status)){
          return true;
        }else{
          return false;
        }
    }
    private function update_otp($mobile=null,$otp=null){
      $update    = ['otp'=>$otp];
      $condition = ['mobile_number'=>$mobile];
      $status = DB::table('temp_mobile_otp')->where($condition)->update($update);
      if(!empty($status)){
        return true;
      }else{
        return false;
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
        return false;
      } else {
        return true;
      }
    }
    private function check_10_digit_mobile($mobile=null){
      if(strlen($mobile)==10 && preg_match('/^[0-9]{10}+$/', $mobile)){
        return true;
      }else{
        return false;
      }
    }
    private function check_5_digit_otp($otp=null){
      if(strlen($otp)==5 && preg_match('/^[0-9]{5}+$/', $otp)){
        return true;
      }else{
        return false;
      }
    }
    public function patient_otp_generate(Request $request){
        $patient_mobile = $request->input('patient_mobile');
        $otp            = $this->generate_random_otp();
        if(empty($patient_mobile)){
            $response = ['status'=>'failure','message'=>'please enter mobile number'];
          }elseif(!$this->check_10_digit_mobile($patient_mobile)){
            $response = ['status'=>'failure','message'=>'please enter 10 digit mobile number'];
          }else{
            $temp_status = $this->check_otp_record_by_mobile($patient_mobile);  
            if(!empty($temp_status)){
              $insert_otp_status = $this->update_otp($patient_mobile,$otp);
              if($insert_otp_status){
                 $this->sendSms($patient_mobile,$otp);
                 $response = ['status'=>'success','message'=>'otp send successfully'];
              }else{
                 $response = ['status'=>'failure','message'=>'otp failled to generate'];
              }
            }else{
              $insert_otp_status = $this->insert_otp($patient_mobile,$otp);
              if($insert_otp_status){
                 $this->sendSms($patient_mobile,$otp);
                 $response = ['status'=>'success','message'=>'otp send successfully'];
              }else{
                 $response = ['status'=>'failure','message'=>'otp failled to generate'];
              }
            }
          }
          return response()->json($response);
    }
    private function validate_otp_by_mobile_and_otp($mobile=null,$otp=null){
        $condition      =    ['mobile_number'=>$mobile,'otp'=>$otp];
        $otp_status     =    DB::table('temp_mobile_otp')->where($condition)->first();
        if(!empty($otp_status)){
           return $otp_status;
        }else{
           return false; 
        }
    }
    public function patient_otp_verify(Request $request){
       $patient_mobile = $request->input('patient_mobile');
       $patient_otp    = $request->input('patient_otp');
        if(empty($patient_mobile)){
            $response = ['status'=>'failure','message'=>'please enter mobile number'];
        }elseif(!$this->check_10_digit_mobile($patient_mobile)){
            $response = ['status'=>'failure','message'=>'please enter 10 digit mobile number'];
        }elseif(empty($patient_otp)){
            $response = ['status'=>'failure','message'=>'please enter otp'];
        }elseif(!$this->check_5_digit_otp($patient_otp)){
            $response = ['status'=>'failure','message'=>'please enter 5 digit otp'];
        }else{
            $verify_otp = $this->validate_otp_by_mobile_and_otp($patient_mobile,$patient_otp);
            if($verify_otp){
                 $response = ['status'=>'success','message'=>'otp verified successfully'];
            }else{
                 $response = ['status'=>'failure','message'=>'otp failled to verify'];
            }
        } 
        return response()->json($response);
    }
    private function check_less_100_char_name($name=null){
      if(strlen($name)<100){
        return true;
      }else{
        return false;
      }
    }
    private function check_more_6_less_12_password($password=null){
      if(strlen($password)>=6 && strlen($password)<=12){
        return true;
      }else{
        return false;
      }
    }
    private function user_details_by_mobile_number($mobile_number=null){
        $condition      =    ['mobile'=>$mobile_number];
        $list     =    DB::table('admin')->where($condition)->first();
        if(!empty($list)){
             $list->profile_picture = asset('patient_files')."/".$list->profile_picture;
             $list->id              = base64_encode(base64_encode($list->id));
             unset($list->password);
           return $list;
        }else{
            return false; 
        }
    } 
    public function patient_registration(Request $request){
        $patient_name       =  $request->input('patient_name');
        $patient_mobile     =  $request->input('patient_mobile');
        $patient_mobile_otp =  $request->input('patient_mobile_otp');
        $patient_password   =  $request->input('patient_password');
        if(empty($patient_name)){
          $response = ['status'=>'failure','message'=>'please enter patient name'];
        }elseif(!$this->check_less_100_char_name($patient_name)){
          $response = ['status'=>'failure','message'=>'patient name length less than 100 character'];
        }elseif(empty($patient_mobile)){
          $response = ['status'=>'failure','message'=>'please enter patient mobile number'];
        }elseif(!$this->check_10_digit_mobile($patient_mobile)){
            $response = ['status'=>'failure','message'=>'please enter 10 digit mobile number'];
        }elseif(empty($patient_mobile_otp)){
          $response = ['status'=>'failure','message'=>'Please Enter OTP'];
        }elseif(!$this->check_5_digit_otp($patient_mobile_otp)){
            $response = ['status'=>'failure','message'=>'please enter 5 digit otp'];
        }elseif(empty($patient_password)){
          $response = ['status'=>'failure','message'=>'Please Enter Password'];
        }elseif(!$this->check_more_6_less_12_password($patient_password)){
            $response = ['status'=>'failure','message'=>'password must be more than 6 character and less than 12 character'];
        }else{
          $user_details = $this->user_details_by_mobile_number($patient_mobile);
          if(!empty($user_details)){
            $response = ['status'=>'failure','message'=>'mobile number already registered'];
          }else{
            $verify_otp = $this->validate_otp_by_mobile_and_otp($patient_mobile,$patient_mobile_otp);
            if(!$verify_otp){
              $response = ['status'=>'failure','message'=>'please enter valid otp'];
            }else{
              $insert = array(
                'name' => $patient_name,
                'email' => '',
                'password' => $patient_password,
                'city' => '',
                'state' => '',
                'country' => 'india',
                'email_verify' => 0,
                'profile_picture'=>'default_patient_profile_picture.png',
                'type' =>  'patient',
                'status'=> 1,
                'mobile' => $patient_mobile,
                'user_id' => '',
                'mobile_otp' => $patient_mobile_otp,
              );
              $status = DB::table('admin')->insert($insert);
              if(!empty($status)){
                $user_details = $this->user_details_by_mobile_number($patient_mobile);
                $response = ['status'=>'success','message'=>'registration complete successfully','result'=>$user_details];             
              }else{
                  $response = ['status'=>'failure','message'=>'Some Problem Occured Try Again'];
              }

            }
          }         
        }
        return response()->json($response);
    }
    private function user_details_by_mobile_and_password($mobile_number=null,$password=null){
        $condition      =    ['mobile'=>$mobile_number,'password'=>$password,'type'=>'patient'];
        $list     =    DB::table('admin')->where($condition)->first();
        if(!empty($list)){
             $list->profile_picture = asset('patient_files')."/".$list->profile_picture;
             $list->id              = base64_encode(base64_encode($list->id));
             $list->profile_status  = empty($list->state)?'incomplete':'complete';
             unset($list->password,$list->user_id,$list->type,$list->menu_allow,$list->mobile_otp,$list->booking_notification,$list->notification_status);
             unset($list->created_by,$list->family_dob,$list->family_relation,$list->family_name,$list->family_gender);
           return $list;
        }else{
            return false; 
        }
    } 
    public function patient_login(Request $request){
      $patient_mobile    = $request->input('patient_mobile');
      $patient_password  = $request->input('patient_password');
      if(empty($patient_mobile)){
          $response = ['status'=>'failure','message'=>'please enter mobile number'];
      }elseif(!$this->check_10_digit_mobile($patient_mobile)){
            $response = ['status'=>'failure','message'=>'please enter 10 digit mobile number'];
      }elseif(empty($patient_password)){
          $response = ['status'=>'failure','message'=>'please enter password'];
      }else{
          $user_details   =    $this->user_details_by_mobile_and_password($patient_mobile,$patient_password);
          if(empty($user_details)){
             $response = ['status'=>'failure','message'=>'please enter valid credential'];
          }elseif($user_details->status=='0'){
             $response = ['status'=>'failure','message'=>'user blocked please contact to admin'];            
          }else{
            $response = ['status'=>'success','message'=>'user loged in successfully','result'=>$user_details];
          }
        }
        return response()->json($response);
    }
    private function doctor_details_by_location_and_keywords($location=null,$keywords=null){
      $where    = ' and 1=1';
      if(!empty($location)){
           $where .= " and (profile_details.clinic_city Like '%$location%' or profile_details.clinic_state Like '%$location%')";
       }
       if(!empty($keywords)){
           $where .= " and (admin.name Like '%$keywords%' or profile_details.clinic_name Like '%$keywords%' or profile_details.clinic_services like '%$keywords%')";
       }
       $list    =    DB::select("select admin.id as id,name,designation,gender,profile_picture,clinic_address,clinic_city,clinic_state,clinic_country,clinic_pincode,clinic_fee,clinic_services from admin left join profile_details on profile_details.admin_id=admin.id where type='doctor' and admin.status='1' and clinic_city!='' $where");
       if(!empty($list)){
        foreach ($list as $key => $value) {
          $value->profile_picture = asset('doctor_files')."/".$value->profile_picture;
          $value->id              = base64_encode(base64_encode($value->id));
        }
        return $list;
       }else{
        return false;
       }
    }
    public function search_doctor(Request $request){
       $location = $request->get('location');
       $keywords = $request->get('keywords');
       $list     = $this->doctor_details_by_location_and_keywords($location,$keywords);
       if(!empty($list)){
            $response = ['status'=>'success','message'=>'doctor list fetch successfully','result'=>$list];             
        }else{
            $response = ['status'=>'failure','message'=>'doctor not found'];
        }
        return response()->json($response);
    }
    private function doctor_eucation($degree=null,$institute=null,$completion_year=null){
      $degree          = json_decode($degree,true);
      $institute       = json_decode($institute,true); 
      $completion_year = json_decode($completion_year,true);
      $education       = [];
      if(!empty($degree)){
        foreach($degree as $key=>$value){
          $education[] = ['institute'=>$institute[$key],'degree'=>$degree[$key],'completion_year'=>$completion_year[$key]];
        }
        return $education;
      }
    }
    private function work_experience($hospital_name=null,$experience_from=null,$experience_to=null,$experience_designation=null){
      $hospital_name         = json_decode($hospital_name,true);  
      $experience_from       = json_decode($experience_from,true); 
      $experience_to         = json_decode($experience_to,true);
      $designation           = json_decode($experience_designation,true);
      $experience       =     [];
      if(!empty($hospital_name)){
        foreach($hospital_name as $key=>$value){
         $experience[] = ['hospital_name'=>$hospital_name[$key],'from'=>$experience_from[$key],'to'=>$experience_to[$key],'designation'=>$designation[$key]];
        }
        return $experience;
      }
    }
    private function award($name=null,$year=null){
      $name          = json_decode($name,true);
      $year       = json_decode($year,true); 
      $award       = [];
      if(!empty($name)){
        foreach($name as $key=>$value){
          $award[] = ['name'=>$name[$key],'year'=>$year[$key]];
        }
        return $award;
      }
    }
    private function doctor_details_by_id($doctor_id=null){
     $list    =    DB::select("select admin.id as id,name,designation,gender,profile_picture,clinic_address,clinic_city,clinic_state,clinic_country,clinic_pincode,clinic_fee,clinic_services,about_us,degree,institute,completion_year,hospital_name,experience_from,experience_to,experience_designation,award_name,award_year,clinic_specialist,clinic_name,clinic_open_time,clinic_close_time from admin left join profile_details on profile_details.admin_id=admin.id where type='doctor' and admin.status='1' and clinic_city!='' and admin.id='$doctor_id'");
       if(!empty($list)){
        foreach ($list as $key => $value) {
          $value->profile_picture = asset('doctor_files')."/".$value->profile_picture;
          $value->id              = base64_encode(base64_encode($value->id));
          $value->education       = $this->doctor_eucation($value->degree,$value->institute,$value->completion_year);
          $value->award           = $this->award($value->award_name,$value->award_year);
          $value->work_experience=$this->work_experience($value->hospital_name,$value->experience_from,$value->experience_to,$value->experience_designation);
          unset($value->degree,$value->institute,$value->completion_year,$value->hospital_name,$value->experience_from,$value->experience_to,$value->experience_designation,$value->award_name,$value->award_year);
        }
        return $list;
       }else{
        return false;
       }
    }
    public function doctor_profile_view(Request $request){
      $doctor_id = $request->get('doctor_id');
      if(empty($doctor_id)){
          $response = ['status'=>'failure','message'=>'please enter doctor id'];
      }else{
       $doctor_id = base64_decode(base64_decode($doctor_id));
       $list     = $this->doctor_details_by_id($doctor_id);
       if(!empty($list)){
            $response = ['status'=>'success','message'=>'doctor details fetch successfully','result'=>$list];             
        }else{
            $response = ['status'=>'failure','message'=>'doctor not found'];
        }
      }
        return response()->json($response);        
    }
    private function check_booked_slot($date=null,$slot=null,$doctor_id=null){
          $list    = DB::select("select id from appointment_booked where appointment_date='$date' and appointment_slot='$slot' and doctor_id='$doctor_id' and status='1' limit 1");
          if(empty($list)){
             return 'available';
          }else{
            return 'booked';
          }
    }
    private function check_lapsed_slot($date=null,$slot=null){
      $today_day         = date('l');
      $selected_day     = date('l',strtotime($date));
      $currentTime       = (int) date('Gi');
      $selectedTime      = (int) date('Gi',strtotime($slot));
      if($today_day==$selected_day && $currentTime>=$selectedTime){
       return 'lapsed';
      }else{
        return 'available';
      }
    }
    private function doctor_slot_by_id_day($doctor_id=null,$slot_day=null,$appointment_date=null){
      if(ucfirst($slot_day)=='Saturday'){
          $slot_from = 'saturday_start_time';
          $slot_to   = 'saturday_end_time';
        }elseif(ucfirst($slot_day)=='Sunday'){
          $slot_from = 'sunday_start_time';
          $slot_to   = 'sunday_end_time';
        }elseif(ucfirst($slot_day)=='Monday'){
          $slot_from = 'monday_start_time';
          $slot_to   = 'monday_end_time';
        }elseif(ucfirst($slot_day)=='Tuesday'){
          $slot_from = 'tuesday_start_time';
          $slot_to   = 'tuesday_end_time';
        }elseif(ucfirst($slot_day)=='Wednesday'){
          $slot_from = 'wednesday_start_time';
          $slot_to   = 'wednesday_end_time';
        }elseif(ucfirst($slot_day)=='Thursday'){
          $slot_from = 'thursday_start_time';
          $slot_to   = 'thursday_end_time';
        }elseif(ucfirst($slot_day)=='Friday'){
          $slot_from = 'friday_start_time';
          $slot_to   = 'friday_end_time';
        }
        $result = [];
        $list   = DB::select("select $slot_from as start,$slot_to as end from admin left join profile_details on profile_details.admin_id=admin.id where type='doctor' and admin.id='$doctor_id' limit 1");
        if(!empty($list)){
          $start = json_decode($list[0]->start,true);
          $end   = json_decode($list[0]->end,true);
          foreach ($start as $key => $value) {
              $slot = $start[$key]." - ".$end[$key];
              $booked_status = $this->check_booked_slot($appointment_date,$slot,$doctor_id);
              $lapsed_status = $this->check_lapsed_slot($appointment_date,$end[$key]);
              $result[]       = ['start'=>$start[$key],'end'=>$end[$key],'booked_status'=>$booked_status,'lapsed_status'=>$lapsed_status];
            }
           return $result; 
        }else{
          return $result;
        }
    }
    private function doctor_by_id($doctor_id=null,$app_date=null){
     $list    =    DB::select("select admin.id as id,name,designation,gender,profile_picture,clinic_address,clinic_city,clinic_state,clinic_country,clinic_pincode,notification_status,booking_notification from admin left join profile_details on profile_details.admin_id=admin.id where type='doctor' and admin.status='1' and clinic_city!='' and admin.id='$doctor_id'");
       if(!empty($list)){
        foreach ($list as $key => $value) {
          $value->profile_picture   = asset('doctor_files')."/".$value->profile_picture;
          $value->id                = base64_encode(base64_encode($value->id));
          $value->appointment_date  = $app_date;
          $value->appointment_day   = date('l',strtotime($app_date));
          $value->appointment_slot  = $this->doctor_slot_by_id_day($doctor_id,$value->appointment_day,$app_date);
        }
        return $list;
       }else{
        return false;
       }
    }
    public function doctor_slot_view(Request $request){
      $doctor_id = $request->get('doctor_id');
      $app_date  = $request->get('appointment_date')?$request->get('appointment_date'):date('Y-m-d');
      if(empty($doctor_id)){
          $response = ['status'=>'failure','message'=>'please enter doctor id'];
      }else{
       $doctor_id = base64_decode(base64_decode($doctor_id));
       $list     = $this->doctor_by_id($doctor_id,$app_date);
       if(!empty($list)){
            $response = ['status'=>'success','message'=>'doctor slot fetch successfully','result'=>$list];             
        }else{
            $response = ['status'=>'failure','message'=>'doctor not found'];
        }
      }
        return response()->json($response);        
    }
    private function patient_details_by_id($patient_id=null){
        $condition      =    ['id'=>$patient_id,'type'=>'patient'];
        $list     =    DB::table('admin')->where($condition)->first();
        if(!empty($list)){
             $list->profile_picture = asset('patient_files')."/".$list->profile_picture;
             $list->id              = base64_encode(base64_encode($list->id));
             $list->profile_status  = empty($list->state)?'incomplete':'complete';
             unset($list->password,$list->user_id,$list->type,$list->menu_allow,$list->mobile_otp,$list->booking_notification,$list->notification_status);
             unset($list->created_by,$list->family_dob,$list->family_relation,$list->family_name,$list->family_gender);
           return $list;
        }else{
            return false; 
        }
    }
    public function patient_profile_view(Request $request){
      $patient_id    = $request->input('patient_id');
      if(empty($patient_id)){
          $response = ['status'=>'failure','message'=>'please enter patient id'];
      }else{
          $patient_id     = base64_decode(base64_decode($patient_id));
          $user_details   = $this->patient_details_by_id($patient_id);
          if(empty($user_details)){
             $response = ['status'=>'failure','message'=>'please enter valid patient id'];
          }elseif($user_details->status=='0'){
             $response = ['status'=>'failure','message'=>'patient blocked please contact to admin'];            
          }else{
            $response = ['status'=>'success','message'=>'patient profile fetch successfully','result'=>$user_details];
          }
        }
        return response()->json($response);
    }






    private function app_version(){
      return ['app_update_message'=>'','current_version'=>'1','min_version'=>'1','not_supported_version'=>'0'];
    }


   
    private function api_host_by_host_title($host_title=null){
      $status = DB::table('api_host')->where('host_section_title',$host_title)->get(['api_name','api_host']);
      return !empty($status[0])?$status:null;
    }
    private function host_by_host_title($host_title=null){
      $status = DB::table('host_section')->where('title',$host_title)->get();
      return !empty($status[0])?$status:null;
    }
    private function api_host_details_by_host_title($host_title=null,$api_name=null){
      $status = DB::table('api_host')->where('host_section_title',$host_title)->where('api_name',$api_name)->get(['api_name','api_host']);
      return !empty($status[0])?$status:null;
    }
    public function  get_config(){
        $response = [];
        $data['app_version']   = $this->app_version();
        $data['backup_host']   = self::backup_host;
        $data['config_host']   = self::config_host;
        $host_section  = DB::table('host_section')->get(['title','host','connect_to_host']);
        foreach ($host_section as $key => $value) {
          $value->api_host = $this->api_host_by_host_title($value->title);
          $response[] = $value;
        }
        $data['host_section'] = $response;
        return response()->json($data);
    }
    public function add_host_section(Request $request){
      $response = [];
      if(empty($request->input('title'))){
            $response = ['status'=>'failure','message'=>'Please Enter Host Title'];
         }elseif(empty($request->input('connect_to_host'))){
            $response = ['status'=>'failure','message'=>'Please Enter Connet Host'];
         }elseif(empty($request->input('host'))){
            $response = ['status'=>'failure','message'=>'Please Enter Host'];
         }else{
            $title           = $request->input('title');
            $connect_to_host = $request->input('connect_to_host');
            $host            = $request->input('host');
            $title_status = $this->host_by_host_title($title);
            if($title_status){
               $upate  = ['connect_to_host'=>$connect_to_host,'host'=>$host];
               DB::table('host_section')->where('title',$title)->update($upate);
            }else{
               $insert = ['connect_to_host'=>$connect_to_host,'host'=>$host,'title'=>$title];
               DB::table('host_section')->insert($insert);
            }
            return $this->get_config();
         }
         return response()->json($response);
    }
    public function add_api_host(Request $request){
      $response = [];
      if(empty($request->input('api_name'))){
            $response = ['status'=>'failure','message'=>'Please Enter Api Name'];
         }elseif(empty($request->input('api_host'))){
            $response = ['status'=>'failure','message'=>'Please Enter Api Host'];
         }elseif(empty($request->input('host_section_title'))){
            $response = ['status'=>'failure','message'=>'Please Enter Section Title'];
         }else{
            $api_name           = $request->input('api_name');
            $api_host           = $request->input('api_host');
            $host_section_title = $request->input('host_section_title');
            if(!$this->host_by_host_title($host_section_title)){
              $response = ['status'=>'failure','message'=>'Section Title Does Not Exist'];
            }else{
               $title_status = $this->api_host_details_by_host_title($host_section_title,$api_name);
               if($title_status){
                  $upate  = ['api_host'=>$api_host];
                  DB::table('api_host')->where('host_section_title',$host_section_title)->where('api_name',$api_name)->update($upate);
               }else{
                  $insert = ['host_section_title'=>$host_section_title,'api_name'=>$api_name,'api_host'=>$api_host];
                  DB::table('api_host')->insert($insert);
               }
               return $this->get_config();
            }          
         }
         return response()->json($response);
    }

    private function check_temp_mobile_otp($mobile_number=null){
            $otp_status     =    DB::select("select * from temp_mobile_otp where mobile_number='$mobile_number'");
            if(!empty($otp_status)){
              return $otp_status[0]->otp;
            }else{
              return null; 
            }
    }



   
}
  