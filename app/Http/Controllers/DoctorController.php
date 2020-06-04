<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;

class DoctorController extends Controller{   
    public function __construct(){
        $this->middleware(function ($request, $next) {
          if($request->session()->get('member') == NULL){
               return redirect('login');
          }elseif($request->session()->get('member')->type!='doctor'  && $request->session()->get('member')->type!='help_desk'){
               return redirect('login');
          }elseif($request->session()->get('member')->type!='help_desk' && $request->session()->get('member')->type!='doctor'){
               return redirect('login');
          }else{
              $id = $request->session()->get('member')->id;
              $check_profile = $this->check_profile_by_doctor_id($id);
              if(empty($check_profile) && $request->session()->get('member')->type=='doctor'){
                return redirect('doctor_profile_setting');
              }
              return $next($request);
          }
        });
    }
    public function help_desk_profile_setting_submit(Request $request){
        $hd_id       = $request->input('help_desk_id');
        $validator = Validator::make($request->all(), [
            'profile_name' => 'required|max:100',
            'mobile' => empty($hd_id)?'required|max:100|unique:admin,user_id':'required|max:100',
            'password' => 'required|max:50',
            'gender' => 'required|max:50',
            'date_of_birth' => 'required|max:50',
            'address' => 'required|max:2000',
            'city' => 'required|max:200',
            'state' => 'required|max:200',
            'country' => 'required|max:200',
            'pincode' => 'required|max:200',
            'menu' => 'required|max:200',
        ]);
        if ($validator->fails()){
            return redirect('help_desk_profile_setting')->withErrors($validator)->withInput();
        }else{
          $session = $request->session()->get('member');
          $id      = $session->id;
          if($request->hasFile('profile_picture')){
               $image = $request->file('profile_picture');
               $images = str_replace(' ','_',time().'_doctor_'.$image->getClientOriginalName());
               $image->move(public_path('doctor_files'), $images);
          }else{
                $images = 'default_help_desk_profile_picture.png';
          }
          $insert = array(
                'name' => $request->input('profile_name'),
                'user_id'=>$request->input('mobile'),
                'password' => $request->input('password'),
                'gender'=>$request->input('gender'),
                'date_of_birth'=>$request->input('date_of_birth'),
                'address'=>$request->input('address'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'country' => $request->input('country'),
                'pincode' => $request->input('pincode'),
                'email' => '',
                'email_verify' => 0,
                'profile_picture'=>$images,
                'type' =>  'help_desk',
                'mobile' => 'help_desk',
                'mobile_otp' => '',
                'created_by'=>$id,
                'menu_allow'=>json_encode($request->input('menu')),
          );
          if(!empty($request->input('help_desk_id'))){
            $id       = $request->input('help_desk_id');
            $status  = DB::table('admin')->where(['id'=>$id])->update($insert);
          }else{
            $status  = DB::table('admin')->insert($insert);
          }
          if($status){
              return redirect('/help_desk_profile_setting')->with('success', 'Profile has been updated successfully'); 
          }else{
              return redirect('/help_desk_profile_setting')->with('success', 'Some Problem Occured Try Again'); 
          }
        } 
    }

    public function help_desk_profile_setting_status(Request $request,$status=null,$amenities_id=null){
      $amenities_id = base64_decode($amenities_id);
      $status1   = DB::table('admin')->where('id', $amenities_id)->update(array('status'=>$status));
      return redirect('/help_desk_profile_setting')->with('success', 'Status Changed Successfully'); 
    }

    public function help_desk_profile_setting(Request $request){
           $session = $request->session()->get('member');
           $id      = $session->id;
           $list    = DB::select("select * from admin where admin.created_by='$id' and type='help_desk'");
           $data    = array('session'=>$session,'list'=>$list);
           return view('doctor.help_desk_profile_setting')->with($data);
    }



    public function doctor_slot_clone(Request $request,$days=null){
       $session       = $request->session()->get('member');
       $id           = $session->id;
       $appointment  =    $days;
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
              $slots[] = ['start'=>$start[$key],'end'=>$end[$key]];
            }
        }
        return response()->json($slots);
    }
    public function doctor_dashboard(Request $request){
       $session = $request->session()->get('member');
       if($session->type=='doctor'){
         $id      = $session->id;       
       }else{
        $id      = $session->created_by;    
       }
       $today   = date('Y-m-d');   
       $tom    = date('Y-m-d',strtotime("+1 days"));   
       $tom2    = date('Y-m-d',strtotime("+2 days"));   
       $tom3    = date('Y-m-d',strtotime("+3 days"));   
       $tom4    = date('Y-m-d',strtotime("+4 days"));   
       $tom5    = date('Y-m-d',strtotime("+5 days"));   
       $tom6    = date('Y-m-d',strtotime("+6 days"));   
       $tom7    = date('Y-m-d',strtotime("+7 days"));   
       $condition = ['appointment_date'=>date('Y-m-d'),'doctor_id'=>$id];
       $all_patient_count         = DB::table('appointment_booked')->where('doctor_id', '=',$id)->count();           
       $today_patient_count       = DB::table('appointment_booked')->where($condition)->count(); 
       $condition = ['appointment_date'=>date('Y-m-d'),'doctor_id'=>$id,'booking_type'=>null];

       $today_appointment_count   = DB::table('appointment_booked')->where($condition)->count();
       $condition = ['appointment_date'=>date('Y-m-d'),'doctor_id'=>$id,'booking_type'=>'old'];

       $today_appointment_count_old   = DB::table('appointment_booked')->where($condition)->count();

       $todat_appointment         = DB::select("select *,appointment_booked.id as app_id from appointment_booked join admin on admin.id=appointment_booked.patient_id where doctor_id='$id' and appointment_booked.status='1' and appointment_date='$today'");

       $today_revenue         = DB::select("select sum(appointment_booked.pay_amount) as revenue from appointment_booked join admin on admin.id=appointment_booked.patient_id where doctor_id='$id' and appointment_booked.status='1' and appointment_date='$today'");



       $tomorrow         = DB::select("select *,appointment_booked.id as app_id from appointment_booked join admin on admin.id=appointment_booked.patient_id where doctor_id='$id' and appointment_booked.status='1' and appointment_date='$tom'");

       $tomorrow3         = DB::select("select *,appointment_booked.id as app_id from appointment_booked join admin on admin.id=appointment_booked.patient_id where doctor_id='$id' and appointment_booked.status='1' and appointment_date='$tom2'");

       $tomorrow4         = DB::select("select *,appointment_booked.id as app_id from appointment_booked join admin on admin.id=appointment_booked.patient_id where doctor_id='$id' and appointment_booked.status='1' and appointment_date='$tom3'");

       $tomorrow5         = DB::select("select *,appointment_booked.id as app_id from appointment_booked join admin on admin.id=appointment_booked.patient_id where doctor_id='$id' and appointment_booked.status='1' and appointment_date='$tom4'");

       $tomorrow6         = DB::select("select *,appointment_booked.id as app_id from appointment_booked join admin on admin.id=appointment_booked.patient_id where doctor_id='$id' and appointment_booked.status='1' and appointment_date='$tom5'");

       $tomorrow7         = DB::select("select *,appointment_booked.id as app_id from appointment_booked join admin on admin.id=appointment_booked.patient_id where doctor_id='$id' and appointment_booked.status='1' and appointment_date='$tom6'");

       $tomorrow8         = DB::select("select *,appointment_booked.id as app_id from appointment_booked join admin on admin.id=appointment_booked.patient_id where doctor_id='$id' and appointment_booked.status='1' and appointment_date='$tom7'");

       $data       = array('today_appointment_count_old'=>$today_appointment_count_old,'session'=>$session,'all_patient_count'=>$all_patient_count,'today_patient_count'=>$today_patient_count,'today_appointment_count'=>$today_appointment_count,'appointment_booked'=>$todat_appointment,'tomorrow'=>$tomorrow,'tomorrow3'=>$tomorrow3,'tomorrow4'=>$tomorrow4,'tomorrow5'=>$tomorrow5,'tomorrow6'=>$tomorrow6,'tomorrow7'=>$tomorrow7,'tomorrow8'=>$tomorrow5,'today_revenue'=>$today_revenue[0]->revenue);
       

       return view('doctor.dashboard')->with($data);
    }

    public function doctor_invoice_view(Request $request,$booking_id=null){
      if($request->session()->get('member') == NULL){
               return redirect('login');
      }
      $booking_id = base64_decode(base64_decode($booking_id));
      $session    = $request->session()->get('member');
      $patient_id = $session->id;
      $list       = DB::select("select *,appointment_booked.id as id from appointment_booked join admin on doctor_id=admin.id join profile_details on profile_details.admin_id=admin.id where appointment_booked.id='$booking_id'");
      if(!empty($list)){
        $response = $list[0];
      }else{
        $response = [];
      }
       $data    = array('appointment'=>$response,'session'=>$session);
       return view('doctor.doctor_invoice_view')->with($data);
    }

    public function doctor_booking_report(Request $request){
       $session = $request->session()->get('member');

      if($session->type=='doctor'){
       $id      = $session->id;       
      }else{
       $id      = $session->created_by;    
      }

      $where   = ' and 1=1';
        if(!empty($request->get('patient_id'))){
           $patient_id = $request->get('patient_id');
           $where .= " and patient_id='$patient_id'";
        }

        if(!empty($request->get('from'))){
          $from                 = explode("/",$request->get('from'));
          $from                 = $from[2]."-".$from[1]."-".$from[0];
          $where .= " and appointment_date>='$from'";

        }

        if(!empty($request->get('appointment_type'))){
          $appointment_type = $request->get('appointment_type');
          if($appointment_type=='old'){
           $where .= " and booking_type='$appointment_type'";
          }
        }

        if(!empty($request->get('to'))){
          $to                 = explode("/",$request->get('to'));
          $to                 = $to[2]."-".$to[1]."-".$to[0];
          $where .= " and appointment_date<='$to'";
        }


      $appointment =    DB::select("select *,admin.id as id,appointment_booked.id as app_id,appointment_booked.status as status from appointment_booked left join admin on appointment_booked.patient_id=admin.id where doctor_id='$id' and   appointment_status=2 $where order by appointment_date asc,appointment_slot asc");

      $patient_list =    DB::select("select * from appointment_booked left join admin on appointment_booked.patient_id=admin.id where doctor_id='$id' and appointment_status=2 order by appointment_date asc,appointment_slot asc");

      $patient_lists = [];
      if(!empty($patient_list)){
        foreach ($patient_list as $key => $patient) {
          $patient_lists[$patient->patient_id] = $patient;
        }
      }
       $data       = array('session'=>$session,'appointment_booked'=>$appointment,'patient_list'=>$patient_lists);
       return view('doctor.doctor_booking_report')->with($data);
    }

    public function doctor_appointments(Request $request){
       $session = $request->session()->get('member');

       if($session->type=='doctor'){
       $id      = $session->id;       
      }else{
       $id      = $session->created_by;    
      }

       $appointment =    DB::select("select *,admin.id as id,appointment_booked.id as app_id,appointment_booked.status as status,appointment_booked.created_at as created_at from appointment_booked left join admin on appointment_booked.patient_id=admin.id where doctor_id='$id' and appointment_status<2 and appointment_booked.status='1'  order by appointment_date asc,appointment_slot asc");
       $data       = array('session'=>$session,'appointment_booked'=>$appointment);
       return view('doctor.doctor_appointments')->with($data);
    }
    public function doctor_patients(Request $request){
       $session = $request->session()->get('member');
       $id      = $session->id;
       $appointment =    DB::select("select *,admin.id as id,appointment_booked.id as app_id from appointment_booked left join admin on appointment_booked.patient_id=admin.id where doctor_id='$id' order by appointment_date asc,appointment_slot asc");
       $data    = array('session'=>$session,'appointment_booked'=>$appointment);
       return view('doctor.doctor_patients')->with($data);
    }
    public function doctor_schedule_timings(Request $request){
       $session = $request->session()->get('member');

       if($session->type=='doctor'){
       $id      = $session->id;       
      }else{
       $id      = $session->created_by;    
      }

       $list    =    DB::select("select * from admin left join profile_details on profile_details.admin_id=admin.id where admin.id='$id' and type='doctor'");
       $data    = array('session'=>$session,'list'=>$list);
       return view('doctor.doctor_schedule_timings')->with($data);
    }
    public function doctor_change_password(Request $request){
       $session = $request->session()->get('member');
       $id      = $session->id;
       $list    =    DB::select("select * from admin where id='$id' and type='doctor'");
       $data    = array('session'=>$session,'list'=>$list);
       return view('doctor.doctor_change_password')->with($data);
    }
    public function doctor_schedule_timings_submit(Request $request){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $validator = Validator::make($request->all(), [
            'duration' => 'required|max:100',
            'days' => 'required|max:100',
            'start_time' => 'required|max:5000',
            'end_time' => 'required|max:5000',
       ]);
       if ($validator->fails()){
            return redirect('doctor_schedule_timings/')->withErrors($validator)->withInput();
      }else{
         $where   = ['admin_id'=>$id];
         $day = $request->input('days');
         $start_time = json_encode($request->input('start_time'));
         $end_time   = json_encode($request->input('end_time'));
         if($day=='sunday'){
            $update = ['sunday_start_time'=>$start_time,'sunday_end_time'=>$end_time];
         }elseif($day=='monday'){
            $update = ['monday_start_time'=>$start_time,'monday_end_time'=>$end_time];
         }elseif($day=='tuesday'){
            $update = ['tuesday_start_time'=>$start_time,'tuesday_end_time'=>$end_time];
         }elseif($day=='wednesday'){
            $update = ['wednesday_start_time'=>$start_time,'wednesday_end_time'=>$end_time];
         }elseif($day=='thursday'){
            $update = ['thursday_start_time'=>$start_time,'thursday_end_time'=>$end_time];
         }elseif($day=='friday'){
            $update = ['friday_start_time'=>$start_time,'friday_end_time'=>$end_time];
         }elseif($day=='saturday'){
            $update = ['saturday_start_time'=>$start_time,'saturday_end_time'=>$end_time];
         }else{
           return redirect('/doctor_schedule_timings')->with('failure', 'Schedule Updation Failed Try Again'); 
         }
         $status  = DB::table('profile_details')->where($where)->update($update);
         return redirect('/doctor_schedule_timings')->with('success', 'Schedule has been updated successfully'); 

       }
    }
    public function doctor_change_password_submit(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|max:100',
            'new_password' => 'required|max:100',
            'confirm_password' => 'required|max:100',
        ]);
        if ($validator->fails()){
            return redirect('doctor_change_password')->withErrors($validator)->withInput();
        }else{
            $old_password      = $request->input('old_password');
            $new_password      = $request->input('new_password');
            $confirm_password  = $request->input('confirm_password');
            $agent             =  DB::select("select * from admin where id='$id' and password='$old_password'");
            if($new_password!=$confirm_password){
                 return redirect('doctor_change_password')->with('failure', 'New Password And Confirm Password Mismatch'); 
            }elseif(empty($agent)){
                 return redirect('doctor_change_password')->with('failure', 'Please Enter Valid Old Password'); 
            }else{
               $status = DB::table('admin')->where('id', $id)->update(array('password'=>$new_password));
               if($status){
                    return redirect('doctor_change_password')->with('success', 'Password has been Changed Successfully'); 
               }else{
                    return redirect('doctor_change_password')->with('failure', 'Some Problem Occured Try again'); 
               }
            }
        }
    }
    private function check_profile_by_doctor_id($id=null){
          $list    = DB::select("select * from profile_details where admin_id='$id'");
          if(empty($list)){
             return $list;
          }else{
            return true;
          }
    }

}