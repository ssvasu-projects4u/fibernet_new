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

class SubscriberController extends Controller
{
    
    public function index(Request $request)
    {
		
		// $data = Input::all();
		$access_token = 'ei0ff1d675eec4c016fa86a4d12b';
		
		$base_url = config('constants.base_url');			
		 
		$url = $base_url.'RSMS/SubscriberDetails?operatorid=1';
		
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
	
	public function addSubscriber(Request $request)
    {
		 $data = $request->all();
		 
		$access_token = 'ei0ff1d675eec4c016fa86a4d12b';
		
		$base_url = config('constants.base_url');
		 
		$url = $base_url.'RSMS/SubscriberCreate';
		
		$headers = array(
			"Accept: application/json",
			"Content-Type: application/json",
			'Authorization: ' . $access_token
		);
		
		
		
		 $query_params = array(
			'operatorid'       => isset($data['operatorid']) ? $data['operatorid'] : null,
			'casform_id'       => isset($data['casform_id']) ? $data['casform_id'] : null,
			'customer_name'    => isset($data['customer_name']) ? $data['customer_name'] : null,
			'customer_name_l'  => isset($data['customer_name_l']) ? $data['customer_name_l'] : null,
			'father_name'      => isset($data['father_name']) ? $data['father_name'] : null,
			'date_of_birth'    => isset($data['date_of_birth']) ? $data['date_of_birth'] : null,
			'address'          => isset($data['address']) ? $data['address'] : null,
			'email'            => isset($data['email']) ? $data['email'] : null,
			'mobile_no'        => isset($data['mobile_no']) ? $data['mobile_no'] : null,
			'install_address'  => isset($data['install_address']) ? $data['install_address'] : null,
			'address_proof'    => isset($data['address_proof']) ? $data['address_proof'] : null,
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
				  
				'first_name'             => isset($data['customer_name']) ? $data['customer_name'] : null,
				'last_name'             => isset($data['customer_name_l']) ? $data['customer_name_l'] : null,				
				'email'             => isset($data['email']) ? $data['email'] : null,
				'mobile'           => isset($data['mobile_no']) ? $data['mobile_no'] : null,				
                             
				];
				
				$user_id = DB::table('users')->insertGetId($user_data);
				
				 $subscriber_data = [
				 
				 'user_id'       => $user_id,
				'op_id'       => isset($data['operatorid']) ? $data['operatorid'] : null,
				'f_name_c_name'       => isset($data['father_name']) ? $data['father_name'] : null,
				'billing_address'       => isset($data['address']) ? $data['address'] : null,
				'installation_address'       => isset($data['install_address']) ? $data['install_address'] : null,
				'date_of_birth'       => isset($data['date_of_birth']) ? $data['date_of_birth'] : null,
				'flag'            => 1,
               
               
            ];
				
            
            DB::table('slj_customers')->insertGetId($subscriber_data);
			
            return response()->json(['status' => true, 'message' => 'Customers added successfully.'],200);
			
			}

			curl_close($ch);
	
		 
		
		
	}
    
  
  
}
