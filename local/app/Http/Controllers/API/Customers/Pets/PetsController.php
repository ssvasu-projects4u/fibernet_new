<?php

namespace App\Http\Controllers\API\Customers\Pets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Customers\PetInfo;
use App\Models\Customers\PetParents;


class PetsController extends Controller
{
    public function storePet(Request $request)
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
                'pet_type'       => 'required',
                'pet_name'       => 'required|max:150',
                'breed'          => 'required',
                'color'          => 'required',
                'height'         => 'required',
                'weight'         => 'required',
                'gender'         => 'required',
            ];
            
            $validator = Validator::make($data, $rules);
            
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    "message" => "Validation errors occured.",
                    "errors" => implode('\n', array_flatten($validator->errors()->toArray()))
                ]);
            }
            
            $pet_data = [
                'owner_id'  	    => $user_id,
                'pet_type'          => isset($data['pet_type']) ? $data['pet_type'] : null,
                'pet_name'          => isset($data['pet_name']) ? $data['pet_name'] : null,
                'age_yr'            => isset($data['age_yr']) ? $data['age_yr'] : null,
                'age_month'         => isset($data['age_month']) ? $data['age_month'] : null,
                'dob'               => isset($data['dob']) ? $data['dob'] : null,
                'breed'    	        => isset($data['breed']) ? $data['breed'] : null,
                'color'    	        => isset($data['color']) ? $data['color'] : null,
                'height'    	    => isset($data['height']) ? $data['height'] : null,
                'weight'    	    => isset($data['weight']) ? $data['weight'] : null,
                'gender'    	    => isset($data['gender']) ? $data['gender'] : null,
                'created_by'    	=> $user_id,
                'created_at'    	=> date('Y-m-d H:i:s')
            ];
            
            DB::beginTransaction();
            
            $pet_id = PetInfo::insertGetId($pet_data);
            
              if($pet_id > 0){
            
                if ($request->hasFile('file'))
                {
                    $file = $request->file('file');
                    
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
                    
                    $filename  = "Pet_".date('YmdHis').".".$ext;
                    
                    $folderPath = 'uploads/customers/pets/'.$user_id.'/';
                    
                    $old = PetInfo::where('id',$pet_id)->where('owner_id',$user_id)->value('pet_profile_pic');
                    
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
                    
                    PetInfo::where('id',$pet_id)->where('owner_id',$user_id)->update(['pet_profile_pic' => $pet_file]);
                }
                
                /* Add or Update Pet Parents Info */
                
                /* if ($data['parent_name'] != '' || $data['parent_mobile'] != ''|| $data['parent_email'] != '')
                {
                    $pet_parent_data = [
                        'pet_id'  	        => $pet_id,
                        'full_name'         => isset($data['parent_name']) ? $data['parent_name'] : null,
                        'mobile'            => isset($data['parent_mobile']) ? $data['parent_mobile'] : null,
                        'email'             => isset($data['parent_email']) ? $data['parent_email'] : null,
                        'gender'    	    => isset($data['parent_gender']) ? $data['parent_gender'] : null,
                        'address'           => isset($data['address']) ? $data['address'] : null,
                        'state_id'          => isset($data['state_id']) ? $data['state_id'] : null,
                        'city'    	        => isset($data['city']) ? $data['city'] : null,
                        'country_id'    	=> isset($data['country_id']) ? $data['country_id'] : null,
                        'pincode'    	    => isset($data['pincode']) ? $data['pincode'] : null,
                        'status'    	    => 1,
                        'created_by'    	=> $user_id,
                        'created_at'    	=> date('Y-m-d H:i:s')
                    ];
                    
                    $attributes['pet_id'] = $pet_id;
                    
                   PetParents::updateOrCreate($attributes, $pet_parent_data);
                    
                } */
            }
            DB::commit();
            return response()->json(['status' => true, 'pet_id' => $pet_id, 'message' => 'Pet Info added successfully.']);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage(),
            ], 500);
        }
        
    }
    
    public function updatePetPic(Request $request, $pet_id)
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
            
            if ($request->hasFile('file'))
            {
                $file = $request->file('file');
                
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
                
                $filename  = "Pet_".date('YmdHis').".".$ext;
                
                $folderPath = 'uploads/customers/pets/'.$user_id.'/';
                
                $old = PetInfo::where('id',$pet_id)->where('owner_id',$user_id)->value('pet_profile_pic');
                
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
                
                PetInfo::where('id',$pet_id)->where('owner_id',$user_id)->update(['pet_profile_pic' => $pet_file]);
                
                return response()->json(["status" => true, "message" => "Pet Pic Updated Successfully."],200);
            }
            
            DB::commit();
        }
        catch(\Exception $e)
        {
            return response()->json(["status" => false, "message" => "Something went wrong.", "errors" => print_exn($e)]);
        }
        
        
    }
    
    public function petDetails(Request $request)
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
        
        $results = PetInfo::where('owner_id',$user_id)->orderBy('is_primary', 'DESC')->get();
        
        $pet_details = [];
        
        foreach ($results as $result){
            
            $pet_details[] = [
                'pet_id' 	      => isset($result->id) ? $result->id : null,
                'pet_type' 	      => isset($result->type->name) ? $result->type->name : null,
                'age' 	          => isset($result->age) ? $result->age : null,
                'dob' 	          => isset($result->dob) ? format_date($result->dob) : null,
                'breed' 	      => isset($result->breed_name->name) ? $result->breed_name->name : null,
                'color' 	      => isset($result->color_name->color) ? $result->color_name->color : null,
                'height' 	      => isset($result->height) ? $result->height : null,
                'weight' 	      => isset($result->weight) ? $result->weight : null,
                'gender' 	      => isset($result->genderinfo->name) ? $result->genderinfo->name : null,
                'pet_profile_pic' => isset($result->pet_profile_pic) ? url($result->pet_profile_pic) : null,
                'pet_name' 	      => isset($result->pet_name) ? $result->pet_name : null,
                'service_name' 	  => isset($result->servicename->service_name) ? $result->servicename->service_name : null,
                'category_name'   => isset($result->categoryname->category_name) ? $result->categoryname->category_name : null,
                'is_primary'      => isset($result->is_primary) ? $result->is_primary : null
            ];
        }
        
        return response()->json([
            'status' 		=> true,
            'data' 			=> $pet_details,
            'message' 		=> "Pet details info."
        ],200);
    }
    
    public function storePetParent(Request $request, $pet_id)
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
                'parent_name'       => 'required',
                'parent_mobile'     => 'required',
                'parent_email'      => 'required',
                'parent_gender'     => 'required',
                'address'           => 'required',
                'state_id'          => 'required',
                'city'              => 'required',
                'country_id'        => 'required',
                'pincode'           => 'required',
                'parent_type'       => 'required',
                
            ];
            
            $validator = Validator::make($data, $rules);
            
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    "message" => "Validation errors occured.",
                    "errors" => implode('\n', array_flatten($validator->errors()->toArray()))
                ]);
            }
            
            $pet_parent_data = [
                'pet_id'  	        => $pet_id,
                'full_name'         => isset($data['parent_name']) ? $data['parent_name'] : null,
                'mobile'            => isset($data['parent_mobile']) ? $data['parent_mobile'] : null,
                'email'             => isset($data['parent_email']) ? $data['parent_email'] : null,
                'gender'    	    => isset($data['parent_gender']) ? $data['parent_gender'] : null,
                'address'           => isset($data['address']) ? $data['address'] : null,
                'state_id'          => isset($data['state_id']) ? $data['state_id'] : null,
                'city'    	        => isset($data['city']) ? $data['city'] : null,
                'country_id'    	=> isset($data['country_id']) ? $data['country_id'] : null,
                'pincode'    	    => isset($data['pincode']) ? $data['pincode'] : null,
                'parent_type'    	=> isset($data['parent_type']) ? $data['parent_type'] : null,
                'status'    	    => 1,
                'user_id'       	=> $user_id,
                'created_by'    	=> $user_id,
                'created_at'    	=> date('Y-m-d H:i:s')
            ];
            
            DB::beginTransaction();
            
            PetParents::insert($pet_parent_data);
            
            DB::commit();
            return response()->json(['status' => true, 'message' => 'Pet Parent added successfully.'],200);
            
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
            
            
            $pet_parents = PetParents::where('id',$id)->first();
            
            $pet_parents = [
                'id'             => $pet_parents->id,
                'pet_id'         => isset($pet_parents->pet_id) ? $pet_parents->pet_id : null,
                'full_name'      => isset($pet_parents->full_name) ? $pet_parents->full_name : null,
                'mobile'         => isset($pet_parents->mobile) ? $pet_parents->mobile : null,
                'email'          => isset($pet_parents->email) ? $pet_parents->email : null,
                'gender'         => isset($pet_parents->gender) ? $pet_parents->gender : null,
                'address'        => isset($pet_parents->address) ? $pet_parents->address : null,
                'state_id'       => isset($pet_parents->state_id) ? $pet_parents->state_id : null,
                'city'           => isset($pet_parents->city) ? $pet_parents->city : null,
                'country_id'     => isset($pet_parents->country_id) ? $pet_parents->country_id : null,
                'pincode'        => isset($pet_parents->pincode) ? $pet_parents->pincode : null,
                'parent_type'    => isset($pet_parents->parent_type) ? $pet_parents->parent_type : null,
                'user_id'        => isset($pet_parents->user_id) ? $pet_parents->user_id : null,
                
                
            ];
            
            return response()->json(['status' => true, 'data' => $pet_parents],200);
            
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
                  'parent_name'       => 'required',
                  'parent_mobile'     => 'required',
                  'parent_email'      => 'required',
                  'parent_gender'     => 'required',
                  'address'           => 'required',
                  'state_id'          => 'required',
                  'city'              => 'required',
                  'country_id'        => 'required',
                  'pincode'           => 'required',
                  'parent_type'       => 'required',
                  
              ];
              
              $validator = Validator::make($data, $rules);
              
              if ($validator->fails()) {
                  return response()->json([
                      'status' => false,
                      "message" => "Validation errors occured.",
                      "errors" => implode('\n', array_flatten($validator->errors()->toArray()))
                  ]);
              }
              
              $update_data = [
                  'full_name'       => isset($data['parent_name']) ? $data['parent_name'] : null,
                  'mobile'          => isset($data['parent_mobile']) ? $data['parent_mobile'] : null,
                  'email'           => isset($data['parent_email']) ? $data['parent_email'] : null,
                  'gender'    	    => isset($data['parent_gender']) ? $data['parent_gender'] : null,
                  'address'         => isset($data['address']) ? $data['address'] : null,
                  'state_id'        => isset($data['state_id']) ? $data['state_id'] : null,
                  'city'    	    => isset($data['city']) ? $data['city'] : null,
                  'country_id'    	=> isset($data['country_id']) ? $data['country_id'] : null,
                  'pincode'    	    => isset($data['pincode']) ? $data['pincode'] : null,
                  'parent_type'    	=> isset($data['parent_type']) ? $data['parent_type'] : null,
                  'status'    	    => 1,
                  'user_id'       	=> $user_id,
                  'updated_by'    	=> $user_id,
                  'updated_at'    	=> date('Y-m-d H:i:s')
                  
              ];
              
              DB::beginTransaction();
              
              PetParents::where('id',$id)->update($update_data);
              
              DB::commit();
              return response()->json(['status' => true, 'message' => 'Pet Parent Updated successfully.'],200);
              
          } catch (\Exception $e) {
              return response()->json([
                  'status' => false,
                  'message' => 'Something went wrong.',
                  'errors' => $e->getMessage(),
              ], 500);
          }
          
      }
}
