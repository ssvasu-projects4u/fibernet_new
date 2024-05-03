<?php

namespace App\Http\Controllers\Technical;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class DPDController extends Controller
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
        //check user permission for this page
        $user = Auth::user();
        $permissions = $user->getPermissionsViaRoles();

        $permissionsdata = array();
        foreach($permissions as $permission){
            $permissionsdata[] =  $permission->name;   
        }
        if(count($permissionsdata) == 0 || !in_array('dpd',$permissionsdata)){
            abort(403, "Unauthorized action. Access Denied You don't have permission to access.");
        }
        $id = \Auth::user()->id;
        $roles = $user->getRoleNames(); 
        if($roles[0]=='branch'){
            $tbl='slj_branches.user_id'; 
            $operator='=';
        }
        elseif($roles[0]=='franchise'){
            $tbl='slj_franchises.user_id';
            $operator='=';
        }
        else{
            $tbl='slj_dpd.id';
            $id=0;
            $operator='!=';
            //$operator='=';
        }
        if($roles[0]=='superadmin')
        {
        $data = \App\DPD::leftjoin('slj_franchises','slj_dpd.franchise', '=', 'slj_franchises.id')
				->leftjoin('slj_fiber_laying','slj_fiber_laying.id', '=', 'slj_dpd.fiber')
				->leftjoin('slj_distributors','slj_distributors.id', '=', 'slj_dpd.distributor')
				->leftjoin('slj_subdistributors','slj_subdistributors.id', '=', 'slj_dpd.subdistributor')
				->leftjoin('slj_branches','slj_branches.id', '=', 'slj_dpd.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_dpd.city')
				->select('slj_dpd.*','slj_distributors.distributor_name','slj_subdistributors.subdistributor_name','slj_fiber_laying.fiber_name','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name')
				->where($tbl, $operator, $id)->orderBy('slj_dpd.id')
				->paginate(20);
        }
        else
        {  
            $tabledata=\App\Employees::select('branch')->where('user_id','=',\Auth::user()->id)->get();
            $branchesgroup = array();

            
           $data = \App\DPD::leftjoin('slj_fiber_laying','slj_fiber_laying.id', '=', 'slj_dpd.fiber')
				->leftjoin('slj_distributors','slj_distributors.id', '=', 'slj_dpd.distributor')
				->leftjoin('slj_subdistributors','slj_subdistributors.id', '=', 'slj_dpd.subdistributor')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_dpd.city')
				->select('slj_dpd.*','slj_distributors.distributor_name','slj_subdistributors.subdistributor_name','slj_fiber_laying.fiber_name','slj_cities.name as city_name')
				->where('slj_dpd.city','=','slj_cities.id')->orderBy('slj_dpd.id')
				->paginate(20);
            
            
        }
        		$employeedata=array();
	  $id = \Auth::user()->id;
       
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="List DPD";
     \App\Employees_Logs::create($employeedata);
       	
		
		//echo "<pre>"; print_r($data); exit;
		
		return view('technical.dpd.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
     public function GetEnclosure()
     {
                $html='';
        $no="GENERAL ENCLOSER";
        $j="available";
        $kk=1;
        $getdata=\App\StockProducts::where('identification',$no)->where('employee_status',$j)->where('assign_status',$kk)->get();
        
         $html = "<option value=''>-- Select Enclosure --</option>";
         
          foreach($getdata as $geten)
			{
			     //$html = "<option value=''>-- Select Enclosure --</option>";
			     $html.="<option value='".$geten->serial_no."'>".$geten->serial_no."</option>";
	        }
      
         return $html;
     }
    public function create()
    {
        //check user permission for this page
        $user = Auth::user();
        $permissions = $user->getPermissionsViaRoles();

        $permissionsdata = array();
        foreach($permissions as $permission){
            $permissionsdata[] =  $permission->name;   
        }
        if(count($permissionsdata) == 0 || !in_array('dpd',$permissionsdata)){
            abort(403, "Unauthorized action. Access Denied You don't have permission to access.");
        }
        $id = \Auth::user()->id;
        $roles = $user->getRoleNames(); 
        
        $cities = \App\City::where('status','Y')->pluck('name', 'id');
	    $franchise_list=array();
	    $franchise_id = null;
        if($roles[0]=='branch'){
            $tbl='slj_branches.user_id'; 
            $column='slj_branches.id';
            $ids = \App\Branches::join('users','users.id', '=', $tbl)->where('users.id',$id)->pluck($column, $column);
        
            $franchise_list = \App\Franchises::whereIn('branch',$ids)->pluck('franchise_name', 'id');
        }
        if($roles[0]=='franchise'){
                    $franchise_id = \App\Franchises::where('user_id',$id)->pluck('id');
         }
	    return view('technical.dpd.create',['cities'=>$cities,'franchise'=>$franchise_list, 'branch_id'=>$id, 'franchise_id'=>$franchise_id]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $roles = $user->getRoleNames(); 
        $id = \Auth::user()->id;
        $input = request()->all();
        $validation_list=array('city' => 'required',
			'distributor' => 'required',
                        'branch' => 'required',
			'franchise' => 'required',
			'fiber' => 'required',
			'long_lat' => 'required'
		);
        if($roles[0]=='branch'){
            $validation_list=array('franchise' => 'required',
			'fiber' => 'required',
			'long_lat' => 'required'
		);
            $branch = \App\Branches::where('user_id',$id)->select('id','city','distributor_id')->first();
            $input['city']=$branch->city;
            $input['distributor']=$branch->distributor_id;
			 $input['subdistributor']=$branch->subdistributor_id;
            $input['branch']=$branch->id;
        }
        if($roles[0]=='franchise'){
            $validation_list=array(
			'fiber' => 'required',
			'long_lat' => 'required'
		);
            $franchise = \App\Franchises::where('user_id',$id)->select('id','city','distributor_id','branch')->first();
            $input['city']=$franchise->city;
            $input['distributor']=$franchise->distributor_id;
			 $input['subdistributor']=$franchise->subdistributor_id;
            $input['branch']=$franchise->branch;
            $input['franchise']=$franchise->id;
        }
        $validatedData = $request->validate($validation_list);
            $input['user_id']=$id;
            $requestdata = $request->all(); 
    
            
            $input['Enclosure']=$requestdata['Enclosure'];
            
		\App\DPD::create($input);
		
		$datad=\App\StockProducts::where('serial_no',$input['Enclosure'])->where('assign_status',1)->first();
		
		 $stock_product = \App\StockProducts::find($datad->id);
		 $datar=array();
		 $datar['assign_status']=0;
		 $stock_product->update($datar);
		
	
    
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Create DPD";
     $employeedata['value_of_action']=$input['fiber'];
     
      \App\Employees_Logs::create($employeedata);
	

        return redirect('admin/dpd')->with('success', 'DPD created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('technical.dpd.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //check user permission for this page
        $user = Auth::user();
        $permissions = $user->getPermissionsViaRoles();

        $permissionsdata = array();
        foreach($permissions as $permission){
            $permissionsdata[] =  $permission->name;   
        }
        if(count($permissionsdata) == 0 || !in_array('dpd',$permissionsdata)){
            abort(403, "Unauthorized action. Access Denied You don't have permission to access.");
        }
        

		$dpddetails = \App\DPD::find($id);
        $cities = \App\City::where('status','Y')->pluck('name', 'id');
		$items = \App\Franchises::where('branch',$dpddetails->branch)->pluck('franchise_name as name', 'id');
		$branches = \App\Branches::where('city',$dpddetails->city)->pluck('branch_name as name', 'id');
		
		$distributors = \App\Distributors::join('users','users.id', '=', 'slj_distributors.user_id')->where('city',$dpddetails->city)->where('users.status','Y')
       ->pluck('distributor_name as name', 'slj_distributors.id as id');
	 
    	 $subdistributors = \App\SubDistributors::join('users','users.id', '=', 'slj_subdistributors.user_id')->where('city',$dpddetails->city)->where('users.status','Y')
       ->pluck('subdistributor_name as name', 'slj_subdistributors.id as id');
	   
	   $franchisefibers = \App\FiberLaying::where('franchise',$dpddetails->franchise)->where('fiber_to','dpd')->pluck('fiber_name as name','id');
	   
		
		return view('technical.dpd.edit',['cities'=>$cities,'distributors'=>$distributors,'subdistributors'=>$subdistributors,'branches'=>$branches,'items'=>$items, 'dpddetails'=>$dpddetails, 'franchisefibers'=>$franchisefibers]); 
		
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
       $user = Auth::user();
        $roles = $user->getRoleNames();
        $validation_list=array('city' => 'required',
			'distributor' => 'required',
			'subdistributor' => 'required',
             'branch' => 'required',
			'franchise' => 'required',
			'fiber' => 'required',
			'long_lat' => 'required'
		);
        if($roles[0]=='branch'){
            $validation_list=array('franchise' => 'required',
			'fiber' => 'required',
			'long_lat' => 'required'
		);
        }
        if($roles[0]=='franchise'){
            $validation_list=array(
			'fiber' => 'required',
			'long_lat' => 'required'
		);
        }
        $validatedData = $request->validate($validation_list);

		
		$requestdata = $request->all(); 

		
                if(!empty($requestdata['city'])){
		$data['city'] = $requestdata['city'];
                }
                if(!empty($requestdata['distributor'])){
		$data['distributor'] = $requestdata['distributor'];
                }
				  if(!empty($requestdata['subdistributor'])){
		$data['subdistributor'] = $requestdata['subdistributor'];
                }
                if(!empty($requestdata['branch'])){
		$data['branch'] = $requestdata['branch'];
                }
                if(!empty($requestdata['franchise'])){
		$data['franchise'] = $requestdata['franchise'];
                }
		$data['fiber'] = $requestdata['fiber'];
		$data['long_lat'] = $requestdata['long_lat'];
		
		//Update details
		$dpd = \App\DPD::find($id);
		$dpd->update($data);
		
		return redirect('admin/dpd')->with('success', 'DPD details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
   public function destroy1(Request $request,$id)
    {
        //$customers = \App\Customers::where('dpd',$id)->count();
         $roles = Auth::user()->getRoleNames();
        
        //$roleName = 'user';
        //foreach($roles as $role){
          // $roleName = $role;
        //}
        
        //Update Last Login Details
        $userid = Auth::user()->id; 
        $userdetails = \App\User::find($userid);
        $data['last_login'] = date("Y-m-d H:i:s");
        $userdetails->update($data);
			$role = $roles[0];
		//Role Name
		$email=$request->email;
    $password=$request->password;
		if($request->usertype == 'superadmin' || $request->usertype == 'common')
	       {
	           if(Auth::attempt(['email'=>$email,'password'=>$password]))
                {
	               Session()->forget('deletedata');
	                \App\DPD::destroy($id);
	                return redirect('admin/dpd')->with('success', 'DPD details deleted successfully.');
	               
	           }
	            else
	            {
	            return redirect('admin/dpd')->with('InvalidLogin', 'Invalid Login Credentials..');
	            }
	       }
	      
       
				
					
			
        }
        
   
                
     
           

    public function destroy($id)
    {
        //$customers = \App\Customers::where('dpd',$id)->count();
        if($id > 0){
           // Session::flush('status', 'success');// added by durga
           
         return redirect('admin/dpd')->with('deletedata', 'DPD details deleted successfully.');
         //  \App\DPD::destroy($id);
                 
           //  return redirect('admin/dpd')->with('success', 'DPD details deleted successfully.');
        }else{
            return redirect('admin/dpd')->with('error', 'DPD details cannot be deleted because of dependency');
        }
    }


}
