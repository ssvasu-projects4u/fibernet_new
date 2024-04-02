<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;
use Artisan;
use Illuminate\Support\Facades\Input;

class DistributorCustomersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_distributors','slj_customers.distributor', '=', 'slj_distributors.id')
				->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_distributors.user_id', '=', \Auth::user()->id)
				->orderBy('slj_customers.id')
                ->paginate(20);
        return view('frontend.distributor.customers.index',['data'=>$data]);
    }

    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function newCustomers()
    {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
				->leftJoin('slj_distributors','slj_customers.distributor', '=', 'slj_distributors.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status','new')
				->where('slj_distributors.user_id', '=', \Auth::user()->id)
                ->orderBy('slj_customers.id')
                ->paginate(20);
				
				
			//print_r($data);
		
        //return view('customers::new',['data'=>$data,'cities'=>$cities]);
		
		return view('frontend.distributor.customers.new', [
			'data' => $data->appends(Input::except('page')),
		]);
		
		
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function technicalCustomers()
    {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_distributors','slj_customers.distributor', '=', 'slj_distributors.id')
				->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status','=','technical')
				->where('slj_distributors.user_id', '=', \Auth::user()->id)
				->orderBy('slj_customers.id')
                ->paginate(15);

        return view('frontend.distributor.customers.technical',['data'=>$data]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function activationCustomers()
    {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_distributors','slj_customers.distributor', '=', 'slj_distributors.id')
				->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status','=','activation')
				->where('slj_distributors.user_id', '=', \Auth::user()->id)
                ->orderBy('slj_customers.id')
                ->paginate(20);
        return view('frontend.distributor.customers.activation',['data'=>$data]);
    }
	
	
	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function activeCustomers()
    {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_distributors','slj_customers.distributor', '=', 'slj_distributors.id')
				->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->whereIn('slj_customers.current_status',['active','activated'])
				->where('slj_distributors.user_id', '=', \Auth::user()->id)
                ->orderBy('slj_customers.id')
                ->paginate(20);
        return view('frontend.distributor.customers.active',['data'=>$data]);
    }
	
	
	
	
	
	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function scheduleCustomers()
    {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_distributors','slj_customers.distributor', '=', 'slj_distributors.id')
				->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status','=','scheduled')
				->where('slj_distributors.user_id', '=', \Auth::user()->id)
                ->orderBy('slj_customers.id')
                ->paginate(20);
        return view('frontend.distributor.customers.schedule',['data'=>$data]);
    }
	
	
	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function expiredCustomers()
    {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_distributors','slj_customers.distributor', '=', 'slj_distributors.id')
				->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.current_status','=','expired')
				->where('slj_distributors.user_id', '=', \Auth::user()->id)
				->orderBy('slj_customers.id')
                ->paginate(20);
        return view('frontend.distributor.customers.expired',['data'=>$data]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function closedCustomers()
    {
        $data = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
                ->leftJoin('slj_distributors','slj_customers.distributor', '=', 'slj_distributors.id')
				->leftJoin('slj_franchises','slj_customers.franchise', '=', 'slj_franchises.id')
                ->leftJoin('slj_branches','slj_branches.id', '=', 'slj_customers.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_customers.city')
                ->select('slj_customers.*','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name','users.mobile','users.email','users.name')
                ->where('slj_customers.status','=','closed')
				->where('slj_distributors.user_id', '=', \Auth::user()->id)
                ->orderBy('slj_customers.id')
                ->paginate(20);
        return view('frontend.distributor.customers.closed',['data'=>$data]);
    }
}
