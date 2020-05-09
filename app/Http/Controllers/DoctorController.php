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
          }elseif($request->session()->get('member')->type!='doctor'){
               return redirect('login');
          }else{
              $id = $request->session()->get('member')->id;
              $check_profile = $this->check_profile_by_doctor_id($id);
              if(empty($check_profile)){
                return redirect('doctor_profile_setting');
              }
              return $next($request);
          }
        });
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
       $id      = $session->id;       
       $today   = date('Y-m-d');   
       $condition = ['appointment_date'=>date('Y-m-d'),'doctor_id'=>$id];
       $all_patient_count         = DB::table('appointment_booked')->where('doctor_id', '=',$id)->count();           
       $today_patient_count       = DB::table('appointment_booked')->where($condition)->count(); 
       $today_appointment_count   = DB::table('appointment_booked')->where($condition)->count();
       $todat_appointment         = DB::select("select *,appointment_booked.id as app_id from appointment_booked join admin on admin.id=appointment_booked.patient_id where doctor_id='$id' and appointment_date='$today'");

       $data       = array('session'=>$session,'all_patient_count'=>$all_patient_count,'today_patient_count'=>$today_patient_count,'today_appointment_count'=>$today_appointment_count,'appointment_booked'=>$todat_appointment);
       return view('doctor.dashboard')->with($data);
    }
    public function doctor_appointments(Request $request){
       $session = $request->session()->get('member');
       $id      = $session->id;
       $appointment =    DB::select("select *,admin.id as id,appointment_booked.id as app_id from appointment_booked left join admin on appointment_booked.patient_id=admin.id where doctor_id='$id' and appointment_status<2 order by appointment_date asc,appointment_slot asc");
       $data       = array('session'=>$session,'appointment_booked'=>$appointment);
       return view('doctor.doctor_appointments')->with($data);
    }
    public function doctor_patients(Request $request){
       $session = $request->session()->get('member');
       $id      = $session->id;
       $list    =    DB::select("select * from admin where id='$id' and type='doctor'");
       $data    = array('session'=>$session,'list'=>$list);
       return view('doctor.doctor_patients')->with($data);
    }
    public function doctor_schedule_timings(Request $request){
       $session = $request->session()->get('member');
       $id      = $session->id;
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