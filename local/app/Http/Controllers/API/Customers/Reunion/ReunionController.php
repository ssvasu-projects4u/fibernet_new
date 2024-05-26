<?php

namespace App\Http\Controllers\API\Customers\Reunion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Trainers\AssignTrainerService;
use App\Models\Trainers\TrainerReview;
use App\Models\Trainers\TrainerPersonalInfo;
use App\Models\Trainers\TrainerServiceReview;
use App\Models\Customers\UserLocations;
use App\Models\Trainer;
use Illuminate\Support\Facades\DB;
use App\Models\Bookings\Bookings;
use Illuminate\Support\Carbon;
use App\Models\Bookings\BookingDetails;
use App\Models\Customers\PetParents;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class ReunionController extends Controller
{
    
    public function getParents(Request $request,$pet_id)
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
        
        $parents_raw = PetParents::where('user_id',$user_id)->where('pet_id',$pet_id)->paginate(config('constants.records-per-page'));
        
        $parents = [];
        
        foreach ($parents_raw as $parent){
            
            $parents[] = [
                "user_id"           => $parent->user_id,
                "pet_id"            => $parent->pet_id,
                "pet_name"          => isset($parent->pet->pet_name) ? $parent->pet->pet_name : null,
                "full_name"         => isset($parent->full_name) ? $parent->full_name : null,
                "mobile"            => isset($parent->mobile) ? $parent->mobile : null,
                "email" 			=> isset($parent->email) ? $parent->email : null,
                "gender"            => isset($parent->genderinfo->name) ? $parent->genderinfo->name : null,
                "country_id" 	    => isset($parent->country_id) ? $parent->country_id : null,
                "country" 	        => isset($parent->country_id) ? $parent->country->name : null,
                "state_id"          => isset($parent->state_id) ? $parent->state_id : null,
                "state" 	        => isset($parent->state_id) ? $parent->state->name : null,
                "city"              => isset($parent->city) ? $parent->city : null,
                "pincode"           => isset($parent->pincode) ? $parent->pincode : null,
                "address" 			=> isset($parent->address) ? $parent->address : null,
                "parent_type" 		=> parent_types($parent->parent_type),
            ];
        }
        
        return response()->json([
            'status' 		        => true,
            'data' 			        => $parents,
            'message'               => "Pet Parents Info.",
            'total'                 => $parents_raw->total(),
            'per_page'              => $parents_raw->perPage(),
            'current_page'          => $parents_raw->currentPage(),
            'last_page'             => $parents_raw->lastPage(),
            'from'                  => $parents_raw->firstItem(),
            'to'                    => $parents_raw->lastItem(),
            'has_more_pages'        => $parents_raw->hasMorePages()
        ],200);
        
    }
    
    public function sentInvitation(Request $request)
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
        
        $rules = [
            'parent_id'       => 'required',
        ];
        
        $messages = [
            'parent_id.required'  => 'select pet paretn atleast one',
        ];
        
        $validator = Validator::make($data, $rules,$messages);
        
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                "message" => "Validation errors occured.",
                "errors" => implode('\n', array_flatten($validator->errors()->toArray()))
            ]);
        }
        
        $results = PetParents::whereIn('id',$data['parent_ids'])->select('email','mobile')->get();
        
        $to_emails = [];
        foreach ($results as $result){
            
            $to_emails [] = [$result->email];
        }
        
        $subject 	= 'Pet First Reunion Invitation';
        
        if(count($to_emails)>0)
        {
            Mail::send('emails.reunion-invitation', compact('to_emails'), function($message) use($to_emails,$subject)
            {
                $message->to($to_emails)->subject($subject);
            });
        }
        return response()->json([
            'status' 		        => true,
            'message'               => "Invitation sent successfully.",
        ],200);
    }
    
}
