<?php

namespace App\Http\Controllers\API\Customers\PetAdoption;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Customers\OnlinePets;
use App\Models\Customers\OnlinePetImages;
use App\Models\Customers\OnlinePetsBehavior;
use App\Models\User;
use App\Models\PetBehavior;
use App\Models\Customers\UserLocations;


class PetController extends Controller
{
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
            
            $behavior = isset($data['behavior_id']) ? $data['behavior_id'] : '';
            $beha = explode(',', $behavior);
            $behavior_raw = str_replace( array( '\'', '"',  ',' , ';', '[', ']' ), ' ', $beha);
            
                       
            $rules = [
                'pet_name'       => 'required|max:150',
                'age'            => 'required',
                'dob'            => 'required',
                'breed'          => 'required',
                'color'          => 'required',
                'height'         => 'required',
                'weight'         => 'required',
                'price'          => 'required',
                'quantity'       => 'required',
                'description'    => 'required',
                'gender'         => 'required',
                'pet_type'       => 'required',
                'size'           => 'required',
                'vaccine'        => 'required',
                'pet_story'      => 'required',
                'personality'    => 'required',
                'health'         => 'required',
                'compatibility'  => 'required',
                'delivery_type'  => 'required',
                
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
                'pet_name'          => isset($data['pet_name']) ? $data['pet_name'] : null,
                'age'               => isset($data['age']) ? $data['age'] : null,
                'dob'               => isset($data['dob']) ? $data['dob'] : null,
                'breed'    	        => isset($data['breed']) ? $data['breed'] : null,
                'color'    	        => isset($data['color']) ? $data['color'] : null,
                'height'    	    => isset($data['height']) ? $data['height'] : null,
                'weight'    	    => isset($data['weight']) ? $data['weight'] : null,
                'price'    	        => isset($data['price']) ? $data['price'] : null,
                'quantity'    	    => isset($data['quantity']) ? $data['quantity'] : null,
                'description'       => isset($data['description']) ? $data['description'] : null,
                'gender'    	    => isset($data['gender']) ? $data['gender'] : null,
                'pet_type'    	    => isset($data['pet_type']) ? $data['pet_type'] : null,
                'size'    	        => isset($data['size']) ? $data['size'] : null,
                'vaccine'    	    => isset($data['vaccine']) ? $data['vaccine'] : null,
                'pet_story'    	    => isset($data['pet_story']) ? $data['pet_story'] : null,
                'personality'    	=> isset($data['personality']) ? $data['personality'] : null,
                'health'    	    => isset($data['health']) ? $data['health'] : null,
                'compatibility'     => isset($data['compatibility']) ? $data['compatibility'] : null,
                'life_span_from'     => isset($data['life_span_from']) ? $data['life_span_from'] : null,
                'life_span_to'     => isset($data['life_span_to']) ? $data['life_span_to'] : null,
                'delivery_type'     => isset($data['delivery_type']) ? $data['delivery_type'] : null,
                'status'    	    => 1,
                'created_by'    	=> $user_id,
                'created_at'    	=> date('Y-m-d H:i:s')
            ];
            
            DB::beginTransaction();
            
            $pet_id = OnlinePets::insertGetId($pet_data);
            
              if($pet_id > 0){
                  
                  if ($request->hasFile('file')) {
                      foreach ($request->file('file') as $file) {
                        
                          $ext  = strtolower($file->getClientOriginalExtension());
                          
                          if(!in_array($ext,['jpg','jpeg','png']))
                          {
                              DB::rollBack();
                              return response()->json(['error' => 'Only jpg, jpeg, png files are allowed, Please upload valid files'], 400);
                          }
                          
                          $size = $file->getSize();
                          
                          $doc_size_limit = config('constants.document-upload-max-size');
                          
                          if($size > $doc_size_limit) {
                              DB::rollBack();
                              return response()->json(['error' => 'Picture size should not be more than '.$doc_size_limit], 400);
                          }
                          
                          $filename = "doc_".date('His')."_".$file->getClientOriginalName();
                          
                          $file_path= 'uploads/customers/petAdoption/';
                          
                          $new_dir = $file_path.'/'.date('Y/m');
                          
                          if(!is_dir($new_dir))
                          {
                              @mkdir($new_dir,0777,true);
                          }
                          
                          $pet_file = $new_dir.'/'.$filename;
                          
                          $file->move($new_dir,$filename);
                          
                          OnlinePetImages::insert([
                              'pet_id'      => $pet_id,
                              'pet_pic'     => $pet_file,
                              'created_by'  => $user_id,
                              'created_at'  => date('Y-m-d H:i:s')
                          ]);
                      }
                  }
              
                  for($i=0; $i<count($behavior_raw);$i++)  {
                  
                      $pet_behavior[] = [
                          'online_pet_id'      => $pet_id,
                          'behavior_id'        => isset($behavior_raw[$i]) ? $behavior_raw[$i] : '',
                                              
                      ];
                  }
                  
                  if(count($pet_behavior)>0){
                      OnlinePetsBehavior::insert($pet_behavior);
                  }
                                       
            }
            DB::commit();
            return response()->json(['status' => true, 'pet_id' => $pet_id, 'message' => 'Pet Adoption added successfully.']);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage(),
            ], 500);
        }
        
    }
    
    public function uploadPetImages(Request $request, $pet_id)
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
                
                if ($request->hasFile('image')) {
                    foreach ($request->file('image') as $image) {
                        
                        $ext  = strtolower($image->getClientOriginalExtension());
                        
                        if(!in_array($ext,['jpg','jpeg','png']))
                        {
                            DB::rollBack();
                            return response()->json(['error' => 'Only jpg, jpeg, png files are allowed, Please upload valid files'], 400);
                        }
                        
                        $size = $image->getSize();
                        
                        $doc_size_limit = config('constants.document-upload-max-size');
                        
                        if($size > $doc_size_limit) {
                            DB::rollBack();
                            return response()->json(['error' => 'Picture size should not be more than '.$doc_size_limit], 400);
                        }
                        
                        
                        $filename = "image_".date('His')."_".$image->getClientOriginalName();
                        
                        $file_path= 'uploads/customers/petAdoption/';
                        
                        $new_dir = $file_path.'/'.date('Y/m');
                        
                        if(!is_dir($new_dir))
                        {
                            @mkdir($new_dir,0777,true);
                        }
                        
                        $pet_file = $new_dir.'/'.$filename;
                        
                        $image->move($new_dir,$filename);
                        
                        OnlinePetImages::insert([
                            'pet_id'  	  => $pet_id,
                            'pet_pic'     => $pet_file,
                            'created_by'  => $user_id,
                            'created_at'  => date('Y-m-d H:i:s')
                        ]);
                    }
                }
                
         
            DB::commit();
            return response()->json(['status' => true, 'pet_id' => $pet_id, 'message' => 'Pet Images Uploaded Successfully.']);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage(),
            ], 500);
        }
        
    }
    
    
    public function getOnlinePetsList(Request $request)
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
        
        $data = $request->all();
        
        $latitude = isset($data['latitude']) ? deg2rad((float)$data['latitude']) : '';
        $longitude = isset($data['longitude']) ? deg2rad((float)$data['longitude']) : ''; 
        
        
        $radius = 10;
        
        $nearbyLocations = $this->getNearbyOnlinePetLocations($latitude,$longitude,$radius);
               
        $onlinepets = [];
      
        foreach ($nearbyLocations as $onlinepet){
            
            $onlinepets_images = OnlinePetImages::where('pet_id',$onlinepet->product_id)->get();
            $online_pets_behavior = OnlinePetsBehavior::where('online_pet_id',$onlinepet->product_id)->get();
           
            $behaviornames = [];
            
            foreach ($online_pets_behavior as $behavior) {
                $name = $behavior->behavior->name ?? null;
                if ($name) {
                    $behaviornames[] = $name;
                }
            }
            
            $behaviornames = array_unique($behaviornames);
           
            $onlinepets[] = [
                'product_id'        => $onlinepet->product_id,
                'pet_name'          => isset($onlinepet->pet_name) ? $onlinepet->pet_name : null,
                'age'               => isset($onlinepet->age) ? $onlinepet->age : null,
                'breed' 	        => isset($onlinepet->breed_name) ? $onlinepet->breed_name : null,
                'color' 	        => isset($onlinepet->color_name) ? $onlinepet->color_name : null,
                'height'    	    => isset($onlinepet->height) ? $onlinepet->height : null,
                'weight'    	    => isset($onlinepet->weight) ? $onlinepet->weight : null,
                'price'    	        => isset($onlinepet->price) ? $onlinepet->price : null,
                'status' 			=> ($onlinepet->status == 1) ? 'Available' : (($onlinepet->status == 2) ? 'Not Available' : ''),
                'quantity'    	    => isset($onlinepet->quantity) ? $onlinepet->quantity : null,
                'description'       => isset($onlinepet->description) ? $onlinepet->description : null,
                'gender'    	    => isset($onlinepet->gender_name) ? $onlinepet->gender_name : null,
                'pet_type'    	    => isset($onlinepet->pet_type) ? $onlinepet->pet_type : null,
                'size'    	        => isset($onlinepet->size) ? $onlinepet->size : null,
                'vaccine'    	    => ($onlinepet->vaccine == 1) ? 'YES' : (($onlinepet->vaccine == 2) ? 'NO' : ''),
                'pet_story'    	    => isset($onlinepet->pet_story) ? $onlinepet->pet_story : null,
                'personality'    	=> isset($onlinepet->personality) ? $onlinepet->personality : null,
                'health'    	    => isset($onlinepet->health) ? $onlinepet->health : null,
                'compatibility'     => isset($onlinepet->compatibility) ? $onlinepet->compatibility : null,
                'life_span_from'    => isset($onlinepet->life_span_from) ? $onlinepet->life_span_from : null,
                'life_span_to'      => isset($onlinepet->life_span_to) ? $onlinepet->life_span_to : null,
                'behaviors'        =>  (count($behaviornames) > 0) ? $behaviornames : null,
                'image_data'        => (count($onlinepets_images) > 0) ? $onlinepets_images : null,
                'name'              => $onlinepet->user_name,
                'mobile'            => $onlinepet->mobile,
                'profile_pic'       => isset($onlinepet->profile_pic) ? url($onlinepet->profile_pic) : 0,
                'location' 			=> $onlinepet->location,
                'distance' 			=> round($onlinepet->distance,2).'(kms)'
            ];
            
          
        }
        
        return response()->json(["status" => true, "message"=> "Online Pet Info.", "data" => $onlinepets],200);
        
     /*    return response()->json([
            'status' 		        => true,
            'data' 			        => $onlinepets,
            'message'               => "Online Pet Info.",
            'total'                 => $onlinepets_raw->total(),
            'per_page'              => $onlinepets_raw->perPage(),
            'current_page'          => $onlinepets_raw->currentPage(),
            'last_page'             => $onlinepets_raw->lastPage(),
            'from'                  => $onlinepets_raw->firstItem(),
            'to'                    => $onlinepets_raw->lastItem(),
            'has_more_pages'        => $onlinepets_raw->hasMorePages()
        ],200); */
        
    }
    
    public function getNearbyOnlinePetLocations($latitude, $longitude, $radius) {
        $earthRadius = 6371; // km
        
        $lat = is_numeric($latitude) ? $latitude : null;
        $lng = is_numeric($longitude) ? $longitude : null;
        
          $locationsQuery = OnlinePets::join('users', 'users.id', '=', 'online_pets.owner_id')
         ->leftjoin('user_locations', 'user_locations.user_id', '=', 'online_pets.owner_id')
        ->leftjoin('user_personal_info', 'user_personal_info.user_id', '=', 'online_pets.owner_id')
        ->where('users.status', 1)
       ->select(
            'users.id',
            'user_locations.location',
            'user_personal_info.profile_pic',
            'user_locations.latitude',
            'user_locations.longitude',
            'users.name as user_name',
            'users.mobile',
            'users.status',
            'online_pets.owner_id',
            'online_pets.pet_name',
            'online_pets.age',
            DB::raw("(select name from breeds where id = online_pets.breed) as breed_name"),
            DB::raw("(select color from pet_colors where id = online_pets.color) as color_name"),
            'online_pets.height',
            'online_pets.weight',
            'online_pets.price',
            'online_pets.discount',
            'online_pets.quantity',
            DB::raw("(select name from gender_types where id = online_pets.gender) as gender_name"),
            'online_pets.description',
            DB::raw("(select name from pet_types where id = online_pets.pet_type) as pet_type"),
            'online_pets.size',
            'online_pets.vaccine',
            'online_pets.pet_story',
            'online_pets.personality',
            'online_pets.health',
            'online_pets.compatibility',
            'online_pets.product_id',
            'online_pets.life_span_from',
            'online_pets.life_span_to'
            );
            if (!is_null($lat) && !is_null($lng)) {
                $locationsQuery->addSelect(
                    DB::raw("($earthRadius * acos(cos($lat) * cos(radians(user_locations.latitude)) * cos(radians(user_locations.longitude) - $lng) + sin($lat) * sin(radians(user_locations.latitude)))) AS distance")
                    )->having('distance', '<=', $radius)->orderBy('distance');
            }
            
            //  $locationsQuery->groupBy('users.id', 'user_locations.location'); // Group by owner's ID
            
            $locations = $locationsQuery->get();  
        
     
        
      
            
            return $locations;
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
            
            
            $onlinepet = OnlinePets::where('product_id',$id)->first();
            
            
            $entry_fee = isset($onlinepet->price) ? $onlinepet->price : 0;
            $cgst  = config('constants.cgst');
            $sgst  = config('constants.sgst');
            $service_tax  = config('constants.customer_side_commision');
            
            $calculation_results = total_price($entry_fee, $cgst, $sgst, $service_tax);
            
            $fee_details = [
                'pet_price'             => isset($onlinepet->price) ? (int) $onlinepet->price : 0,
                'cgst'                  => $calculation_results['cgst_fee'],
                'sgst'                  => $calculation_results['sgst_fee'],
                'service_tax'           => $calculation_results['service_tax'],
                'service_tax_and_fee'   => $calculation_results['service_tax'] + $calculation_results['sgst_fee'] + $calculation_results['cgst_fee'],
                'total_amount'          => $calculation_results['total_amount'],
            ];
            
            
            $onlinepet = [
                'id'  	            => isset($onlinepet->product_id) ? $onlinepet->product_id : null,
                'owner_name'        => isset($onlinepet->user->name) ? $onlinepet->user->name : null,
                'pet_name'          => isset($onlinepet->pet_name) ? $onlinepet->pet_name : null,
                'age'               => isset($onlinepet->age) ? $onlinepet->age : null,
                'dob'               => isset($onlinepet->dob) ? $onlinepet->dob : null,
                'breed' 	        => isset($onlinepet->breed_name->name) ? $onlinepet->breed_name->name : null,
                'color' 	        => isset($onlinepet->color_name->color) ? $onlinepet->color_name->color : null,
                'height'    	    => isset($onlinepet->height) ? $onlinepet->height : null,
                'weight'    	    => isset($onlinepet->weight) ? $onlinepet->weight : null,
                'price'    	        => isset($onlinepet->price) ? $onlinepet->price : null,
                'quantity'    	    => isset($onlinepet->quantity) ? $onlinepet->quantity : null,
                'description'       => isset($onlinepet->description) ? $onlinepet->description : null,
                'gender'    	    => isset($onlinepet->genderinfo->name) ? $onlinepet->genderinfo->name : null,
                'pet_type'    	    => isset($onlinepet->pet_type) ? $onlinepet->pet_type : null,
                'size'    	        => isset($onlinepet->size) ? $onlinepet->size : null,
                'vaccine'    	    => isset($onlinepet->vaccine) ? $onlinepet->vaccine : null,
                'pet_story'    	    => isset($onlinepet->pet_story) ? $onlinepet->pet_story : null,
                'personality'    	=> isset($onlinepet->personality) ? $onlinepet->personality : null,
                'health'    	    => isset($onlinepet->health) ? $onlinepet->health : null,
                'compatibility'     => isset($onlinepet->compatibility) ? $onlinepet->compatibility : null,
                'life_span_from'    => isset($onlinepet->life_span_from) ? $onlinepet->life_span_from : null,
                'life_span_to'      => isset($onlinepet->life_span_to) ? $onlinepet->life_span_to : null,
                'delivery_type'     => isset($data['delivery_type']) ? $data['delivery_type'] : null,
                'status'    	    => 1,
                'created_by'    	=> $user_id,
                'created_at'    	=> date('Y-m-d H:i:s')
                
            ];
            
            return response()->json(['status' => true, 'data' => $onlinepet, 'payment_details' => $fee_details],200);
            
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
                'pet_name'       => 'required|max:150',
                'age'            => 'required',
                'dob'            => 'required',
                'breed'          => 'required',
                'color'          => 'required',
                'height'         => 'required',
                'weight'         => 'required',
                'price'          => 'required',
                'quantity'       => 'required',
                'description'    => 'required',
                'gender'         => 'required',
                'pet_type'       => 'required',
                'size'           => 'required',
                'vaccine'        => 'required',
                'pet_story'      => 'required',
                'personality'    => 'required',
                'health'         => 'required',
                'compatibility'  => 'required',
                'delivery_type'  => 'required',
                
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
                'pet_name'          => isset($data['pet_name']) ? $data['pet_name'] : null,
                'age'               => isset($data['age']) ? $data['age'] : null,
                'dob'               => isset($data['dob']) ? $data['dob'] : null,
                'breed'    	        => isset($data['breed']) ? $data['breed'] : null,
                'color'    	        => isset($data['color']) ? $data['color'] : null,
                'height'    	    => isset($data['height']) ? $data['height'] : null,
                'weight'    	    => isset($data['weight']) ? $data['weight'] : null,
                'price'    	        => isset($data['price']) ? $data['price'] : null,
                'quantity'    	    => isset($data['quantity']) ? $data['quantity'] : null,
                'description'       => isset($data['description']) ? $data['description'] : null,
                'gender'    	    => isset($data['gender']) ? $data['gender'] : null,
                'pet_type'    	    => isset($data['pet_type']) ? $data['pet_type'] : null,
                'size'    	        => isset($data['size']) ? $data['size'] : null,
                'vaccine'    	    => isset($data['vaccine']) ? $data['vaccine'] : null,
                'pet_story'    	    => isset($data['pet_story']) ? $data['pet_story'] : null,
                'personality'    	=> isset($data['personality']) ? $data['personality'] : null,
                'health'    	    => isset($data['health']) ? $data['health'] : null,
                'compatibility'     => isset($data['compatibility']) ? $data['compatibility'] : null,
                'life_span_from'     => isset($data['life_span_from']) ? $data['life_span_from'] : null,
                'life_span_to'     => isset($data['life_span_to']) ? $data['life_span_to'] : null,
                'delivery_type'     => isset($data['delivery_type']) ? $data['delivery_type'] : null,
                'status'    	    => 1,
                'updated_by'    	=> $user_id,
                'updated_at'    	=> date('Y-m-d H:i:s')
                
            ];
            
            DB::beginTransaction();
            
            OnlinePets::where('product_id',$id)->update($update_data);
            
            DB::commit();
            return response()->json(['status' => true, 'message' => 'Pet Adoption Updated successfully.'],200);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage(),
            ], 500);
        }
        
    }
    
   
}
