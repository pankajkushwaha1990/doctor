<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;

class ApiController extends Controller{

	private function check_temp_mobile_otp($mobile_number=null){
            $otp_status     =    DB::select("select * from temp_mobile_otp where mobile_number='$mobile_number'");
            if(!empty($otp_status)){
            	return $otp_status[0]->otp;
            }else{
            	return null; 
            }
	}
	private function user_details_by_mobile_number($mobile_number=null){
	  	    $otp_status     =    DB::select("select * from admin where mobile='$mobile_number'");
	        if(!empty($otp_status)){
	        	return $otp_status;
	        }else{
	        	return []; 
	        }
	} 
    public function user_registration(Request $request){
      	if(empty($request->input('user_name'))){
      		$response = ['status'=>'failure','message'=>'Please Enter User Name'];
      	}elseif(empty($request->input('user_mobile'))){
      		$response = ['status'=>'failure','message'=>'Please Enter Mobile Number'];
      	}elseif(empty($request->input('user_mobile_otp'))){
      		$response = ['status'=>'failure','message'=>'Please Enter OTP'];
      	}elseif(empty($request->input('user_password'))){
      		$response = ['status'=>'failure','message'=>'Please Enter Password'];
      	}elseif(empty($request->input('user_email'))){
      		$response = ['status'=>'failure','message'=>'Please Enter Email Address'];
      	}else{
      		$user_details = $this->user_details_by_mobile_number($request->input('user_mobile'));
      		if(!empty($user_details)){
      		  $response = ['status'=>'failure','message'=>'Mobile Number Already Registred'];
      		}else{
      			$mobile_otp = $this->check_temp_mobile_otp($request->input('user_mobile'));
	      		if($mobile_otp!=$request->input('user_mobile_otp')){
	      		  $response = ['status'=>'failure','message'=>'Please Enter Valid OTP'];
	      		}else{
	      			$user = array(
		                'name' => $request->input('user_name'),
		                'mobile' => $request->input('user_mobile'),
		                'email' => $request->input('user_email'),
		                'mobile_otp' => $request->input('user_mobile_otp'),
		                'email_otp' => mt_rand(100000,999999),
		                'password' => $request->input('user_password'),
		                'city' => '',
		                'state' => '',
		                'country' => 'india',
		                'email_verify' => 1,
		                'passport_file' => '',
		                'pan_file' => '',
		                'adhaar_file' => '',
		                'type' => 'user',
		                'status'=> 1,
		                'created_by'=> 'self'
		                    );
		      			$status = DB::table('admin')->insert($user);
			            if(!empty($status)){
	      					$user_details = $this->user_details_by_mobile_number($request->input('user_mobile'));
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
   	public function user_registration_otp_generate(Request $request){
   		if(empty($request->input('user_mobile'))){
      		$response = ['status'=>'failure','message'=>'Please Enter Mobile Number'];
      	}else{
      		$mobile_status = $this->check_temp_mobile_otp($request->input('user_mobile'));	
      		if(!empty($mobile_status)){
      			$update = ['otp'=>rand(111111,999999)];
      			$status = DB::table('temp_mobile_otp')->where('mobile_number',$request->input('user_mobile'))->update($update);
      		    $response = ['status'=>'success','message'=>'OTP Send Successfully'];
      		}else{
      			$update = ['otp'=>rand(111111,999999),'mobile_number'=>$request->input('user_mobile')];
      			$status = DB::table('temp_mobile_otp')->insert($update);
      		    $response = ['status'=>'success','message'=>'OTP Send Successfully'];
      		}
      	}
   	    return response()->json($response);
   	}
   	public function user_login(Request $request){
		if(empty($request->input('user_mobile'))){
      		$response = ['status'=>'failure','message'=>'Please Enter Mobile Number'];
      	}elseif(empty($request->input('user_password'))){
      		$response = ['status'=>'failure','message'=>'Please Enter Password'];
      	}else{
      		$mobile_number  =    $request->input('user_mobile');
      		$user_password  =    $request->input('user_password');
      		$user_details   =    DB::select("select * from admin where mobile='$mobile_number' and password='$user_password' and type='user'");
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

      