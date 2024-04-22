<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SubDistributorsController extends Controller
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
         $user = \Auth::user();
      $roles = $user->getRoleNames();
         if($roles[0]=='superadmin')
      {
                $data = \App\SubDistributors::join('users','users.id', '=', 'slj_subdistributors.user_id')
                ->leftJoin('slj_cities','slj_subdistributors.city', '=', 'slj_cities.id')
                ->select('slj_subdistributors.*','slj_cities.name as city_name','users.mobile','users.email','users.status')
                ->orderBy('subdistributor_name')
                ->paginate(20);
                
        $employeedata=array();
	    $id = \Auth::user()->id;
      
       $employeedata['employee_id']=$id;
       $employeedata['action_name']="Distributor List";
       \App\Employees_Logs::create($employeedata);
	
  
   
      }
      else
      {
            $userid=\Auth::user()->id;
          $data = \App\Employees::join('users','users.id', '=', 'slj_employees.user_id')
                            ->join('slj_cities','slj_employees.city', '=', 'slj_cities.id')
                            
            	               ->select('slj_employees.*','users.mobile','users.status','users.email','slj_cities.name as cityname','slj_cities.id as cityid')
            	           	->where('slj_employees.user_id', '=', \Auth::user()->id)
            	         
				            ->paginate(10);
        
         $employeedata=array();
	    $id = \Auth::user()->id;
      
       $employeedata['employee_id']=$id;
       $employeedata['action_name']="Sub Distributor List";
       \App\Employees_Logs::create($employeedata);            
           
      }
		return view('administration.subdistributors.index',['data'=>$data]);
      
    }
    public function StoreUtilitiesTrash(Request $request)
    {
        	$input = request()->all();
        	$data=array();
        	$id=$input['itemname'];
        	$data['kk']=$input['distid'];
        	
     
     $user = \App\StoreItems::destroy($id);
     $ItemsNames = \App\StoreItems::where('distributor',$id)->pluck('itemname', 'id');
        return redirect('admin/distributors/trash/'.$data['kk'])->with('success', 'Utility was Removed successfully.');
    	
 
        
    }
    public function StoreUtilityMoving(Request $request)
    {
        		$input = request()->all();

        $data = array();
        $move_to=$input['move_to'];
        $office=$input['Offices'];
        $id=$input['itemname'];
        $idvalue=$input['distid'];
        $user = \App\StoreItems::find($id);
 
         $data = array();
         if($move_to=="distributor")
         {
             $data['distributor']=$office;
             $data['branch']=null;
            $user->update($data);   
         }
          if($move_to=="branch")
         {
            $data['distributor']=null;
            $data['branch']=$office;
            $user->update($data);   
         }
       
       
        
        return redirect('admin/distributors/moving/'.$idvalue)->with('success', 'Utility was Moved successfully.');;
    	
        
        
    }
    public function StoreUtilitySale(Request $request)
    {
        
        	$input = request()->all();
        	   $id=$input['itemname'];
     
 $itemname = \App\StoreItems::select('slj_stock_items.*')->where('id',$id)->first();
 
    
       
        $data = array();
         $data['itemname']=$itemname->itemname;
          if(!empty($itemname->distributor))
       
        $data['distributor']=$itemname->distributor;
        if(!empty($itemname->branch))
            $data['branch']=$itemname->branch;
       
        $data['brand']=$input['brand'];
        $data['modelno']=$input['modelno'];
        $data['serialno']=$input['serial_no'];
        $data['customer_name']=$input['Sale_Customer'];
        $data['price']=$input['price'];
        $idv=$data['distributor'];
     //$Distributor = \App\Distributors::where('id',$id)->first();
      //  $data = \App\StoreItems::select('slj_stock_items.*')->where('distributor',$id)->get();
        //  $cname = \App\City::where('id',1)->pluck('name', 'id');;
       \App\StoreItemsSales::create($data);
          $user = \App\StoreItems::destroy($id);

	//	$disid=$Distributor->id;
                return redirect('admin/distributors/sale/'.$idv)->with('success', 'Utility was Sold successfully.');
      
   
    }
    public function UtilitySale($id)
    {
        $ItemsNames = \App\StoreItems::where('distributor',$id)->pluck('itemname', 'id');
        $data = \App\StoreItems::select('slj_stock_items.*')->where('distributor',$id)->get();
        $citi=\App\StoreItems::select('slj_stock_items.*')->where('city',$id)->first();
        $cname = \App\City::where('id',1)->pluck('name', 'id');
        return view('administration.distributors.dist-utilities-sale',['ItemsNames'=>$ItemsNames,'id'=>$id,'cname'=>$cname,'data'=>$data]);
    
    	
        
    }
    public function GetDistID($item)
    {
        $brandname = \App\StoreItems::where('id',$item)->first();
        
        return $brandname->distributor;
        
    }
    public function GetItems($item)
    {
        
        $brandname = \App\StoreItems::where('id',$item)->first();
        
        return $brandname->brand;
        
    }
    public function GetModelNum($item)
    {
        $brandname = \App\StoreItems::where('id',$item)->first();
        
        return $brandname->modelno;
    
    }
    public function GetBranchOffices($office,$branch)
    
    {
        
        $area=$office;
        $branchidvalue=$branch;
        $html="";
        if($office=="distributor")
        {
            $citybranches=array();
            $citybranches = \App\Distributors::select('id','distributor_name')->get();
            $html .= "<option value=''>-- Select Distributor --</option>";
        foreach($citybranches as $branch){
			$html .="<option value='".$branch->id."'>".$branch->distributor_name."</option>";
        }

      
        }
        if($office=="branch")
        {
            $citybranches=array();
            $citybranches = \App\Branches::select('id','branch_name')->where('id','!=',$branchidvalue)->get();
            $html .= "<option value=''>-- Select branch --</option>";
        foreach($citybranches as $branch){
			$html .="<option value='".$branch->id."'>".$branch->branch_name."</option>";
        }

      
        }
        
        
        return $html;
        
    }
    public function GetOffices($office,$distid)
    {
        $area=$office;
        $html="";
        if($office=="distributor")
        {
            $citybranches=array();
            $citybranches = \App\Distributors::select('id','distributor_name')->where('id','!=',$distid)->get();
            $html .= "<option value=''>-- Select Distributor --</option>";
        foreach($citybranches as $branch){
			$html .="<option value='".$branch->id."'>".$branch->distributor_name."</option>";
        }

      
        }
        if($office=="branch")
        {
            $citybranches=array();
            $citybranches = \App\Branches::select('id','branch_name')->get();
            $html .= "<option value=''>-- Select branch --</option>";
        foreach($citybranches as $branch){
			$html .="<option value='".$branch->id."'>".$branch->branch_name."</option>";
        }

      
        }
        
        
        return $html;
            
    }
    public function GetBuyPrice($item)
    {
        $brandname = \App\StoreItems::where('id',$item)->first();
        
        return $brandname->buyingprice;
    
    }
    public function GetSerialNum($item)
    {
        $brandname = \App\StoreItems::where('id',$item)->first();
        
        return $brandname->serial_no;
    
    }
    public function UtilityMoving($id)
    {
    $ItemsNames = \App\StoreItems::where('distributor',$id)->pluck('itemname', 'id');
        $data = \App\StoreItems::select('slj_stock_items.*')->where('distributor',$id)->get();
        $citi=\App\StoreItems::select('slj_stock_items.*')->where('city',$id)->first();
        $cname = \App\City::where('id',1)->pluck('name', 'id');;
            return view('administration.distributors.dist-utilities-moving',['ItemsNames'=>$ItemsNames,'id'=>$id,'cname'=>$cname,'data'=>$data]);
    	
        
    }
    public function UtilityTrash($id)
    {
       $ItemsNames = \App\StoreItems::where('distributor',$id)->pluck('itemname', 'id');
        $data = \App\StoreItems::select('slj_stock_items.*')->where('distributor',$id)->get();
        $citi=\App\StoreItems::select('slj_stock_items.*')->where('city',$id)->first();
        $cname = \App\City::where('id',1)->pluck('name', 'id');;
        	return view('administration.distributors.dist-utilities-trash',['ItemsNames'=>$ItemsNames,'id'=>$id,'cname'=>$cname,'data'=>$data]);
    		
        
    }
	public function distutilitieslist($id)
    {
        $userid=\Auth::user()->id; 
        $ItemsNames=array();
        	if(isset($_GET['cateogry'])){
			$ItemsNames = \App\StoreItems::where('category_name',$_GET['cateogry'])->pluck('itemname', 'itemname');
			$data = \App\StoreItems::select('slj_stock_items.*')->where('itemname',$_GET['cateogry'])->paginate(10);
        
		}
			if(isset($_GET['ItemName'])){
			$ItemsNames = \App\StoreItems::where('itemname',$_GET['ItemName'])->where('category_name',$_GET['cateogry'])->pluck('itemname', 'itemname');
			$data = \App\StoreItems::select('slj_stock_items.*')->where('itemname',$_GET['ItemName'])->paginate(10);
        
		}
		if(!isset($_GET['cateogry']))
		$data = \App\StoreItems::select('slj_stock_items.*')->where('distributor',$id)->paginate(10);
          
	
        $categories = \App\StoreItems::pluck('category_name', 'category_name');
		
            	           	
				             // added by durga
      
		return view('administration.distributors.dist-utilities-list',['data'=>$data,'categories'=>$categories,'ItemsNames'=>$ItemsNames,'id'=>$id]);
     
    }
	/**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
		$items = \App\City::where('status','Y')->pluck('name', 'id');
		
		return view('administration.subdistributors.create',['items'=>$items]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
			'name' => 'required',
            'subdistributor_name' => 'required',
			'city' => 'required',
			'office_address' => 'required',
			//'long_lat' => 'required',
			//'rent' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:8',
            'mobile' => 'required'
		]);
		
		$input = request()->all();

        //Create Distributor User
        $user = array();
        $user['name'] = $input['name'];
        $user['first_name'] = $input['name'];
        $user['password'] = Hash::make($input['password']);
        $user['email'] = $input['email'];
        $user['mobile'] = $input['mobile'];
        $user['status'] = "Y";
        $userdata = \App\User::create($user);

        //$userdata = \App\User::where('email',$input['email'])->first();
        //echo "<pre>";print_r($userdata->id); exit;

        //Assign Role
        $userdata->assignRole('subdistributor');
        
        $employeedata=array();
	    $id = \Auth::user()->id;
      
       $employeedata['employee_id']=$id;
       $employeedata['action_name']=$input['name']."SubDistributor Was Created";
       \App\Employees_Logs::create($employeedata);
	

        //Generate Franchise Id
        $data = \App\SubDistributors::select('distributor_id')->orderBy('distributor_id','desc')->first();
        $distributorid = "00000";

        //print_r($data); exit;    

        if(isset($data->distributor_id)){
            $distributorid = substr($data->distributor_id, -5); 
        }
        $distributorid = "SLJDR".str_pad($distributorid + 1, 5, 0, STR_PAD_LEFT);   
        $input['subdistributor_id'] = $distributorid;
        $input['user_id'] = $userdata->id;

        //echo "<pre>"; printf($input); exit;
        \App\SubDistributors::create($input);

        return redirect('admin/subdistributors')->with('success', 'Sub Distributor created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('administration.subdistributors.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $subdistributordetails = \App\SubDistributors::join('users','users.id', '=', 'slj_subdistributors.user_id')->where('slj_subdistributors.id',$id)->select('slj_subdistributors.*','users.name','users.mobile','users.email')->first();
		$items = \App\City::where('status','Y')->pluck('name', 'id');
		
		return view('administration.subdistributors.edit',['items'=>$items, 'subdistributordetails'=>$subdistributordetails]); 
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $distributor = \App\Distributors::find($id);
        $userid = $distributor->user_id;

        $validatedData = $request->validate([
			'name' => 'required',
            'subdistributor_name' => 'required',
            'city' => 'required',
            'office_address' => 'required',
            //'long_lat' => 'required',
            //'rent' => 'required',
            'email' => 'required|unique:users,email,'.$userid,
            'mobile' => 'required'
		]);
		
		$requestdata = $request->all(); 

        $data = array();
		$data['subdistributor_name'] = $requestdata['subdistributor_name'];
		$data['city'] = $requestdata['city'];
		$data['office_address'] = $requestdata['office_address'];
		$data['long_lat'] = $requestdata['long_lat'];
		$data['rent'] = $requestdata['rent'];
		$data['area_description'] = $requestdata['area_description'];

        $data['bank_holder_name'] = $requestdata['bank_holder_name'];
        $data['bank_account'] = $requestdata['bank_account'];
        $data['ifsc_code'] = $requestdata['ifsc_code'];
        $data['bank_branch_name'] = $requestdata['bank_branch_name'];
        $data['bank_name'] = $requestdata['bank_name'];
        
		//Update details
		$distributor->update($data);

        $user = \App\User::find($userid);

        $data = array();
        $data['name'] = $requestdata['name'];
        $data['first_name'] = $requestdata['name'];
        $data['email'] = $requestdata['email'];
        $data['mobile'] = $requestdata['mobile'];
        $user->update($data);

        $employeedata=array();
	    $id = \Auth::user()->id;
      
       $employeedata['employee_id']=$id;
       $employeedata['action_name']=$requestdata['name']."Sub Distributor Was Updated";
       \App\Employees_Logs::create($employeedata);
	
		
		return redirect('admin/subdistributors')->with('success', 'Sub Distributor details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $branches = \App\Branches::where('subdistributor_id',$id)->count();
        
        if($id > 0 && $branches == 0){
            $subdistributor = \App\SubDistributors::find($id);
            \App\SubDistributors::destroy($id);
            if($subdistributor->user_id > 0){
                $user = \App\User::find($subdistributor->user_id);
                \App\User::destroy($subdistributor->user_id); //remove user
                
                if(!empty($user->roles->first()) && count($user->roles->first())>0){
                    $user->removeRole($user->roles->first()); //remove role from user
                }
                
                if(!empty($user->permissions) && count($user->permissions)>0){
                    $user->revokePermissionTo($user->permissions); //remove permissions from user
                }
            }

            return redirect('admin/subdistributors')->with('success', 'SubDistributor deleted successfully.');
        }else{
            return redirect('admin/subdistributors')->with('error', 'SubDistributor cannot be deleted because of dependency');
        }
    }

}
