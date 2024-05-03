<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class BranchesController extends Controller
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
        $data = \App\Branches::join('users','slj_branches.user_id', '=', 'users.id')
            ->leftJoin('slj_cities','slj_branches.city', '=', 'slj_cities.id')
            ->leftJoin('slj_distributors','slj_distributors.id', '=', 'slj_branches.distributor_id')
			->leftJoin('slj_subdistributors','slj_subdistributors.id', '=', 'slj_branches.subdistributor_id')
            ->select('slj_branches.*','slj_cities.name as city_name','slj_distributors.distributor_name','slj_subdistributors.subdistributor_name','users.name','users.mobile','users.status')->orderBy('branch_name')->paginate(20);
      }
      else
      {
           $userid=\Auth::user()->id;
          $data = \App\Employees::join('users','users.id', '=', 'slj_employees.user_id')
                            ->join('slj_cities','slj_employees.city', '=', 'slj_cities.id')
                            
            	               ->select('slj_employees.*','users.mobile','users.status','slj_cities.name as cityname','slj_cities.id as cityid')
            	           	->where('slj_employees.user_id', '=', \Auth::user()->id)
            	         
				            ->paginate(10);
      }
        //echo "<pre>"; print_r($data); exit;    

		return view('administration.branches.index',['data'=>$data]);
    }
	
	/**
     * Show the form for creating a new resource.
     * @return Response
     */
     
    public function GetTransactionid($branchid,$optionValue)
    {
        /*
        $user=\App\Branches::where('id','=',$branchid)->first();
        $transactions=\App\Transactions::orderBy('id','desc')->first();
        $k=$transactions->manual_transid;
        if(empty($k))
        $k=10001;
        else
        $k=$k+1;
         return $k;
         */
    }
    public function create()
    {
        $items = \App\City::where('status','Y')->pluck('name', 'id');
		//$subdistributor = \App\SubDistributors::where('status','Y')->pluck('subdistributor_name', 'id');
		
		return view('administration.branches.create',['items'=>$items]);
    }

public function branchutilitieslist($id)
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
		$data = \App\StoreItems::select('slj_stock_items.*')->where('branch',$id)->paginate(10);
          
	    $br=\App\Branches::where('id',$id)->first();
        $categories = \App\StoreItems::pluck('category_name', 'category_name');
		
            	           	
				             // added by durga
      
		return view('administration.branches.branch-utilities-list',['data'=>$data,'categories'=>$categories,'ItemsNames'=>$ItemsNames,'id'=>$id,'br'=>$br]);
     
    }
       public function BranchUtilityTrash($id)
     {
          $ItemsNames = \App\StoreItems::where('branch',$id)->pluck('itemname', 'id');
        $data = \App\StoreItems::select('slj_stock_items.*')->where('branch',$id)->get();
        $citi=\App\StoreItems::select('slj_stock_items.*')->where('city',$id)->first();
        $cname = \App\City::where('id',1)->pluck('name', 'id');;
        	return view('administration.branches.branch-utilities-trash',['ItemsNames'=>$ItemsNames,'id'=>$id,'cname'=>$cname,'data'=>$data]);
    
     }
     public function StoreBranchUtilitiesTrash(Request $request)
     {
         	$input = request()->all();
        	$data=array();
        	$id=$input['itemname'];
        	$data['kk']=$input['branchid'];
        	
     
     $user = \App\StoreItems::destroy($id);
     $ItemsNames = \App\StoreItems::where('branch',$id)->pluck('itemname', 'id');
        return redirect('admin/branches/branch-trash/'.$data['kk'])->with('success', 'Utility was Removed successfully.');
    	
 
     }
  public function StoreBranchUtilitySale(Request $request)
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
        $idv=$data['branch'];
     //$Distributor = \App\Distributors::where('id',$id)->first();
      //  $data = \App\StoreItems::select('slj_stock_items.*')->where('distributor',$id)->get();
        //  $cname = \App\City::where('id',1)->pluck('name', 'id');;
       \App\StoreItemsSales::create($data);
          $user = \App\StoreItems::destroy($id);

	//	$disid=$Distributor->id;
                return redirect('admin/branches/branch-sale/'.$idv)->with('success', 'Utility was Sold successfully.');
      
   
    }
     public function BranchUtilitySale($id)
    {
        $ItemsNames = \App\StoreItems::where('branch',$id)->pluck('itemname', 'id');
        $data = \App\StoreItems::select('slj_stock_items.*')->where('branch',$id)->get();
        $citi=\App\StoreItems::select('slj_stock_items.*')->where('city',$id)->first();
        $cname = \App\City::where('id',1)->pluck('name', 'id');
        return view('administration.branches.branch-utilities-sale',['ItemsNames'=>$ItemsNames,'id'=>$id,'cname'=>$cname,'data'=>$data]);
    
    	
        
    }
      public function UtilityBranchMoving($id)
    {
    $ItemsNames = \App\StoreItems::where('branch',$id)->pluck('itemname', 'id');
        $data = \App\StoreItems::select('slj_stock_items.*')->where('branch',$id)->get();
        $citi=\App\StoreItems::select('slj_stock_items.*')->where('city',$id)->first();
        $cname = \App\City::where('id',1)->pluck('name', 'id');;
            return view('administration.branches.branch-utilities-moving',['ItemsNames'=>$ItemsNames,'id'=>$id,'cname'=>$cname,'data'=>$data]);
    	
        
    }
    public function StoreBranchUtilityMoving(Request $request)
    {
        		$input = request()->all();

        $data = array();
        $move_to=$input['move_to'];
        $office=$input['Offices'];
        $id=$input['itemname'];
        $idvalue=$input['branchid'];
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
       
       
        
        return redirect('admin/branches/branch-moving/'.$idvalue)->with('success', 'Utility was Moved successfully.');;
    	
        
        
    }
    
    public function GetBranchID($item)
    {
        $brandname = \App\StoreItems::where('id',$item)->first();
        
        return $brandname->branch;
        
    }
  

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
			'branch_name' => 'required',
			'city' => 'required',
			'distributor' => 'required',
			'subdistributor' => 'required',
            'office_address' => 'required',
			//'long_lat' => 'required',
			//'rent' => 'required',
            'mobile' => 'required',
			'password' => 'required|min:8',
            'owner_name' => 'required',
            'email' => 'required|email|unique:users'
		]);
		
		
		$input = request()->all();

        //Create Branch User
        $user = new \App\User();

        $user['name'] = $input['owner_name'];
        $user['first_name'] = $input['owner_name'];
        $user['password'] = Hash::make($input['password']);
        $user['email'] = $input['email'];
        $user['mobile'] = $input['mobile'];
        $user->save();

        $userdata = \App\User::where('email',$input['email'])->first();
        //echo "<pre>";print_r($userdata->id); exit;

        //Assign Role
        $userdata->assignRole('branch');

        //Generate Branch Id
        $data = \App\Branches::select('branch_id')->orderBy('branch_id','desc')->first();
        $branchid = "00000";
        if(isset($data->branch_id)){
            $branchid = substr($data->branch_id, -5); 
        }
        $branchid = "SLJBR".str_pad($branchid + 1, 5, 0, STR_PAD_LEFT);   
        $input['branch_id'] = $branchid;
        $input['user_id'] = $userdata->id;
        $input['distributor_id'] = $input['distributor'];
		 $input['subdistributor_id'] = $input['subdistributor'];
        $input['status'] = "Y";
		
		 $input['bank_holder_name'] = $input['bank_holder_name'];
        $input['bank_account'] = $input['bank_account'];
        $input['ifsc_code'] = $input['ifsc_code'];
        $input['bank_branch_name'] = $input['bank_branch_name'];
        $input['bank_name'] = $input['bank_name'];
        
		
        //echo "<pre>"; printf($input); exit;
        \App\Branches::create($input);


        return redirect('admin/branches')->with('success', 'Branch created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('administration.branches.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $branchdetails = \App\Branches::join('users','users.id', '=', 'slj_branches.user_id')->select('slj_branches.*','users.name as owner_name','users.email','users.mobile')->find($id);
		$items = \App\City::where('status','Y')->pluck('name', 'id');
        $distributors = \App\Distributors::where('city',$branchdetails->city)->pluck('distributor_name as name', 'id');
		// $subdistributors = DB::('slj_subdistributors')->where('city',$branchdetails->city)->pluck('subdistributor_name as name', 'id');
		
		return view('administration.branches.edit',['items'=>$items, 'branchdetails'=>$branchdetails,'distributors'=>$distributors]); 
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $branch = \App\Branches::find($id);

        $validatedData = $request->validate([
			'branch_name' => 'required',
			'city' => 'required',
            'email' => 'required|unique:users,email,'.$branch->user_id,
			'office_address' => 'required',
			//'long_lat' => 'required',
			'owner_name' => 'required',
			//'rent' => 'required',
			'mobile' => 'required'
		]);
		
		$requestdata = $request->all(); 
		
		$data['branch_name'] = $requestdata['branch_name'];
		$data['city'] = $requestdata['city'];
		$data['office_address'] = $requestdata['office_address'];
		$data['long_lat'] = $requestdata['long_lat'];
		$data['rent'] = $requestdata['rent'];
		
		 $data['bank_holder_name'] = $requestdata['bank_holder_name'];
        $data['bank_account'] = $requestdata['bank_account'];
        $data['ifsc_code'] = $requestdata['ifsc_code'];
        $data['bank_branch_name'] = $requestdata['bank_branch_name'];
        $data['bank_name'] = $requestdata['bank_name'];
		
        $branch->update($data); //Update details

        $user = \App\User::find($branch->user_id);
        $data = array();
        $data['name'] = $requestdata['owner_name'];
        $data['email'] = $requestdata['email'];
        $data['mobile'] = $requestdata['mobile'];
				
        $user->update($data);
		
		return redirect('admin/branches')->with('success', 'Branch details updated successfully.');
    }

    
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $franchises = \App\Franchises::where('branch',$id)->count();
        
        if($id > 0 && $franchises == 0){
            $branch = \App\Branches::find($id);
            $user = \App\User::find($branch->user_id);
            //echo "<pre>"; print_r($user->permissions); exit;

            
           // \App\Branches::destroy($id);
		   
		    $data['status'] = "N";
            $branches = \App\Branches::find($id);
            
            //Update details
            $branches->update($data);
				
            if($branch->user_id > 0){
                $user = \App\User::find($branch->user_id);
                \App\User::destroy($branch->user_id); //remove user
                
                if(!empty($user->roles->first()) && count($user->roles->first())>0){
                    $user->removeRole($user->roles->first()); //remove role from user
                }
                if(!empty($user->permissions) && count($user->permissions)>0){
                    $user->revokePermissionTo($user->permissions); //remove permissions from user
                }
            }

            return redirect('admin/branches')->with('success', 'Branch deleted successfully.');
        }else{
            return redirect('admin/branches')->with('error', 'Branch cannot be deleted because of dependency');
        }
    }

    public function getCityDistributors($city)
    {
        //$user = Auth::user();
        $id = \Auth::user()->id;
        $roles = \Auth::user()->getRoleNames(); 
        // dd($roles[0]);
        $ids=array();
        if($roles[0]=='branch'){
            $tbl='slj_branches.user_id'; 
            $column='slj_branches.distributor_id';
            $ids = \App\Branches::join('users','users.id', '=', $tbl)->where('users.id',$id)->pluck($column, $column);
            
        }
        elseif($roles[0]=='franchise'){
            $tbl='slj_franchises.user_id';
            $column='slj_franchises.distributor_id';
            $ids = \App\Franchises::join('users','users.id', '=', $tbl)->where('users.id',$id)->pluck($column, $column);
        }
        if($ids){ 
            $citydistributors = \App\Distributors::join('users','users.id', '=', 'slj_distributors.user_id')->where('city',$city)->whereIn('slj_distributors.id',$ids)->where('users.status','Y')
        ->select('slj_distributors.id','distributor_name')->get();
        }
        else{ 
            $citydistributors = \App\Distributors::join('users','users.id', '=', 'slj_distributors.user_id')->where('city',$city)->where('users.status','Y')
        ->select('slj_distributors.id','distributor_name')->get();
        }
        

        $html = "<option value=''>-- Select Distributor --</option>";
        foreach($citydistributors as $distributor){
            $html.="<option value='".$distributor->id."'>".$distributor->distributor_name."</option>";
        }

        return $html;
    }
    
    public function getCityDistributorsExtra($city)
    {
        //$user = Auth::user();
        $id = \Auth::user()->id;
        $roles = \Auth::user()->getRoleNames(); 
        $ids=array();
        if($roles[0]=='branch'){
            $tbl='slj_branches.user_id'; 
            $column='slj_branches.distributor_id';
            $ids = \App\Branches::join('users','users.id', '=', $tbl)->where('users.id',$id)->pluck($column, $column);
            
        }
        elseif($roles[0]=='franchise'){
            $tbl='slj_franchises.user_id';
            $column='slj_franchises.distributor_id';
            $ids = \App\Franchises::join('users','users.id', '=', $tbl)->where('users.id',$id)->pluck($column, $column);
        }
        if($ids){
            $citydistributors = \App\Distributors::join('users','users.id', '=', 'slj_distributors.user_id')->where('city',$city)->whereIn('slj_distributors.id',$ids)->where('users.status','Y')
        ->select('slj_distributors.id','distributor_name')->get();
        }
        else{
            $citydistributors = \App\Distributors::join('users','users.id', '=', 'slj_distributors.user_id')->where('city',$city)->where('users.status','Y')
        ->select('slj_distributors.id','distributor_name')->get();
        }
        
  $html='';
        foreach($citydistributors as $distributor){
			{
			    $html .= '<div class="col-md-3">';
			    $html .= '<label class="radio-inline mr10" style="font-size: 11px;">';
			    $html .= "<input type='checkbox' class='checkbxx' name='distributor[]' id='branch' value='".$distributor->id."'>$distributor->distributor_name";
			    $html .= '</label>';
			    $html .= '</div>';
			   
		
            }

    
        }

        return $html;
    }


     public function getSubDistributors($distributor)
    {
        //$user = Auth::user();
        $id = \Auth::user()->id;
        $roles = \Auth::user()->getRoleNames(); 
        // dd($roles[0]);
        $ids=array();
        if($roles[0]=='branch'){
            $tbl='slj_branches.user_id'; 
            $column='slj_branches.subdistributor_id';
            $ids = \App\Branches::join('users','users.id', '=', $tbl)->where('users.id',$id)->pluck($column, $column);
            
        }
        elseif($roles[0]=='franchise'){
            $tbl='slj_franchises.user_id';
            $column='slj_franchises.subdistributor_id';
            $ids = \App\Franchises::join('users','users.id', '=', $tbl)->where('users.id',$id)->pluck($column, $column);
        }
        if($ids){ 
            $subdistributors = \App\SubDistributors::join('users','users.id', '=', 'slj_subdistributors.user_id')->where('distributor_id',$distributor)->whereIn('slj_subdistributors.id',$ids)->where('users.status','Y')
        ->select('slj_subdistributors.id','subdistributor_name')->get();
        }
        else{ 
            $subdistributors = \App\SubDistributors::join('users','users.id', '=', 'slj_subdistributors.user_id')->where('distributor_id',$distributor)->where('users.status','Y')
        ->select('slj_subdistributors.id','subdistributor_name')->get();
        }
        

        $html = "<option value=''>-- Select Sub Distributor --</option>";
        foreach($subdistributors as $sdistributor){
            $html.="<option value='".$sdistributor->id."'>".$sdistributor->subdistributor_name."</option>";
        }

        return $html;
    }
    
}
