<?php

namespace App\Http\Controllers\API\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use App\Models\PetColors;
use Illuminate\Support\Facades\DB;


class PetColorsController extends Controller
{
    
  /*   public function index()
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
            
            $petcolors = PetColors::all();
            
            $results = [];
            foreach ($petcolors as $pcol){
                
                $results[] = [
                    'id'                  => $pcol->id,
                    'pet_type_id'         => isset($pcol->pet_type_id) ? $pcol->pet_type_id : null,
                    'color'               => isset($pcol->color) ? $pcol->color : null,
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
                'pet_type_id'               => 'required',
                'color'               => 'required',
                
            ];
            
            $validator = Validator::make($data, $rules);
            
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    "message" => "Validation errors occured.",
                    "errors" => implode('\n', array_flatten($validator->errors()->toArray()))
                ]);
            }
            
            $pet_color_data = [
                'pet_type_id'         => isset($data['pet_type_id']) ? $data['pet_type_id'] : null,
                'color'               => isset($data['color']) ? $data['color'] : null,
                
            ];
            
            DB::beginTransaction();
            
            PetColors::insertGetId($pet_color_data);
            
            DB::commit();
            return response()->json(['status' => true, 'message' => 'Pet Color added successfully.'],200);
            
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
            
            
            $petcolors = PetColors::where('id',$id)->first();
            
            $petcolors = [
               // 'id'            => $petcolors->id,
                'pet_type_id'         => isset($petcolors->pet_type_id) ? $petcolors->pet_type_id : null,
                'color'         => isset($petcolors->color) ? $petcolors->color : null,
            ];
            
            return response()->json(['status' => true, 'data' => $petcolors],200);
            
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
                'pet_type_id'         => 'required',
                'color'               => 'required',
                
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
                'pet_type_id'   => isset($data['pet_type_id']) ? $data['pet_type_id'] : null,
                'color'      => isset($data['color']) ? $data['color'] : null,
                
            ];
            
           
            DB::beginTransaction();
            
            PetColors::where('id',$id)->update($update_data);
            
            DB::commit();
            return response()->json(['status' => true, 'message' => 'Pet Color Updated successfully.'],200);
            
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
            
            PetColors::where('id',$id)->delete();
            
            DB::commit();
            return response()->json(['status' => true, 'message' => 'Pet Color Deleted successfully.'],200);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage(),
            ], 500);
        }
        
    } */
   
    
	
    
}
