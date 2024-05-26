<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\File;
use App\Models\Customers\UserPersonalInfo;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    
    public function users(Request $request)
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
            
            if(can_api($user_id, 'view-users'))
            {
                try {
                
                $data = $request->all();
                
                $status_id = isset($data['status_id']) ? $data['status_id'] : 1;
                
                $users = User::where('role_id',1)
                ->where(function($q) use($status_id) {
                    if(!empty($status_id)) {
                        $q->where('status',$status_id);
                    }
                })->get();
                
                $user_data = [];
                
                foreach ($users as $user){
                
                    $user_data[] = [
                        'id'                 => isset($user->id) ? $user->id : null,
                        'name'               => isset($user->name) ? $user->name : null,
                        'mobile'             => isset($user->mobile) ? $user->mobile : null,
                        'email'    	         => isset($user->email) ? $user->email : null,
                        'status'    	     => isset($user->status) ? $user->status : null,
                        'role_id'    	     => isset($user->role_id) ? $user->role_id : null,
                        'created_at'   	     => date('Y-m-d H:i:s')
                    ];
                }
                
                return response()->json(['status' => true, 'data' => $user_data],200);
            
            } catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'Something went wrong.',
                    'errors' => $e->getMessage().'-'.$e->getLine(),
                ], 500);
            }
        
        }
        else {
            return response()->json(["status" => false, "message" => 'Access Denied!'], 403);
        }
        
    }
    
    public function storeUser(Request $request)
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
            
            $role_id   = $data['role_id'];
            
            $password = User::generateRandomPassword();
            
            $rules = [
                'name'          => 'required',
                'mobile'        => 'required',
                'email'         => 'required',
                'role_id'       => 'required',
            ];
            
            $validator = Validator::make($data, $rules);
            
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    "message" => "Validation errors occured.",
                    "errors" => implode('\n', array_flatten($validator->errors()->toArray()))
                ]);
            }
            
            $user_data = [
                'id'                 => isset($data['id']) ? $data['id'] : null,
                'name'               => isset($data['name']) ? $data['name'] : null,
                'user_type_id'       => isset($data['user_type_id']) ? $data['user_type_id'] : null,
                'mobile'             => isset($data['mobile']) ? $data['mobile'] : null,
                'email'    	         => isset($data['email']) ? $data['email'] : null,
                'login_type'    	 => isset($data['login_type']) ? $data['login_type'] : null,
                'password'    	     => bcrypt($password),
                'status'    	     => 1,
                'role_id'    	     => $role_id,
                'logged_in'    	     => isset($data['logged_in']) ? $data['logged_in'] : null,
                'created_by'         => $user_id,
                'created_at'   	     => date('Y-m-d H:i:s'),
            ];
            
            DB::beginTransaction();
            
            $uid = DB::table('users')->insertGetId($user_data);
          
            $role_perms = DB::table('role_permission')->where('role_id',$role_id)->pluck('permission_id')->all();
            
            if(count($role_perms)>0)
            {
                $perm_insert = [];
                foreach($role_perms as $rp)
                {
                    $perm_insert[] = [
                        'user_id'       => $uid,
                        'permission_id' => $rp
                    ];
                }
                
                DB::table('user_permission')->insert($perm_insert);
            }
            
            DB::commit();
            return response()->json(['status' => true, 'message' => 'User added successfully.'],200);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage(),
            ], 500);
        }
        
    }
    
    public function edit(Request $request ,$id)
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
            
            $user = User::where('id',$id)->first();
            
            $user = [
                
                'id'                 => isset($user->id) ? $user->id : null,
                'name'               => isset($user->name) ? $user->name : null,
                'mobile'             => isset($user->mobile) ? $user->mobile : null,
                'email'    	         => isset($user->email) ? $user->email : null,
                
            ];
            
            return response()->json(['status' => true, 'data' => $user],200);
            
        }
        catch(\Exception $e)
        {
            return response()->json(["status" => false, "message" => 'Something went wrong.', "errors" => print_exn($e)]);
        }
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
                'user_id'  	        => $user_id,
                'full_name'      	=> isset($data['full_name']) ? $data['full_name'] : null,
                'email'    	        => isset($data['email']) && !empty(trim($data['email'])) ? $data['email'] : null,
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
                
                $folderPath = 'uploads/management/'.$user_id.'/';
                
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
                
                $profile_pic = $new_dir.'/'.$filename;
                
                $file->move($new_dir,$filename);
                
                UserPersonalInfo::where('user_id',$user_id)->update(['profile_pic' => $profile_pic]);
                
              /*   if(isset($update) && !empty($update)){
                    
                    $user_data = [
                        'name'      	    => isset($data['full_name']) ? $data['full_name'] : null,
                        'mobile'    	    => isset($data['mobile']) && !empty(trim($data['mobile'])) ? $data['mobile'] : null,
                        'email'    	    => isset($data['email']) && !empty(trim($data['email'])) ? $data['email'] : null,
                    ];
                    
                    DB::table('users')->where('id',$user_id)->update($user_data);
                    
                } */
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
  
}
