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
use Illuminate\Support\Carbon;
use App\Models\Bookings\BookingDetails;

class TrainerDetailsController extends Controller
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
        $trainer_id = isset($data['trainer_id']) ? $data['trainer_id'] : '';
        
        $location_data = UserLocations::where('user_id',$user_id)->where('is_primary',1)->first();
        
        $latitude = isset($data['latitude']) && !empty($data['latitude']) ? $data['latitude'] : $location_data->latitude;
        $longitude = isset($data['longitude'])  && !empty($data['longitude']) ? $data['longitude'] : $location_data->longitude;
        $service_type = isset($data['service_id']) ? $data['service_id'] : '';
        $radius = 10;
        
        $nearbyLocations = $this->getNearbyTrainerLocations($latitude, $longitude,$radius,$service_type,$trainer_id);
        
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
                "profile_pic"       => isset($trainer->profile_pic) ? url($trainer->profile_pic) : 0,
                "location" 			=> $trainer->location,
                "exp"               => isset($trainer->exp) ? $trainer->exp : 0,
                "distance" 			=> round($trainer->distance,2).'(kms)',
                "rating"            => isset($averageRating) ? (int) $averageRating : 0,
                "total_reviews"     => isset($totalReviews) ? (int) $totalReviews : 0,
                "total_bookings"    => isset($booking_counts) ? (int) $booking_counts : 0,
                "status" 			=> ($trainer->status == 1) ? 'Available' : (($trainer->status == 2) ? 'Not Available' : ''),
            ];
        }
        
        return response()->json(["status" => true, "message"=> "Trainers Info.", "data" => $trainers],200);
    }
    
    
    public function getNearbyTrainerLocations($latitude, $longitude, $radius,$service_id,$trainer_id) {
        $earthRadius = 6371; // km
        $lat = deg2rad($latitude);
        $lng = deg2rad($longitude);
        
        $locations = Trainer::join('trainer_personal_info','trainer_personal_info.trainer_id','=','trainers.id')->where('trainers.status',1)
        ->where(function($q) use($trainer_id) {
            if(!empty($trainer_id)) {
                $q->where('trainers.id', $trainer_id);
            }
        })
        ->where(function($q) use($service_id) {
            if(!empty($service_id)) {
                $q->whereHas('userService',function($qr) use($service_id) {
                    $qr->where('service_id', $service_id)
                    ->where('status', 1);
                });
            }
        })
        ->select(
            DB::raw("trainers.id, trainer_personal_info.location,trainer_personal_info.profile_pic,trainer_personal_info.latitude, trainer_personal_info.longitude,trainers.name as trainer_name,trainers.mobile,trainers.status,trainer_personal_info.exp,
            ($earthRadius * acos(cos($lat) * cos(radians(trainer_personal_info.latitude)) * cos(radians(trainer_personal_info.longitude) - $lng) + sin($lat) * sin(radians(trainer_personal_info.latitude)))) AS distance")
            )
            ->having('distance', '<=', $radius)
            ->orderBy('distance')
            ->get();
            
            return $locations;
    }
    
    public function trainerDetails(Request $request, $id)
    {
        
        try{
        $token = JWTAuth::getPayload();
        $decode_code = json_decode($token);
        $get_auth_id = isset($decode_code->sub) ? $decode_code->sub : '' ;
        
        if(isset($get_auth_id) && !empty($get_auth_id)){
            $user_id = $get_auth_id;
        }
        else
        {
            return response()->json([ 'status' => false, 'message' => "Access Denied" ],401);
        }
        
        $trainer_services = AssignTrainerService::where('trainer_id',$id)->get();
        
        $trainer_reviews = TrainerReview::where('trainer_id',$id)->get();
        
        $trainer_info = TrainerPersonalInfo::where('trainer_id',$id)->first();
        
        $total_reviews_count = TrainerReview::where('trainer_id', $id)->count();
        
        $currentDate = Carbon::now()->toDateString();
        
        $bookedDates = Bookings::where('trainer_id', $id)
        ->where('booking_date', '>=', $currentDate)
        ->select('booking_date', 'booking_time')
        ->get();
        
        $currentDate = Carbon::now()->toDateString();
        
        $bookedIds = Bookings::whereIn('booking_status',[1,2])->where('trainer_id', $id)->pluck('booking_id');
        
        $bookedDates = BookingDetails::where('booking_from', '>=', $currentDate)
            ->whereIn('booking_id',$bookedIds)->select('booking_from','booking_time')->get();
        
        /* Checked Trainer Already Booked Dates */
        
        $booked_dates = [];
        foreach ($bookedDates as $booking) {
            $booked_dates[] = [
                'date' => date('Y-m-d',strtotime($booking->booking_from)),
                'time' => format_time($booking->booking_time),
            ];
        }
        
        /* Checked Trainer Already Booked Dates */
        
        /* Trainer Review Rating  */
        
        $trainer_rating_info = TrainerReview::where('trainer_id',$id)->groupBy('rating')
        ->selectRaw("max(rating) as rating,count(*) as count")->get();
        
        $rating_counts = array_fill(1, 5, 0);
        
        foreach ($trainer_rating_info as $rt) {
            $rating_counts[$rt->rating] = $rt->count;
        }
        
        $rating = [];
        
        foreach ($rating_counts as $rating_value => $count) {
            $rating[] = [
                'rating' => $rating_value,
                'count' => $count,
                'rating_perc' => rating_perc($count, $total_reviews_count)
            ];
        }
        
        
        /* Trainer Service Rating Reviews */
        
        $services = [];
        foreach ($trainer_services as $result){
            
            $servive_reviews = TrainerServiceReview::where('trainer_id',$id)->where('service_id',$result->service_id)->get();
            
            $service_booking_counts = BookingDetails::where('service_id',$result->service_id)->count();
            $trainer_booking_counts = Bookings::where('trainer_id',$id)->count();
            
            $ser_reviews = [];
            
            $totalSerReviews = $servive_reviews->count();
            
            if ($totalSerReviews > 0) {
                $totalSerRating = $servive_reviews->sum('rating');
                $averageSerRating = $totalSerRating / $totalSerReviews;
                $averageSerRating = round($averageSerRating, 2);
            }
            
            foreach ($servive_reviews as $ser){
                
                $ser_reviews[] = [
                    'rating' => $ser->rating,
                    'review' => $ser->review_text,
                    'total_review_users' => (int) $totalSerReviews
                ];
                
            }
            
            $services[] = [
                'overal_rating'               => isset($averageSerRating) ? (int) $averageSerRating : 0,
                'service_id' 	              => $result->subservice->id,
                'total_service_bookings' 	  => (int) $service_booking_counts,
                'total_review_users'          => (int) $totalSerReviews,
                'duration' 	                  => isset($result->subservice->duration) ? $result->subservice->duration : null,
                'service_name' 	              => isset($result->subservice->service_name) ? $result->subservice->service_name : null,
                'description' 	              => isset($result->subservice->description) ? $result->subservice->description : null,
                'price' 	                  => isset($result->price) ? $result->price : null,
                'service_reviews'             => $ser_reviews
            ];
        }
        
        $reviews = [];
        $averageRating = 0;
        $totalReviews = $trainer_reviews->count();
        
        if ($totalReviews > 0) {
            $totalRating = $trainer_reviews->sum('rating');
            $averageRating = $totalRating / $totalReviews;
            $averageRating = round($averageRating, 2);
        }
        
        foreach ($trainer_reviews as $review){
            
            $location = UserLocations::where('user_id',$review->customer->id)->where('is_primary',1)->first();
            
            $reviews[] = [
                'customer' 	      => $review->customer->name,
                'location' 	      => isset($location->city) ? $location->city : null,
                'profile_pic' 	  => isset($review->userinfo->profile_pic) ? url($review->userinfo->profile_pic) : null,
                'service' 	      => isset($review->service->service_name) ? $review->service->service_name : null,
                'rating' 	      => isset($review->rating) ? $review->rating : null,
                'review' 	      => isset($review->review_text) ? $review->review_text : null,
            ];
        }
        
        /* Getting Trainer Distance */
        
        $location_data = UserLocations::where('user_id',$user_id)->where('is_primary',1)->first();
        $latitude = $location_data->latitude;
        $longitude = $location_data->longitude;
        $service_type = '';
        $radius = 10;
        
        $nearbyLocations = $this->getNearbyTrainerLocations($latitude, $longitude,$radius,$service_type,$id);
        
        $trainer_personal_info = [
            "trainer_id"        => $nearbyLocations->first()->id,
            "name"              => isset($nearbyLocations->first()->trainer_name) ? $nearbyLocations->first()->trainer_name : null,
            "mobile"            => isset($nearbyLocations->first()->mobile) ? $nearbyLocations->first()->mobile : null,
            "profile_pic"       => isset($nearbyLocations->first()->profile_pic) ? url($nearbyLocations->first()->profile_pic) : 0,
            "location" 			=> isset($nearbyLocations->first()->location) ? $nearbyLocations->first()->location : null,
            "exp"               => isset($nearbyLocations->first()->exp) ? $nearbyLocations->first()->exp : 0,
            "distance" 			=> round($nearbyLocations->first()->distance,2).'(kms)'
        ];
        
        return response()->json([
            'status' 		           => true,
            'service_type'             => 2,
            'data'                     => $trainer_personal_info,
            'trainer_ratings'          => isset($rating) ? $rating : 0,
            'trainer_overal_rating'    => (int) $averageRating,
            'trainer_total_bookings'   => (int) $trainer_booking_counts,
            'trainer_exp'              => isset($trainer_info) ? $trainer_info->exp : '',
            'services' 		           => $services,
            'about' 		           => isset($trainer_info->about) ? $trainer_info->about : '',
            'reviews' 		           => $reviews,
            'booked_dates'             => $booked_dates,
            'message' 		           => "Trainer Details Info."
        ],200);
        
        }catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage().''.$e->getLine(),
            ], 500);
        }
    }
    
}
