<?php

namespace App\Http\Controllers\API\Customers\Activities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Management\Events\Events;
use App\Models\Management\Events\EventGallery;
use App\Models\Management\Events\EventBenefits;
use App\Models\Bookings\Bookings;
use App\Models\Bookings\BookingTransaction;
use App\Models\Bookings\BookingDetails;
use Illuminate\Support\Facades\DB;

class ActivitiesController extends Controller
{
    public function eventLists(Request $request)
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
        
        $search_key = isset($data['search_key']) ? $data['search_key'] : '';
        
        $results = Events::where('status_id',1)
        ->where(function($q) use($search_key) {
            if(!empty($search_key)) {
                $q->where('name','LIKE', '%'.$search_key.'%');
            }
        })->paginate(config('constants.records-per-page'));
        
        $event_lists = [];
        
        foreach ($results as $result){
            
            $event_gallery = EventGallery::where('event_id',$result->id)->get();
            $event_benefits = EventBenefits::where('event_id',$result->id)->get();
            
            $event_lists[] = [
                'event_id' 	            => isset($result->id) ? $result->id : null,
                'event_name' 	        => isset($result->event_name) ? $result->event_name : null,
                'about' 	            => isset($result->about) ? $result->about : null,
                'event_date' 	        => isset($result->event_date) ? format_date($result->event_date) : null,
                'event_time_from' 	    => isset($result->event_time_from) ? $result->event_time_from : null,
                'event_time_to' 	    => isset($result->event_time_to) ? $result->event_time_to : null,
                'location' 	            => isset($result->location) ? $result->location : null,
                'city' 	                => isset($result->city) ? $result->city : null,
                'state_id' 	            => isset($result->state_id) ? $result->state_id : null,
                'state' 	            => isset($result->state->name) ? $result->state->name : null,
                'country_id'            => isset($result->country_id) ? $result->country_id : null,
                'country'               => isset($result->country->name) ? $result->country->name : null,
                'pincode' 	            => isset($result->pincode) ? $result->pincode : null,
                'entry_fee' 	        => isset($result->entry_fee) ? $result->entry_fee : null,
                'status_id'             => isset($result->status_id) ? $result->status_id : null,
                'gallery'               => (count($event_gallery) > 0) ? $event_gallery : null,
                'benefits'              => (count($event_benefits) > 0) ? $event_benefits : null,
            ];
        }
        
        return response()->json([
            'status' 		        => true,
            'data' 			        => $event_lists,
            'message'               => "Events Info.",
            'total'                 => $results->total(),
            'per_page'              => $results->perPage(),
            'current_page'          => $results->currentPage(),
            'last_page'             => $results->lastPage(),
            'from'                  => $results->firstItem(),
            'to'                    => $results->lastItem(),
            'has_more_pages'        => $results->hasMorePages()
        ],200);
    }
    
    public function show(Request $request ,$event_id)
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
            
            $event = Events::where('id',$event_id)->first();
            $event_gallery = EventGallery::where('event_id',$event_id)->get();
            $event_benefits = EventBenefits::where('event_id',$event_id)->get();
            
            $entry_fee = isset($event->entry_fee) ? $event->entry_fee : 0;
            $cgst  = config('constants.cgst');
            $sgst  = config('constants.sgst');
            $service_tax  = config('constants.service_tax');
            
            $calculation_results = total_price($entry_fee, $cgst, $sgst, $service_tax);
            
            $fee_details = [
                'entry_fee'         => isset($event->entry_fee) ? (int) $event->entry_fee : 0,
                'cgst'              => $calculation_results['cgst_fee'],
                'sgst'              => $calculation_results['sgst_fee'],
                'service_tax'       => $calculation_results['service_tax'],
                'total_amount'      => $calculation_results['total_amount'],
            ];
            
            $event = [
                'event_id'  	    =>isset($event->id) ? $event->id : null,
                'name'              => isset($event->name) ? $event->name : null,
                'about'             => isset($event->about) ? $event->about : null,
                'event_date' 	    => isset($event->event_date) ? format_date($event->event_date) : null,
                'event_time_from' 	=> isset($event->event_time_from) ? format_time($event->event_time_from) : null,
                'event_time_to'    	=> isset($event->event_time_to) ? format_time($event->event_time_to) : null,
                'location'    	    => isset($event->location) ? $event->location : null,
                'city' 	            => isset($event->city) ? $event->city : null,
                'state_id' 	        => isset($event->state_id) ? $event->state_id : null,
                'state' 	        => isset($event->state->name) ? $event->state->name : null,
                'country_id'        => isset($event->country_id) ?  $event->country_id : null,
                'country'           => isset($event->country->name) ? $event->country->name : null,
                'pincode'    	    => isset($event->pincode) ? $event->pincode : null,
                'entry_fee'    	    => isset($event->entry_fee) ? $event->entry_fee : null,
                'discount'    	    => isset($event->discount) ? $event->discount : null,
                'status_id'    	    => 1,
                'gallery'           => (count($event_gallery) > 0) ? $event_gallery : null,
                'benefits'          => (count($event_benefits) > 0) ? $event_benefits : null
            ];
            
            return response()->json(['status' => true, 'data' => $event, 'payment_details' => $fee_details ],200);
            
        }
        catch(\Exception $e)
        {
            return response()->json(["status" => false, "message" => 'Something went wrong.', "errors" => print_exn($e)]);
        }
    }
    
    public function createEventBooking(Request $request, $event_id)
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
            
            $event_data = Events::where('id',$event_id)->first();
            
            $data = $request->all();
            
            $pet_id = $data['pet_id'];
            
            if(empty($pet_id))
            {
                return response()->json([ 'status' => false, 'message' => "Select Pet" ]);
            }
            
            $cgst = $event_data->entry_fee*9/100;
            $sgst = $event_data->entry_fee*9/100;
            $entry_fee = $event_data->entry_fee ? $event_data->entry_fee : 0;
            $total_amount = $entry_fee + $cgst + $sgst;
            
            $data['txn_amount'] = $total_amount;
            
            $booking_data = [
                'service_type'      => 7,
                'booking_date'      => date('Y-m-d H:i:s'),
                'booking_to'        => date('Y-m-d H:i:s'),
                'booking_time'      => date("H:i:s"),
                'customer_id'    	=> $user_id,
                'pet_id'    	    => $pet_id,
                'total_amount'    	=> $total_amount,
                'discount'    	    => 0,
                'booking_status'    => 1,
                'gst'    	        => $cgst,
                'sgst'    	        => $sgst,
                'created_by'        => $user_id,
                'created_at'   	    => date('Y-m-d H:i:s')
            ];
            
            DB::beginTransaction();
            
            $booking_id = Bookings::insertGetId($booking_data);
            
            if($booking_id > 0){
                
                $booking = Bookings::find($booking_id);
                
                    $booking_details[] = [
                        'booking_id'       => $booking_id,
                        'event_id'         => $event_id,
                        'booking_from'     => $booking->booking_date,
                        'booking_to'       => $booking->booking_to,
                        'booking_time'     => $booking->booking_time,
                        'amount'           => $event_data->entry_fee,
                        'status'           => 1,
                        'created_at'       => date('Y-m-d H:i:s'),
                        'created_by'       => $user_id,
                    ];
                
                if(count($booking_details)>0){
                    BookingDetails::insert($booking_details);
                }
            }
            
            $bill_response = BookingTransaction::createBill($booking_id,$data);
            
            $bill_details = json_decode($bill_response->content());
            
            if($bill_details->status == 1){
                
                $confirm_event_details = [
                    'event_name'       => $event_data->name,
                    'event_date'       => $event_data->event_date,
                    'event_time_from'  => $event_data->event_time_from,
                    'event_time_to'    => $event_data->event_time_to,
                    'location'         => $event_data->location,
                    'state'            => $event_data->state->name,
                    'country'          => $event_data->country->name,
                ];
            }
            
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
                'status'                      => 200,
                'booking_id'                  => $booking_id,
                'data'                        => $booking_data,
                'confirm_event_data'          => $confirm_event_details,
                'bill_details'                => $bill_details->bill,
                'message'                     => 'Your Booking Successfully confirmed.'
            ], 200);
            
        } catch (\Exception $e) {
            dd_array($e->getLine().'-'.$e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage(),
            ], 500);
        }
        
    }
}
