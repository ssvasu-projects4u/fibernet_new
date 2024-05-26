<?php

namespace App\Http\Controllers\API\Customers\Bookings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;
use App\Http\PushNotificationTrait;
use App\Models\Bookings\Bookings;
use App\Models\Bookings\BookingDetails;
use App\Models\Bookings\BookingTransaction;
use App\Models\Customers\Cart\TrainerCart;
use App\Models\Customers\Cart\TrainerCartDetails;

class TrainerBookingsController extends Controller
{
    protected $trainer;
    use PushNotificationTrait;
    public function createBooking(Request $request)
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
            
            $cart = TrainerCart::where('customer_id', $user_id)->first();
            
            $cart_ids = TrainerCart::where('customer_id', $user_id)->pluck('cart_id');
            
            $cart_details_raw = TrainerCartDetails::whereIn('cart_id',$cart_ids)->get();
            
                $booking_data = [
                    'service_type'      => isset($cart->service_type) ? $cart->service_type : null,
                    'booking_date'      => date('Y-m-d H:i:s'),
                    'booking_to'        => date('Y-m-d H:i:s'),
                    'booking_time'      => date('h:i:s'),
                    'customer_id'    	=> $user_id,
                    'pet_id'    	    => isset($cart->pet_id) ? $cart->pet_id : null,
                    'trainer_id'    	=> isset($cart->trainer_id) ? $cart->trainer_id : '',
                    'total_amount'    	=> isset($data['total_amount']) ? $data['total_amount'] : 0,
                    'discount'    	    => isset($data['discount']) ? $data['discount'] : 0,
                    'booking_status'    => 1,
                    'gst'    	        => isset($data['gst']) ? $data['gst'] : null,
                    'sgst'    	        => isset($data['sgst']) ? $data['sgst'] : null,
                    'service_tax'    	=> isset($data['service_tax']) ? $data['service_tax'] : null,
                    'created_by'        => $user_id,
                    'created_at'   	    => date('Y-m-d H:i:s')
                ];
                
            DB::beginTransaction();
            
            $booking_id = Bookings::insertGetId($booking_data);
            
            if($booking_id > 0){
                
                $booking_details = [];
                
                foreach ($cart_details_raw as $service) {
                    
                    /* $booking_from = isset($data['booking_from'][$key]) ? date_create($data['booking_from'][$key]) : 0;
                    
                    $booking_to = isset($data['booking_to'][$key]) ? date_create($data['booking_to'][$key]) : 0;
                    
                    $booking_time = isset($data['booking_time'][$key]) ? date_create($data['booking_time'][$key]) : 0;
                    
                    $price = SubServices::where('id',$service)->value('price'); */
                    
                    $booking_details[] = [
                        'booking_id'       => $booking_id,
                        'service_id'       => $service->service_id,
                        'booking_from'     => $service->booking_from,
                        'booking_to'       => $service->booking_to,
                        'booking_time'     => $service->booking_time,
                        'amount'           => $service->amount,
                        'status'           => 1,
                        'created_at'       => date('Y-m-d H:i:s'),
                        'created_by'       => $user_id,
                    ];
                }
                
                /* foreach ($data['service_id'] as $key => $service) {
                    
                    $booking_from = isset($data['booking_from'][$key]) ? date_create($data['booking_from'][$key]) : 0;
                    
                    $booking_to = isset($data['booking_to'][$key]) ? date_create($data['booking_to'][$key]) : 0;
                    
                    $booking_time = isset($data['booking_time'][$key]) ? date_create($data['booking_time'][$key]) : 0;
                    
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
                } */
                
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
            
            /* Delete The Cart after booking */
            
            $cart_ids = TrainerCart::where('customer_id', $user_id)->pluck('cart_id');
            
            TrainerCartDetails::whereIn('cart_id',$cart_ids)->delete();
            
            TrainerCart::where('customer_id', $user_id)->whereIn('cart_id',$cart_ids)->delete();
            
            DB::commit();
            
            /* $noti_msg = ['title'=>'Booking Intiated | '.date('m/d/Y'),  'desc' => 'Booking ID'.$booking_id.'is created wait for the confirmation on trainer End' ];
            $this->pushNotification($data['trainer_id'], $noti_msg); */
            
            /* Email Trigger booking success */
            
            /* $to_mail = isset($this->trainer->email) ? $this->trainer->email : '';
            
            if(isset($to_mail) && !empty($to_mail)) {
                
                //booking_success($to_mail, $this->user, $booking->booking_id);
            } */
            
            return response()->json([
                'status'                => 200,
                'booking_id'            => $booking_id,
                'data'                  => $booking_data,
                'transaction_details'   => $bill_details->bill,
                'service_details'       => $bill_details->service_details,
                'bill_details'          => $bill_details->bill_details,
                'message'               => 'We have recieved your Booking details Successfully.'
            ], 200);
            
        } catch (\Exception $e) {
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
        
        $results = Bookings::where('customer_id',$user_id)->orderBy('created_at','DESC')->paginate(config('constants.records-per-page'));
        
        $bookings = [];
        
        foreach ($results as $result){
            
            $bookings[] = [
                'booking_id' 	  => $result->booking_id,
                'service_count'   => !empty($result->bookingDetail()) ? $result->bookingDetail()->count() : '',
                'booking_date' 	  => isset($result->booking_date) ? format_date($result->booking_date) : null,
                'franchise' 	  => isset($result->franchise->location_address) ? $result->franchise->location_address : null,
                'service_name' 	  => isset($result->servicetype->service_name) ? $result->servicetype->service_name : null,
                'trainer_name'    => isset($result->trainer->name) ? $result->trainer->name : null,
                'total_amount' 	  => isset($result->total_amount) ? $result->total_amount : null,
                'discount' 	      => isset($result->discount) ? $result->discount : null,
                'booking_status'  => isset($result->bookingstatus->name) ? $result->bookingstatus->name : null,
                'booking_created' => isset($result->created_at) ? format_date($result->created_at) : null
            ];
        }
        
        return response()->json([
            'status' 		        => true,
            'data' 			        => $bookings,
            'message'               => "Bookings Info.",
            'total'                 => $results->total(),
            'per_page'              => $results->perPage(),
            'current_page'          => $results->currentPage(),
            'last_page'             => $results->lastPage(),
            'from'                  => $results->firstItem(),
            'to'                    => $results->lastItem(),
            'has_more_pages'        => $results->hasMorePages()
        ],200);
    }
    
    public function bookingDetails(Request $request,$booking_id)
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
        
        $results = Bookings::where('booking_id',$booking_id)->get();
        
        $booking_details_raw = BookingDetails::where('booking_id',$booking_id)->get();
        
        $bill_details_raw = BookingTransaction::where('booking_id',$booking_id)->first();
        
        $bill_details = [
            'transaction_id' => isset($bill_details_raw->transaction_id) ? $bill_details_raw->transaction_id : null,
            'txn_amount'     => isset($bill_details_raw->txn_amount) ? number_format($bill_details_raw->txn_amount, 2, '.', ',') : null,
            'payment_method' => ($bill_details_raw->payment_method == 1) ? 'Online' : (($bill_details_raw->payment_method == 2) ? 'Offline' : null),
            'payment_date'   => isset($bill_details_raw->payment_date) ? format_date($bill_details_raw->payment_date) : null,
            'payment_status' => $bill_details_raw->tranStatus->name
        ];
        
        $booking_details =[];
        
        foreach ($booking_details_raw as $res){
            
            $booking_details[] = [
                'service_id' 	  => isset($res->service->id) ? $res->service->id : null,
                'service_name' 	  => isset($res->service->service_name) ? $res->service->service_name : null,
                'booking_from' 	  => isset($res->booking_from) ? format_date($res->booking_from) : null,
                'booking_to' 	  => isset($res->booking_to) ? format_date($res->booking_to) : null,
                'amount' 	      => isset($res->amount) ? $res->amount : null
            ];
        }
        
        $bookings = [];
        foreach ($results as $result){
            
            $bookings[] = [
                'booking_id' 	  => $result->booking_id,
                'booking_date' 	  => isset($result->booking_date) ? format_date($result->booking_date) : null,
                'franchise' 	  => isset($result->franchise->location_address) ? $result->franchise->location_address : null,
                'service_type' 	  => isset($result->servicetype->service_name) ? $result->servicetype->service_name : null,
                'trainer_id'      => isset($result->trainer_id) ? $result->trainer_id : null,
                'trainer_name'    => isset($result->trainer->name) ? $result->trainer->name : null,
                'total_amount' 	  => isset($result->total_amount) ? $result->total_amount : null,
                'gst' 	          => isset($result->gst) ? $result->gst : null,
                'sgst' 	          => isset($result->sgst) ? $result->sgst : null,
                'discount' 	      => isset($result->discount) ? $result->discount : null,
                'booking_status'  => isset($result->bookingstatus->name) ? $result->bookingstatus->name : null,
                'booking_sub_status'  => ($result->sub_status_id == 1) ? 'Rescheduled' : null,
                'booking_created' => isset($result->created_at) ? format_date($result->created_at) : null,
                'booking_details' => (count($booking_details) > 0) ? $booking_details : null,
                'transaction_details' => (count($bill_details) > 0) ? $bill_details : null
            ];
        }
        
        return response()->json([
            'status' 		=> true,
            'data' 			=> $bookings,
            'message' 		=> "Bookings Details Info."
        ],200);
    }
    
    public function rescheduleBooking(Request $request)
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
            
            $booking_id = $data['booking_id'];
            
            if(isset($booking_id) && empty($booking_id)){
                
                return response()->json([ 'status' => false, 'message' => "select Booking" ],400);
            }
            
            $booking_from = isset($data['booking_from']) ? date_create($data['booking_from']) : null;
            
            $booking_to = isset($data['booking_to']) ? date_create($data['booking_to']) : null;
            
            $booking_time = isset($data['booking_time']) ? date_create($data['booking_time']) : null;
            
            $booking_details = [
                'booking_from'     => $booking_from->format('Y-m-d H:m:s'),
                'booking_to'       => $booking_to->format('Y-m-d H:m:s'),
                'booking_time'     => $booking_time,
                'sub_status_id'    => 1,  /* 1= Rescheduled */
                'updated_at'       => date('Y-m-d H:i:s'),
                'updated_by'       => $user_id,
            ];
            
            DB::beginTransaction();
            
            $previous_bookings = Bookings::where('booking_id',$booking_id)->first();
            
            $prev_bkngs = [
                'booking_id'     =>  $booking_id,
                'booking_from'   =>  $previous_bookings->booking_from,
                'booking_to'     =>  $previous_bookings->booking_to,
                'booking_time'   =>  $previous_bookings->booking_time,
            ];
            
            DB::table('booking_history_reschedule')->insert($prev_bkngs);
        
            BookingDetails::where('booking_id',$booking_id)->update($booking_details);
            
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
                'message'       => 'Booking Rescheduled Successfully.'
            ], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage(),
            ], 500);
        }
        
    }
    
}
