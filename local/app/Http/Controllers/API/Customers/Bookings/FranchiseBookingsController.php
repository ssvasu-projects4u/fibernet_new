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

class FranchiseBookingsController extends Controller
{
    
    public function createFranchiseBooking(Request $request)
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
            
            $booking_data = [
                'service_type'      => isset($data['service_type']) ? $data['service_type'] : null,
                'franchise_id'      => isset($data['franchise_id']) ? $data['franchise_id'] : null,
                'booking_date'      => date('Y-m-d H:i:s'),
                'customer_id'    	=> $user_id,
                'pet_id'    	    => isset($data['pet_id']) ? $data['pet_id'] : null,
                'total_amount'    	=> isset($data['total_amount']) ? $data['total_amount'] : 0,
                'discount'    	    => isset($data['discount']) ? $data['discount'] : 0,
                'booking_status'    => 1,
                'gst'    	        => isset($data['gst']) ? $data['gst'] : null,
                'sgst'    	        => isset($data['sgst']) ? $data['sgst'] : null,
                'created_by'        => $user_id,
                'created_at'   	    => date('Y-m-d H:i:s')
            ];
            
            DB::beginTransaction();
            
            $booking_id = Bookings::insertGetId($booking_data);
            
            if($booking_id > 0){
                
                $booking_details = [];
                
                foreach ($data['service_id'] as $key => $service) {
                    
                    $booking_from = isset($data['booking_from'][$key]) ? date_create($data['booking_from'][$key]) : 0;
                    $booking_to = isset($data['booking_to'][$key]) ? date_create($data['booking_to'][$key]) : 0;
                    $booking_time = isset($data['booking_time'][$key]) ? $data['booking_time'][$key] : 0;
                    
                    $price = SubServices::where('id',$service)->value('price');
                    
                    $booking_details[] = [
                        'booking_id'       => $booking_id,
                        'service_id'       => $service,
                        'booking_from'     => $booking_from->format('Y-m-d H:m:s'),
                        'booking_to'       => $booking_to->format('Y-m-d H:m:s'),
                        'booking_time'     => $booking_time,
                        'amount'           => isset($price) ? $price : 0,
                        'status'           => 1,
                        'created_at'       => date('Y-m-d H:i:s'),
                        'created_by'       => $user_id,
                    ];
                }
                
                if(count($booking_details)>0){
                    BookingDetails::insert($booking_details);
                }
            }
            
            $bill_response = BookingTransaction::createBill($booking_id,$data);
            
            $bill_details = json_decode($bill_response->content());
            
            if(!$bill_details->status)
            {
                DB::rollBack();
                return response()->json([
                    'status' => 400,
                    'error' => 'Bill details not created.',
                    'message' => 'Something went wrong'
                ], 400);
            }
            
            DB::commit();
            
            /* $noti_msg = ['title'=>'Booking Intiated | '.date('m/d/Y'),  'desc' => 'Booking ID'.$booking_id.'is created wait for the confirmation on trainer End' ];
             $this->pushNotification($data['trainer_id'], $noti_msg); */
            
            /* Email Trigger booking success */
            
            /* $to_mail = isset($this->trainer->email) ? $this->trainer->email : '';
            
            if(isset($to_mail) && !empty($to_mail)) {
            
            //booking_success($to_mail, $this->user, $booking->booking_id);
            } */
            
            return response()->json([
                'status'        => 200,
                'booking_id'    => $booking_id,
                'data'          => $booking_data,
                'bill_details'  => $bill_details->bill,
                'message'       => 'We have recieved your Booking details Successfully.'
            ], 200);
            
        } catch (\Exception $e) {
            dd_array($e->getLine());
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage(),
            ], 500);
        }
        
    }
    
    public function index(Request $request)
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
        
        $results = Bookings::where('customer_id',$user_id)->get();
        
        $bookings = [];
        
        foreach ($results as $result){
            
            $bookings[] = [
                'booking_id' 	  => $result->booking_id,
                'booking_date' 	  => isset($result->booking_date) ? format_date($result->booking_date) : null,
                'service_name' 	  => isset($result->servicename->service_name) ? $result->servicename->service_name : null,
                'service_counts'  => isset($result->bookings) ? $result->bookings : null,
                'customer_name'   => isset($result->customer->name) ? $result->customer->name : null,
                'no_of_category'  => isset($result->categoryname->category_name) ? $result->categoryname->category_name : null,
                'total_amount' 	  => isset($result->categoryname->category_name) ? $result->categoryname->category_name : null,
                'discount' 	      => isset($result->categoryname->category_name) ? $result->categoryname->category_name : null,
                'booking_status'  => isset($result->booking_status) ? $result->booking_status : null,
                'booking_created' => isset($result->created_at) ? format_date($result->created_at) : null
            ];
        }
        
        return response()->json([
            'status' 		=> true,
            'data' 			=> $bookings,
            'message' 		=> "Bookings Info."
        ],200);
    }
    
    public function bookingDetails(Request $booking_id)
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
        
        $results = BookingDetails::where('booking_id',$booking_id)->get();
        
        $bookings = [];
        
        foreach ($results as $result){
            
            $bookings[] = [
                'booking_id' 	  => $booking_id,
                'pet_name' 	      => isset($result->petInfo->pet_name) ? $result->petInfo->pet_name : null,
                'service_name' 	  => isset($result->servicename->service_name) ? $result->servicename->service_name : null,
                'category_name'   => isset($result->categoryname->category_name) ? $result->categoryname->category_name : null,
                'amount' 	      => isset($result->amount) ? number_format($result->amount,2) : null,
            ];
        }
        
        return response()->json([
            'status' 		=> true,
            'data' 			=> $bookings,
            'message' 		=> "Bookings Details Info."
        ],200);
    }
    
}
