<?php

namespace App\Http\Controllers\API\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Franchises\Franchise;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Trainer;
use App\Models\Customers\UserPersonalInfo;
use App\Models\Customers\UserLocations;
use App\Models\Trainers\TrainerReview;


class ServiceController extends Controller
{
    
    public function getFranchises(Request $request)
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
        
        $location_data = UserLocations::where('user_id',$user_id)->where('is_primary',1)->first();
        
        $latitude = isset($data['latitude']) && !empty($data['latitude']) ? $data['latitude'] : $location_data->latitude;
        $longitude = isset($data['longitude'])  && !empty($data['longitude']) ? $data['longitude'] : $location_data->longitude;
        $service_type = isset($data['service_id']) ? $data['service_id'] : '';
        $radius = 10;
        
        $nearbyLocations = $this->getNearbyLocations($latitude, $longitude,$radius,$service_type);
        
        $franchises = [];
        
        foreach ($nearbyLocations as $franchise){
            
            $franchises[] = [
                "franchise_name"    => 'Pet-First',
                "location" 			=> $franchise->location,
                "contact_person"    => isset($franchise->contact_person) ? $franchise->contact_person : null,
                "contact_number"    => isset($franchise->contact_number) ? $franchise->contact_number : null,
                "office_phone" 	    => isset($franchise->office_phone) ? $franchise->office_phone : null,
                "status" 			=> ($franchise->status_id == 1) ? 'Active' : (($franchise->status_id == 2) ? 'Inactive' : '')
            ];
        }
        
        return response()->json(["status" => true, "message"=> "Franchise Info.", "data" => $franchises],200);
    }
    
    public function getNearbyLocations($latitude, $longitude, $radius,$service_type) {
        $earthRadius = 6371; // km
        $lat = deg2rad($latitude);
        $lng = deg2rad($longitude);
        
        $locations = Franchise::where('status_id',1)
        ->where(function($q) use($service_type) {
            if(!empty($service_type)) {
                $q->whereHas('service',function($qr) use($service_type) {
                    $qr->where('service_type', $service_type)
                    ->where('status_id', 1);
                });
            }
        })
        ->select(
            DB::raw("id, location, latitude, longitude,contact_person,contact_number,office_phone,status_id,
            ($earthRadius * acos(cos($lat) * cos(radians(latitude)) * cos(radians(longitude) - $lng) + sin($lat) * sin(radians(latitude)))) AS distance")
            )
            ->having('distance', '<=', $radius)
            ->orderBy('distance')
            ->get();
            
            return $locations;
    }
}
