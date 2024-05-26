<?php

namespace App\Http\Controllers\API\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use App\Models\SubServices;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
	
    
    public function index()
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
            
            $subservices = SubServices::all();
            
            $results = [];
            foreach ($subservices as $sub){
                
                $results[] = [
                    'service_name' 	      => isset($sub->servicetype->service_name) ? $sub->servicetype->service_name : null,
                    'sub_service_name'         => isset($sub->service_name) ? $sub->service_name : null,
                    'description'         => isset($sub->description) ? $sub->description : null,
                    'duration'         => isset($sub->duration) ? $sub->duration : null,
                    'price'         => isset($sub->price) ? $sub->price : null,
                    'image'         => isset($sub->image) ? $sub->image : null,
                    'status_id'        => ($sub->status_id == 1) ? 'Active' : ($sub->status_id == 2 ? 'Inactive' : '' )
                ];
            }
            
            return response()->json(['status' => true, 'data' => $results],200);
            
        }
        catch(\Exception $e)
        {
            return response()->json(["status" => false, "message" => 'Something went wrong.', "errors" => print_exn($e)]);
        }
    }
    
    public function store(Request $request)
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
                'service_type'    => 'required',
                'service_name'    => 'required',
                'description'     => 'required',
                'duration'        => 'required',
                'price'           => 'required',
                'status_id'           => 'required',
            ];
            
            $validator = Validator::make($data, $rules);
            
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    "message" => "Validation errors occured.",
                    "errors" => implode('\n', array_flatten($validator->errors()->toArray()))
                ]);
            }
            
            if($request->hasFile('image'))
            {
                $file = $request->file('image');
                
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
                
                $filename  = "ser_".date('YmdHis').".".$ext;
                
                $new_dir = 'uploads/subservices/'.date('Y/m');
                
                if(!is_dir($new_dir))
                {
                    @mkdir($new_dir,0777,true);
                }
                
                $full_file = $new_dir.'/'.$filename;
                
                $file->move($new_dir,$filename);
                
                $services_data = [
                    'service_type'       => isset($data['service_type']) ? $data['service_type'] : null,
                    'service_name'       => isset($data['service_name']) ? $data['service_name'] : null,
                    'description'        => isset($data['description']) ? $data['description'] : null,
                    'duration'           => isset($data['duration']) ? $data['duration'] : null,
                    'price'              => isset($data['price']) ? $data['price'] : null,
                    'image'              => $full_file,
                    'status_id'          => isset($data['status_id']) ? $data['status_id'] : null,
                ];
                
                DB::beginTransaction();
                
                SubServices::insertGetId($services_data);
                DB::commit();
                
                return response()->json(['status' => true, 'message' => 'Services added successfully.'],200);
                
            }else
            {
                return response(["status"  => false,"message" => "Please upload Service Image"]);
            } 
         
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
            
            $services = SubServices::where('id',$id)->first();
            
            $services = [
                'service_name'           => isset($services->servicetype->service_name) ? $services->servicetype->service_name : null,
                'sub_service_name'       => isset($services->sub_service_name) ? $services->sub_service_name : null,
                'description'            => isset($services->description) ? $services->description : null,
                'duration'               => isset($services->duration) ? $services->duration : null,
                'price'                  => isset($services->price) ? $services->price : null,
                'image'                  => isset($services->image) ? $services->image : null,
                'status_id'              => ($services->status_id == 1) ? 'Active' : ($services->status_id == 2 ? 'Inactive' : '' )
                
            ];
            
            return response()->json(['status' => true, 'data' => $services],200);
            
        }
        catch(\Exception $e)
        {
            return response()->json(["status" => false, "message" => 'Something went wrong.', "errors" => print_exn($e)]);
        }
    }
    
    public function update(Request $request, $id)
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
                'service_type'    => 'required',
                'service_name'    => 'required',
                'description'     => 'required',
                'duration'        => 'required',
                'price'           => 'required',
                'status_id'       => 'required',
                
            ];
            
            $validator = Validator::make($data, $rules);
            
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    "message" => "Validation errors occured.",
                    "errors" => implode('\n', array_flatten($validator->errors()->toArray()))
                ]);
            }
            
            if ($request->hasFile('image'))
            {
                $file = $request->file('image');
                
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
                
                /*    if(File::exists($data['old_image']))
                 {
                 File::delete($data['old_image']);
                 } */
                
                $filename  = "ser_".date('YmdHis').".".$ext;
                
                $new_dir = 'uploads/subservices/'.date('Y/m');
                
                if(!is_dir($new_dir))
                {
                    @mkdir($new_dir,0777,true);
                }
                
                $full_file = $new_dir.'/'.$filename;
                
                $file->move($new_dir,$filename);
                
              
            }
            else {
                
                $full_file = '';
            }
            
            /*    if($full_file=='' && $data['old_image']!='')
             {
             $full_file = $data['old_image'];
             } */
             
            
            $update_data = [
                'service_type'       => isset($data['service_type']) ? $data['service_type'] : null,
                'service_name'       => isset($data['service_name']) ? $data['service_name'] : null,
                'description'        => isset($data['description']) ? $data['description'] : null,
                'duration'           => isset($data['duration']) ? $data['duration'] : null,
                'price'              => isset($data['price']) ? $data['price'] : null,
                'image'              => $full_file,
                'status_id'          => isset($data['status_id']) ? $data['status_id'] : null,
                
            ];
            
            DB::beginTransaction();
            
            DB::table('sub_services')->where('id',$id)->update($update_data);
            
            DB::commit();
            
           return response()->json(['status' => true, 'message' => 'Services Updated successfully.'],200);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage(),
            ], 500);
        }
        
    }
    
	
    
}
