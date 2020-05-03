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
   public function get_config(){
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

   
}
  