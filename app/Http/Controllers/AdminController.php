<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller{   
    public function __construct(){
        $this->middleware(function ($request, $next) {
          if($request->session()->get('member') == NULL && $request->session()->get('member')->type!='admin'){
               return redirect('admin_login');
          }else{
              return $next($request);
          }
        });
    }
    public function dashboard(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $today   = date('Y-m-d');
        if($session->type=='admin'){
            $doctor_count   =      DB::table('admin')->where('type', '=','doctor')->count();           
            $patient_count   =     DB::table('admin')->where('type', '=','patient')->count();           
            $appointment_count   = DB::table('appointment_booked')->where('id', '!=','0')->count();           
        }else{

        }       
        $data       = array('doctor_count'=>$doctor_count,'session'=>$session,'patient_count'=>$patient_count,'appointment_count'=>$appointment_count);
        return view('admin.dashboard')->with($data);
    }
    public function my_profile_view(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        if($session->type=='admin'){
            $list     =    DB::select("select * from admin where id='$id'");
        }else{

        }
        $list       = empty($list)?[]:$list;
        $data       = array('session'=>$session,'list'=>$list);
        return view('admin.my_profile_view')->with($data);
    }
    public function doctors_list(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        if($session->type=='admin'){
            $list     =    DB::select("select *,admin.id as id from admin left join profile_details on profile_details.admin_id=admin.id where type='doctor' order by created_at desc");
        }else{

        }
        $list       = empty($list)?[]:$list;
        $data       = array('session'=>$session,'list'=>$list);
        return view('admin.doctors_list')->with($data);
    }
    public function patients_list(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        if($session->type=='admin'){
            $list     =    DB::select("select * from admin where type='patient'");
        }else{

        }
        $list       = empty($list)?[]:$list;
        $data       = array('session'=>$session,'list'=>$list);
        return view('admin.patients_list')->with($data);
    }
    public function admin_patient_change_status(Request $request,$status=null,$ids=null){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $ids     = base64_decode($ids);
      if($session->type=='admin'){
           $status   = DB::table('admin')->where('id', $ids)->update(array('status'=>$status));
      }else{
           $status   = DB::table('admin')->where('id', $ids)->update(array('status'=>$status));
      }    
      return redirect('/admin_patients_list')->with('success', 'Status Changed Successfully'); 
    }
    public function admin_doctor_change_status(Request $request,$status=null,$ids=null){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $ids     = base64_decode($ids);
      if($session->type=='admin'){
           $status   = DB::table('admin')->where('id', $ids)->update(array('status'=>$status));
      }else{
           $status   = DB::table('admin')->where('id', $ids)->update(array('status'=>$status));
      }    
      return redirect('/admin_doctors_list')->with('success', 'Status Changed Successfully'); 
    }

    public function admin_doctor_change_premium_status(Request $request,$status=null,$ids=null){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $ids     = base64_decode($ids);
      if($session->type=='admin'){
           $status   = DB::table('admin')->where('id', $ids)->update(array('premenum_status'=>$status));
      }else{
           $status   = DB::table('admin')->where('id', $ids)->update(array('premenum_status'=>$status));
      }    
      return redirect('/admin_doctors_list')->with('success', 'Preminum Status Changed Successfully'); 
    }
















    private function amenities_id_to_list($amenities_id){
            $amenities_id       =   implode(",",json_decode($amenities_id));
            $amenities_list     =    DB::select("select * from amenities where id in($amenities_id)");
            if($amenities_list){
              return $amenities_list;
            }else{
              return [];
            }
    }
    private function flight_id_to_list($flight_id){
            $flight_id       =   implode(",",json_decode($flight_id));
            $flight_list     =    DB::select("select * from flights where id in($flight_id)");
            if($flight_list){
              return $flight_list;
            }else{
              return [];
            }
    }
    private function itinerary_list_from_package_id($package_id){
            $itinerary_list     =    DB::select("select * from package_itinerary where package_id='$package_id'");
            if($itinerary_list){
              return $itinerary_list;
            }else{
              return [];
            }
    }
    public function package_list(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        if($session->type=='admin'){
            $package_list     =    DB::select("select * from package");
        }elseif($session->type=='employee'){
            $package_list     =     DB::table('admin')->where('type', '!=','admin')->orderByRaw('id DESC')->get();
        }else{
            $package_list     =     DB::table('admin')->where('id', '=',$id)->orderByRaw('id DESC')->get();
        }
        if(!empty($package_list)){
          foreach ($package_list as $key => $packages) {
             $packages->amenities = $this->amenities_id_to_list($packages->amenities_list);
             $packages->flights   = $this->flight_id_to_list($packages->flight_list);
             $packages->itinerary = $this->itinerary_list_from_package_id($packages->id);
          }
        }
        $data       = array('session'=>$session,'package_list'=>$package_list);
        return view('admin.package_list')->with($data);
    }
    public function package_create(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $amenities_list      =    DB::select("select * from amenities where status='1'");
        $flights_list        =    DB::select("select * from flights where status='1'");
        $data       = array('session'=>$session,'amenities_list'=>$amenities_list,'flights_list'=>$flights_list);
        return view('admin.package_create')->with($data);
    }
    public function amenities_list(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        if($session->type=='admin'){
            $amenities_list     =    DB::select("select * from amenities");
        }elseif($session->type=='employee'){
            $amenities_list     =     DB::table('admin')->where('type', '!=','admin')->orderByRaw('id DESC')->get();
        }else{
            $amenities_list     =     DB::table('admin')->where('id', '=',$id)->orderByRaw('id DESC')->get();
        }
        $data       = array('session'=>$session,'amenities_list'=>$amenities_list);
        return view('admin.amenities_list')->with($data);
    }
    public function amenities_create(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $data       = array('session'=>$session);
        return view('admin.amenities_create')->with($data);
    }
    public function amenities_create_submit(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;

         $validator = Validator::make($request->all(), [
            'amenities_name' => 'required|max:100',
            'amenities_image' => 'required|max:100',
            'amenities_description' => 'required|max:50',
        ]);
        if ($validator->fails()){
            return redirect('amenities-create')->withErrors($validator)->withInput();
        }else{

          if($request->hasFile('amenities_image')){
              $image = $request->file('amenities_image');
              $filename = str_replace(' ','_',time().'_amenities_'.$image->getClientOriginalName());
              $image->move(public_path('amenities_image'), $filename); 
              $amenities_image = $filename;
          }else{
              $amenities_image = "";
          }

          $amenities = array(
                'amenities_name' => $request->input('amenities_name'),
                'amenities_logo'=> $amenities_image,
                'amenities_description'=> $request->input('amenities_description'),
                'status'=> 1,
                'created_by_id'=> $id
          );

          $status = DB::table('amenities')->insert($amenities);
          if(!empty($status)){
             return redirect('/amenities-list')->with('success', 'Amenities has been added successfully');
          }else{
             return redirect('/amenities-list')->with('failure', 'Some Problem Occured Try Again');
          }
        } 
    }
    public function amenities_change_status(Request $request,$status=null,$amenities_id=null){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $amenities_id = base64_decode($amenities_id);
      if($session->type=='admin'){
           $status   = DB::table('amenities')->where('id', $amenities_id)->update(array('status'=>$status));
      }else{
           $status   = DB::table('amenities')->where('id', $amenities_id)->update(array('status'=>$status));
      }    
      return redirect('/amenities-list')->with('success', 'Status Changed Successfully'); 
    }
    public function amenities_edit(Request $request,$id){
        $session = $request->session()->get('member');
        if($session->type=='admin'){
            $amenities          =     DB::table('amenities')->where('id', '=',base64_decode($id))->first();
        }else{
            $amenities           =     DB::table('amenities')->where('updated_at', '=',$id)->first();
        }
        $data     = array('amenities'=>$amenities,'session'=>$session);
        return view('admin.amenities_edit')->with($data);
    }
    public function amenities_edit_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'amenities_name' => 'required|max:100',
            'amenities_image_old' => 'required|max:100',
            'amenities_description' => 'required|max:50',
        ]);

        $amenities_id = $request->get('amenities_id');
        if ($validator->fails()){
            return redirect('amenities-edit/'.base64_encode($amenities_id))->withErrors($validator)->withInput();
        }else{
            if($request->hasFile('amenities_image')){
               $image = $request->file('amenities_image');
               $filename = str_replace(' ','_',time().'_amenities_'.$image->getClientOriginalName());
               $image->move(public_path('amenities_image'), $filename); 
               $amenities_image= $filename;
            }else{
                $amenities_image= $request->get('amenities_image_old');
            }

            $update = array(
                  'amenities_name' => $request->input('amenities_name'),
                  'amenities_logo'=> $amenities_image,
                  'amenities_description'=> $request->input('amenities_description'),
            );
            $status = DB::table('amenities')->where('id', $amenities_id)->update($update);
            if(!empty($status)){
              return redirect('/amenities-list')->with('success', 'Amenities has been updated successfully'); 
            }else{
              return redirect('/amenities-list')->with('failure', 'Some Problem Occured Try Again'); 
            }
           
        }
    }
    public function amenities_delete(Request $request,$id){
      $status = DB::table('amenities')->where('id', base64_decode($id))->delete();
      if(!empty($status)){
        return redirect('/amenities-list')->with('success', 'Amenities Deleted Successfully'); 
      }else{
        return redirect('/amenities-list')->with('failure', 'Some Problem Occured Try Again'); 
      }
    }
    public function flight_list(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        if($session->type=='admin'){
            $flights_list     =    DB::select("select * from flights");
        }elseif($session->type=='employee'){
            $flights_list     =     DB::table('admin')->where('type', '!=','admin')->orderByRaw('id DESC')->get();
        }else{
            $flights_list     =     DB::table('admin')->where('id', '=',$id)->orderByRaw('id DESC')->get();
        }
        $data       = array('session'=>$session,'flights_list'=>$flights_list);
        return view('admin.flights_list')->with($data);
    }
    public function flight_create(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $data       = array('session'=>$session);
        return view('admin.flight_create')->with($data);
    }
    public function flight_create_submit(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;

         $validator = Validator::make($request->all(), [
            'flight_name' => 'required|max:100',
            'flight_image' => 'required|max:100',
            'flight_description' => 'required|max:50',
        ]);
        if ($validator->fails()){
            return redirect('flight-create')->withErrors($validator)->withInput();
        }else{

          if($request->hasFile('flight_image')){
              $image = $request->file('flight_image');
              $filename = str_replace(' ','_',time().'_flight_'.$image->getClientOriginalName());
              $image->move(public_path('flights_image'), $filename); 
              $flight_image = $filename;
          }else{
              $flight_image = "";
          }

          $amenities = array(
                'flight_name' => $request->input('flight_name'),
                'flight_logo'=> $flight_image,
                'flight_description'=> $request->input('flight_description'),
                'status'=> 1,
                'created_by_id'=> $id
          );

          $status = DB::table('flights')->insert($amenities);
          if(!empty($status)){
             return redirect('/flight-list')->with('success', 'Flight has been added successfully');
          }else{
             return redirect('/flight-list')->with('failure', 'Some Problem Occured Try Again');
          }
        } 
    }
    public function flight_change_status(Request $request,$status=null,$id=null){
      $session = $request->session()->get('member');
      $id = base64_decode($id);
      if($session->type=='admin'){
           $status   = DB::table('flights')->where('id', $id)->update(array('status'=>$status));
      }else{
           $status   = DB::table('flights')->where('id', $id)->update(array('status'=>$status));
      }    
      return redirect('/flight-list')->with('success', 'Status Changed Successfully'); 
    }
    public function flight_edit(Request $request,$id){
        $session = $request->session()->get('member');
        if($session->type=='admin'){
            $flight          =     DB::table('flights')->where('id', '=',base64_decode($id))->first();
        }else{
            $flight           =     DB::table('flights')->where('updated_at', '=',$id)->first();
        }
        $data     = array('flight'=>$flight,'session'=>$session);
        return view('admin.flight_edit')->with($data);
    }
    public function flight_edit_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'flight_name' => 'required|max:100',
            'flight_image_old' => 'required|max:100',
            'flight_description' => 'required|max:50',
        ]);

        $flight_id = $request->get('flight_id');
        if ($validator->fails()){
            return redirect('flight-edit/'.base64_encode($flight_id))->withErrors($validator)->withInput();
        }else{
            if($request->hasFile('flight_image')){
               $image = $request->file('flight_image');
               $filename = str_replace(' ','_',time().'_flight_'.$image->getClientOriginalName());
               $image->move(public_path('flights_image'), $filename); 
               $image= $filename;
            }else{
                $image= $request->get('flight_image_old');
            }

            $update = array(
                  'flight_name' => $request->input('flight_name'),
                  'flight_logo'=> $image,
                  'flight_description'=> $request->input('flight_description'),
            );
            $status = DB::table('flights')->where('id', $flight_id)->update($update);
            if(!empty($status)){
              return redirect('/flight-list')->with('success', 'Flight has been updated successfully'); 
            }else{
              return redirect('/flight-list')->with('failure', 'Some Problem Occured Try Again'); 
            }
           
        }
    }
    public function flight_delete(Request $request,$id){
      $status = DB::table('flights')->where('id', base64_decode($id))->delete();
      if(!empty($status)){
        return redirect('/flight-list')->with('success', 'Flight Deleted Successfully'); 
      }else{
        return redirect('/flight-list')->with('failure', 'Some Problem Occured Try Again'); 
      }
    }
    public function package_create_submit(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $validator = Validator::make($request->all(), [
            'package_name' => 'required|max:100',
            'package_day' => 'required|max:100',
            'package_night' => 'required|max:50',
        ]);
        if ($validator->fails()){
            return redirect('package-create')->withErrors($validator)->withInput();
        }else{
            $package_name             = $request->get('package_name');
            $package_day              = $request->get('package_day');
            $package_night            = $request->get('package_night');
            $package_cost             = $request->get('package_cost');
            $package_purchase_limit   = $request->get('package_purchase_limit');
            $hotel_category           = $request->get('hotel_category');
            $package_description      = $request->get('package_description');
            $package_term_condition   = $request->get('package_term_condition');
            $amenities_list           = json_encode($request->get('amenities_list'));
            $flights_list             = json_encode($request->get('flights_list'));
            $package_image_title      = json_encode($request->get('package_image_title'));
            $package_image_description= json_encode($request->get('package_image_description'));
            $flights_list             = json_encode($request->get('flights_list'));
            $images                   = [];
            if($request->hasfile('package_image')){
             foreach($request->file('package_image') as $image){
               $filename = str_replace(' ','_',time().'_amenities_'.$image->getClientOriginalName());
               $image->move(public_path('packages_image'), $filename);  
               $images[] = $filename;  
              }
            }

            $package_insert[]         = array(
                                              'package_name'=>$package_name,
                                              'package_days'=>$package_day,
                                              'package_night'=>$package_night,
                                              'package_cost'=>$package_cost,
                                              'amenities_list'=>$amenities_list,
                                              'package_purchase_limit'=>$package_purchase_limit,
                                              'package_image_title'=>$package_image_title,
                                              'package_image_description'=>$package_image_description,
                                              'package_image'=>json_encode($images),
                                              'hotel_category'=>$hotel_category,
                                              'flight_list'=>$flights_list,
                                              'package_description'=>$package_description,
                                              'terms_conditions'=>$package_term_condition,
                                              'created_by_id'=>$id,
                                            );
            $package_status = DB::table('package')->insert($package_insert);
            if($package_status){
              $package_id = DB::getPdo()->lastInsertId();
              $iternity_title           = $request->get('iternity_title');
              $iternity_description     = $request->get('iternity_description');
              $iternity_cost            = $request->get('iternity_cost');
              $iternity_default_status  = $request->get('iternity_default_status');
              $iternity_insert           = [];
              if(!empty($iternity_title) && count($iternity_title)>0){
                $total_iternity         =  count($iternity_title);
                for($p=0;$p<$total_iternity;$p++){
                  $iternity_insert[] = array(
                                              'itinerary_title'=>$iternity_title[$p],
                                              'itinerary_description'=>$iternity_description[$p],
                                              'itinerary_cost'=>$iternity_cost[$p],
                                              'itinerary_default_status'=>$iternity_default_status[$p],
                                              'package_id'=>$package_id
                                       );
                }
               DB::table('package_itinerary')->insert($iternity_insert);
              }
            }


            if(!empty($package_status)){
              return redirect('/package-list')->with('success', 'Package has been updated successfully'); 
            }else{
              return redirect('/package-list')->with('failure', 'Some Problem Occured Try Again'); 
            }
          }
    }
    public function coupon_list(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        if($session->type=='admin'){
            $coupons_list     =    DB::select("select * from coupons");
        }elseif($session->type=='employee'){
            $coupons_list     =     DB::table('admin')->where('type', '!=','admin')->orderByRaw('id DESC')->get();
        }else{
            $coupons_list     =     DB::table('admin')->where('id', '=',$id)->orderByRaw('id DESC')->get();
        }
        $data       = array('session'=>$session,'coupons_list'=>$coupons_list);
        return view('admin.coupons_list')->with($data);
    }
    public function coupons_change_status(Request $request,$status=null,$coupon_id=null){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $coupon_id = base64_decode($coupon_id);
      if($session->type=='admin'){
           $status   = DB::table('coupons')->where('id', $coupon_id)->update(array('status'=>$status));
      }else{
           $status   = DB::table('coupons')->where('id', $coupon_id)->update(array('status'=>$status));
      }    
      return redirect('/coupon-list')->with('success', 'Status Changed Successfully'); 
    }
    public function coupons_edit(Request $request,$id){
        $session = $request->session()->get('member');
        if($session->type=='admin'){
            $coupon          =     DB::table('coupons')->where('id', '=',base64_decode($id))->first();
        }else{
            $coupon           =     DB::table('coupons')->where('updated_at', '=',$id)->first();
        }
        $data     = array('coupon'=>$coupon,'session'=>$session);
        return view('admin.coupons_edit')->with($data);
    }
    public function coupon_edit_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'coupon_name' => 'required|max:100',
            'coupon_code' => 'required|max:100',
            'coupon_type' => 'required|max:50',
        ]);

        $coupon_id = $request->get('coupon_id');
        if ($validator->fails()){
            return redirect('amenities-edit/'.base64_encode($coupon_id))->withErrors($validator)->withInput();
        }else{
            $update = array(
                  'coupon_name' => $request->input('coupon_name'),
                  'coupon_type'=> $request->input('coupon_type'),
                  'coupon_code'=> $request->input('coupon_code'),
                  'coupon_value'=> $request->input('coupon_value'),
                  'coupon_limit'=> $request->input('coupon_limit'),
            );
            $status = DB::table('coupons')->where('id', $coupon_id)->update($update);
            if(!empty($status)){
              return redirect('/coupon-list')->with('success', 'Coupon has been updated successfully'); 
            }else{
              return redirect('/coupon-list')->with('failure', 'Some Problem Occured Try Again'); 
            }
           
        }
    }
    public function coupons_delete(Request $request,$id){
      $status = DB::table('coupons')->where('id', base64_decode($id))->delete();
      if(!empty($status)){
        return redirect('/coupon-list')->with('success', 'Coupon Deleted Successfully'); 
      }else{
        return redirect('/coupon-list')->with('failure', 'Some Problem Occured Try Again'); 
      }
    }
    public function coupons_create(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $data       = array('session'=>$session);
        return view('admin.coupons_create')->with($data);
    }
    public function coupon_create_submit(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $validator = Validator::make($request->all(), [
            'coupon_name' => 'required|max:100',
            'coupon_code' => 'required|max:100',
            'coupon_type' => 'required|max:50',
        ]);
        if ($validator->fails()){
            return redirect('coupons-create/')->withErrors($validator)->withInput();
        }else{
            $update = array(
                  'coupon_name' => $request->input('coupon_name'),
                  'coupon_type'=> $request->input('coupon_type'),
                  'coupon_code'=> $request->input('coupon_code'),
                  'coupon_value'=> $request->input('coupon_value'),
                  'coupon_limit'=> $request->input('coupon_limit'),
                  'status'=>1,
                  'created_by_id'=>$id,
            );
            $status = DB::table('coupons')->insert($update);
            if(!empty($status)){
              return redirect('/coupon-list')->with('success', 'Coupon has been Created successfully'); 
            }else{
              return redirect('/coupon-list')->with('failure', 'Some Problem Occured Try Again'); 
            }
           
        }
    }
    public function users_list(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        if($session->type=='admin'){
            $users_list     =    DB::select("select * from admin where type='user'");
        }elseif($session->type=='employee'){
            $users_list     =     DB::table('admin')->where('type', '!=','admin')->orderByRaw('id DESC')->get();
        }else{
            $users_list     =     DB::table('admin')->where('id', '=',$id)->orderByRaw('id DESC')->get();
        }
        $data       = array('session'=>$session,'users_list'=>$users_list);
        return view('admin.users_list')->with($data);
    }
    public function user_create(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $data       = array('session'=>$session);
        return view('admin.user_create')->with($data);
    }
    public function user_create_submit(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|max:100',
            'user_mobile' => 'required|max:100',
            'user_mobile_otp' => 'required|max:50',
            'user_password' => 'required|max:50',
            'user_email' => 'required|max:50',
            'user_email_otp' => 'required|max:50',
            'user_city' => 'required|max:50',
            'user_state' => 'required|max:50',
        ]);
        if ($validator->fails()){
            return redirect('user-create')->withErrors($validator)->withInput();
        }else{

          if($request->hasFile('user_adhaar_file')){
              $image = $request->file('user_adhaar_file');
              $filename = str_replace(' ','_',time().'_adhaar_'.$image->getClientOriginalName());
              $image->move(public_path('user_adhaar_files'), $filename); 
              $user_adhaar_file = $filename;
          }else{
              $user_adhaar_file = "";
          }

          if($request->hasFile('user_pan_file')){
              $image = $request->file('user_pan_file');
              $filename = str_replace(' ','_',time().'_pan_'.$image->getClientOriginalName());
              $image->move(public_path('user_pan_files'), $filename); 
              $user_pan_file = $filename;
          }else{
              $user_pan_file = "";
          }

          if($request->hasFile('user_passport_file')){
              $image = $request->file('user_passport_file');
              $filename = str_replace(' ','_',time().'_passport_'.$image->getClientOriginalName());
              $image->move(public_path('user_passport_files'), $filename); 
              $user_passport_file = $filename;
          }else{
              $user_passport_file = "";
          }

          $user = array(
                'name' => $request->input('user_name'),
                'email' => $request->input('user_email'),
                'email_otp' => $request->input('user_email_otp'),
                'password' => $request->input('user_password'),
                'city' => $request->input('user_city'),
                'state' => $request->input('user_state'),
                'country' => 'india',
                'email_verify' => 1,
                'passport_file' => $user_passport_file,
                'pan_file' => $user_pan_file,
                'adhaar_file' => $user_adhaar_file,
                'type' => 'user',
                'status'=> 1,
                'mobile' => $request->input('user_mobile'),
                'mobile_otp' => $request->input('user_mobile_otp'),
                'created_by'=> $id
          );

          $status = DB::table('admin')->insert($user);
          if(!empty($status)){
             return redirect('/users-list')->with('success', 'User has been added successfully');
          }else{
             return redirect('/users-list')->with('failure', 'Some Problem Occured Try Again');
          }
        } 
    }
    public function user_change_status(Request $request,$status=null,$ids=null){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $ids     = base64_decode($ids);
      if($session->type=='admin'){
           $status   = DB::table('admin')->where('id', $ids)->update(array('status'=>$status));
      }else{
           $status   = DB::table('admin')->where('id', $ids)->update(array('status'=>$status));
      }    
      return redirect('/users-list')->with('success', 'Status Changed Successfully'); 
    }
    public function user_package_create(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        if($session->type=='admin'){
            $users_list     =    DB::select("select * from admin where type='user' and status='1'");
            $packages_list  =    DB::select("select * from package where status='1'");
            $coupon_list    =    DB::select("select * from coupons where status='1'");
        }else{
            $users_list     =     DB::table('coupons')->where('updated_at', '=',$id)->first();
        }
        $data       = array('session'=>$session,'users_list'=>$users_list,'packages_list'=>$packages_list,'coupon_list'=>$coupon_list);
        return view('admin.user_package_create')->with($data);
    }
    public function package_change_status(Request $request,$status=null,$ids=null){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $ids     = base64_decode($ids);
      if($session->type=='admin'){
           $status   = DB::table('package')->where('id', $ids)->update(array('status'=>$status));
      }else{
           $status   = DB::table('package')->where('id', $ids)->update(array('status'=>$status));
      }    
      return redirect('/package-list')->with('success', 'Status Changed Successfully'); 
    }
    public function ajax_user_details_by_id(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $user_details = [];
        if($session->type=='admin'){
            $condition = array('id'=>$request->get('user_id'));
            $user_details     = DB::table('admin')->where($condition)->first();
        }elseif($session->type=='employee'){
            $user_details     =     DB::table('admin')->where('type', '!=','admin')->orderByRaw('id DESC')->get();
        }else{
            $user_details     =     DB::table('admin')->where('id', '=',$id)->orderByRaw('id DESC')->get();
        }
        unset($user_details->password);
        echo json_encode($user_details);
    }
    public function ajax_package_details_by_id(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        if($session->type=='admin'){
            $package_id = $request->get('package_id');
            $package_list     =    DB::select("select * from package where id='$package_id'");
        }elseif($session->type=='employee'){
            $package_list     =     DB::table('admin')->where('type', '!=','admin')->orderByRaw('id DESC')->get();
        }else{
            $package_list     =     DB::table('admin')->where('id', '=',$id)->orderByRaw('id DESC')->get();
        }
        if(!empty($package_list)){
          foreach ($package_list as $key => $packages) {
             $packages->amenities = $this->amenities_id_to_list($packages->amenities_list);
             $packages->flights   = $this->flight_id_to_list($packages->flight_list);
             $packages->itinerary = $this->itinerary_list_from_package_id($packages->id);
          }
        }
        echo json_encode($package_list[0]);
    }
    public function user_package_create_submit(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|max:100',
            'package_id' => 'required|max:100',
            'package_cost' => 'required|max:100',
        ]);
        if ($validator->fails()){
            return redirect('user-package-create')->withErrors($validator)->withInput();
        }else{
          $all_itinery = $request->input('itinerary_add');
          $ids_costs   = [];
          foreach ($all_itinery as $key => $iternity) {
             $ids_costs[] = json_decode(base64_decode($iternity),true);
          }
          $iternity_details = $ids_costs;
          $booking = array(
                'user_id' => $request->input('user_id'),
                'package_id' => $request->input('package_id'),
                'coupon_code' => $request->input('coupon_code'),
                'itinerary_ids_costs' => json_encode($iternity_details),
                'package_cost' => $request->input('package_cost'),
                'created_by'=> $id,
                'package_status' => 1,
                'status' => 1,
                'ticket_file' => '',
                'insurance_file' => '',
                'cruise_ticket_file'=> '',
                'hotel_ticket' => '',
          );

          $status = DB::table('package_booked')->insert($booking);
          if(!empty($status)){
             return redirect('/user-booked-package-list')->with('success', 'Package has been added successfully');
          }else{
             return redirect('/user-booked-package-list')->with('failure', 'Some Problem Occured Try Again');
          }
        } 
    }
    public function user_booked_package_list(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;

        $booked_package_list     =    DB::select("select * from package_booked");
        if(!empty($booked_package_list)){
          foreach ($booked_package_list as $key => $booked_package) {
             $user_id                   = $booked_package->user_id;
             $package_id                = $booked_package->package_id;
             $itinerary_ids_costs       = $booked_package->itinerary_ids_costs;
             $coupon_code               = $booked_package->coupon_code;
             $package_list              =    DB::select("select * from package where id='$package_id'");
             foreach ($package_list as $key => $packages) {
               $packages->amenities = $this->amenities_id_to_list($packages->amenities_list);
               $packages->flights   = $this->flight_id_to_list($packages->flight_list);
               $packages->itinerary = $this->itinerary_list_from_package_id($packages->id);
             }
             $final_cost      =  [];
             $coupon_discount =  [];
             foreach (json_decode($itinerary_ids_costs) as $key => $itinerary) {
                  $final_cost[] = $itinerary;
             }
             if(!empty($coupon_code)){
               $coupon_discount[]             =    DB::select("select * from coupons where coupon_code='$coupon_code'")[0];
             }    
            $booked_package->user_details     =    DB::select("select * from admin where id='$user_id'")[0];
            $booked_package->package_details  =    $packages;
            $booked_package->final_cost       =    $final_cost;
            $booked_package->coupon_discount  =    $coupon_discount;
            $booked_package_lists[]           =    $booked_package;
          }
        }
        $data       = array('session'=>$session,'package_list'=>$booked_package_lists);
        return view('admin.user_booked_package_list')->with($data);
    }
    public function users_package_pay_pending_list(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;

        $booked_package_list     =    DB::select("select * from package_booked");
        if(!empty($booked_package_list)){
          foreach ($booked_package_list as $key => $booked_package) {
             $user_id                   = $booked_package->user_id;
             $package_id                = $booked_package->package_id;
             $itinerary_ids_costs       = $booked_package->itinerary_ids_costs;
             $coupon_code               = $booked_package->coupon_code;
             $package_list              =    DB::select("select * from package where id='$package_id'");
             foreach ($package_list as $key => $packages) {
               $packages->amenities = $this->amenities_id_to_list($packages->amenities_list);
               $packages->flights   = $this->flight_id_to_list($packages->flight_list);
               $packages->itinerary = $this->itinerary_list_from_package_id($packages->id);
             }

             $paid_amount_list              =    DB::select("select * from user_package_payment where user_id='$user_id' and package_id='$packages->id' order by paid_date asc");
             $user_paid                     =    0;
             foreach ($paid_amount_list as $key => $paid_amount) {
               $user_paid               += $paid_amount->paid_amount;
             }

             $final_cost      =  [];
             $coupon_discount =  [];
             foreach (json_decode($itinerary_ids_costs) as $key => $itinerary) {
                  $final_cost[] = $itinerary;
             }
             if(!empty($coupon_code)){
               $coupon_discount[]             =    DB::select("select * from coupons where coupon_code='$coupon_code'")[0];
             }    
            $booked_package->user_details     =    DB::select("select * from admin where id='$user_id'")[0];
            $booked_package->package_details  =    $packages;
            $booked_package->final_cost       =    $final_cost;
            $booked_package->coupon_discount  =    $coupon_discount;
            $booked_package->pending_amount   =   $booked_package->final_package_cost-$user_paid;
            $booked_package->paid_amount_history  =   $paid_amount_list;
            $booked_package_lists[]           =   $booked_package;
          }
        }
        $data       = array('session'=>$session,'package_list'=>$booked_package_lists);
        return view('admin.users_package_pay_pending_list')->with($data);
    }
    public function user_package_payment_create_submit(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|max:100',
            'package_id' => 'required|max:100',
            'user_paid_amount' => 'required|max:50',
            'payment_status' => 'required|max:50',
            'user_paid_date' => 'required|max:50',
            'payment_type' => 'required|max:50',
        ]);
        if ($validator->fails()){
            return redirect('users-package-pay-pending-list/')->withErrors($validator)->withInput();
        }else{
            $date = explode('/',$request->input('user_paid_date'));
            $update = array(
                  'user_id' => $request->input('user_id'),
                  'package_id'=> $request->input('package_id'),
                  'paid_amount'=> $request->input('user_paid_amount'),
                  'payment_status'=> $request->input('payment_status'),
                  'payment_type'=> $request->input('payment_type'),
                  'paid_date'=>$date[2]."-".$date[1]."-".$date[0],
                  'payment_description'=>$request->input('payment_description'),
                  'created_by'=>$id,
            );
            $status = DB::table('user_package_payment')->insert($update);
            if(!empty($status)){
              return redirect('/users-package-pay-pending-list')->with('success', 'Payment '.$request->input('user_paid_amount').' Accepted successfully'); 
            }else{
              return redirect('/users-package-pay-pending-list')->with('failure', 'Some Problem Occured Try Again'); 
            }
           
        }
    }
    public function purchased_package_report_list(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $booked_package_lists = [];
        $where   = 'where 1=1';
        if(!empty($request->get('package_id'))){
           $package_id = $request->get('package_id');
           $where .= " and package_id='$package_id'";
        }

        if(!empty($request->get('start_date'))){
          $start_date                 = explode("/",$request->get('start_date'));
          $start_date                 = $start_date[2]."-".$start_date[1]."-".$start_date[0];
          $where .= " and created_at>='$start_date'";

        }

        if(!empty($request->get('end_date'))){
          $end_date                 = explode("/",$request->get('end_date'));
          $end_date                 = $end_date[2]."-".$end_date[1]."-".$end_date[0];
          $where .= " and created_at<='$end_date'";
        }

        $booked_package_list     =    DB::select("select * from package_booked $where order by created_at desc");
        if(!empty($booked_package_list)){
          foreach ($booked_package_list as $key => $booked_package) {
             $user_id                   = $booked_package->user_id;
             $package_id                = $booked_package->package_id;
             $itinerary_ids_costs       = $booked_package->itinerary_ids_costs;
             $coupon_code               = $booked_package->coupon_code;
             $package_list              =    DB::select("select * from package where id='$package_id'");
             foreach ($package_list as $key => $packages) {
               $packages->amenities = $this->amenities_id_to_list($packages->amenities_list);
               $packages->flights   = $this->flight_id_to_list($packages->flight_list);
               $packages->itinerary = $this->itinerary_list_from_package_id($packages->id);
             }
             $final_cost      =  [];
             $coupon_discount =  [];
             foreach (json_decode($itinerary_ids_costs) as $key => $itinerary) {
                  $final_cost[] = $itinerary;
             }
            $paid_amount_list              =    DB::select("select * from user_package_payment where user_id='$user_id' and package_id='$packages->id' order by paid_date asc");
             $user_paid                     =    0;
             foreach ($paid_amount_list as $key => $paid_amount) {
               $user_paid               += $paid_amount->paid_amount;
             }
             if(!empty($coupon_code)){
               $coupon_discount[]             =    DB::select("select * from coupons where coupon_code='$coupon_code'")[0];
             }    
            $booked_package->user_details     =    DB::select("select * from admin where id='$user_id'")[0];
            $booked_package->package_details  =    $packages;
            $booked_package->final_cost       =    $final_cost;
            $booked_package->coupon_discount  =    $coupon_discount;
            $booked_package->pending_amount   =    $booked_package->final_package_cost-$user_paid;
            $booked_package_lists[]           =    $booked_package;
          }
        }
        $package_filter              =    DB::select("select * from package");
        $data       = array('session'=>$session,'package_list'=>$booked_package_lists,'package_filter'=>$package_filter);
        return view('admin.purchased_package_report_list')->with($data);
    }
    public function purchased_user_report_list(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $booked_package_lists = [];
        $where   = 'where 1=1';
        if(!empty($request->get('user_id'))){
           $user_id = $request->get('user_id');
           $where .= " and user_id='$user_id'";
        }

        if(!empty($request->get('start_date'))){
          $start_date                 = explode("/",$request->get('start_date'));
          $start_date                 = $start_date[2]."-".$start_date[1]."-".$start_date[0];
          $where .= " and created_at>='$start_date'";

        }

        if(!empty($request->get('end_date'))){
          $end_date                 = explode("/",$request->get('end_date'));
          $end_date                 = $end_date[2]."-".$end_date[1]."-".$end_date[0];
          $where .= " and created_at<='$end_date'";
        }

        $booked_package_list     =    DB::select("select * from package_booked $where order by created_at desc");
        if(!empty($booked_package_list)){
          foreach ($booked_package_list as $key => $booked_package) {
             $user_id                   = $booked_package->user_id;
             $package_id                = $booked_package->package_id;
             $itinerary_ids_costs       = $booked_package->itinerary_ids_costs;
             $coupon_code               = $booked_package->coupon_code;
             $package_list              =    DB::select("select * from package where id='$package_id'");
             foreach ($package_list as $key => $packages) {
               $packages->amenities = $this->amenities_id_to_list($packages->amenities_list);
               $packages->flights   = $this->flight_id_to_list($packages->flight_list);
               $packages->itinerary = $this->itinerary_list_from_package_id($packages->id);
             }
             $final_cost      =  [];
             $coupon_discount =  [];
             foreach (json_decode($itinerary_ids_costs) as $key => $itinerary) {
                  $final_cost[] = $itinerary;
             }
            $paid_amount_list              =    DB::select("select * from user_package_payment where user_id='$user_id' and package_id='$packages->id' order by paid_date asc");
             $user_paid                     =    0;
             foreach ($paid_amount_list as $key => $paid_amount) {
               $user_paid               += $paid_amount->paid_amount;
             }
             if(!empty($coupon_code)){
               $coupon_discount[]             =    DB::select("select * from coupons where coupon_code='$coupon_code'")[0];
             }    
            $booked_package->user_details     =    DB::select("select * from admin where id='$user_id'")[0];
            $booked_package->package_details  =    $packages;
            $booked_package->final_cost       =    $final_cost;
            $booked_package->coupon_discount  =    $coupon_discount;
            $booked_package->pending_amount   =    $booked_package->final_package_cost-$user_paid;
            $booked_package->paid_amount_history  =   $paid_amount_list;

            $booked_package_lists[]           =    $booked_package;
          }
        }
        $user_filter              =    DB::select("select * from admin where status='1' and type='user'");
        $data       = array('session'=>$session,'package_list'=>$booked_package_lists,'user_filter'=>$user_filter);
        return view('admin.purchased_user_report_list')->with($data);
    }
    public function transaction_history_report_list(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $transaction_lists = [];
        $where   = 'where 1=1';
        if(!empty($request->get('user_id'))){
           $user_id = $request->get('user_id');
           $where .= " and user_id='$user_id'";
        }

        if(!empty($request->get('package_id'))){
           $package_id = $request->get('package_id');
           $where .= " and package_id='$package_id'";
        }

        if(!empty($request->get('start_date'))){
          $start_date                 = explode("/",$request->get('start_date'));
          $start_date                 = $start_date[2]."-".$start_date[1]."-".$start_date[0];
          $where .= " and paid_date>='$start_date'";
        }

        if(!empty($request->get('end_date'))){
          $end_date                 = explode("/",$request->get('end_date'));
          $end_date                 = $end_date[2]."-".$end_date[1]."-".$end_date[0];
          $where .= " and paid_date<='$end_date'";
        }

        $transaction_list     =    DB::select("select * from user_package_payment $where order by paid_date desc");
        $user_filter          =    DB::select("select * from admin where type='user'");
        $package_filter       =    DB::select("select * from package");

        if(!empty($transaction_list)){
          foreach ($transaction_list as $key => $transaction) {
             $user_id                     = $transaction->user_id;
             $package_id                  = $transaction->package_id;
             $transaction->package_details   =    DB::select("select * from package where id='$package_id'")[0];           
             $transaction->user_details    =    DB::select("select * from admin where type='user'")[0];
             $transaction_lists[]         =    $transaction;
          }
        }
        $data       = array('session'=>$session,'transaction_lists'=>$transaction_lists,'user_filter'=>$user_filter,'package_filter'=>$package_filter);
        return view('admin.transaction_history_report_list')->with($data);
    }











































    public function update_profile(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $agent    =  DB::select("select * from agent where email_verify='1' and id='$id'");
        $data       = array('session'=>$session,'agent'=>$agent[0]);
        return view('admin.profile')->with($data);
    }

    public function update_profile_submit(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        if($request->hasFile('agent_signature_file')){
            $image = $request->file('agent_signature_file');
            $filename = str_replace(' ','_',time().'_signature_'.$image->getClientOriginalName());
            $image->move(public_path('agent_docs'), $filename); 
            $signature_file= $filename;
        }else{
            $signature_file= $request->get('old_agent_signature_file');
        }
        $status = DB::table('agent')->where('id', $id)->update(array('signature_file'=>$signature_file));
        return redirect('/update-profile')->with('success', 'Signature has been updated'); 
    }

    public function change_password(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $data       = array('session'=>$session);
        return view('admin.change-password')->with($data);
    }

    public function change_password_submit(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
        ]);
        if ($validator->fails()){
            return redirect('change-password/'.$request->input('email_key'))->withErrors($validator)->withInput();
        }else{
            $old_password      = $request->input('old_password');
            $new_password      = $request->input('new_password');
            $confirm_password  = $request->input('confirm_password');
            $agent             =  DB::select("select * from agent where id='$id' and password='$old_password'");

            if(empty($agent)){
                 return redirect('change-password')->with('failure', 'Please Enter Old Password'); 
            }elseif($new_password!=$confirm_password){
                 return redirect('change-password/')->with('failure', 'New Password And Confirm Password Mismatch'); 
            }else{
               $status = DB::table('agent')->where('id', $id)->update(array('password'=>$new_password));
               if($status){
                    return redirect('/change-password')->with('success', 'Password has been Changed Successfully'); 
               }else{
                    return redirect('/change-password')->with('failure', 'Some Problem Occured Try again'); 
               }
            }
        }
    }

    public function member_list(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        if($session->type=='admin' || $session->type=='employee'){
            $agents     =     DB::table('agent')->where('type', '!=','admin')->orderByRaw('id DESC')->get();
        }else{
            $agents     =     DB::table('agent')->where('id', '=',$id)->orderByRaw('id DESC')->get();
        }
        $data       = array('session'=>$session,'agents'=>$agents);
        return view('admin.member-list')->with($data);
    }

    public function member_create(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $data       = array('session'=>$session);
        return view('admin.member-create')->with($data);
    }

    public function member_create_submit(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;

        $validator = Validator::make($request->all(), [
              'agent_name' => 'required|max:100',
              'agent_email' => 'required|max:100|unique:agent,email',
              'agent_password' => 'required|max:50',
              'email_verify' => 'required|max:10',
              'agent_city' => 'required|max:50',
              'agent_state' => 'required|max:50',
              'agent_country' => 'required|max:50',
              'agent_commision' => 'required|max:50',
          ]);

          if ($validator->fails()){
              return redirect('member-create')->withErrors($validator)->withInput();
          }else{ 

              if($request->hasFile('agent_signature_file')){
                 $image = $request->file('agent_signature_file');
                 $filename = str_replace(' ','_',time().'_signature_'.$image->getClientOriginalName());
                 $image->move(public_path('agent_docs'), $filename); 
                 $filename= $filename;
              }else{
                  $filename= 'default-member-sign.jpg';
              }

              $Agent = array(
              'name' => $request->input('agent_name'),
              'email'=> $request->input('agent_email'),
              'password'=> $request->input('agent_password'),
              'email_verify'=> $request->input('email_verify'),
              'city'=> $request->input('agent_city'),
              'state'=> $request->input('agent_state'),
              'country'=> $request->input('agent_country'),
              'agent_commision'=> $request->input('agent_commision'),
              'type'=> $request->input('type'),
              'company'=> $request->input('agent_company'),
              'branch'=> $request->input('agent_branch'),
              'mobile'=> $request->input('agent_mobile'),
              'signature_file'=> $filename,
              'created_by'=> $id,
              'status'=> 0
            );

            $toEmail = $request->input('agent_email');
            $to      = $toEmail;
            $subject = "Welcome To Ashton | Reset Your Password";
            $message = '<img src="'.asset("/images/college_logo.png").'" alt="Logo"><br>';
            $message .=  '<a href="'.url('/').'/set-new-password/'.base64_encode(base64_encode($toEmail)).'">Verify Account</a>';
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: <webmaster@example.com>' . "\r\n";
            $status = DB::table('agent')->insert($Agent);
            if(!empty($status)){
              mail($to,$subject,$message,$headers);
               return redirect('/member-list')->with('success', 'Member has been added successfully and verification mail sent');
            }else{
               return redirect('/member-list')->with('failure', 'Some Problem Occured Try Again');
            }
          }
    }

    public function member_assign_menu(Request $request,$id_encode){
        $session = $request->session()->get('member');
        $id      = $session->id;
        $agent_id  = base64_decode($id_encode);
        $condition = array('id'=>$agent_id);
        $member    = DB::table('agent')->where($condition)->first();
        $data     = array('employee'=>$member,'session'=>$session);
        return view('admin.member-assign-menu')->with($data);
    }

    public function member_assign_menu_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'menu' => 'required',
            'id_encode' => 'required',
        ]);

        $id_encode = $request->get('id_encode');
         $menu = json_encode($request->get('menu'));
        if ($validator->fails()){
            return redirect('member-assign-menu/'.$id_encode)->withErrors($validator)->withInput();
        }else{
               $status = DB::table('agent')->where('id',base64_decode($id_encode))->update(array('menu_allow'=>$menu));
               if(!empty($status)){
                  return redirect('member-list/')->with('success', 'Menu has been assigned successfully');
               }else{
                  return redirect('member-list/')->with('failure', 'Problem Occured Please Try Again');
               }
        }
    }

    public function setting_list(Request $request){
       $session = $request->session()->get('member');
        $id      = $session->id;
        if($session->type=='admin' || $session->type=='employee'){
            $students          =     DB::table('setting')->get();
        }else{
            $students           =     DB::table('setting')->where('updated_at', '=',$id)->get();
        }
        $data     = array('students'=>$students,'session'=>$session);
        return view('admin.setting-list')->with($data);
    }

    public function setting_edit(Request $request,$settings_id){   
        $session = $request->session()->get('member');
        $id      = $session->id;
        if($session->type=='admin' || $session->type=='employee'){
            $students          =     DB::table('setting')->where('id', '=',base64_decode($settings_id))->first();
        }else{
            $students           =     DB::table('setting')->where('updated_at', '=',$settings_id)->first();
        }
        $data     = array('agent'=>$students,'session'=>$session);
        return view('admin.setting-edit')->with($data);
    }

    public function setting_edit_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'application_fee' => 'required|max:200',
            'oshc_amount' => 'required|max:200',
            'setting_id' => 'required|max:200',
        ]);
        $setting_id = $request->get('setting_id');
        if ($validator->fails()){
            return redirect('setting-edit/'.base64_encode($setting_id))->withErrors($validator)->withInput();
        }else{
          $update = array('application_fee'=>$request->get('application_fee'),'oshc_amount'=>$request->get('oshc_amount'));
          $status = DB::table('setting')->where('id', $setting_id)->update($update);
          if(!empty($status)){
            return redirect('/setting-list')->with('success', 'Fee has been updated Successfully'); 
          }else{
            return redirect('/setting-list')->with('failure', 'Some Problem Occured Try Again'); 
          }
        }
    }

    public function course_list(Request $request){
        $session = $request->session()->get('member');
        $id      = $session->id;
        if($session->type=='admin' || $session->type=='employee'){
            $courses          =     DB::table('course')->orderByRaw('id DESC')->get();
        }else{
            $courses           =     DB::table('course')->where('updated_at', '=',$id)->orderByRaw('id DESC')->get();
        }
        $data = array('courses'=>$courses,'session'=>$session);
        return view('admin.course-list')->with($data);
    }

    public function course_create(Request $request){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $data       = array('session'=>$session);
      return view('admin.course-create')->with($data);
    }

    public function course_create_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'course_name' => 'required|max:200',
            'course_code' => 'required|max:100|unique:course,course_code',
            'course_duration' => 'required|max:100',
            'course_amount' => 'required|max:100',
            'material_amount' => 'required|max:100',
        ]);

        if ($validator->fails()){
            return redirect('course-list')->withErrors($validator)->withInput();
        }else{
            $Course =[
              'course_name' => $request->input('course_name'),
              'course_code'=> $request->input('course_code'),
              'course_duration'=> $request->input('course_duration'),
              'course_amount'=> $request->input('course_amount'),
              'material_amount'=> $request->input('material_amount'),
              'status'=> 0
            ];
            $status = DB::table('course')->insert($Course);
            if(!empty($status)){
               return redirect('/course-list')->with('success', 'Course has been added successfully');
            }else{
               return redirect('/course-list')->with('failure', 'Some Problem Occured Try Again');
            }
        }
    }

    public function course_edit(Request $request,$course_id){
       $session = $request->session()->get('member');
        $id      = $session->id;
        if($session->type=='admin' || $session->type=='employee'){
            $course          =     DB::table('course')->where('id', '=',base64_decode($course_id))->first();
        }else{
            $course           =     DB::table('course')->where('updated_at', '=',$course_id)->first();
        }
        $data     = array('course'=>$course,'session'=>$session);
        return view('admin.course-edit')->with($data);
    }

    public function course_edit_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'course_name' => 'required|max:200',
            'course_code' => 'required|max:100',
            'course_duration' => 'required|max:100',
            'course_amount' => 'required|max:100',
            'material_amount' => 'required|max:100',
            'course_id' => 'required|max:100',
        ]);
        $course_id = $request->get('course_id');
        if ($validator->fails()){
            return redirect('course-edit/'.base64_encode($course_id))->withErrors($validator)->withInput();
        }else{
          $update = array(
            'course_name'=>$request->get('course_name'),
            'course_code'=>$request->get('course_code'),
            'course_duration'=>$request->get('course_duration'),
            'course_amount'=>$request->get('course_amount'),
            'material_amount'=>$request->get('material_amount'),
          );
          $status = DB::table('course')->where('id', $course_id)->update($update);
          if(!empty($status)){
            return redirect('/course-list')->with('success', 'Course has been Updated Successfully'); 
          }else{
            return redirect('/course-list')->with('failure', 'Some Problem Occured Try Again'); 
          }


        }
    }

    public function course_delete(Request $request,$course_id){
      $status = DB::table('course')->where('id', base64_decode($course_id))->delete();
      if(!empty($status)){
        return redirect('/course-list')->with('success', 'Course Deleted Successfully'); 
      }else{
        return redirect('/course-list')->with('failure', 'Some Problem Occured Try Again'); 
      }
    }

    public function member_edit(Request $request,$member_id){
        $session = $request->session()->get('member');
        $id      = $session->id;
        if($session->type=='admin' || $session->type=='employee'){
            $students          =     DB::table('agent')->where('id', '=',base64_decode($member_id))->first();
        }else{
            $students           =     DB::table('agent')->where('updated_at', '=',$member_id)->first();
        }
        $data     = array('agent'=>$students,'session'=>$session);
        return view('admin.member-edit')->with($data);
    }

    public function member_edit_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'agent_name' => 'required|max:100',
            'agent_email' => 'required|max:100',
            'agent_city' => 'required|max:50',
            'agent_state' => 'required|max:50',
            'agent_country' => 'required|max:50',
            'agent_commision' => 'required|max:50',
        ]);

        $member_id = $request->get('member_id');
        if ($validator->fails()){
            return redirect('member-edit/'.base64_encode($member_id))->withErrors($validator)->withInput();
        }else{
            if($request->hasFile('agent_signature_file')){
               $image = $request->file('agent_signature_file');
               $filename = str_replace(' ','_',time().'_signature_'.$image->getClientOriginalName());
               $image->move(public_path('agent_docs'), $filename); 
               $signature_file= $filename;
            }else{
                $signature_file= $request->get('old_agent_signature_file');
            }

            $update = array(
                        'name'=>$request->get('agent_name'),
                        'email'=>$request->get('agent_email'),
                        'city'=>$request->get('agent_city'),
                        'state'=>$request->get('agent_state'),
                        'country'=>$request->get('agent_country'),
                        'agent_commision'=>$request->get('agent_commision'),
                        'company'=>$request->get('agent_company'),
                        'branch'=>$request->get('agent_branch'),
                        'signature_file'=>$signature_file,
                        'mobile'=>$request->get('agent_mobile')
                       );
                  $status = DB::table('agent')->where('id', $member_id)->update($update);
                  if(!empty($status)){
                    return redirect('/member-list')->with('success', 'Member has been updated successfully'); 
                  }else{
                    return redirect('/member-list')->with('failure', 'Some Problem Occured Try Again'); 
                  }
           
        }
    }

    public function member_delete(Request $request,$member_id){
      $status = DB::table('agent')->where('id', base64_decode($member_id))->delete();
      if(!empty($status)){
        return redirect('/member-list')->with('success', 'Member Deleted Successfully'); 
      }else{
        return redirect('/member-list')->with('failure', 'Some Problem Occured Try Again'); 
      }
    }

    public function student_list(Request $request){ 
      $session = $request->session()->get('member');
      $id      = $session->id;
      if($session->type=='admin' || $session->type=='employee'){
        $student    =  DB::select("select students.*,agent.*,students.country as student_country,students.email as student_email,students.status as student_status,students.id as student_id,agent.email as agent_email from students left join agent on students.created_by_id=agent.id order by students.id desc");
      }else{
           $student    =  DB::select("select students.*,agent.*,students.country as student_country,students.email as student_email,students.status as student_status,students.id as student_id,agent.email as agent_email from students left join agent on students.created_by_id=agent.id where created_by_id='$id' order by students.id desc");
      }    
      $data       = array('students'=>$student,'session'=>$session);
      return view('admin.student-list')->with($data);
    }

    public function student_create(Request $request){
       $session = $request->session()->get('member');
       $id      = $session->id;
       $course    =  DB::table('course')->get();
       $data      = array('course'=>$course,'session'=>$session);
       return view('admin.student-create')->with($data);
    }

    public function student_create_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'gender' => 'required|max:100',
            'date_of_birth' => 'required|max:50',
            'surname' => 'required|max:100',
            'given_name' => 'required|max:100',
            'email' => 'required|max:50|unique:students,email',
            'street_address' => 'required|max:2000',
            'town' => 'required|max:200',
            'state' => 'required|max:200',
            'post_code' => 'required|max:50',
            'country' => 'required|max:50',
            'phone_number' => 'required|max:50',
            'birth_country' => 'required|max:50',
            'town_city_birth' => 'required|max:500',
            'passport_number'=>'required|max:2000',
            'emergency_contact_name'=>'required|max:2000',
            'emergency_relation_to_you'=>'required|max:2000',
            'emergency_contact_number'=>'required|max:2000',
            'course_code'=>'required|max:2000',
            'course_duration.required' => 'Please Select Course Duration',
            'course_duration'=>'required|max:2000',
        ]);

        if ($validator->fails()){
            return redirect('student-create')->withErrors($validator)->withInput();
        }else{
            $session  = $request->session()->get('member'); 
            if($request->hasFile('passport_file')){
               $image = $request->file('passport_file');
               $filename = str_replace(' ','_',time().'_passport_'.$image->getClientOriginalName());
               $image->move(public_path('student_docs'), $filename); 
               $filename= $filename;
            }else{
                $filename = "";
            }

            if($request->hasFile('qualification_file')){
               $image1    = $request->file('qualification_file');
               $filename1 = str_replace(' ','_',time().'_qualification_'.$image1->getClientOriginalName());
               $image1->move(public_path('student_docs'), $filename1);
               $filename1 = $filename1;
            }else{
                $filename1 = "";
            }

            if($request->hasFile('language_file')){
               $image2    = $request->file('language_file');
               $filename2 = str_replace(' ','_',time().'_language_'.$image2->getClientOriginalName());
               $image2->move(public_path('student_docs'), $filename2);
               $filename2 = $filename2;
            }else{
                $filename2 = "";
            }

            if($request->hasFile('oshc_file')){
                $image3    = $request->file('oshc_file');
               $filename3 = str_replace(' ','_',time().'_oshc_'.$image3->getClientOriginalName());
               $image3->move(public_path('student_docs'), $filename3);
               $filename3 = $filename3;
            }else{
                $filename3 = "";
            }

            if($request->hasFile('student_signature_file')){
               $image4    = $request->file('student_signature_file');
               $filename4 = str_replace(' ','_',time().'_signature_'.$image4->getClientOriginalName());
               $image4->move(public_path('student_docs'), $filename4);      
               $filename4 = $filename4;
            }else{
                $filename4 = "";
            }

            if($request->hasFile('student_other_file')){
               $image5    = $request->file('student_other_file');
               $filename5 = str_replace(' ','_',time().'_other_'.$image5->getClientOriginalName());
               $image5->move(public_path('student_docs'), $filename5);      
               $filename5 = $filename5;
            }else{
                $filename5 = "";
            }             

            $session = $request->session()->get('member');
            $insert = [
            'title' => $request->input('title'),
            'gender'=> $request->input('gender'),
            'date_of_birth'=> $request->input('date_of_birth'),
            'email'=> $request->input('email'),
            'surname'=> $request->input('surname'),
            'given_name'=> $request->input('given_name'),
            'proffered_name'=> $request->input('proffered_name'),
            'passport_number'=> $request->input('passport_number'),
            'phone_number'=> $request->input('phone_number'),
            'post_code'=> $request->input('post_code'),
            'town'=> $request->input('town'),
            'state'=> $request->input('state'),
            'country'=> $request->input('country'),
            'created_by_type'=>$session->type,
            'created_by_id'=>$session->id,
            'town_city_birth'=> $request->input('town_city_birth'),
            'birth_country'=> $request->input('birth_country'),
            'valid_australian_visa'=> $request->input('valid_australian_visa'),
            'australian_visa_details'=> $request->input('australian_visa_details'),
            'street_address'=> $request->input('street_address'),
            'status'=> 0,
            'assign_id'=>'',
            'emergency_contact_name'=>$request->input('emergency_contact_name'),
            'emergency_relation_to_you'=>$request->input('emergency_relation_to_you'),
            'emergency_contact_number'=>$request->input('emergency_contact_number'),
            'other_than_english'=>$request->input('other_than_english'),
            'other_than_english_specify'=>$request->input('other_than_english_specify'),
            'islander_origin'=>$request->input('islander_origin'),
            'significant_disability'=>$request->input('significant_disability'),
            'disability_value'=>json_encode($request->input('disability_value')),
            'english_test'=>$request->input('english_test'),
            'english_test_specify'=>$request->input('english_test_specify'),
            'english_score'=>$request->input('english_score'),
            'english_date'=>$request->input('english_date'),  
            'health_cover'=>$request->input('health_cover'),            
            'mambership_no'=>$request->input('mambership_no'),            
            'policy_no'=>$request->input('policy_no'),            
            'policy_expire'=>$request->input('policy_expire'),
            'highest_school'=> json_encode($request->input('highest_school')),  
            'year_completed'=>$request->input('year_completed'),
            'completion_country'=>$request->input('completion_country'),           
            'is_completed_qualification'=>$request->input('is_completed_qualification'),           
            'completed_qualification'=>json_encode($request->input('completed_qualification')),           
            'country_qualification'=>json_encode($request->input('country_qualification')),           
            'reason_qualification'=>json_encode($request->input('reason_qualification')),           
            'employment_status'=>json_encode($request->input('employment_status')),           
            'course_code'=>json_encode($request->input('course_code')),           
            'course_details'=>json_encode($request->input('course_duration')),           
            'course_start_date'=>$request->input('course_start_date'),           
            'credit_transfer'=>json_encode($request->input('credit_transfer')),           
            'previous_studies'=>json_encode($request->input('previous_studies')),           
            'require_airport'=>json_encode($request->input('require_airport')),           
            'require_assistance'=>json_encode($request->input('require_assistance')),           
            'usi_code'=>$request->input('usi_code'),           
            'passport_file'=>$filename,           
            'qualification_file'=>$filename1,           
            'language_file'=>$filename2,           
            'oshc_file'=>$filename3,           
            'student_signature_file'=>$filename4,           
            'student_other_file'=>$filename5,           
            'submit_date'=>$request->input('submit_date'),
            'message'=>' ',                     
          ];
          $status = DB::table('students')->insert($insert);
          if(!empty($status)){
             return redirect('/student-list')->with('success', 'Student has been added successfully');
          }else{
             return redirect('/student-list')->with('failure', 'Some Problem Occured Try Again');
          }
        }
    }

    public function student_edit(Request $request,$student_id){
        $session   = $request->session()->get('member');
        $id        = $session->id;
        $course    =  DB::table('course')->get();
        if($session->type=='admin' || $session->type=='employee'){
            $student          =     DB::table('students')->where('id', '=',base64_decode($student_id))->first();
        }else{
            $student           =     DB::table('students')->where('id', '=',base64_decode($student_id))->where('created_by_id', '=',$id)->first();
        }
        $data = array('agent'=>$student,'course'=>$course,'session'=>$session);
        return view('admin.student-edit')->with($data);
    }

    public function student_edit_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:100',
            'gender' => 'required|max:100',
            'date_of_birth' => 'required|max:50',
            'surname' => 'required|max:100',
            'given_name' => 'required|max:100',
            'email' => 'required|max:50',
            'street_address' => 'required|max:2000',
            'town' => 'required|max:200',
            'state' => 'required|max:200',
            'post_code' => 'required|max:50',
            'country' => 'required|max:50',
            'phone_number' => 'required|max:50',
            'birth_country' => 'required|max:50',
            'town_city_birth' => 'required|max:500',
            'passport_number'=>'required|max:2000',
            'emergency_contact_name'=>'required|max:2000',
            'emergency_relation_to_you'=>'required|max:2000',
            'emergency_contact_number'=>'required|max:2000',
            'course_code'=>'required|max:2000',
            'course_details'=>'required|max:2000',
        ]);

        $student_id = $request->get('student_id');
        if ($validator->fails()){
            return redirect('student-edit/'.base64_encode($student_id))->withErrors($validator)->withInput();
        }else{
            if($request->hasFile('passport_file')){
               $image = $request->file('passport_file');
               $filename = str_replace(' ','_',time().'_passport_'.$image->getClientOriginalName());
               $image->move(public_path('student_docs'), $filename); 
               $filename= $filename;
            }else{
                $filename = $request->input('old_passport_file');
            }

            if($request->hasFile('qualification_file')){
               $image1    = $request->file('qualification_file');
               $filename1 = str_replace(' ','_',time().'_qualification_'.$image1->getClientOriginalName());
               $image1->move(public_path('student_docs'), $filename1);
               $filename1 = $filename1;
            }else{
                $filename1 = $request->input('old_qualification_file');
            }

            if($request->hasFile('language_file')){
               $image2    = $request->file('language_file');
               $filename2 = str_replace(' ','_',time().'_language_'.$image2->getClientOriginalName());
               $image2->move(public_path('student_docs'), $filename2);
               $filename2 = $filename2;
            }else{
                $filename2 = $request->input('old_language_file');
            }

            if($request->hasFile('oshc_file')){
                $image3    = $request->file('oshc_file');
               $filename3 = str_replace(' ','_',time().'_oshc_'.$image3->getClientOriginalName());
               $image3->move(public_path('student_docs'), $filename3);
               $filename3 = $filename3;
            }else{
                $filename3 = $request->input('old_oshc_file');
            }

            if($request->hasFile('student_signature_file')){
               $image4    = $request->file('student_signature_file');
               $filename4 = str_replace(' ','_',time().'_signature_'.$image4->getClientOriginalName());
               $image4->move(public_path('student_docs'), $filename4);      
               $filename4 = $filename4;
            }else{
                $filename4 = $request->input('old_student_signature_file');
            }

            if($request->hasFile('student_other_file')){
               $image5    = $request->file('student_other_file');
               $filename5 = str_replace(' ','_',time().'_other_'.$image5->getClientOriginalName());
               $image5->move(public_path('student_docs'), $filename5);      
               $filename5 = $filename5;
            }else{
                $filename5 = $request->input('old_student_other_file');
            }  

          $update = [
            'title' => $request->input('title'),
            'gender'=> $request->input('gender'),
            'date_of_birth'=> $request->input('date_of_birth'),
            'email'=> $request->input('email'),
            'surname'=> $request->input('surname'),
            'given_name'=> $request->input('given_name'),
            'proffered_name'=> $request->input('proffered_name'),
            'passport_number'=> $request->input('passport_number'),
            'phone_number'=> $request->input('phone_number'),
            'post_code'=> $request->input('post_code'),
            'town'=> $request->input('town'),
            'state'=> $request->input('state'),
            'country'=> $request->input('country'),
            'town_city_birth'=> $request->input('town_city_birth'),
            'birth_country'=> $request->input('birth_country'),
            'valid_australian_visa'=> $request->input('valid_australian_visa'),
            'australian_visa_details'=> $request->input('australian_visa_details'),
            'street_address'=> $request->input('street_address'),
            'status'=> 0,
            'emergency_contact_name'=>$request->input('emergency_contact_name'),
            'emergency_relation_to_you'=>$request->input('emergency_relation_to_you'),
            'emergency_contact_number'=>$request->input('emergency_contact_number'),
            'other_than_english'=>$request->input('other_than_english'),
            'other_than_english_specify'=>$request->input('other_than_english_specify'),
            'islander_origin'=>$request->input('islander_origin'),
            'significant_disability'=>$request->input('significant_disability'),
            'disability_value'=>json_encode($request->input('disability_value')),
            'english_test'=>$request->input('english_test'),
            'english_test_specify'=>$request->input('english_test_specify'),
            'english_score'=>$request->input('english_score'),
            'english_date'=>$request->input('english_date'),  
            'health_cover'=>$request->input('health_cover'),            
            'mambership_no'=>$request->input('mambership_no'),            
            'policy_no'=>$request->input('policy_no'),            
            'policy_expire'=>$request->input('policy_expire'),
            'highest_school'=> json_encode($request->input('highest_school')),  
            'year_completed'=>$request->input('year_completed'),
            'completion_country'=>$request->input('completion_country'),           
            'is_completed_qualification'=>$request->input('is_completed_qualification'),           
            'completed_qualification'=>json_encode($request->input('completed_qualification')),           
            'country_qualification'=>json_encode($request->input('country_qualification')),           
            'reason_qualification'=>json_encode($request->input('reason_qualification')),           
            'employment_status'=>json_encode($request->input('employment_status')),           
            'course_code'=>json_encode($request->input('course_code')),           
            'course_details'=>json_encode($request->input('course_details')),           
            'course_start_date'=>$request->input('course_start_date'),           
            'credit_transfer'=>json_encode($request->input('credit_transfer')),           
            'previous_studies'=>json_encode($request->input('previous_studies')),           
            'require_airport'=>json_encode($request->input('require_airport')),           
            'require_assistance'=>json_encode($request->input('require_assistance')),           
            'usi_code'=>$request->input('usi_code'),           
            'passport_file'=>$filename,           
            'qualification_file'=>$filename1,           
            'language_file'=>$filename2,           
            'oshc_file'=>$filename3,           
            'student_signature_file'=>$filename4,           
            'student_other_file'=>$filename5,           
            'submit_date'=>$request->input('submit_date'),                    
          ];

          $status = DB::table('students')->where('id', $student_id)->update($update);
          if(!empty($status)){
            return redirect('/student-list')->with('success', 'Student has been updated successfully'); 
          }else{
            return redirect('/student-list')->with('failure', 'Some Problem Occured Try Again'); 
          }
        }
    }

    public function student_view(Request $request,$student_id){
        $session   = $request->session()->get('member');
        $id        = $session->id;
        $course    =  DB::table('course')->get();
        if($session->type=='admin' || $session->type=='employee'){
            $student           =     DB::table('students')->where('id', '=',base64_decode($student_id))->first();
        }else{
            $student           =     DB::table('students')->where('id', '=',base64_decode($student_id))->where('created_by_id', '=',$id)->first();
        }
        $agent               =     DB::table('agent')->where('id', '=',$student->created_by_id)->first();
        $data                  = array('agent'=>$student,'course'=>$course,'session'=>$session,'employee'=>$agent);
        return view('admin.student-view')->with($data);
    }

    public function student_status_change(Request $request){
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|max:200',
        ]);
        $student_id = $request->get('student_id');
        if ($validator->fails()){
            return redirect('student-list/'.base64_encode($student_id))->withErrors($validator)->withInput();
        }else{
          $update = array(
            'status'=>$request->get('status'),
            'message'=>$request->get('message'),
          );
          $status = DB::table('students')->where('id', $student_id)->update($update);
          if(!empty($status)){
            return redirect('/student-list')->with('success', 'Student Status Changed Successfully'); 
          }else{
            return redirect('/student-list')->with('failure', 'Some Problem Occured Try Again'); 
          }
        }
    }

    public function student_mail_send(Request $request){
          $toEmail = $request->get('toEmail');
          $message = $request->get('message');
          if(!empty($request->get('offerLetterLink'))){
             $offerLetterLink = $request->get('offerLetterLink');
             $message .= '<br><a href="'.$offerLetterLink.'">Offer Letter Link</a><br>';
          }
          
          $to      = implode(',',$toEmail);
          $subject = "Ashton Mail";
          $message .= '<img src="'.asset("/images/college_logo.png").'" alt="Logo"><br>';
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          $headers .= 'From: <webmaster@example.com>' . "\r\n";
          mail($to,$subject,$message,$headers);
          return redirect()->back()->with('success', 'Email Sent Successfull');
    }

    public function student_delete(Request $request,$student_id){
      $status = DB::table('students')->where('id', base64_decode($student_id))->delete();
      if(!empty($status)){
        return redirect('/student-list')->with('success', 'Student Deleted Successfully'); 
      }else{
        return redirect('/student-list')->with('failure', 'Some Problem Occured Try Again'); 
      }
    }

    public function student_export(Request $request,$export_status='all'){ 
      if($export_status=='all'){
        $where = "where 1=1";
      }elseif($export_status=='new'){
        $where = "where export_status=0";
      }elseif($export_status=='old'){
        $where = "where export_status=1";
      }else{
        $where = "where 1=1";
      }
      $session = $request->session()->get('member');
      $id      = $session->id;
      if($session->type=='admin' || $session->type=='employee'){
        $student    = DB::select("select * from students $where");
      }else{
        $student    =  DB::select("select * from students where created_by_id=$id and $where");
      }    
      $data = array('agent'=>$student,'session'=>$session,'export_status'=>$export_status);
      return view('admin.student-export')->with($data);
    }

    public function student_export_submit(Request $request){
           $validator = Validator::make($request->all(), [
            'assign_id' => 'required|max:200',
            ]);
            if ($validator->fails()){
                return redirect('student-export/')->withErrors($validator)->withInput();
            }else{
              $assignArray = $request->input('assign_id');
              $users = DB::table('students')->whereIn('id',$assignArray)->get();
                       DB::table('students')->whereIn('id',$assignArray)->update(array('export_status'=>1));
              $data[] = array('Title','Gender','Date Of Birth','Email',
                              'Surname','Given Name','Preferred Name','Passport Number',
                              'Phone Number','Postal Code','Town','State',
                              'Country','City Of Birth','Birth Country','Australian Visa',
                              'Street Address','Visa Details','Emergency Contact Name','Emergency Relationship',
                              'Emergency Contact Number','Other Than English','Island Origin','Significant Disability',
                              'English Language Test','Highest Qualification','Year Completion','Completion Country',
                              'Completed Qualification','Qualification Country','Reason Of Study','Current Employee Status');

              foreach ($users as $key => $value) {
                $disability = json_decode($value->disability_value,true);
                unset($disability[7]);
                  $c_q = '';
                if($value->country_qualification!='null'){
                  $c_q = implode(',',json_decode($value->country_qualification));
                }
                
                $c_qa = '';
                if($value->completed_qualification!='null'){
                  $c_qa = implode(',',json_decode($value->completed_qualification));
                }
                
                $highest_school = '';
                if($value->highest_school!='null'){
                  $highest_school = implode(',',json_decode($value->highest_school));
                }
                
                $employment_status = '';
                if($value->highest_school!='null'){
                  $employment_status = implode(',',json_decode($value->employment_status));
                }

                 $reason = json_decode($value->reason_qualification,true);
                unset($reason[7]);

                $data[] = array($value->title,
                  $value->gender,
                  $value->date_of_birth,
                  $value->email,
                  $value->surname,
                  $value->given_name,
                  $value->proffered_name,
                  $value->passport_number,
                  $value->phone_number,
                  $value->post_code,
                  $value->town,
                  $value->state,
                  $value->country,
                  $value->town_city_birth,
                  $value->birth_country,
                  $value->valid_australian_visa,
                  $value->street_address,
                  $value->australian_visa_details,
                  $value->emergency_contact_name,
                  $value->emergency_relation_to_you,
                  $value->emergency_contact_number,
                  $value->other_than_english,
                  $value->islander_origin,
                  implode(',',$disability),
                  $value->english_test,
                  $highest_school,
                  $value->year_completed,
                  $value->completion_country,
                  $c_qa,
                  $c_q,
                  implode(',',$reason),
                  $employment_status,
                  );
              }
              $this->array_to_csv_download($data);
            }
    }

    private function array_to_csv_download($array, $filename = "export.xls", $delimiter="\t") {
      // open raw memory as file so no temp files needed, you might run out of memory though
      $f = fopen('php://memory', 'w'); 
      // loop over the input array
      foreach ($array as $line) { 
          // generate csv lines from the inner arrays
          fputcsv($f, $line, $delimiter); 
      }
      // reset the file pointer to the start of the file
      fseek($f, 0);
      // tell the browser it's going to be a csv file
      header('Content-Type: application/csv');
      // tell the browser we want to save it instead of displaying it
      header('Content-Disposition: attachment; filename="'.date('d_m_Y_').$filename.'";');
      // make php send the generated csv lines to the browser
      fpassthru($f);
    }

    public function student_assign_id(Request $request){  
      $session = $request->session()->get('member');
      $id      = $session->id;
      if($session->type=='admin' || $session->type=='employee'){
        $student    =  DB::select("select students.*,agent.*,students.country as student_country,students.email as student_email,students.status as student_status,students.id as student_id,agent.email as agent_email from students left join agent on students.created_by_id=agent.id order by students.id desc");
      }else{
           $student    =  DB::select("select students.*,agent.*,students.country as student_country,students.email as student_email,students.status as student_status,students.id as student_id,agent.email as agent_email from students left join agent on students.created_by_id=agent.id where created_by_id='$id' order by students.id desc");
      }    
      $data       = array('students'=>$student,'session'=>$session);
      return view('admin.student-assign-id')->with($data);
    }

    public function student_assign_edit(Request $request,$student_id){
        $session   = $request->session()->get('member');
        $id        = $session->id;
        $course    =  DB::table('course')->get();
        if($session->type=='admin' || $session->type=='employee'){
            $student          =     DB::table('students')->where('id', '=',base64_decode($student_id))->first();
        }else{
            $student           =     DB::table('students')->where('id', '=',base64_decode($student_id))->where('created_by_id', '=',$id)->first();
        }
        $data = array('agent'=>$student,'course'=>$course,'session'=>$session);
        return view('admin.student-assign-edit')->with($data);
    }

    public function student_assign_edit_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'assign_id' => 'required|max:50|unique:students,assign_id',
            'student_id' => 'required|max:50',
        ]);
        $student_id = $request->get('student_id');
        if ($validator->fails()){
            return redirect('student-assign-edit/'.$student_id)->withErrors($validator)->withInput();
        }else{
          $update = array(
            'assign_id'=>$request->get('assign_id'),
          );
          $status = DB::table('students')->where('id', base64_decode($student_id))->update($update);
          if(!empty($status)){
            return redirect('/student-assign-id')->with('success', 'ID has been Generated Successfully'); 
          }else{
            return redirect('/student-assign-id')->with('failure', 'Some Problem Occured Try Again'); 
          }
        }
    }

    public function student_offer_letter_list(Request $request){
      $session = $request->session()->get('member');
      $id      = $session->id;
      if($session->type=='admin' || $session->type=='employee'){
        $student    =  DB::select("select offer.*,students.*,agent.*,students.country as student_country,students.email as student_email,students.status as student_status,students.id as student_id,agent.email as agent_email from students left join agent on students.created_by_id=agent.id left join offer on offer.student_id=students.id order by students.id desc");
      }else{
           $student    =  DB::select("select offer.*,students.*,agent.*,students.country as student_country,students.email as student_email,students.status as student_status,students.id as student_id,agent.email as agent_email from students left join agent on students.created_by_id=agent.id left join offer on offer.student_id=students.id where created_by_id='$id' order by students.id desc");
      }    
        $data     = array('students'=>$student,'session'=>$session);
        return view('admin.student-offer-letter-list')->with($data);
    }

    public function student_offer_edit(Request $request,$student_id){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $student_id = base64_decode($student_id);
      if($session->type=='admin' || $session->type=='employee'){
        $student    =  DB::select("select offer.*,students.*,agent.*,students.country as student_country,students.email as student_email,students.status as student_status,students.id as student_id,agent.email as agent_email from students left join agent on students.created_by_id=agent.id left join offer on offer.student_id=students.id where students.id=$student_id");
      }else{
           $student    =  DB::select("select offer.*,students.*,agent.*,students.country as student_country,students.email as student_email,students.status as student_status,students.id as student_id,agent.email as agent_email from students left join agent on students.created_by_id=agent.id left join offer on offer.student_id=students.id where created_by_id=$id and students.id=$student_id");
      }    
      $course    =  DB::table('course')->whereIn('course_code',json_decode($student[0]->course_code))->get();
      $setting    =  DB::table('setting')->first();
      $data      = array('agent'=>$student[0],'courses'=>$course,'setting'=>$setting,'session'=>$session);
       return view('admin.student-offer-edit')->with($data);
    }

    public function student_offer_edit_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|max:100',
            'course_code' => 'required|max:100',
            'course_duration' => 'required|max:50',
            'start_date' => 'required|max:100',
            'end_date' => 'required|max:100',
            'course_amount' => 'required|max:100',
            'material_amount' => 'required|max:50',
            'date_of_issue' => 'required|max:2000',
            'orientation_date' => 'required|max:200',
            'application_fee' => 'required|max:200',
        ]);
        $student_id = $request->input('student_id');

        if ($validator->fails()){
            return redirect('student-offer-edit/'.$student_id)->withErrors($validator)->withInput();
        }else{
          $insert = [
            'student_id' => base64_decode($request->input('student_id')),
            'agent_id'=> $request->input('agent_id'),
            'course_code_o'=> json_encode($request->input('course_code')),
            'course_name_o'=> json_encode($request->input('course_name')),
            'course_duration'=> json_encode($request->input('course_duration')),
            'start_date'=> json_encode($request->input('start_date')),
            'end_date'=> json_encode($request->input('end_date')),
            'course_amount'=> json_encode($request->input('course_amount')),
            'material_amount'=> json_encode($request->input('material_amount')),
            'offer_no'=> $request->input('offer_no'),
            'date_of_issue'=> $request->input('date_of_issue'),
            'orientation_date'=> $request->input('orientation_date'),
            'airport_amount'=>$request->input('airport_amount'),
            'oshc_amount'=>$request->input('oshc_amount'),
            'homestay_week'=>$request->input('homestay_week'),
            'placement_amount'=>$request->input('placement_amount'),
            'homestay_amount'=>$request->input('homestay_amount'),
            'prior_amount'=> $request->input('prior_amount'),
            'discount_amount'=> $request->input('discount_amount'),
            'application_fee'=> $request->input('application_fee'),
          ];

            $status = DB::table('offer')->where('student_id', base64_decode($student_id))->delete();
            $status = DB::table('offer')->insert($insert);
            if($status){
                return redirect('/student-offer-letter-list')->with('success', 'Student offer letter has been generated');
            }else{
                return redirect('/student-offer-letter-list')->with('failure', 'Some Problem Occured Try Again'); 
            }
        }
    }

    public function student_offer_letter_view(Request $request,$student_id){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $student_id = base64_decode($student_id);
      if($session->type=='admin' || $session->type=='employee'){
        $student    =  DB::select("select offer.*,students.*,agent.*,students.country as student_country,students.email as student_email,students.status as student_status,students.id as student_id,agent.email as agent_email from students left join agent on students.created_by_id=agent.id left join offer on offer.student_id=students.id where students.id=$student_id");
      }else{
           $student    =  DB::select("select offer.*,students.*,agent.*,students.country as student_country,students.email as student_email,students.status as student_status,students.id as student_id,agent.email as agent_email from students left join agent on students.created_by_id=agent.id left join offer on offer.student_id=students.id where created_by_id=$id and students.id=$student_id");
      }    
      $course    =  DB::table('course')->whereIn('course_code',json_decode($student[0]->course_code))->get();
      $setting    =  DB::table('setting')->first();
      $data      = array('agent'=>$student[0],'courses'=>$course,'setting'=>$setting,'session'=>$session);
       return view('admin.student-offer-letter-view')->with($data);
    }

    public function initial_payment_list(Request $request){
      $session = $request->session()->get('member');
      $id      = $session->id;
      if($session->type=='admin' || $session->type=='employee'){
        $student    =  DB::select('select *,payment.id as payment_id,students.email as student_email,students.id as student_id,agent.email as agent_email,payment.id as paymentId from payment join students on students.assign_id=payment.offer_assign join agent on students.created_by_id = agent.id order by payment.payment_date desc');
      }else{
          $student    =  DB::select("select *,payment.id as payment_id,students.email as student_email,students.id as student_id,agent.email as agent_email,payment.id as paymentId from payment join students on students.assign_id=payment.offer_assign join agent on students.created_by_id = agent.id where created_by_id='$id' order by payment.payment_date desc");
      }    
       $data     = array('students'=>$student,'session'=>$session);
       return view('admin.initial-payment-list')->with($data);
    }

    public function initial_payment_add(Request $request){
      $session   = $request->session()->get('member');
      $id        = $session->id;
      $assign_id = $request->query('search_student')?$request->query('search_student'):0;
      if($session->type=='admin' || $session->type=='employee'){
        $student    =  DB::select("select students.*,agent.*,students.country as student_country,students.email as student_email,students.status as student_status,students.id as student_id,agent.email as agent_email from students left join agent on students.created_by_id=agent.id where assign_id='$assign_id'");
      }else{
          $student    =  DB::select("select students.*,agent.*,students.country as student_country,students.email as student_email,students.status as student_status,students.id as student_id,agent.email as agent_email from students left join agent on students.created_by_id=agent.id where created_by_id='$id' and assign_id='$assign_id'");
      }
      $record    = null;
      if(empty($assign_id) && !empty($student[0])){
          $student1    =  $agent =  (object) array();
          $record    = null;
      }elseif(!empty($student[0])){
        $record    = "Record Find Successfully";
      }elseif(empty($student)){
        $student1    =  $agent =  (object) array();
      } 

      $data     = array('students'=>isset($student[0])?$student[0]:$student1,'record'=>$record,'session'=>$session);
      return view('admin.initial-payment-add')->with($data);
    }

    public function initial_payment_add_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'debit_fee' => 'required|max:200',
            'offer_assign' => 'required|max:200',
            'invoice_no' => 'required|max:200',
            'agent_commision' => 'required|max:200',
            'payment_date' => 'required|max:200',
            'payment_status' => 'required|max:200',
        ]);
        $offer_assign = $request->get('offer_assign');
        if ($validator->fails()){
            return redirect('/initial-payment-add')->withErrors($validator)->withInput();
        }else{
          $date = explode('/',$request->input('payment_date'));
          $insert = [
                        'invoice_no' => 'N/A',
                        'payment_date'=>$date[2]."-".$date[1]."-".$date[0],
                        'payment_status'=> $request->input('payment_status'),
                        'debit_fee'=> $request->input('debit_fee'),
                        'offer_assign'=> $request->input('offer_assign'),
                        'agent_commision_percentage'=> $request->input('agent_commision'),
                        'payment_description'=> $request->input('payment_description'),
                        'agent_commision_payment_status'=> 0,
                      ];
          $status = DB::table('payment')->insert($insert);
          if(!empty($status)){
              return redirect('/initial-payment-list')->with('success', 'Course added successfully');
          }else{
               return redirect('/initial-payment-list')->with('failure', 'Some Problem Occured Try Again');
          }
        }
    }

    public function initial_payment_upload(Request $request){
        $session   = $request->session()->get('member');
        $data     = array('session'=>$session);
        return view('admin.initial-payment-upload')->with($data);
    }

    private function check_agent_comission_by_student_assign_id($assignId=null){
        $student    =  DB::select("select * from students join agent on students.created_by_id = agent.id where assign_id = '$assignId'");
        if(!empty($student)){
            return $student[0]->agent_commision;
        }else{
            return '0';
        }
    }

    private function check_student_by_assign_id($assignId=null){
        $student    =  DB::select("select * from students where assign_id = '$assignId'");
        if(!empty($student)){
            return 1;
        }else{
            return 0;
        }
    }

    public function initial_payment_upload_submit(Request $request){
        $file      = $request->file('payment_file');
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        $location = 'payments';
        $filename = str_replace(' ','_',time().'_payment_'.$file->getClientOriginalName());
        $file->move($location,$filename);
        $filepath = public_path($location."/".$filename);
        $file = fopen($filepath,"r");
        $importData_arr = array();
        $i = 0;
        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
           $num = count($filedata );
             for ($c=0; $c < $num; $c++) {
                if(!empty($filedata[3]) && !empty($filedata[4])){
                  $importData_arr[$i][] = $filedata[$c];
                }
             }
             $importData_arr[$i][5] = $this->check_agent_comission_by_student_assign_id($importData_arr[$i][4]);
             $i++;
          }
          fclose($file);
          $success_assign_id = null;
          $error_assign_id   = "";
          foreach($importData_arr as $key=>$importData){
            if($key==0){ continue; }
            $check_student = $this->check_student_by_assign_id($importData[4]);
            $total_student[] = 1; 
            $date = explode('/',$importData[1]);
            if(!empty($check_student)){
              $insert = [
                        'payment_status'=>$importData[0],
                        'payment_date'=>$date[2]."-".$date[1]."-".$date[0],
                        'debit_fee'=>$importData[2],
                        'invoice_no'=>$importData[3],
                        'offer_assign'=>$importData[4],
                        'agent_commision_percentage'=>$importData[5],
                        'agent_commision_payment_status'=>0,
                      ];
                $status = DB::table('payment')->insert($insert);
                if($status){
                  $success_assign_id[] = $importData[4];
                }else{
                  $error_assign_id[] = $importData[4];
                }
            }else{
              $error_assign_id[] = $importData[4];
            }
          }
          return redirect('/initial-payment-list')->with('success', 'Total Students:'.count($total_student).' Uploaded:'.count($success_assign_id))->with('failure', 'Failure Assignee:'.implode(', ',$error_assign_id));
    }

    public function student_approval_list(Request $request){
      $session = $request->session()->get('member');
      $id      = $session->id;
      if($session->type=='admin' || $session->type=='employee'){
        $student    =  DB::select("select students.*,agent.*,students.country as student_country,students.email as student_email,students.status as student_status,students.id as student_id,agent.email as agent_email from students left join agent on students.created_by_id=agent.id join offer on students.id=offer.student_id order by offer.id desc");
      }else{
           $student    =  DB::select("select students.*,agent.*,students.country as student_country,students.email as student_email,students.status as student_status,students.id as student_id,agent.email as agent_email from students left join agent on students.created_by_id=agent.id join offer on students.id=offer.student_id where created_by_id='$id' order by offer.id desc");
      }    
      $data     = array('students'=>$student,'session'=>$session);
      return view('admin.student-approval-list')->with($data);
    }

    public function student_approval_change_status(Request $request,$student_id=null){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $student_id = base64_decode($student_id);
      if($session->type=='admin' || $session->type=='employee'){
        $student    =  DB::select("select students.*,agent.*,students.country as student_country,students.email as student_email,students.status as student_status,students.id as student_id,agent.email as agent_email from students left join agent on students.created_by_id=agent.id where students.id='$student_id'");
      }else{
           $student    =  DB::select("select students.*,agent.*,students.country as student_country,students.email as student_email,students.status as student_status,students.id as student_id,agent.email as agent_email from students left join agent on students.created_by_id=agent.id where created_by_id=$id and students.id='$student_id'");
      }    
      $data = array('agent'=>$student[0],'session'=>$session);
      return view('admin.student-approval-change-status')->with($data);
    }

    public function student_approval_change_status_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'approval_status' => 'required|max:200',
            'student_id' => 'required|max:200',
        ]);
        if ($validator->fails()){
            return redirect('/student-approval-list')->withErrors($validator)->withInput();
        }else{
          $update = array(
            'approval_status'=>$request->get('approval_status'),
          );
          $status = DB::table('students')->where('id',$request->get('student_id'))->update($update);
          if(!empty($status)){
            return redirect('/student-approval-list')->with('success', 'Student Approval Status Changed Successfully'); 
          }else{
            return redirect('/student-approval-list')->with('failure', 'Some Problem Occured Try Again'); 
          }
        }
    }

    public function agent_commision_list(Request $request){
      $session  = $request->session()->get('member');
      $id = $session->id;
      if($session->type=='admin' || $session->type=='employee'){
         $student    =  DB::select('select *,payment.id as payment_id,students.email as student_email,students.id as student_id,agent.email as agent_email,payment.id as paymentId from payment join students on students.assign_id=payment.offer_assign join agent on students.created_by_id = agent.id and payment_status="Success" order by payment_date desc');
      }else{
        $student    =  DB::select("select *,payment.id as payment_id,students.email as student_email,agent.email as agent_email,payment.id as paymentId from payment join students on students.assign_id=payment.offer_assign join agent on students.created_by_id = agent.id where created_by_id='$id' and payment_status='Success' order by payment_date desc");
      }  
      $data     = array('students'=>$student,'session'=>$session);
      return view('admin.agent-commision-list')->with($data);
    }

    public function initial_payment_edit(Request $request,$payment_id=null){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $payment_id = base64_decode($payment_id);
      if($session->type=='admin' || $session->type=='employee'){
        $student    =  DB::select("select *,payment.id as payment_id,students.email as student_email,students.id as student_id,agent.email as agent_email,payment.id as paymentId from payment join students on students.assign_id=payment.offer_assign join agent on students.created_by_id = agent.id where payment.id='$payment_id'");
      }else{
          $student    =  DB::select("select *,payment.id as payment_id,students.email as student_email,agent.email as agent_email,payment.id as paymentId from payment join students on students.assign_id=payment.offer_assign join agent on students.created_by_id = agent.id where created_by_id=$id where payment.id='$payment_id'");
      }    
       $data     = array('agent'=>$student[0],'session'=>$session);
       return view('admin.initial-payment-edit')->with($data);
    }

    public function initial_payment_edit_submit(Request $request){
        $validator = Validator::make($request->all(), [
            'debit_fee' => 'required|max:200',
            'offer_assign' => 'required|max:200',
            'invoice_no' => 'required|max:200',
            'payment_date' => 'required|max:200',
            'payment_status' => 'required|max:200',
            'payment_id' => 'required|max:200',
        ]);
        $payment_id = $request->get('payment_id');
        if ($validator->fails()){
            return redirect('/initial_payment_edit/'.base64_decode($payment_id))->withErrors($validator)->withInput();
        }else{
          $date   = explode('/',$request->input('payment_date'));
          $update = [
                        'invoice_no' =>  $request->input('invoice_no'),
                        'payment_date'=>$date[2]."-".$date[1]."-".$date[0],
                        'payment_status'=> $request->input('payment_status'),
                        'debit_fee'=> $request->input('debit_fee'),
                        'offer_assign'=> $request->input('offer_assign'),
                        'payment_description'=> $request->input('payment_description'),
                        'agent_commision_payment_status'=> 0,
                      ];
          $status = DB::table('payment')->where('id', base64_decode($payment_id))->update($update);
          if(!empty($status)){
              return redirect('/initial-payment-list')->with('success', 'Payment Updated successfully');
          }else{
               return redirect('/initial-payment-list')->with('failure', 'Some Problem Occured Try Again');
          }
        }
    }

    public function initial_payment_delete(Request $request,$payment_id){
      $status = DB::table('payment')->where('id', base64_decode($payment_id))->delete();
      if(!empty($status)){
        return redirect('/initial-payment-list')->with('success', 'Payment Deleted Successfully'); 
      }else{
        return redirect('/initial-payment-list')->with('failure', 'Some Problem Occured Try Again'); 
      }
    }

    public function agent_commision_change_payment_status(Request $request,$payment_id=null,$status=null){
        if($status=='1' || $status=='0'){
           $update = array(
            'agent_commision_payment_status'=>$status,
          );
          $status = DB::table('payment')->where('id', base64_decode($payment_id))->update($update);
          if(!empty($status)){
            return redirect('/agent-commision-list')->with('success', 'Payment Status Changed Successfully'); 
          }else{
            return redirect('/agent-commision-list')->with('failure', 'Some Problem Occured Try Again'); 
          }
        }
    }

    public function request_for_invoice(Request $request){
      $session = $request->session()->get('member');
      $id      = $session->id;

      if($request->get('agent_id') && $request->get('agent_id')!='all'){
        $agent_id                   = $request->get('agent_id');
        $request_for_invoice_status = $request->get('request_for_invoice_status');
        $and = "where created_by_id = '$agent_id' and request_for_invoice_status='$request_for_invoice_status' and payment_status='Success'";
      }else{
        $and = "where payment_status='Success'";
      }

      if($session->type=='admin' || $session->type=='employee'){
         $student    =  DB::select("select *,payment.id as payment_id,students.email as student_email,agent.email as agent_email from payment join students on students.assign_id=payment.offer_assign join agent on students.created_by_id = agent.id $and");
      }else{
        if($request->get('agent_id')){
           $request_for_invoice_status = $request->get('request_for_invoice_status')?$request->get('request_for_invoice_status'):'0';
           $and =  "and request_for_invoice_status='$request_for_invoice_status' and payment_status='Success'";
        }else{
           $and = " and payment_status='Success'";
        }
        $student    =  DB::select("select *,payment.id as payment_id,students.email as student_email,agent.email as agent_email from payment join students on students.assign_id=payment.offer_assign join agent on students.created_by_id = agent.id where created_by_id='$id' $and");
      }

      if($request->get('send_request') && $request->get('send_request')=='yes' && $request->get('agent_id')!='all'){
          $subject = "Ashton | Request For Invoice Pending List";
          $message = '<img src="'.asset("/images/college_logo.png").'" alt="Logo"><br>';
          $message .= '<b>Request For Invoice Pending List</b><br><br>';
          foreach ($student as $key => $records) {
            $message .= "Assign Id: ".$records->assign_id."   ";
            $message .= "Payment Date: ".date('d/m/Y',strtotime($records->payment_date))."  ";
            $message .= "Amount : ".$records->debit_fee."<br>";
            $paymentId[] = $records->payment_id;
          }
          $to = $student[0]->agent_email;
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          $headers .= 'From: <webmaster@example.com>' . "\r\n";
          $status = DB::table('payment')->whereIn('id',$paymentId)->update(array('request_for_invoice_status' => '1'));
          if($status){
          mail($to,$subject,$message,$headers);
            return redirect('/request-for-invoice')->with('success', 'Request For Invoice Sent Successfully');
          }else{
            return redirect('/request-for-invoice')->with('failure', 'Some Problem Occured Try Again');
          }
      }if($request->get('send_request') && $request->get('send_request')=='yes' && $request->get('agent_id')=='all'){
        return redirect('/request-for-invoice')->with('failure', 'Please select one agent'); 
      }
      $data     = array('students'=>$student,'session'=>$session);
      return view('admin.request-for-invoice')->with($data);
    }

    private function get_sum_paid_fee_by_assign_id($assign_id=null){
      $students =  DB::select("select sum(debit_fee) as paid_fee from payment where offer_assign='$assign_id' and payment_status='Success' group by offer_assign");
      if($students){
        return $students[0]->paid_fee;
      }else{
         return 0;
      }
    }

    public function report_list(Request $request){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $reports = [];

      if($session->type=='admin' || $session->type=='employee'){
         $students =  DB::select("select offer.*,assign_id,surname,given_name,phone_number,agent.email as agent_email from students join agent on students.created_by_id=agent.id join offer on students.id=offer.student_id");
      }else{
         $students =  DB::select("select offer.*,assign_id,surname,given_name,phone_number,agent.email as agent_email from students join agent on students.created_by_id=agent.id join offer on students.id=offer.student_id where created_by_id='$id'");
      }     
      if($students){
        foreach ($students as $key => $student) {
          $application_fee    = $student->application_fee;
          $oshc_amount        = $student->oshc_amount;
          $course_amount      = array_sum(json_decode($student->course_amount,true));
          $material_amount    = array_sum(json_decode($student->material_amount,true));
          $placement_amount   = $student->placement_amount;
          $homestay_amount    = $student->homestay_amount;
          $airport_amount     = $student->airport_amount;
          $student->total_fee = $application_fee + $oshc_amount + $course_amount + $material_amount + $placement_amount + $homestay_amount+ $airport_amount;
          $student->paid_fee  = $this->get_sum_paid_fee_by_assign_id($student->assign_id);
          $reports[] = $student;
        }

      }
      $data     = array('students'=>(object) $reports,'session'=>$session);
      return view('admin.report-list')->with($data);
    } 

    public function report_list_details(Request $request,$assign_id=null){
      $session = $request->session()->get('member');
      $id      = $session->id;
      $assign_id = base64_decode($assign_id);
      if($session->type=='admin' || $session->type=='employee'){
        $student    =  DB::select("select *,payment.id as payment_id,students.email as student_email,students.id as student_id,agent.email as agent_email,payment.id as paymentId from payment join students on students.assign_id=payment.offer_assign join agent on students.created_by_id = agent.id where offer_assign='$assign_id' and payment_status='Success' order by payment_date desc");
      }else{
          $student    =  DB::select("select *,payment.id as payment_id,students.email as student_email,students.id as student_id,agent.email as agent_email,payment.id as paymentId from payment join students on students.assign_id=payment.offer_assign join agent on students.created_by_id = agent.id where created_by_id='$id' and offer_assign='$assign_id' and payment_status='Success' order by payment_date desc");
      }    
       $data     = array('students'=>$student,'session'=>$session);
       return view('admin.initial-payment-list')->with($data);
    }

    public function report_single(Request $request){
      $session  = $request->session()->get('member');
      $id = $session->id;

      if($request->get('agent_id') && $request->get('agent_id')!='all'){
        $agent_id                   = $request->get('agent_id');
        $start_date                 = explode("/",$request->get('start_date'));
        $start_date                 = $start_date[2]."-".$start_date[1]."-".$start_date[0];
        $end_date                   = explode("/",$request->get('end_date'));
        $end_date                 = $end_date[2]."-".$end_date[1]."-".$end_date[0]; 

        $and = "where created_by_id = '$agent_id' and payment_status='Success' and payment_date between '$start_date' and '$end_date'";
        if($session->type=='agent'){
          $and = "and payment_date between '$start_date' and '$end_date'";
        }

      }else{
        $and = "";
      }

      if($session->type=='admin' || $session->type=='employee'){
         $student    =  DB::select("select *,payment.id as payment_id,students.email as student_email,students.id as student_id,agent.email as agent_email,payment.id as paymentId from payment join students on students.assign_id=payment.offer_assign join agent on students.created_by_id = agent.id and payment_status='Success' $and");
      }else{
        $student    =  DB::select("select *,payment.id as payment_id,students.email as student_email,agent.email as agent_email,payment.id as paymentId from payment join students on students.assign_id=payment.offer_assign join agent on students.created_by_id = agent.id where created_by_id='$id' and payment_status='Success' $and");
      }  
      $data     = array('students'=>$student,'session'=>$session);
      return view('admin.report-single')->with($data);
    }

    public function email_compose(Request $request){
      $session  = $request->session()->get('member');
      $id = $session->id;
      if($session->type=='admin' || $session->type=='employee'){
         $students =  DB::select("select id,email,surname,given_name from students");
         $agent    =  DB::select("select id,name,email,type from agent where type='agent'");
         $employee =  DB::select("select id,name,email,type from agent where type!='agent'");
      }else{
         $employee    =  DB::select("select name,email,type from agent where type='admin'");
         $students =  [];
         $agent =  [];
      }
        $data     = array('agent'=>$agent,'students'=>$students,'session'=>$session,'employee'=>$employee);
        return view('admin.email-compose')->with($data);
    }

    public function email_compose_submit(Request $request){
      $session      = $request->session()->get('member');
      $sender_email = $session->email;
      $to_array        = $request->input('to_array');
      $enquery_subject = $request->input('enquery_subject');
      $enquery_message = $request->input('enquery_message');
      $message = '<img src="'.asset("/images/college_logo.png").'" alt="Logo"><br>';
      $message .=  "Sender Email ".$sender_email."<br>";
      $message .=  $enquery_message;
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= 'From: <webmaster@example.com>' . "\r\n";
      if(count($to_array)>0){
        foreach ($to_array as $key => $emails) {
          if(!empty($emails) && $emails!='multiselect-all'){
             mail($emails,$enquery_subject,$message,$headers);
          }
        }
      }
      return redirect('/email-compose')->with('success', 'Selected mail sent Successfully');
    }

    public function enquiry_list(Request $request){
      $session  = $request->session()->get('member');
      $id = $session->id;

      if($session->type=='admin' || $session->type=='employee'){
         $enquiry =  DB::select("select a.id as id,a.created_at as created_at,a.enquery_subject as enquery_subject,a.enquery_message as enquery_message,a.attachment as attachment, c.name as to_name,b.name as from_name,a.from_id as from_id from enquiry as a join agent as b on a.from_id=b.id join agent as c on a.to_id=c.id order by a.created_at desc");
      }else{
         $enquiry =  DB::select("select a.id as id,a.created_at as created_at,a.enquery_subject as enquery_subject,a.enquery_message as enquery_message,a.attachment as attachment, c.name as to_name,b.name as from_name,a.from_id as from_id from enquiry as a join agent as b on a.from_id=b.id join agent as c on a.to_id=c.id where a.from_id='$id' or a.to_id='$id' order by a.created_at desc");
      }   

     
      $data     = array('students'=>$enquiry,'session'=>$session);
      return view('admin.enquiry-list')->with($data);
    }

    public function enquiry_compose(Request $request){
      $session  = $request->session()->get('member');
      $id = $session->id;
      if($session->type=='admin' || $session->type=='employee'){
         $students =  DB::select("select id,email,surname,given_name from students");
         $agent    =  DB::select("select id,name,email,type from agent where type='agent'");
         $employee =  DB::select("select id,name,email,type from agent where type!='agent'");
      }else{
         $employee    =  DB::select("select id,name,email,type from agent where type='admin'");
         $students =  [];
         $agent =  [];
      }
        $data     = array('agent'=>$agent,'students'=>$students,'session'=>$session,'employee'=>$employee);
        return view('admin.enquiry-compose')->with($data);
    }

    public function enquiry_compose_submit(Request $request){
      $session      = $request->session()->get('member');
      $sender_email = $session->email;
      $to_array        = $request->input('to_array');
      if($request->hasFile('enquiry_file')){
                 $image = $request->file('enquiry_file');
                 $filename = str_replace(' ','_',time().'_signature_'.$image->getClientOriginalName());
                 $image->move(public_path('enquiry_docs'), $filename); 
                 $filename= $filename;
      }else{
                 $filename= '';
      }

      $insert = [
                  'from_id' => $session->id,
                  'to_id'=>$to_array,
                  'enquery_subject'=> $request->input('enquery_subject'),
                  'enquery_message'=> $request->input('enquery_message'),
                  'attachment'=> $filename,
                ];
      $status = DB::table('enquiry')->insert($insert);
      if($status){
          return redirect('/enquiry-list')->with('success', 'Enquiry Send Successfully');
      }else{
          return redirect('/enquiry-list')->with('failure', 'Some Problem Occured Try again');

      }
    }

    public function enquiry_list_view(Request $request,$enquiry_id=null){
      $session  = $request->session()->get('member');

     $enquiry_id = base64_decode($enquiry_id);
     $enquiry =  DB::select("select a.id as id,a.created_at as created_at,a.enquery_subject as enquery_subject,a.enquery_message as enquery_message,a.attachment as attachment, c.name as to_name,b.name as from_name,a.from_id as from_id,b.email as from_email,c.email as to_email from enquiry as a join agent as b on a.from_id=b.id join agent as c on a.to_id=c.id where a.id='$enquiry_id'");
      $data = array('agent'=>$enquiry[0],'session'=>$session);
      return view('admin.enquiry-list-view')->with($data);
    }

    public function notification_list(Request $request){
      $session  = $request->session()->get('member');
      if($session->type=='admin' || $session->type=='employee'){
        $offer    =  DB::select('select * from notification order by id desc');
      }else{
        $offer    =  (object) [];
      }
      $data     = array('students'=>$offer,'session'=>$session);
      return view('admin.notification-list')->with($data);
    }

    public function notification_create(Request $request){
      $session  = $request->session()->get('member');
      $data     = array('session'=>$session);
      return view('admin.notification-create')->with($data);
    }

    public function notification_create_submit(Request $request){
         $validator = Validator::make($request->all(), [
            'enquery_subject' => 'required|max:500',
            'enquery_message' => 'required|max:10000',
            ]);
           
            if ($validator->fails()){
                return redirect('notification-create/')->withErrors($validator)->withInput();
            }else{
                if($request->hasFile('notification_attchment')){
                   $image = $request->file('notification_attchment');
                   $filename = str_replace(' ','_',time().'_notification_'.$image->getClientOriginalName());
                   $image->move(public_path('notification_docs'), $filename); 
                   $filename= $filename;
                }else{
                    $filename= '';
                }
                $insert = [
                            'notification_subject'=> $request->input('enquery_subject'),
                            'notification_message'=> $request->input('enquery_message'),
                            'attachment'=> $filename,
                            'agent_read_status'=> 0,
                          ];
            $status = DB::table('notification')->insert($insert);
            if($status){
                return redirect('/notification-list')->with('success', 'Notification Created Successfully');
            }else{
                return redirect('/notification-list')->with('failure', 'Some Problem Occured Try again');

            }
          }
    }

    public function notification_list_view(Request $request,$mailId=null){
      $session  = $request->session()->get('member');
      $id = base64_decode($mailId);
      $users = DB::table('notification')->where('id', '=',$id)->first();
      $data = array('agent'=>$users,'session'=>$session);
      return view('admin.notification-list-view')->with($data);
    }

}
