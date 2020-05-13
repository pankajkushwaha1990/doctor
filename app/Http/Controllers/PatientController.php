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
    public function patient_dashboard(Request $request){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $appointment =    DB::select("select *,appointment_booked.id as id,appointment_booked.status as status from admin left join profile_details on profile_details.admin_id=admin.id join appointment_booked on doctor_id=admin.id  where patient_id='$id' order by appointment_date asc,appointment_slot asc");
      $data       = array('session'=>$session,'appointment_booked'=>$appointment);
      return view('patient.dashboard')->with($data);
    }

    public function patient_appointments_checkout_status(Request $request,$status=null,$amenities_id=null){
      $amenities_id = base64_decode($amenities_id);
      $status1   = DB::table('appointment_booked')->where('id', $amenities_id)->update(array('status'=>$status));
      return redirect('/patient_dashboard')->with('success', 'Cancled Successfully'); 
    }


}