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

    private function family_appointment($id=null,$name=null){
       return DB::select("select count(id) as total from appointment_booked where patient_id='$id' and patient_name='$name'");
    }

    public function patient_member_history(Request $request,$name=null){
       $session = $request->session()->get('member');
       $id      = $session->id;
       $list    = DB::select("select *,appointment_booked.id as id,admin.id as doc_id,appointment_booked.status as status,appointment_booked.created_at as created_at from appointment_booked join admin on admin.id=appointment_booked.doctor_id where patient_id='$id' and patient_name='$name' order by appointment_date asc,appointment_slot asc");
       $data    = ['session'=>$session,'list'=>$list];
       return view('patient.patient_member_history')->with($data);

    }

    public function patient_member(Request $request){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $today   = date('Y-m-d');
      $member_list =    DB::select("select * from admin where type='patient' and id='$id'");
      if(!empty($member_list)){
        foreach ($member_list as $key => $value) {
          $family_name     = json_decode($value->family_name,true);
          $family_relation = json_decode($value->family_relation,true);
          $family_dob      = json_decode($value->family_dob,true);
          $family_gender   = json_decode($value->family_gender,true);
          foreach ($family_name as $key => $value2) {
            $asd = $this->family_appointment($id,$value2);
            $value->family_appointment[] = ['name'=>$family_name[$key],'family_relation'=>$family_relation[$key],'family_dob'=>$family_dob[$key],'family_gender'=>$family_gender[$key],'appointment'=>$asd[0]->total];
          }

        }
      }

      $data       = array('session'=>$session,'member_list'=>$member_list[0]);
      return view('patient.patient_member')->with($data);
    }

    public function patient_appointments_checkout_status(Request $request,$status=null,$amenities_id=null){
      $amenities_id = base64_decode($amenities_id);
      $status1   = DB::table('appointment_booked')->where('id', $amenities_id)->update(array('status'=>$status));
      return redirect('/patient_dashboard')->with('success', 'Cancled Successfully'); 
    }


}