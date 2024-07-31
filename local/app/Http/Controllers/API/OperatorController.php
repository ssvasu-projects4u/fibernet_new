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
use Illuminate\Support\Facades\Hash;

class OperatorController extends Controller
{
    
    public function index(Request $request)
    {
		
		// $data = Input::all();
		$access_token = 'ei0ff1d675eec4c016fa86a4d12b';
		
		$base_url = config('constants.base_url');			
		 
		$url = $base_url.'RSMS/GetDetailsInOperator?operator_id=0';
		
		 $headers = array(
            "Accept: application/json",
            'Authorization: ' . $access_token
        );
		
               
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
		          
        curl_close($ch);
        
        $data = json_decode(json_encode($response), true);
		
	//	print_r($data);
		 
		 
        
    }
	
	public function addOperator(Request $request)
    {
		 $data = $request->all();
		 
		$access_token = 'ei0ff1d675eec4c016fa86a4d12b';
		
		$base_url = config('constants.base_url');
		 
		$url = $base_url.'RSMS/AddOperator';
		
		$headers = array(
			"Accept: application/json",
			"Content-Type: application/json",
			'Authorization: ' . $access_token
		);
		
		
		 $query_params = array(
			'name_header'       => isset($data['name_header']) ? $data['name_header'] : 'Mrs',
			'address' => isset($data['address']) ? $data['address'] : null,
			'area'  => isset($data['area']) ? $data['area'] : null,
			'street'            => isset($data['street']) ? $data['street'] : null,
			'state'             => isset($data['state']) ? $data['state'] : null,
			'pincode'           => isset($data['pincode']) ? $data['pincode'] : null,
			'user_id'          => isset($data['user_id']) ? $data['user_id'] : '0',
			'operator_name'     => isset($data['operator_name']) ? $data['operator_name'] : null,
			'email'             => isset($data['email']) ? $data['email'] : null,
			'contact'            => isset($data['contact']) ? $data['contact'] : null,
			'password'            => isset($data['password']) ? $data['password'] : null,
		);
        
        $query_string = http_build_query($query_params);		
		$json_data = json_encode($query_params);
		
		$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

			$response = curl_exec($ch);
			

			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			} else {
				$response_data = json_decode($response, true);			
				
				 $user_data = [
						
				'name'             => isset($data['operator_name']) ? $data['operator_name'] : null,
				'first_name'             => isset($data['operator_name']) ? $data['operator_name'] : null,				
				'email'             => isset($data['email']) ? $data['email'] : null,
				'mobile'           => isset($data['contact']) ? $data['contact'] : null,				
                'password'          => isset($data['password']) ? Hash::make($data['password']) : null,
               
				];
				
				$user_id = DB::table('users')->insertGetId($user_data);
				
				 $operator_data = [
				 
				'op_id'       => $response_data['op_id'],		
				'franchise_name'       => isset($response_data['item']['operator name']) ? $response_data['item']['operator name'] : '',
				'user_id'       => $user_id,
				'city'       => isset($data['city']) ? $data['city'] : '0',
				'distributor_id'       => isset($data['distributor_id']) ? $data['distributor_id'] : '0',
				'subdistributor_id'       => isset($data['subdistributor_id']) ? $data['subdistributor_id'] : '0',
				'branch'       => isset($data['branch']) ? $data['branch'] : '0',
				'updated_at'       => date('Y-m-d H:i:s'), 
				
                'name_header'       => isset($data['name_header']) ? $data['name_header'] : 'Mrs',								
				'agreement_address' => isset($data['address']) ? $data['address'] : null,
				'area_description'  => isset($data['area']) ? $data['area'] : null,
				'street'            => isset($data['street']) ? $data['street'] : null,
                'state'             => isset($data['state']) ? $data['state'] : null,
                'pincode'           => isset($data['pincode']) ? $data['pincode'] : null,
				'franchise_id'      => isset($data['user_id']) ? $data['user_id'] : '0',
				'flag'            => 1,
               
               
            ];
			
			
			
			
			
			//print_r($operator_data);die;
            
          //  DB::beginTransaction();
            
            DB::table('slj_franchises')->insertGetId($operator_data);
			
            
         //   DB::commit(); 
            return response()->json(['status' => true, 'message' => 'operator added successfully.'],200);
			
			}

			curl_close($ch);
	
		 
		
		
	}
    
  
  
}
