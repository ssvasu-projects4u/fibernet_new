<?php

namespace App\Http\Controllers\API\Customers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\Customers\Orders\Order;
use Illuminate\Support\Facades\DB;
use App\Models\Customers\Orders\OrderDetail;
use App\Models\Customers\Seller\SellerWallet;
use App\Models\Customers\Seller\SellerWalletDetails;
use App\Models\Customers\Seller\SellerWalletTransaction;

class OrderController extends Controller
{
    
    public function dashboard(Request $request)
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
        
        $orders = DB::table('orders')->where('seller_id',$user_id)
        ->select(
            DB::raw("(select COUNT(*) from online_pets where status_id = 1 and owner_id = $user_id) as total_pets"),
            DB::raw("(select COUNT(*) from orders where status_id = 4 and seller_id = $user_id) as total_sale"),
            DB::raw("(select SUM(order_payments.amount) from order_payments join orders on orders.order_id = order_payments.order_id where orders.status_id = 8 and order_payments.payment_status = 6 and orders.seller_id = $user_id) as total_earnings"),
            DB::raw("(select COUNT(*) from orders where status_id = 1 and date(order_date) = CURDATE() and seller_id = $user_id) as today_open"),
            DB::raw("(select COUNT(*) from orders where status_id = 1 and seller_id = $user_id) as open"),
            DB::raw("(select COUNT(*) from orders where status_id = 2 and seller_id = $user_id) as inprogress"),
            DB::raw("(select COUNT(*) from orders where status_id = 3 and seller_id = $user_id) as cancelled"),
            DB::raw("(select COUNT(*) from orders where status_id = 6 and seller_id = $user_id) as rejected")
            )->first();
        
            $orders_raw['total_pets'] = isset($orders->total_pets) ? $orders->total_pets : 0;
            $orders_raw['total_sale'] = isset($orders->total_sale) ? $orders->total_sale : 0;
            $orders_raw['total_earnings'] = isset($orders->total_earnings) ? $orders->total_earnings : 0;
            $orders_raw['today_new_orders'] = isset($orders->today_open) ? $orders->today_open : 0;
            $orders_raw['open'] = isset($orders->open) ? $orders->open : 0;
            $orders_raw['inprogress'] = isset($orders->inprogress) ? $orders->inprogress : 0;
            $orders_raw['cancelled'] = isset($orders->cancelled) ? $orders->cancelled : 0;
            $orders_raw['rejected'] = isset($orders->rejected) ? $orders->rejected : 0;
            
            return response()->json([
                'status' 		        => true,
                'data' 			        => $orders_raw,
                'message'               => "Orders Info."
            ],200);
            
        
    }
    
    public function currentOrders(Request $request)
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
        
        
        $results =  Order::where('seller_id',$user_id)->where('status_id',1)
        ->whereRaw("DATE(order_date) = CURDATE()")->orderBy('order_date','DESC')->paginate(config('constants.records-per-page'));
        
        $orders = [];
        
        foreach ($results as $record) {
            $orders[] = [
                'order_id'               => $record->order_id,
                'service_type'           => $record->servicetype->service_name,
                'order_date'             => get_order_date_format($record->order_date),
                'total_amount'           => $record->total_amount,
                'customer_name'          => $record->customer->name,
                'order_status'           => $record->orderstatus->name
            ];
        }
        
        return response()->json([
            'status' 		        => true,
            'data' 			        => $orders,
            'message'               => "Open Orders Info.",
            'total'                 => $results->total(),
            'per_page'              => $results->perPage(),
            'current_page'          => $results->currentPage(),
            'last_page'             => $results->lastPage(),
            'from'                  => $results->firstItem(),
            'to'                    => $results->lastItem(),
            'has_more_pages'        => $results->hasMorePages()
        ],200);
    }
    
    public function orders(Request $request)
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
        $status_id = isset($data['status_id']) ? $data['status_id'] : '';
        
        $results =  Order::where('seller_id',$user_id)
        ->where(function($q) use($search_key) {
            if(!empty($search_key)) {
                $q->where('order_id',$search_key);
                $q->orWhereHas('customer',function($qr) use($search_key) {
                    $qr->where('name', 'LIKE', '%'. $search_key .'%');
                });
            }
        })
        ->where(function($q) use($status_id) {
            if(!empty($status_id)) {
                $q->where('status_id',$status_id);
            }
        })->orderBy('order_date','DESC')
        ->paginate(config('constants.records-per-page'));
        
        $orders = [];
        
        foreach ($results as $record) {
            $orders[] = [
                'pet_owner'              => isset($record->customer->name) ? $record->customer->name : '',
                'order_id'               => isset($record->order_id) ? $record->order_id : '',
                'pet_name'               => $record->orderDetails->product->breed_name->name,
                'service_type'           => $record->servicetype->service_name,
                'order_date'             => get_order_date_format($record->order_date),
                'total_amount'           => $record->total_amount,
                'customer_name'          => $record->customer->name,
                'order_status'           => $record->orderstatus->name,
                'delivery_type'          => ($record->orderDetails->product->delivery_type == 1) ? 'Home' : ($record->orderDetails->product->delivery_type == 2 ? 'Pet Store' : ''),
            ];
        }
        
        return response()->json([
            'status' 		        => true,
            'data' 			        => $orders,
            'message'               => "Open Orders Info.",
            'total'                 => $results->total(),
            'per_page'              => $results->perPage(),
            'current_page'          => $results->currentPage(),
            'last_page'             => $results->lastPage(),
            'from'                  => $results->firstItem(),
            'to'                    => $results->lastItem(),
            'has_more_pages'        => $results->hasMorePages()
        ],200);
    }
    
    public function changeOrderStatus(Request $request)
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
        
        $order_id = $data['order_id'];
        
        $status_id = isset($data['status_id']) ? $data['status_id'] : '';
        
        if(isset($order_id) && empty($order_id)){
            
            return response()->json([ 'status' => false, 'message' => "select Order" ],400);
        }
        
        if(isset($status_id) && empty($status_id)){
            
            return response()->json([ 'status' => false, 'message' => "select Status" ],400);
        }
        
        $check_status_id = Order::where('seller_id',$user_id)->value('status_id');
        
        if($check_status_id == $status_id){
            
            return response()->json([ 'status' => false, 'message' => "Status not updated. Old and New are Same." ],400);
        
        } else {
        
        $order_details = [
            'status_id'        => $status_id,
            'updated_at'       => date('Y-m-d H:i:s'),
            'updated_by'       => $user_id,
        ];
        
            try {
            
            DB::beginTransaction();
            
            $update = Order::where('order_id',$order_id)->update($order_details);
            
            if($update > 0){
            
                if($status_id == 4){
                    
                    $order_amount = OrderDetail::where('order_id',$order_id)->sum('price');
                    
                    $seller_comm = config('constants.seller_side_commision');
                    $minus_seller_comm = $order_amount*$seller_comm/100;
                    $balance = $order_amount - $minus_seller_comm;
                    
                    $count = SellerWallet::where('seller_id',$user_id)->count();
                        
                        if($count > 0){
                            
                            $wallet_id = SellerWallet::where('seller_id',$user_id)->update(['balance'=>DB::raw('balance+'.$balance)]);
                            
                            ($wallet_id > 0) ? SellerWalletDetails::insert([
                                    'order_id' => $order_id,
                                    'seller_id' => $user_id,
                                    'amount' => $balance,
                                    'type' => 1,
                                    'added_at' => date("Y-m-d H:i:s")
                                  ]) : '';
                            
                        }else{
                            
                            $wallet_id = SellerWallet::insertGetId(['seller_id' => $user_id,'balance' => $balance]);
                            
                            ($wallet_id > 0) ? SellerWalletDetails::insert([
                                'order_id' => $order_id,
                                'seller_id' => $user_id,
                                'amount' => $balance,
                                'type' => 1,
                                'added_at' => date("Y-m-d H:i:s")
                            ]) : '';
                        }
                }
            }
            
            DB::commit();
            
            return response()->json([
                'status'        => 200,
                'message'       => 'Wallet amount added Successfully.'
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
    
    public function walletTransactions(Request $request)
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
        
        $status_id = isset($data['status_id']) ? $data['status_id'] : ''; /* 2 = Debit */
        
        $results =  SellerWalletDetails::where('seller_id',$user_id)
        ->where(function($q) use($status_id) {
            if(!empty($status_id)) {
                $q->where('type',$status_id);
            }
        })->orderBy('added_at','DESC')
        ->paginate(config('constants.records-per-page'));
        
        $wallet_balance = SellerWallet::where('seller_id',$user_id)->value('balance');
        
        $transactions = [];
        foreach ($results as $record) {
            $transactions[] = [
                'order_id'               => isset($record->order_id) ? $record->order_id : '',
                'transaction_date'       => get_order_date_format($record->added_at),
                'amount'                 => $record->amount,
                'transaction_type'       => ($record->type == 1) ? 'credit' : ($record->type == 2 ? 'debit' : '')
            ];
        }
        
        return response()->json([
            'status' 		        => true,
            'wallet_balance'        => isset($wallet_balance) && !empty($wallet_balance) ? $wallet_balance : 0,
            'data' 			        => $transactions,
            'message'               => "Transactions",
            'total'                 => $results->total(),
            'per_page'              => $results->perPage(),
            'current_page'          => $results->currentPage(),
            'last_page'             => $results->lastPage(),
            'from'                  => $results->firstItem(),
            'to'                    => $results->lastItem(),
            'has_more_pages'        => $results->hasMorePages()
        ],200);
    }
    
    public function withdrawlTransactions(Request $request)
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
        
        try{
        
        $results =  SellerWalletTransaction::where('seller_id',$user_id)->orderBy('transaction_date','DESC')
        ->paginate(config('constants.records-per-page'));
        
        $wallet_balance = SellerWallet::where('seller_id',$user_id)->value('balance');
        
            $transactions = [];
            foreach ($results as $record) {
                $transactions[] = [
                    'transaction_id'         => isset($record->transaction_id) ? $record->transaction_id : '',
                    'transaction_date'       => get_order_date_format($record->transaction_date),
                    'amount'                 => $record->amount,
                    'payment_status'         => $record->tranStatus->name
                ];
            }
        
            return response()->json([
                'status' 		        => true,
                'wallet_balance'        => isset($wallet_balance) && !empty($wallet_balance) ? $wallet_balance : 0,
                'data' 			        => $transactions,
                'message'               => "Withdraws",
                'total'                 => $results->total(),
                'per_page'              => $results->perPage(),
                'current_page'          => $results->currentPage(),
                'last_page'             => $results->lastPage(),
                'from'                  => $results->firstItem(),
                'to'                    => $results->lastItem(),
                'has_more_pages'        => $results->hasMorePages()
            ],200);
    
    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Something went wrong.',
            'errors' => $e->getMessage().'-'.$e->getLine(),
        ], 500);
    }
   }
   
   public function ongoingTransactions(Request $request)
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
       
       try{
           
           $results =  Order::where('seller_id',$user_id)->where('status_id',2)->orderBy('order_date','DESC')
           ->paginate(config('constants.records-per-page'));
           
           $wallet_balance = SellerWallet::where('seller_id',$user_id)->value('balance');
           $transactions = [];
           foreach ($results as $record) {
               $transactions[] = [
                   'order_id'               => isset($record->order_id) ? $record->order_id : '',
                   'order_date'             => get_order_date_format($record->order_date),
                   'amount'                 => $record->total_amount,
               ];
           }
           
           return response()->json([
               'status' 		        => true,
               'wallet_balance'        => isset($wallet_balance) && !empty($wallet_balance) ? $wallet_balance : 0,
               'data' 			        => $transactions,
               'message'               => "Withdraws",
               'total'                 => $results->total(),
               'per_page'              => $results->perPage(),
               'current_page'          => $results->currentPage(),
               'last_page'             => $results->lastPage(),
               'from'                  => $results->firstItem(),
               'to'                    => $results->lastItem(),
               'has_more_pages'        => $results->hasMorePages()
           ],200);
           
       } catch (\Exception $e) {
           return response()->json([
               'status' => false,
               'message' => 'Something went wrong.',
               'errors' => $e->getMessage().'-'.$e->getLine(),
           ], 500);
       }
   }
}
