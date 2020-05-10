<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    const backup_host = 'http://appsfeature.com/';
    const config_host = 'http://appsfeature.com/';
    private function app_version(){
      return ['app_update_message'=>'','current_version'=>'1','min_version'=>'1','not_supported_version'=>'0'];
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

    public function patient_otp_generate(Request $request){
      if(empty($request->input('patient_mobile'))){
          $response = ['status'=>'failure','message'=>'Please Enter Mobile Number'];
        }else{
          $otp    = rand(11111,99999);
          $mobile_status = $this->check_temp_mobile_otp($request->input('patient_mobile'));  
          if(!empty($mobile_status)){
            $update = ['otp'=>$otp];
            $status = DB::table('temp_mobile_otp')->where('mobile_number',$request->input('patient_mobile'))->update($update);
            $response = ['status'=>'success','message'=>'OTP Send Successfully','result'=>array(0=>$update)];
          }else{
            $update = ['otp'=>$otp,'mobile_number'=>$request->input('patient_mobile')];
            $status = DB::table('temp_mobile_otp')->insert($update);
            $response = ['status'=>'success','message'=>'OTP Send Successfully','result'=>array(0=>$update)];
          }
         $this->sendSms($request->input('patient_mobile'),$otp);
        }
        return response()->json($response);

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
    private function user_details_by_mobile_number($mobile_number=null){
          $otp_status     =    DB::select("select * from admin where mobile='$mobile_number'");
          if(!empty($otp_status)){
            return $otp_status;
          }else{
            return []; 
          }
    } 
    private function check_temp_mobile_otp($mobile_number=null){
            $otp_status     =    DB::select("select * from temp_mobile_otp where mobile_number='$mobile_number'");
            if(!empty($otp_status)){
              return $otp_status[0]->otp;
            }else{
              return null; 
            }
    }
    public function patient_registration(Request $request){
        if(empty($request->input('patient_name'))){
          $response = ['status'=>'failure','message'=>'Please Enter Patient Name'];
        }elseif(empty($request->input('patient_mobile'))){
          $response = ['status'=>'failure','message'=>'Please Enter Patient Mobile Number'];
        }elseif(empty($request->input('patient_mobile_otp'))){
          $response = ['status'=>'failure','message'=>'Please Enter OTP'];
        }elseif(empty($request->input('patient_password'))){
          $response = ['status'=>'failure','message'=>'Please Enter Password'];
        }else{
          $user_details = $this->user_details_by_mobile_number($request->input('patient_mobile'));
          if(!empty($user_details)){
            $response = ['status'=>'failure','message'=>'Mobile Number Already Registred'];
          }else{
            $mobile_otp = $this->check_temp_mobile_otp($request->input('patient_mobile'));
            if($mobile_otp!=$request->input('patient_mobile_otp')){
              $response = ['status'=>'failure','message'=>'Please Enter Valid OTP'];
            }else{
              $insert = array(
                'name' => $request->input('patient_name'),
                'email' => '',
                'password' => $request->input('patient_password'),
                'city' => '',
                'state' => '',
                'country' => 'india',
                'email_verify' => 0,
                'profile_picture'=>'default_patient_profile_picture.png',
                'type' =>  'patient',
                'status'=> 1,
                'mobile' => $request->input('patient_mobile'),
                'user_id' => '',
                'mobile_otp' => $request->input('patient_mobile_otp'),
              );
              $status = DB::table('admin')->insert($insert);
              if(!empty($status)){
                $user_details = $this->user_details_by_mobile_number($request->input('patient_mobile'));
                unset($user_details[0]->password);
                $response = ['status'=>'success','message'=>'User has been added successfully','result'=>$user_details];             
              }else{
                  $response = ['status'=>'success','message'=>'Some Problem Occured Try Again'];
              }

            }
          }         
        }
        return response()->json($response);
    }
    public function patient_login(Request $request){
      if(empty($request->input('patient_mobile'))){
          $response = ['status'=>'failure','message'=>'Please Enter Mobile Number'];
        }elseif(empty($request->input('patient_password'))){
          $response = ['status'=>'failure','message'=>'Please Enter Password'];
        }else{
          $mobile_number  =    $request->input('patient_mobile');
          $user_password  =    $request->input('patient_password');
          $user_details   =    DB::select("select * from admin where mobile='$mobile_number' and password='$user_password' and type='patient' and status='1'");
          if(empty($user_details)){
             $response = ['status'=>'failure','message'=>'Please Enter Valid Credential'];
          }elseif($user_details[0]->status=='0'){
             $response = ['status'=>'failure','message'=>'User Bolocked Please Contact To Admin'];            
          }else{
            unset($user_details[0]->password);
            $response = ['status'=>'success','message'=>'User has been Loged In successfully','result'=>$user_details];                 
          }
        }
        return response()->json($response);
    }

   
}
  