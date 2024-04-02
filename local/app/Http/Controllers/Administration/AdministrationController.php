<?php

namespace App\Http\Controllers\Administration;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;
use Auth;

class AdministrationController extends Controller
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
        $groupcustomers = \App\Customers::join('users','slj_customers.user_id', '=', 'users.id')
        ->select(DB::raw('count(*) as count'),'slj_customers.current_status as status')
        ->groupBy('slj_customers.current_status')
        ->get();
		
		$groupcomplaints = \App\Complaints::select(DB::raw('count(*) as count'),'status')
        ->groupBy('status')
        ->get();

              $user =Auth::user();
              $id = \Auth::user()->id;
              $roles = $user->getRoleNames();
             // if($roles[0]=='superadmin')
             
        $cities = \App\City::where('status','Y')->count();
        $distributors = \App\Distributors::join('users','slj_distributors.user_id', '=', 'users.id')->where('users.status','Y')->count();
        $franchises = \App\Franchises::count();
        $branches = \App\Branches::count();
             
            
                //  $user_id = Auth::user()->id;
                //   $cities = \App\City::join('slj_employees1','slj_cities.id', '=', 'slj_employees1.city')->join('users','slj_employees1.user_id', '=', 'users.id')->count();
                // $distributors = \App\Distributors::join('users','slj_distributors.user_id', '=', 'users.id')->where('users.status','Y')->count();
                // $franchises = \App\Franchises::join('slj_employees2','slj_franchises.id', '=', 'slj_employees2.franch')->count();
                // $branches = \App\Branches::join('slj_employees1','slj_branches.id', '=', 'slj_employees1.branch')->count();
           
              
		 return view('administration.dashboard',compact('groupcomplaints','groupcustomers','cities','distributors','franchises','branches'));
       // return view('administration::dashboard',['groupcomplaints'=>$groupcomplaints,'groupcustomers'=>$groupcustomers,'cities'=>$cities,'distributors'=>$distributors,'franchises'=>$franchises,'branches'=>$branches]);
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function feasabilityCheck()
    {
        return view('administration.feasability-check');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function feasabilityCheckSubmit(Request $request)
    {
        $validatedData = $request->validate([
			'loc_latitude' => 'required',
			'loc_longitude' => 'required'
		]);
		
		$input = request()->all();

        //Post Values
        $latitude = $input['loc_latitude'];
        $longitude = $input['loc_longitude'];

        // Calculate distance and filter records by radius 
        $sql_distance = $having = ''; 
        if(!empty($latitude) && !empty($longitude)){ 
            //$radius_km = $distance_km; 
            $sql_distance = " ,(((acos(sin((".$latitude."*pi()/180)) * sin((`p`.`latitude`*pi()/180))+cos((".$latitude."*pi()/180)) * cos((`p`.`latitude`*pi()/180)) * cos(((".$longitude."-`p`.`longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance "; 
            //$having = " HAVING (distance <= $radius_km) "; 
            
            $order_by = ' distance ASC '; 
        }else{
            $order_by = ' p.id DESC '; 
        }
        
        // Fetch places from the database 
        $fh_results = DB::select("SELECT p.*".$sql_distance." FROM slj_fh p $having ORDER BY $order_by limit 20");
        
        $dp_results = DB::select("SELECT p.*".$sql_distance." FROM slj_dp p $having ORDER BY $order_by limit 20");
        

        return view('administration.feasability-check',['fh_results'=>$fh_results,'dp_results'=>$dp_results]);
    }
}
