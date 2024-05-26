<?php

namespace App\Http\Controllers\API\Customers\PetAdoption;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Customers\OnlinePets;
use App\Models\Customers\OnlinePetImages;
use App\Models\Customers\OnlinePetsBehavior;
use App\Models\User;
use App\Models\PetBehavior;
use App\Models\Customers\UserLocations;
use App\Models\Customers\Orders\Order;
use App\Models\Customers\Orders\OrderDetail;
use App\Models\Customers\Orders\OrderPayment;


class OnlineOrderController extends Controller
{
    public function createBooking(Request $request, $pet_id)
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
            
            $order_data = OnlinePets::where('product_id',$pet_id)->first();
            
            $data = $request->all();
            /* $cgst = config('constants.cgst');
            $sgst = config('constants.sgst'); */
            $customer_commission = config('constants.customer_side_commision');
            
            /* Calculations */
            //$cgst = $order_data->price*$cgst/100;
            //$sgst = $order_data->price*$sgst/100;
            $pet_fee = $order_data->price ? $order_data->price : 0;
            $platform_fee = $order_data->price*$customer_commission/100;
            $total_amount = $pet_fee + $platform_fee;
            
            $data['txn_amount'] = $total_amount;
            
            $order_data_raw = [
                'service_type'      => 1,
                'customer_id'       => $user_id,
                'seller_id'         => $order_data->owner_id,
                'franchise_id'      => null,
                'order_date'        => date('Y-m-d H:i:s'),
                'total_amount'    	=> $total_amount,
                'platform_fee'    	=> $platform_fee,
                'discount'    	    => 0,
                'status_id'         => 1,
                'cgst'    	        => 0,
                'sgst'    	        => 0,
                'created_by'        => $user_id,
                'created_at'   	    => date('Y-m-d H:i:s')
            ];
            
            DB::beginTransaction();
            
            $order_id = Order::insertGetId($order_data_raw);
            
            if($order_id > 0){
                
                $order_details[] = [
                    'order_id'         => $order_id,
                    'product_id'       => $order_data->product_id,
                    'store_product_id' => null,
                    'quantity'         => $data['quantity'],
                    'price'            => $order_data->price
                ];
                
                if(count($order_details)>0){
                    OrderDetail::insert($order_details);
                }
            }
            
            $bill_response = OrderPayment::createBill($order_id,$data);
            
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
                'status'                      => 200,
                'order_id'                    => $order_id,
                'order_details'               => $bill_details->order_details,
                'bill_details'                => $bill_details->bill_fare_details,
                'message'                     => 'Your Order Successfully created.'
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
    
    public function cancelOrder(Request $request)
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
            
            $order_id = $data['order_id'];
            
            if(isset($order_id) && empty($order_id)){
                
                return response()->json([ 'status' => false, 'message' => "select Order" ],400);
            }
            
            $order_details = [
                'order_status'   => 3,
                'cancel_reason'    => isset($data['reason_id']) ? $data['reason_id'] : null,
                'updated_at'       => date('Y-m-d H:i:s'),
                'updated_by'       => $user_id,
            ];
            
            DB::beginTransaction();
            
            Order::where('order_id',$order_id)->update($order_details);
            
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
                'booking_id'    => $order_id,
                'message'       => 'Order Cancelled Successfully.'
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
