<?php

namespace App\Http\Controllers\API\Masters;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use Illuminate\Support\Facades\DB;
use App\Models\Pettype;
use App\Models\Bookings\BookingDetails;
use Illuminate\Http\Request;

class MasterController extends Controller
{
	
    
    public function getpettype()
    {
        try{
        $results = Pettype::all();
        
        if(request()->ajax()){
            return json_encode($results);
        }
            return response()->json([ 'status' => true,'data' => $results], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong.',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }
    
	public function getGender()
	{
	    try{
	    $results = Gender::all();
	    
	    if(request()->ajax()){
	        return json_encode($results);
	    }
	    return response()->json([ 'status' => true,'data' => $results], 200);
	    } catch (\Exception $e) {
	        return response()->json([
	            'status' => false,
	            'message' => 'Something went wrong.',
	            'errors' => $e->getMessage(),
	        ], 500);
	    }
	}
	
	public function getRoles()
	{
	    try{
	    $results = \App\Models\Access\Role::all();
	    
	    if(request()->ajax()){
	        return json_encode($results);
	    }
	    return response()->json([ 'status' => true,'data' => $results], 200);
	    } catch (\Exception $e) {
	        return response()->json([
	            'status' => false,
	            'message' => 'Something went wrong.',
	            'errors' => $e->getMessage(),
	        ], 500);
	    }
	}
	
	public function getSerives()
	{
	    try{
	    $results = DB::table('services')->where('status_id',1)->orderBy('order','ASC')->get();
	    
	    if(request()->ajax()){
	        return json_encode($results);
	    }
	    return response()->json([ 'status' => true,'data' => $results], 200);
	    } catch (\Exception $e) {
	        return response()->json([
	            'status' => false,
	            'message' => 'Something went wrong.',
	            'errors' => $e->getMessage(),
	        ], 500);
	    }
	}
	
	public function getServicesByCategories($service_id)
	{
	    try{
	    
	    $results = DB::table('sub_services')->where('status_id', 1)->where('service_type', $service_id)->orderBy('service_name')->get();
	    
	    $services = [];
	    
	    foreach ($results as $result){
	        
	        $total_bookings = BookingDetails::join('bookings','bookings.booking_id','=','booking_details.booking_id')
	        ->whereIn('bookings.booking_status',[1,2])
	        ->where('booking_details.service_id',$result->id)->count();
	        
	        $services [] = [
	            'id' => $result->id,
	            'service_type' => $result->service_type,
	            'service_name' => $result->service_name,
	            'description' => isset($result->description) ? $result->description : '',
	            'duration' => isset($result->duration) ? $result->duration : '',
	            'price' => isset($result->price) ? $result->price : 0,
	            'image' => isset($result->image) ? url($result->image) : '',
	            'status_id' => isset($result->status_id) ? $result->status_id : '',
	            'total_bookings' => !empty($total_bookings) ? $total_bookings : 0
	        ];
	        
	    }
	    
	    if(request()->ajax()){
	        return json_encode($results);
	    }
	    return response()->json([ 'status' => true,'data' => $services], 200);
	    } catch (\Exception $e) {
	        return response()->json([
	            'status' => false,
	            'message' => 'Something went wrong.',
	            'errors' => $e->getMessage(),
	        ], 500);
	    }
	}
	
	
	public function getBreeds()
	{
	    try{
	    $results = DB::table('breeds')->where('status_id', 1)->select('id','name')->orderBy('name')->get();
	    
	    if(request()->ajax()){
	        return json_encode($results);
	    }
	    return response()->json([ 'status' => true,'data' => $results], 200);
	    } catch (\Exception $e) {
	        return response()->json([
	            'status' => false,
	            'message' => 'Something went wrong.',
	            'errors' => $e->getMessage(),
	        ], 500);
	    }
	}
	
	public function getCategories()
	{
	    try{
	    $results = DB::table('petstore_categories')->where('status_id', 1)->select('id','name')->orderBy('name')->get();
	    
	    if(request()->ajax()){
	        return json_encode($results);
	    }
	    return response()->json([ 'status' => true,'data' => $results], 200);
	    } catch (\Exception $e) {
	        return response()->json([
	            'status' => false,
	            'message' => 'Something went wrong.',
	            'errors' => $e->getMessage(),
	        ], 500);
	    }
	}
	
	public function getSubcategories()
	{
	    try{
	    $results = DB::table('petstore_subcategories')->where('status_id', 1)->select('id','name')->orderBy('name')->get();
	    
	    if(request()->ajax()){
	        return json_encode($results);
	    }
	    return response()->json([ 'status' => true,'data' => $results], 200);
	    } catch (\Exception $e) {
	        return response()->json([
	            'status' => false,
	            'message' => 'Something went wrong.',
	            'errors' => $e->getMessage(),
	        ], 500);
	    }
	}
	
	public function getBrands()
	{
	    try{
	    $results = DB::table('petstore_brands')->where('status_id', 1)->select('id','name')->orderBy('name')->get();
	    
	    if(request()->ajax()){
	        return json_encode($results);
	    }
	    return response()->json([ 'status' => true,'data' => $results], 200);
	    } catch (\Exception $e) {
	        return response()->json([
	            'status' => false,
	            'message' => 'Something went wrong.',
	            'errors' => $e->getMessage(),
	        ], 500);
	    }
	}
	
	public function getBookingStatus()
	{
	    try{
	    $results = DB::table('booking_statuses')->where('status_id', 1)->select('id','name')->orderBy('name')->get();
	    
	    if(request()->ajax()){
	        return json_encode($results);
	    }
	    return response()->json([ 'status' => true,'data' => $results], 200);
	    } catch (\Exception $e) {
	        return response()->json([
	            'status' => false,
	            'message' => 'Something went wrong.',
	            'errors' => $e->getMessage(),
	        ], 500);
	    }
	}
	
	public function gettransactionStatus()
	{
	    try{
	    $results = DB::table('transaction_status')->where('status_id', 1)->select('id','name')->orderBy('name')->get();
	    
	    if(request()->ajax()){
	        return json_encode($results);
	    }
	    return response()->json([ 'status' => true,'data' => $results], 200);
	    } catch (\Exception $e) {
	        return response()->json([
	            'status' => false,
	            'message' => 'Something went wrong.',
	            'errors' => $e->getMessage(),
	        ], 500);
	    }
	}
	
	public function getPetColors($type_id)
	{
	    try{
	    $results = DB::table('pet_colors')->where('pet_type_id',$type_id)->orderBy('color')->get();
	    
	    if(request()->ajax()){
	        return json_encode($results);
	    }
	    return response()->json([ 'status' => true,'data' => $results], 200);
	    } catch (\Exception $e) {
	        return response()->json([
	            'status' => false,
	            'message' => 'Something went wrong.',
	            'errors' => $e->getMessage(),
	        ], 500);
	    }
	}
	
	public function getTrainerService(Request $request)
	{
	    try{
	        
	    $data = $request->all();
	    
	    $search_key = isset($data['search_key']) ? $data['search_key'] : '';
	    
	    $results = DB::table('sub_services')->where('status_id', 1)->where('service_type',2)
	    ->where(function($q) use($search_key) {
	        if(!empty($search_key)) {
	            $q->where('service_name','LIKE', '%'.$search_key.'%');
	        }
	    })->orderBy('service_name')->paginate(config('constants.records-per-page'));
	    
	    $services = [];
	    
	    foreach ($results as $result){
	        
	        $total_bookings = BookingDetails::join('bookings','bookings.booking_id','=','booking_details.booking_id')
	        ->whereIn('bookings.booking_status',[1,2])
	        ->where('booking_details.service_id',$result->id)->count();
	        
	        $services [] = [
	            'id' => $result->id,
	            'service_type' => $result->service_type,
	            'service_name' => $result->service_name,
	            'description' => isset($result->description) ? $result->description : '',
	            'duration' => isset($result->duration) ? $result->duration : '',
	            'image' => isset($result->image) ? url($result->image) : '',
	            'status_id' => isset($result->status_id) ? $result->status_id : '',
	            'total_bookings' => !empty($total_bookings) ? $total_bookings : 0
	        ];
	    }
	    
	    if(request()->ajax()){
	        return json_encode($services);
	    }
	    return response()->json([ 'status' => true,'data' => $services], 200);
	    
	    return response()->json([
	        'status' 		        => true,
	        'data' 			        => $services,
	        'message'               => "Services Info.",
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
	            'errors' => $e->getMessage(),
	        ], 500);
	    }
	}
	
	public function getPaymentPlan()
	{
	    try{
	        $results = DB::table('subscriptions')->get();
	        
	        $payment_plan = [];
	        
	        foreach ($results as $result){
	            
	            $payment_plan[] = [
	                'id' => $result->id,
	                'plan' => $result->plan,
	                'amount' => isset($result->amount) ? $result->amount : 0,
	                'status' => isset($result->status) ? $result->status : '',
	            ];
	        }
	        
	        if(request()->ajax()){
	            return json_encode($payment_plan);
	        }
	        return response()->json([ 'status' => true,'data' => $payment_plan], 200);
	    } catch (\Exception $e) {
	        return response()->json([
	            'status' => false,
	            'message' => 'Something went wrong.',
	            'errors' => $e->getMessage(),
	        ], 500);
	    }
	}
	
	public function getcoutries()
	{
	    try{
	        $results = DB::table('countries')->get();
	        
	        $countries = [];
	        
	        foreach ($results as $result){
	            
	            $countries[] = [
	                'id' => $result->id,
	                'name' => $result->name
	            ];
	        }
	        
	        if(request()->ajax()){
	            return json_encode($countries);
	        }
	        return response()->json([ 'status' => true,'data' => $countries], 200);
	    } catch (\Exception $e) {
	        return response()->json([
	            'status' => false,
	            'message' => 'Something went wrong.',
	            'errors' => $e->getMessage().'-'.$e->getLine(),
	        ], 500);
	    }
	}
	
	public function getStatesByCountry($country_id)
	{
	    try{
	        
	        $results = DB::table('states')->where('country_id', $country_id)
	        ->select('id','name')->orderBy('name')->get();
	        
	        $states = [];
	        
	        foreach ($results as $result){
	            
	            $states[] = [
	                'id' => $result->id,
	                'name' => $result->name
	            ];
	        }
	        
	        if(request()->ajax()){
	            return json_encode($states);
	        }
	        return response()->json([ 'status' => true,'data' => $states], 200);
	    } catch (\Exception $e) {
	        return response()->json([
	            'status' => false,
	            'message' => 'Something went wrong.',
	            'errors' => $e->getMessage().'-'.$e->getLine(),
	        ], 500);
	    }
	}
	
	public function getbokingsCancelReasons()
	{
	    try{
	        
	        $results = DB::table('booking_cancel_resons')->where('status_id',1)->orderBy('reason_name')->get();
	        
	        $reasons = [];
	        
	        foreach ($results as $result){
	            
	            $reasons[] = [
	                'id'        => $result->id,
	                'name'      => $result->reason_name,
	                'status_id' => $result->status_id
	            ];
	        }
	        
	        if(request()->ajax()){
	            return json_encode($reasons);
	        }
	        return response()->json([ 'status' => true,'data' => $reasons], 200);
	    } catch (\Exception $e) {
	        return response()->json([
	            'status' => false,
	            'message' => 'Something went wrong.',
	            'errors' => $e->getMessage().'-'.$e->getLine(),
	        ], 500);
	    }
	}
	
	public function getPetBehaviors()
	{
	    try{
	        
	        $results = DB::table('pets_behaviors')->where('status_id',1)->orderBy('name')->get();
	        
	        $behaviors = [];
	        
	        foreach ($results as $result){
	            
	            $behaviors[] = [
	                'id'        => $result->id,
	                'name'      => $result->name,
	                'status_id' => $result->status_id
	            ];
	        }
	        
	        if(request()->ajax()){
	            return json_encode($behaviors);
	        }
	        return response()->json([ 'status' => true,'data' => $behaviors], 200);
	    } catch (\Exception $e) {
	        return response()->json([
	            'status' => false,
	            'message' => 'Something went wrong.',
	            'errors' => $e->getMessage().'-'.$e->getLine(),
	        ], 500);
	    }
	}
    
}
