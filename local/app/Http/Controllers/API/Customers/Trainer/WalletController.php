<?php

namespace App\Http\Controllers\API\Customers\Trainer;

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

class WalletController extends Controller
{
    
    public function getTrainers(Request $request)
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
        
        $nearbyLocations = $this->getNearbyTrainerLocations($latitude, $longitude,$radius,$service_type);
        
        $trainers = [];
        
        foreach ($nearbyLocations as $trainer){
            
            $reviews = TrainerReview::where('trainer_id',$trainer->id)->pluck('rating');
            $booking_counts = Bookings::where('trainer_id',$trainer->id)->where('booking_status',4)->count();
            
            $totalReviews = $reviews->count();
            
            if ($totalReviews > 0) {
                $totalRating = $reviews->sum();
                $averageRating = $totalRating / $totalReviews;
                $averageRating = round($averageRating, 2);
            }
            
            $trainers[] = [
                "trainer_id"        => $trainer->id,
                "name"              => $trainer->trainer_name,
                "mobile"            => $trainer->mobile,
                "location" 			=> $trainer->location,
                "distance" 			=> round($trainer->distance,2).'(kms)',
                "rating"            => isset($averageRating) ? $averageRating : 'No Rating',
                "total_bookings"    => isset($booking_counts) ? $booking_counts : 0,
                "status" 			=> ($trainer->status == 1) ? 'Available' : (($trainer->status == 2) ? 'Not Available' : ''),
            ];
        }
        
        return response()->json(["status" => true, "message"=> "Trainers Info.", "data" => $trainers],200);
    }
    
}
