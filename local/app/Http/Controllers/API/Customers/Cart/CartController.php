<?php

namespace App\Http\Controllers\API\Customers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Customers\Cart\Cart;
use App\Models\Bookings\Bookings;
use App\Models\Bookings\BookingDetails;

class CartController extends Controller
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
            
            $rules = [
                'customer_id'      => 'required',
                'franchise_id'     => 'required',
                'service_type'     => 'required',
                'category_id'      => 'required',
                'amount'           => 'required'
            ];
            
            $validator = Validator::make($data, $rules);
            
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    "message" => "Validation errors occured.",
                    "errors" => implode('\n', array_flatten($validator->errors()->toArray()))
                ]);
            }
            
            $cart_data = [
                'customer_id'    	=> $user_id,
                'pet_id'    	    => isset($data['pet_id']) ? $data['pet_id'] : null,
                'product_id'    	=> isset($data['product_id']) ? $data['product_id'] : null,
                'dealer_id'    	    => isset($data['dealer_id']) ? $data['dealer_id'] : null,
                'pet_id'    	    => isset($data['pet_id']) ? $data['pet_id'] : null,
                'franchise_id'      => isset($data['franchise_id']) ? $data['franchise_id'] : null,
                'service_type'      => isset($data['service_type']) ? $data['service_type'] : null,
                'category_id'       => isset($data['booking_date']) ? format_date_db($data['booking_date']) : null,
                'amount'    	    => isset($data['amount']) ? $data['total_amount'] : null,
                'discount'    	    => isset($data['discount']) ? $data['discount'] : null
            ];
            
            DB::beginTransaction();
            
            Cart::insertGetId($cart_data);
            
            DB::commit();
            return response()->json(['status' => true, 'message' => 'added cart successfully.']);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage(),
            ], 500);
        }
        
    }
    
    public function cartDetails()
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
        
        $results = Cart::where('customer_id',$user_id)->get();
        
        $cart_details = []; 
        
        foreach ($results as $result){
            
            $cart_details[] = [
                'cart_id' 	          => isset($result->cart_id) ? $result->cart_id: '',
                'customer_id' 	      => isset($result->customer_id) ? $result->customer_id : '',
                'pet_id' 	          => isset($result->pet_id) ? $result->pet_id :'',
                'product_id' 	      => isset($result->product_id) ? $result->product_id : '',
                'dealer_id' 	      => isset($result->dealer_id) ? $result->dealer_id : '',
                'franchise_id' 	      => isset($result->franchise_id) ? $result->franchise_id : '',
                'service_name' 	      => isset($result->service->service_name) ? $result->service->service_name : '',
                'category' 	          => isset($result->categoryname->category_name) ? $result->categoryname->category_name : null,
                'amount'	          => isset($result->amount) ? $result->amount : null,
                'discount'	          => isset($result->discount) ? $result->discount : null
            ];
        }
        
        return response()->json([
            'status' 		=> true,
            'data' 			=> $cart_details,
            'message' 		=> "Cart Info."
        ],200);
        
        
    }
    
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
            
            $cart_details_raw = Cart::selectRaw('customer_id, MAX(franchise_id) as franchise_id,MAX(service_type) as service_type')
            ->selectRaw('count(category_id) as no_of_category')
            ->selectRaw('SUM(amount) as total_amount')
            ->where('customer_id', $user_id)->whereIn('cart_id',$data['cart_ids'])
            ->groupBy('customer_id')
            ->first();
            
            /* Logic create booking  */
            
            $booking_data = [];
            
            foreach ($cart_details_raw as $cart_details){
            
                $booking_data = [
                    'franchise_id'      => isset($cart_details->franchise_id) ? $cart_details->franchise_id : null,
                    'service_type'      => isset($cart_details->service_type) ? $cart_details->service_type : null,
                    'booking_date'      => date('Y-m-d H:i:s'),
                    'customer_id'    	=> isset($cart_details->customer_id) ? $cart_details->customer_id : $user_id,
                    'quantity'    	    => isset($cart_details->no_of_category) ? $cart_details->no_of_category : null,
                    'total_amount'    	=> isset($cart_details->total_amount) ? $cart_details->total_amount : 0,
                    'discount'    	    => isset($cart_details->total_amount) ? $cart_details->total_amount : 0,
                    'booking_status'    => 1,
                    'gst'    	        => isset($data['gst']) ? $data['gst'] : null,
                    'sgst'    	        => isset($data['sgst']) ? $data['sgst'] : null,
                    'created_by'        => $user_id,
                    'created_at'   	    => date('Y-m-d H:i:s'),
                ];
            }
            
            DB::beginTransaction();
            
            $booking_id = Bookings::insertGetId($booking_data);
            
            if($booking_id > 0){
                
                $cart_details = Cart::where('customer_id',$user_id)->get();
                
                $booking_details = [];
                
                foreach ($cart_details as $cart) {
                    
                    $booking_details[] = [
                        'booking_id'       => $booking_id,
                        'service_type'     => isset($cart->service_type) ? $cart->service_type : null,
                        'category_id'      => isset($cart->service_type) ? $cart->service_type : null,
                        'pet_id'           => isset($cart->pet_id) ? $cart->pet_id : null,
                        'amount'           => isset($cart->amount) ? $cart->amount : null
                    ];
                }
                
                if(count($booking_details)>0){
                    BookingDetails::insert($cart_details);
                }
            }
            
            DB::commit();
            return response()->json(['status' => true, 'message' => 'Booking successfully Completed.']);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage(),
            ], 500);
        }
        
    }
}
