<?php

namespace App\Http\Controllers\API\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use App\Models\PetBreeds;
use Illuminate\Support\Facades\DB;


class PetBreedsController extends Controller
{

   /*  public function index()
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
            
            $petbreeds = PetBreeds::all();
            
            $results = [];
            foreach ($petbreeds as $petbreed){
                
                $results[] = [
                    'id'            => $petbreed->id,
                    'name'         => isset($petbreed->name) ? $petbreed->name : null,
                ];
            }
            
            return response()->json(['status' => true, 'data' => $results],200);
            
        }
        catch(\Exception $e)
        {
            return response()->json(["status" => false, "message" => 'Something went wrong.', "errors" => print_exn($e)]);
        }
    } */
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
                'name'               => 'required',
                
            ];
            
            $validator = Validator::make($data, $rules);
            
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    "message" => "Validation errors occured.",
                    "errors" => implode('\n', array_flatten($validator->errors()->toArray()))
                ]);
            }
            
            $categories_data = [
                'name'          => isset($data['name']) ? $data['name'] : null,
                'status_id'     => 1,
                'created_by'    => $user_id,
                'created_at'    => date('Y-m-d H:i:s')
                
            ];
            
            DB::beginTransaction();
            
            PetBreeds::insertGetId($categories_data);
            
            DB::commit();
            return response()->json(['status' => true, 'message' => 'Pet Breed added successfully.'],200);
            
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
            
            
            $petbreeds = PetBreeds::where('id',$id)->first();
            
            $petbreeds = [
                'id'            => $petbreeds->id,
                'name'         => isset($petbreeds->name) ? $petbreeds->name : null,
                
            ];
            
            return response()->json(['status' => true, 'data' => $petbreeds],200);
            
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
                'name'               => 'required',
                
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
                'name'          => isset($data['name']) ? $data['name'] : null,
                'status_id'     => 1,
                'updated_by'    => $user_id,
                'updated_at'    => date('Y-m-d H:i:s')
                
            ];
            
            DB::beginTransaction();
            
            PetBreeds::where('id',$id)->update($update_data);
            
            DB::commit();
            return response()->json(['status' => true, 'message' => 'Pet Breed Updated successfully.'],200);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage(),
            ], 500);
        }
        
    }
    
   /*  public function Destroy(Request $request, $id)
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
            
            DB::beginTransaction();
            
            PetBreeds::where('id',$id)->delete();
            
            DB::commit();
            return response()->json(['status' => true, 'message' => 'Pet Breed Deleted successfully.'],200);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage(),
            ], 500);
        }
        
    } */
    
    
   
	
    
}
