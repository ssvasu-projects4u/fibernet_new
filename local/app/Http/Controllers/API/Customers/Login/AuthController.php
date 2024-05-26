<?php

namespace App\Http\Controllers\API\Customers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Customers\PetInfo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use App\Models\Customers\UserPersonalInfo;
use App\Models\Customers\UserLocations;
use App\Models\UserDevice;
use App\Http\PushNotificationTrait;
use App\Models\Customers\CustomerBankDetails;


class AuthController extends Controller
{
	 public $token = true;
	 
	 use PushNotificationTrait;
	 
	 public function sendOTP(Request $request)
	 {
	     $data = $request->all();
	     
	     try {
	             $mobile = trim($data['mobile']);
	             $date = new \DateTime();
	             $date->modify('-60 minutes');
	             $formatted = $date->format('Y-m-d H:i:s');
	             
	             DB::table('user_otp')->where('user_id', $mobile)->where('type', 1)->where('created_at', '>=', $formatted)->delete();
	             
	             $old_otp = DB::table('user_otp')->where('user_id', $mobile)->where('type', 1)->first();
	             
	             if(isset($old_otp->otp)) {
	                 
	                 $otp = $old_otp->otp;
	             }
	             else {
	                 
	                 $otp = User::generateOTP();
	                 
	                 $insert_data = [
	                     'user_id'      => $mobile,
	                     'otp'          => $otp,
	                     'created_at'   => date('Y-m-d H:i:s'),
	                 ];
	                 
	                 DB::table('user_otp')->insert($insert_data);
	             }
	             
	             $masked_mobile = str_repeat("x", (strlen($mobile) - 4)).substr($mobile,-4,4);
	             
	             $results =  [
	                 'mobile'		        => $mobile,
	                 'otp'		            => $otp,
	                 'success_meessage'     => 'OTP sent to' .'-'.$masked_mobile
	             ];
	             
	             /* Sent SMS Funtioality HERE */
	             
	             /* $sms_template = DB::table('sms_templates')->where('id', 13)->first();
	             
	             $text = $sms_template->content;
	             
	             $text = str_replace('{otp}', $otp, $text);
	             
	             SMSHorizon::sendSMS([
	                 'mobile' 		  => $mobile,
	                 'message' 		  => $text,
	                 'purpose' 		  => 'Forgot Password OTP',
	                 'sms_template_id' => $sms_template->id,
	                 'receiver_name'   => $receiver_name
	             ]); */
	             
	         return response()->json(["status" => true, "message" => $results],200);
	         
	     }
	     catch (\Exception $e) {
	         return response()->json(["status" => false, "message" => "Something went wrong", "errors" => $e->getMessage()]);
	     }
	 }
	 
	 public function validateOTP(Request $request)
	 {
	     try {
	         
	         if($request->input('login_type') == 1)
	         {
	         
    	         $validator = Validator::make($request->all(), [
    	             'mobile' => 'required|numeric',
    	             'mobile_otp' => 'required|string',
    	         ]);
    	         
    	         if ($validator->fails()) {
    	             return response()->json([
    	                 'status' => false,
    	                 'message' => 'Validation failed',
    	                 'errors' => $validator->errors(),
    	             ], 400);
    	         }
    	         
    	         $mobile = $request->input('mobile');
    	         $mobile_otp = $request->input('mobile_otp');
    	         $login_type = $request->input('login_type');
    	         
    	         // Fetch original OTP from the database
    	         $original_otp = DB::table('user_otp')->where('user_id', $mobile)->first();
    	         
    	         if ((string)$original_otp->otp !== $mobile_otp) {
    	             
    	             return response()->json([
    	                 'status' => false,
    	                 'message' => 'OTP not matched.',
    	             ], 400);
    	         }
    	         
    	         // Delete the OTP after successful validation
    	         DB::table('user_otp')->where('user_id', $mobile)->delete();
    	         
    	         // Create or update user
    	         $user = User::where('mobile', $mobile)->first();
    	         
    	         if (!$user) {
    	             $user = User::create([
    	                 'mobile' => $mobile,
    	                 'login_type' => $login_type,
    	                 'status' => 1,
    	                 'role_id' => 2,
    	                 'created_at' => now(),
    	             ]);
    	         }
    	         
    	         // Generate JWT token
    	         $jwt_token = Auth::guard('api')->login($user);
    	         
    	         if (!$jwt_token) {
    	             return response()->json([
    	                 'status' => false,
    	                 'message' => 'Failed to generate token.',
    	             ], 500);
    	         }
    	         
    	         $register_key = DB::table('user_personal_info')->where('user_id',$user->id)->count();
    	         $pet_info_key = PetInfo::where('owner_id',$user->id)->count();
    	         
    	         return response()->json([
    	             'status' => true,
    	             'message' => 'Successfully logged in.',
    	             'token' => $jwt_token,
    	             'data' => [
    	                 'user_id' => $user->id,
    	                 'name' => $user->name,
    	                 'mobile' => $user->mobile,
    	                 'register_key' => ($register_key > 0) && !empty($register_key) ? 1 : null,
    	                 'pet_info_key' => ($pet_info_key > 0) && !empty($pet_info_key) ? 1 : null
    	             ],
    	         ]);
	         
	         }else{
	             
	             $validator = Validator::make($request->all(), [
	                 'login_type' => 'required',
	                 'email'      => 'required|string',
	             ]);
	             
	             if ($validator->fails()) {
	                 return response()->json([
	                     'status' => false,
	                     'message' => 'Validation failed',
	                     'errors' => $validator->errors(),
	                 ], 400);
	             }
	             
	             $email = $request->input('email');
	             $authenticate_key = $request->input('authenticate_key');
	             $login_type = $request->input('login_type');
	             
	             if($authenticate_key == 2){
	                 
	                 return response()->json([
	                     'status' => false,
	                     'message' => 'Failed to Authentication.',
	                 ], 500);
	             }
	             
	             $user = User::where('email', $email)->first();
	             
	             if (!$user) {
	                 $user = User::create([
	                     'email' => $email,
	                     'login_type' => $login_type,
	                     'status' => 1,
	                     'role_id' => 2,
	                     'created_at' => now(),
	                 ]);
	             }
	             
	             // Generate JWT token
	             $jwt_token = Auth::guard('api')->login($user);
	             
	             if (!$jwt_token) {
	                 return response()->json([
	                     'status' => false,
	                     'message' => 'Failed to generate token.',
	                 ], 500);
	             }
	             
	             $register_key = DB::table('user_personal_info')->where('user_id',$user->id)->count();
	             $pet_info_key = PetInfo::where('owner_id',$user->id)->count();
	             
	             return response()->json([
	                 'status' => true,
	                 'message' => 'Successfully logged in.',
	                 'token' => $jwt_token,
	                 'data' => [
	                     'user_id' => $user->id,
	                     'name' => $user->name,
	                     'mobile' => $user->mobile,
	                     'register_key' => ($register_key > 0) && !empty($register_key) ? 1 : null,
	                     'pet_info_key' => ($pet_info_key > 0) && !empty($pet_info_key) ? 1 : null
	                 ],
	             ]);
	             
	         }
	         
	     } catch (\Exception $e) {
	         return response()->json([
	             'status' => false,
	             'message' => 'Something went wrong.',
	             'errors' => $e->getMessage(),
	         ], 500);
	     }
	    
	 }
	 
	 public function getProfile()
	 {
	     $token = JWTAuth::getPayload();
	     $decode_code = json_decode($token);
	     $get_auth_id = isset($decode_code->sub) ? $decode_code->sub : '' ;
	     
	     if(isset($get_auth_id) && !empty($get_auth_id)){
	         $user_id = $get_auth_id;
	     }
	     else
	     {
	         return response()->json([ 'status' => false, 'message' => "Access Denied" ]);
	     }
	     
	     $user = User::find($user_id);
	     
	     $response = array(
	         "status" 		=> true,
	         "message" 		=> "Profile Info.",
	         "data" 			=> [
	             "user_id" 			=> $user->id,
	             "mobile" 			=> isset($user->mobile) ? $user->mobile : (isset($user->userinfo->mobile) ? $user->userinfo->mobile : ''),
	             "name"				=> isset($user->name) ? $user->name : null,
	             "email" 			=> isset($user->userinfo->email) ? $user->userinfo->email: (isset($user->email) ? $user->email : ''),
	             "gender_id" 	    => isset($user->userinfo->gender) ? $user->userinfo->gender : '',
	             "gender" 			=> isset($user->userinfo->genderinfo->name) ? $user->userinfo->genderinfo->name : null,
	             "profile_pic" 		=> isset($user->userinfo->profile_pic) ? url($user->userinfo->profile_pic) : null,
	             "role_id" 		    => $user->role_id,
	             "status" 			=> $user->status
	         ],
	         
	     );
	     
	     return response()->json($response);
	 }
	 
	 public function updateProfile(Request $request)
	 {
	     try {
    	     
	         $token = JWTAuth::getPayload();
    	     $decode_code = json_decode($token);
    	     $get_auth_id = isset($decode_code->sub) ? $decode_code->sub : '' ;
    	     
    	     $user_id = null;
    	     if(isset($get_auth_id) && !empty($get_auth_id))
    	     {
    	         $user_id = $get_auth_id;
    	     }
    	     else
    	     {
    	         return response()->json([ 'status' => false, 'message' => "Access Denied" ]);
    	     }
    	     
    	     $data = $request->all();
    	     
    	     $id = UserPersonalInfo::where('user_id',$user_id)->value('id');
    	     
    	     $rules = [
    	         'full_name'      => 'required|max:150',
    	         'email'          => 'nullable|email|max:250|unique:user_personal_info,email,'.$id,
    	         'gender'         => 'required',
    	     ];
    	     
    	     $validator = Validator::make($data, $rules);
    	     
    	     if ($validator->fails()) {
    	         return response()->json([
    	             'status' => false,
    	             "message" => "Validation errors occured.",
    	             "errors" => implode('\n', Arr::flatten($validator->errors()->toArray()))
    	         ],422);
    	     }
    	     
    	     $profile_data = [
    	         'user_id'  	    => $user_id,
    	         'full_name'      	=> isset($data['full_name']) ? $data['full_name'] : null,
    	         'email'    	    => isset($data['email']) && !empty(trim($data['email'])) ? $data['email'] : null,
    	         'gender'    	    => isset($data['gender']) ? $data['gender'] : null,
    	         'created_at'    	=> date('Y-m-d H:i:s'),
    	         'created_by'    	=> $user_id,
    	         'updated_by'    	=> $user_id,
    	         'updated_at'    	=> date('Y-m-d H:i:s')
    	     ];
    	     
    	     DB::beginTransaction();
    	     
    	     $attributes['user_id'] = $user_id;
    	     
    	     $update = UserPersonalInfo::updateOrCreate($attributes, $profile_data);
    	     
        	 /* Update Profile Pic */    
    	     
	         if ($request->hasFile('profile_pic'))
    	     {
    	         $file = $request->file('profile_pic');
    	         
    	         $ext  = strtolower($file->getClientOriginalExtension());
    	         
    	         if(!in_array($ext,['pdf','jpg','jpeg','png']))
    	         {
    	             DB::rollBack();
    	             return response()->json(['error' => 'Only pdf, jpg, jpeg, png files are allowed, Please upload valid files'], 400);
    	         }
    	         
    	         $size = $file->getSize();
    	         
    	         $doc_size_limit = config('constants.document-upload-max-size');
    	         
    	         if($size > $doc_size_limit) {
    	             DB::rollBack();
    	             return response()->json(['error' => 'Picture size should not be more than '.$doc_size_limit], 400);
    	         }
    	         
    	         $filename  = "pro_".date('YmdHis').".".$ext;
    	         
    	         $folderPath = 'uploads/customers/owners/'.$user_id.'/';
    	         
    	         $old = UserPersonalInfo::where('user_id',$user_id)->value('profile_pic');
    	         
    	         if(File::exists($old))
    	         {
    	             File::delete($old);
    	         }
    	         
    	         $new_dir = $folderPath.'/'.date('Y/m');
    	         
    	         if(!is_dir($new_dir))
    	         {
    	             @mkdir($new_dir,0777,true);
    	         }
    	         
    	         $pet_file = $new_dir.'/'.$filename;
    	         
    	         $file->move($new_dir,$filename);
    	         
    	         UserPersonalInfo::where('user_id',$user_id)->update(['profile_pic' => $pet_file]);
    	     }
    	     
    	     if(!empty($update)>0){
    	         
    	         $user_data = [
    	             'name'      	    => isset($data['full_name']) ? $data['full_name'] : null,
    	             'mobile'      	    => isset($data['mobile']) ? $data['mobile'] : null,
    	             'email'      	    => isset($data['email']) && !empty(trim($data['email'])) ? $data['email'] : null,
    	             'role_id'    	    => 2
    	         ];
    	         
    	         $locations = [
    	             'user_id'  	    => $user_id,
    	             'location'      	=> isset($data['location']) ? $data['location'] : null,
    	             'address'      	=> isset($data['address']) ? $data['address'] : null,
    	             'country'      	=> isset($data['country']) ? $data['country'] : null,
    	             'city'      	    => isset($data['city']) ? $data['city'] : null,
    	             'state'      	    => isset($data['state']) ? $data['state'] : null,
    	             'pin_code'      	=> isset($data['pin_code']) ? $data['pin_code'] : null,
    	             'is_primary'      	=> isset($data['is_primary']) ? $data['is_primary'] : null,
    	             'location_type'    => isset($data['location_type']) ? $data['location_type'] : null,
    	             'latitude'      	=> isset($data['latitude']) ? $data['latitude'] : null,
    	             'longitude'      	=> isset($data['longitude']) ? $data['longitude'] : null,
    	             'created_at'      	=> date('Y-m-d H:i:s'),
    	             'created_by'    	=> auth()->id() ? auth()->id() : $user_id,
    	         ];
    	         
    	         DB::table('user_locations')->insert($locations);
    	         User::where('id',$user_id)->update($user_data);
    	     }
	       DB::commit();
	       return response()->json(['status' => true, 'message' => 'Profile updated successfully.']);
	     
	     } catch (\Exception $e) {
	         return response()->json([
	             'status' => false,
	             'message' => 'Something went wrong.',
	             'errors' => $e->getMessage().'-'.$e->getLine(),
	         ], 500);
	     }
	     
	 }
	 
	 public function updateProfilePic(Request $request)
	 {
	     try
	     {
	         $token = JWTAuth::getPayload();
	         $decode_code = json_decode($token);
	         $get_auth_id = isset($decode_code->sub) ? $decode_code->sub : '' ;
	         
	         $user_id = null;
	         if(isset($get_auth_id) && !empty($get_auth_id))
	         {
	             $user_id = $get_auth_id;
	         }
	         else
	         {
	             return response()->json([ 'status' => false, 'message' => "Access Denied" ]);
	         }
	         
	         DB::beginTransaction();
	         
	         if ($request->hasFile('profile_pic'))
	         {
	             $file = $request->file('profile_pic');
	             
	             $ext  = strtolower($file->getClientOriginalExtension());
	             
	             if(!in_array($ext,['pdf','jpg','jpeg','png']))
	             {
	                 DB::rollBack();
	                 return response()->json(['error' => 'Only pdf, jpg, jpeg, png files are allowed, Please upload valid files'], 400);
	             }
	             
	             $size = $file->getSize();
	             
	             $doc_size_limit = config('constants.document-upload-max-size');
	             
	             if($size > $doc_size_limit) {
	                 DB::rollBack();
	                 return response()->json(['error' => 'Picture size should not be more than '.$doc_size_limit], 400);
	             }
	             
	             $filename  = "pro_".date('YmdHis').".".$ext;
	             
	             $folderPath = 'uploads/customers/owners/'.$user_id.'/';
	             
	             $old = UserPersonalInfo::where('user_id',$user_id)->value('profile_pic');
	             
	             if(File::exists($old))
	             {
	                 File::delete($old);
	             }
	             
	             $new_dir = $folderPath.'/'.date('Y/m');
	             
	             if(!is_dir($new_dir))
	             {
	                 @mkdir($new_dir,0777,true);
	             }
	             
	             $pet_file = $new_dir.'/'.$filename;
	             
	             $file->move($new_dir,$filename);
	             
	             UserPersonalInfo::where('user_id',$user_id)->update(['profile_pic' => $pet_file]);
	             
	             return response()->json(["status" => true, "message" => "Profile Pic Updated Successfully."],200);
	         }
	         
	         DB::commit();
	     }
	     catch(\Exception $e)
	     {
	         return response()->json(["status" => false, "message" => "Something went wrong.", "errors" => $e->getMessage().'-'.$e->getLine()],501);
	     }
	     
	 }
	 

	 public function logout()
	 {
	     $token = JWTAuth::getPayload();
	     
	     JWTAuth::parseToken()->invalidate( $token );
	     
	     $decode_code = json_decode($token);
	     
	     $get_auth_id = isset($decode_code->sub) ? $decode_code->sub : '';
	     
	     if(isset($get_auth_id) && !empty($get_auth_id)) {
	         
	         $user_id = $get_auth_id;
	         
	         DB::table('users')->where('id', $user_id)->update(['logged_in' => null]);
	     }
	     
	     return response()->json([ 'status' => true, 'message' => "Successfully logged out from the application!" ]);
	 }
	 
	 public function saveDeviceDetails(Request $request)
	 {
	     try {
	         
	         $token = JWTAuth::getPayload();
	         $decode_code = json_decode($token);
	         $get_auth_id = isset($decode_code->sub) ? $decode_code->sub : '' ;
	         
	         $user_id = null;
	         if(isset($get_auth_id) && !empty($get_auth_id))
	         {
	             $user_id = $get_auth_id;
	         }
	         else
	         {
	             return response()->json([ 'status' => false, 'message' => "Access Denied" ]);
	         }
	         
	         $data = $request->all();
	         
	         if(!isset($data['device_type']) || trim($data['device_type']) == '')
	         {
	             return response(['status' => false, 'message' => 'Device type is required']);
	         }
	         
	         if(!isset($data['fcm_token']) || trim($data['fcm_token']) == '')
	         {
	             return response(['status' => false, 'message' => 'fcm token is required']);
	         }
	         
	         $user_data = [
	             'user_id'              => $user_id,
	             'device_type'         => (isset($data['device_type']) && !empty($data['device_type'])) ? $data['device_type'] : '',
	             'device_id'           => (isset($data['device_id']) && !empty($data['device_id'])) ? $data['device_id'] : '',
	             'device_model'        => (isset($data['device_model']) && !empty($data['device_model'])) ? $data['device_model'] : '',
	             'device_software'     => (isset($data['device_software']) && !empty($data['device_software'])) ? $data['device_software'] : '',
	             'device_manufacturer' => (isset($data['device_manufacturer']) && !empty($data['device_manufacturer'])) ? $data['device_manufacturer'] : '',
	             'brand'               => (isset($data['brand']) && !empty($data['brand'])) ? $data['brand'] : '',
	             'fcm_token'           => !empty($data['fcm_token']) ? $data['fcm_token'] : '',
	             'app_version'         => (isset($data['app_version']) && !empty($data['app_version'])) ? $data['app_version'] : '',
	             'status'              => 1,
	             'created_at'          => date('Y-m-d H:i:s')
	         ];
	         
	         DB::beginTransaction();
	         UserDevice::updateOrCreate(['user_id' => $user_id], $user_data);
	         DB::commit();
	         
	         $noti_msg = ['title'=>'Booking Intiated | '.date('m/d/Y'),  'desc' => 'Device Info Saved' ];
	         $this->pushNotification($user_id, $noti_msg);
	         
	         return response([
	             "status"    => true,
	             "message"   => 'Device details updated.',
	         ]);
	         
	     } catch (\Exception $e) {
	         DB::rollBack();
	         return response(['status' => false, 'message' => print_exn($e)]);
	     }
	 }
	 
	 public function storeUserLocation(Request $request, $id)
	 {
	     try {
	         
	         $token = JWTAuth::getPayload();
	         $decode_code = json_decode($token);
	         $get_auth_id = isset($decode_code->sub) ? $decode_code->sub : '' ;
	         
	         $user_id = null;
	         if(isset($get_auth_id) && !empty($get_auth_id))
	         {
	             $user_id = $get_auth_id;
	         }
	         else
	         {
	             return response()->json([ 'status' => false, 'message' => "Access Denied" ]);
	         }
	         
	         $data = $request->all();
	         
	         $rules = [
	             'location'         => 'required',
	             'address'          => 'required',
	             'country'          => 'required',
	             'city'             => 'required',
	             'state'            => 'required',
	             'pin_code'         => 'required',
	             'is_primary'       => 'required',
	             'location_type'    => 'required',
	             'latitude'         => 'required',
	             'longitude'        => 'required',
	            
	             
	         ];
	         
	         $validator = Validator::make($data, $rules);
	         
	         if ($validator->fails()) {
	             return response()->json([
	                 'status' => false,
	                 "message" => "Validation errors occured.",
	                 "errors" => implode('\n', array_flatten($validator->errors()->toArray()))
	             ]);
	         }
	         
	         $locations = [
	             'user_id'  	    => $user_id,
	             'location'      	=> isset($data['location']) ? $data['location'] : null,
	             'address'      	=> isset($data['address']) ? $data['address'] : null,
	             'country'      	=> isset($data['country']) ? $data['country'] : null,
	             'city'      	    => isset($data['city']) ? $data['city'] : null,
	             'state'      	    => isset($data['state']) ? $data['state'] : null,
	             'pin_code'      	=> isset($data['pin_code']) ? $data['pin_code'] : null,
	             'is_primary'      	=> isset($data['is_primary']) ? $data['is_primary'] : null,
	             'location_type'    => isset($data['location_type']) ? $data['location_type'] : null,
	             'latitude'      	=> isset($data['latitude']) ? $data['latitude'] : null,
	             'longitude'      	=> isset($data['longitude']) ? $data['longitude'] : null,
	             'created_at'      	=> date('Y-m-d H:i:s'),
	             'created_by'    	=> auth()->id() ? auth()->id() : $user_id,
	         ];
	         
	         
	         DB::beginTransaction();
	         
	         DB::table('user_locations')->insert($locations);
	         
	         DB::commit();
	         return response()->json(['status' => true, 'message' => 'User Location added successfully.'],200);
	         
	     } catch (\Exception $e) {
	         return response()->json([
	             'status' => false,
	             'message' => 'Something went wrong.',
	             'errors' => $e->getMessage(),
	         ], 500);
	     }
	     
	 }
	 
	 public function getLocations()
	 {
	     try
	     {
	         $token = JWTAuth::getPayload();
	         $decode_code = json_decode($token);
	         $get_auth_id = isset($decode_code->sub) ? $decode_code->sub : '' ;
	         
	         $user_id = null;
	         if(isset($get_auth_id) && !empty($get_auth_id))
	         {
	             $user_id = $get_auth_id;
	         }
	         else
	         {
	             return response()->json([ 'status' => false, 'message' => "Access Denied" ],403);
	         }
	         
	         $locations = UserLocations::where('user_id',$user_id)->get();
	         
	         $results = [];
	         foreach ($locations as $loc){
	             
	             $results[] = [
	                 'location_id'    => $loc->location_id,
	                 'user_id'        => isset($loc->user_id) ? $loc->user_id : null,
	                 'location'       => isset($loc->location) ? $loc->location : null,
	                 'address'        => isset($loc->address) ? $loc->address : null,
	                 'country'        => isset($loc->country) ? $loc->country : null,
	                 'country_id'     => isset($loc->country_id) ? $loc->country_id : null,
	                 'city'           => isset($loc->city) ? $loc->city : null,
	                 'city_id'        => isset($loc->city_id) ? $loc->city_id : null,
	                 'state'          => isset($loc->state) ? $loc->state : null,
	                 'state_id'       => isset($loc->state_id) ? $loc->state_id : null,
	                 'pin_code'       => isset($loc->pin_code) ? $loc->pin_code : null,
	                 'is_primary'     => isset($loc->is_primary) ? $loc->is_primary : null,
	                 'location_type'  => isset($loc->location_type) ? location_type_name($loc->location_type) : null,
	                 'latitude'       => isset($loc->latitude) ? $loc->latitude : null,
	                 'longitude'      => isset($loc->longitude) ? $loc->longitude : null,
	             ];
	         }
	         
	         return response()->json(['status' => true, 'data' => $results],200);
	         
	     }
	     catch(\Exception $e)
	     {
	         return response()->json(["status" => false, "message" => 'Something went wrong.', "errors" => print_exn($e)]);
	     }
	 }
	 
	 public function locationUpdatePrimary(Request $request)
	 {
	     try
	     {
	         $token = JWTAuth::getPayload();
	         $decode_code = json_decode($token);
	         $get_auth_id = isset($decode_code->sub) ? $decode_code->sub : '' ;
	         
	         $user_id = null;
	         if(isset($get_auth_id) && !empty($get_auth_id))
	         {
	             $user_id = $get_auth_id;
	         }
	         else
	         {
	             return response()->json([ 'status' => false, 'message' => "Access Denied" ],403);
	         }
	         
	         $data = $request->all();
	         
	         $location_id = isset($data['location_id']) ? $data['location_id'] : '';
	         
	         $update = UserLocations::where('user_id',$user_id)->where('location_id',$location_id)->update(['is_primary' =>1]);
	         
	         if($update > 0){
	             
	             UserLocations::where('user_id',$user_id)->whereRaw(" location_id != $location_id ")->update(['is_primary' => NULL]);
	         }
	         
	         return response()->json(['status' => true],200);
	         
	     }
	     catch(\Exception $e)
	     {
	         return response()->json(["status" => false, "message" => 'Something went wrong.', "errors" => print_exn($e)]);
	     }
	 }
	 
	 public function addBankDetails(Request $request)
	 {
	     try {
	         
	         $token = JWTAuth::getPayload();
	         $decode_code = json_decode($token);
	         $get_auth_id = isset($decode_code->sub) ? $decode_code->sub : '' ;
	         
	         $user_id = null;
	         if(isset($get_auth_id) && !empty($get_auth_id))
	         {
	             $user_id = $get_auth_id;
	         }
	         else
	         {
	             return response()->json([ 'status' => false, 'message' => "Access Denied" ]);
	         }
	         
	         $data = $request->all();
	         
	         $rules = [
	             'account_number'      => 'required|max:150',
	             'name'                => 'required',
	             'ifsc'                => 'required'
	         ];
	         
	         $validator = Validator::make($data, $rules);
	         
	         if ($validator->fails()) {
	             return response()->json([
	                 'status' => false,
	                 "message" => "Validation errors occured.",
	                 "errors" => implode('\n', Arr::flatten($validator->errors()->toArray()))
	             ],422);
	         }
	         
	         $bank_data = [
	             'user_id'  	    => $user_id,
	             'name'      	    => isset($data['name']) ? $data['name'] : null,
	             'account_number'   => isset($data['account_number']) && !empty(trim($data['account_number'])) ? $data['account_number'] : null,
	             'ifsc'    	        => isset($data['ifsc']) && !empty(trim($data['ifsc'])) ? $data['ifsc'] : null,
	             'created_by'    	=> $user_id,
	             'created_at'    	=> date('Y-m-d H:i:s'),
	             'updated_by'    	=> $user_id,
	             'updated_at'    	=> date('Y-m-d H:i:s')
	         ];
	         
	         DB::beginTransaction();
	         
	         $attributes['user_id'] = $user_id;
	         
	         $update = CustomerBankDetails::updateOrCreate($attributes, $bank_data);
	         
	         if(isset($update) && !empty($update)){
	             
	             $reciept_response = CustomerBankDetails::createRecipient($data['name'],$data['account_number'], $data['ifsc']);
	             
	             $reciept_details = json_decode($reciept_response->content());
	             
	             if(!$reciept_details->recipient_id)
	             {
	                 DB::rollBack();
	                 return response()->json([
	                     'status' => 400,
	                     'error' => 'Receiption details not created.',
	                     'message' => 'Something went wrong'
	                 ], 400);
	             }
	             
	             DB::table('customer_bank_details')->where('user_id',$user_id)->update(['recipient_id' => $reciept_details->recipient_id]);
	             
	         }
	         
	         DB::commit();
	         
	         return response()->json(['status' => true, 'message' => 'Bank Details added/updated successfully.']);
	         
	     } catch (\Exception $e) {
	         return response()->json([
	             'status' => false,
	             'message' => 'Something went wrong.',
	             'errors' => $e->getMessage(),
	         ], 500);
	     }
	     
	 }
   
}
