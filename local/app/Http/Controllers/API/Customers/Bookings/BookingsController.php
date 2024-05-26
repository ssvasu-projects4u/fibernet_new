<?php

namespace App\Http\Controllers\API\Customers\Bookings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;
use App\Models\Bookings\Bookings;
use App\Models\SubServices;
use App\Models\Bookings\BookingDetails;
use App\Models\Bookings\BookingTransaction;

class BookingsController extends Controller
{
    
    public function upcomingBookings(Request $request)
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
        
        
        $results =  Bookings::leftJoin('booking_details','booking_details.booking_id','=','bookings.booking_id')
        ->where('bookings.customer_id',$user_id)
        ->whereIn('bookings.booking_status',[1,2])
        ->whereRaw("DATE(booking_details.booking_from) >= CURDATE()")
        ->select('bookings.booking_id','bookings.service_type','bookings.booking_date','bookings.pet_id','bookings.total_amount','bookings.customer_id','booking_details.booking_from',DB::raw('(CASE when booking_status = 1  then "Upcoming" when booking_status = 2  then "Upcoming"  end ) as status_name'))
        ->distinct()
        ->get();
        
        $bookinglist = [];
        
        foreach ($results as $record) {
            
            $booking_name = ($record->service_type == 7) ? $record->bookingDetail->eventname->name :  '';
            
            $bookinglist[] = [
                'booking_id'             => $record->booking_id,
                'service_type'           => $record->service_type,
                'service_name'           => $record->servicetype->service_name,
                'event_name'             => $booking_name,
                'booking_date'           => $record->booking_from,
                'pet_name'               => isset($record->pet->pet_name) ? $record->pet->pet_name : '',
                'total_amount'           => $record->total_amount,
                'customer_name'          => $record->customer->name,
                'booking_status'         => $record->status_name,
            ];
        }
        
        return response()->json([
            'status' 		=> true,
            'data' 			=> $bookinglist,
            'message' 		=> "Upcoming Bookings Info."
        ],200);
    }
    
    public function cancelBooking(Request $request)
    {
        try {
            
            $token = JWTAuth::getPayload();
            $decode_code = json_decode($token);
            $get_auth_id = isset($decode_code->sub) ? $decode_code->sub : '';
            
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
            
            $booking_id = $data['booking_id'];
            
            if(isset($booking_id) && empty($booking_id)){
                
                return response()->json([ 'status' => false, 'message' => "select Booking" ],400);
            }
            
            $booking_details = [
                'booking_status'   => 3,
                'cancel_reason'    => isset($data['reason_id']) ? $data['reason_id'] : null,
                'updated_at'       => date('Y-m-d H:i:s'),
                'updated_by'       => $user_id,
            ];
            
            DB::beginTransaction();
            
            Bookings::where('booking_id',$booking_id)->update($booking_details);
            
            DB::commit();
            
            /* $noti_msg = ['title'=>'Booking Rescheduled | '.date('m/d/Y'),  'desc' => 'Booking ID'.$booking_id.'is created wait for the confirmation on trainer End' ];
             $this->pushNotification($data['trainer_id'], $noti_msg); */
            
            /* Email Trigger booking success */
            
            /* $to_mail = isset($this->trainer->email) ? $this->trainer->email : '';
            
            if(isset($to_mail) && !empty($to_mail)) {
            
            //booking_success($to_mail, $this->user, $booking->booking_id);
            } */
            
            return response()->json([
                'status'        => 200,
                'booking_id'    => $booking_id,
                'message'       => 'Booking Cancelled Successfully.'
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage().'-'.$e->getLine(),
            ], 500);
        }
        
    }
    
}
