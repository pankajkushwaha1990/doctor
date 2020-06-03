<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;

class PatientController extends Controller{   
    public function __construct(){
        $this->middleware(function ($request, $next) {
          if($request->session()->get('member') == NULL){
               return redirect('login');
          }elseif($request->session()->get('member')->type!='patient'){
               return redirect('login');
          }else{
              if(empty($request->session()->get('member')->city)){
                return redirect('patient_profile_setting');
              }
              return $next($request);
          }
        });
    }

    public function patient_change_password_submit(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|max:100',
            'new_password' => 'required|max:100',
            'confirm_password' => 'required|max:100',
        ]);
        if ($validator->fails()){
            return redirect('patient_change_password')->withErrors($validator)->withInput();
        }else{
            $old_password      = $request->input('old_password');
            $new_password      = $request->input('new_password');
            $confirm_password  = $request->input('confirm_password');
            $agent             =  DB::select("select * from admin where id='$id' and password='$old_password'");
            if($new_password!=$confirm_password){
                 return redirect('patient_change_password')->with('failure', 'New Password And Confirm Password Mismatch'); 
            }elseif(empty($agent)){
                 return redirect('patient_change_password')->with('failure', 'Please Enter Valid Old Password'); 
            }else{
               $status = DB::table('admin')->where('id', $id)->update(array('password'=>$new_password));
               if($status){
                    return redirect('patient_change_password')->with('success', 'Password has been Changed Successfully'); 
               }else{
                    return redirect('patient_change_password')->with('failure', 'Some Problem Occured Try again'); 
               }
            }
        }
    }

    public function patient_change_password(Request $request){
       $session = $request->session()->get('member');
       $id      = $session->id;
       $list    =    DB::select("select * from admin where id='$id' and type='patient'");
       $data    = array('session'=>$session,'list'=>$list);
       return view('patient.patient_change_password')->with($data);
    }
    public function patient_dashboard(Request $request){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $today   = date('Y-m-d');
      $appointment =    DB::select("select *,admin.id as doc_id,appointment_booked.id as id,appointment_booked.status as status from admin left join profile_details on profile_details.admin_id=admin.id join appointment_booked on doctor_id=admin.id  where patient_id='$id' and appointment_date>='$today' and appointment_booked.status='1' and appointment_status='0' order by appointment_date asc,appointment_slot asc");

      $appointment_rebook =    DB::select("select *,admin.id as doc_id,appointment_booked.id as id,appointment_booked.status as status from admin left join profile_details on profile_details.admin_id=admin.id join appointment_booked on doctor_id=admin.id  where patient_id='$id' and appointment_booked.status='1' and appointment_status='2'  order by appointment_date asc,appointment_slot asc");

      $data       = array('session'=>$session,'appointment_booked'=>$appointment,'appointment_rebook'=>$appointment_rebook);
      return view('patient.dashboard')->with($data);
    }

    public function patient_my_appointment(Request $request){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $today   = date('Y-m-d');
      $appointment =    DB::select("select *,admin.id as doc_id,appointment_booked.id as id,appointment_booked.status as status from admin left join profile_details on profile_details.admin_id=admin.id join appointment_booked on doctor_id=admin.id  where patient_id='$id' order by appointment_date asc,appointment_slot asc");
      $data       = array('session'=>$session,'appointment_booked'=>$appointment);
      return view('patient.dashboard')->with($data);
    }

    private function family_details($name=null,$gender=null,$relation=null,$dob=null){
       $name  = json_decode($name,true);
    }

    public function patient_member(Request $request){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $today   = date('Y-m-d');
      $member_list =    DB::select("select * from admin where type='patient' and id='$id'");
      if(!empty($member_list)){
        foreach ($member_list as $key => $value) {
          $value->family_details = $this->family_details($value->family_name,$value->family_gender,$value->family_relation,$value->family_dob);
        }
      }

      echo "<pre>";
      print_r($member_list);
      $data       = array('session'=>$session,'member_list'=>$member_list);
      return view('patient.patient_member')->with($data);
    }

    public function patient_appointments_checkout_status(Request $request,$status=null,$amenities_id=null){
      $amenities_id = base64_decode($amenities_id);
      $status1   = DB::table('appointment_booked')->where('id', $amenities_id)->update(array('status'=>$status));
      return redirect('/patient_dashboard')->with('success', 'Cancled Successfully'); 
    }


}