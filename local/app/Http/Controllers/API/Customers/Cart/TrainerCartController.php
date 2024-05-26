<?php

namespace App\Http\Controllers\API\Customers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\DB;
use App\Models\Customers\Cart\TrainerCart;
use App\Models\SubServices;
use App\Models\Customers\Cart\TrainerCartDetails;
use App\Models\Trainers\AssignTrainerService;

class TrainerCartController extends Controller
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
            
            $cart_ids = TrainerCart::where('customer_id', $user_id)->where('trainer_id', $data['trainer_id'])->pluck('cart_id');
            
            $service_ids = TrainerCartDetails::whereIn('cart_id', $cart_ids)->pluck('service_id')->toArray();
            
            $common_services = array_intersect($service_ids, $data['service_id']);
            
            $sub_services = SubServices::whereIn('id',$common_services)->select('service_name')->get()->toArray();
            
            if (!empty($common_services)) {
                
                $names = [];
                foreach ($sub_services as $ser){
                    $names[] = [
                        'serice_name' => $ser['service_name']
                    ];
                }
                
                return response()->json(['status' => false, 'data' => $names, 'message' => "Already Service is added to cart"]);
            }
            
            $cart_data = [
                'service_type'      => isset($data['service_type']) ? $data['service_type'] : null,
                'booking_date'      => isset($data['booking_from'][0]) ? format_date_db($data['booking_from'][0]) : null,
                'booking_to'        => isset($data['booking_to'][0]) ? format_date_db($data['booking_to'][0]) : null,
                'booking_time'      => isset($data['booking_time'][0]) ? $data['booking_time'][0] : null,
                'customer_id'    	=> $user_id,
                'pet_id'    	    => isset($data['pet_id']) ? $data['pet_id'] : null,
                'trainer_id'    	=> isset($data['trainer_id']) ? $data['trainer_id'] : '',
                'total_amount'    	=> isset($data['total_amount']) ? $data['total_amount'] : 0,
                'created_by'        => $user_id,
                'created_at'   	    => date('Y-m-d H:i:s')
            ];
            
            DB::beginTransaction();
            
            $cart_id = TrainerCart::insertGetId($cart_data);
            
            if($cart_id > 0){
                
                $cart_details = [];
                
                foreach ($data['service_id'] as $key => $service) {
                    
                    $booking_from = isset($data['booking_from'][$key]) ? date_create($data['booking_from'][$key]) : 0;
                    
                    $booking_to = isset($data['booking_to'][$key]) ? date_create($data['booking_to'][$key]) : 0;
                    
                    $booking_time = isset($data['booking_time'][$key]) ? date_create($data['booking_time'][$key]) : 0;
                    
                    $price = AssignTrainerService::where('trainer_id',$data['trainer_id'])->where('service_id',$service)->value('price');
                    
                    $cart_details[] = [
                        'cart_id'          => $cart_id,
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
                
                if(count($cart_details)>0){
                    TrainerCartDetails::insert($cart_details);
                }
            }
            
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
    
    public function cartDetails(Request $request)
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
        
        $cart_ids = TrainerCart::where('customer_id',$user_id)->pluck('cart_id');
        
        if(!$cart_ids){
            
            return response()->json([ 'status' => false, 'message' => "cart is empty" ],400);
        }
        
        $results  = TrainerCartDetails::whereIn('cart_id',$cart_ids)->get();
        
        $cart_details = []; 
        $total_amount = 0;
        
        foreach ($results as $result){
            
            $cart_details[] = [
                'cart_id' 	          => isset($result->cart_id) ? $result->cart_id: '',
                'service_id' 	      => isset($result->service_id) ? $result->service_id : '',
                'service_name' 	      => isset($result->service->subservice->service_name) ? $result->service->subservice->service_name : '',
                'amount'	          => isset($result->amount) ? (string) $result->amount : 0,
                'booking_date'        => get_order_date_format($result->booking_from),
                /* 'booking_to'          => get_order_date_format($result->booking_to), */
                'booking_time'        => $result->booking_time
            ];
            
            $total_amount += $result->amount;
        }
        
        $cgst = config('constants.cgst');
        $sgst = config('constants.sgst');
        $service_tax = config('constants.service_tax');
        
        $cgst_comm = $total_amount*$cgst/100;
        $sgst_comm = $total_amount*$sgst/100;
        $service_tax_comm = $total_amount*$service_tax/100;
        
        $total_service_taxes = $cgst_comm + $sgst_comm + $service_tax_comm;
        
        $bill_details = [
            'sub_total' 	      => $total_amount,
            'cgst'                => $cgst_comm,
            'sgst'                => $sgst_comm,
            'service_tax'         => $service_tax_comm,
            'service_fee_taxes'  => $total_service_taxes,
            'total_amount'	      => $total_amount + $total_service_taxes
        ];
        
        return response()->json([
            'status' 		=> true,
            'data' 			=> $cart_details,
            'bill_details'  => $bill_details,
            'message' 		=> "cart details info."
        ],200);
        
    }
    
    public function removeServiceByCart(Request $request, $service_id)
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
        
        $count = TrainerCart::where('customer_id',$user_id)->count();
        
        DB::beginTransaction();
        
        try{
            
            if($count > 0){
                
                $cart_ids = TrainerCart::where('customer_id',$user_id)->pluck('cart_id');
                
                TrainerCartDetails::where('service_id',$service_id)->whereIn('cart_id',$cart_ids)->delete();
                
                $cart_data = TrainerCartDetails::whereIn('cart_id',$cart_ids)->count();
                
                if($cart_data == 0){
                    TrainerCart::where('customer_id',$user_id)->delete();
                }
            }
            DB::commit();
            return response()->json([
                'status' 		=> true,
                'message' 		=> "removes service from cart."
            ],200);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage().'-'.$e->getLine(),
            ], 500);
        }
        
    }
    
    /* Cleared Cart backgroung closed */
    
    public function clearCart(Request $request,$trainer_id)
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
        
        $count = TrainerCart::where('customer_id',$user_id)->where('trainer_id',$trainer_id)->count();
        
        try{
        
            if($count == 0){
                
                $cart_ids = TrainerCart::where('customer_id',$user_id)->pluck('cart_id');
                
                $del = TrainerCartDetails::whereIn('cart_id',$cart_ids)->delete();
                
                if($del > 0){
                
                    TrainerCart::where('customer_id',$user_id)->delete();
                }
                
                return response()->json([
                    'status' 		=> true,
                    'message' 		=> "cleared cart."
                ],200);
            }else{
                
                return response()->json([
                    'status' 		=> true,
                    'message' 		=> "cleared cart."
                ],200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage().'-'.$e->getLine(),
            ], 500);
        }
        
    }
}
