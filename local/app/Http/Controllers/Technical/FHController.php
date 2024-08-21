<?php

namespace App\Http\Controllers\Technical;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
#use Spatie\Permission\Models\Role;
#use Spatie\Permission\Models\Permission;
use DB;

class FHController extends Controller
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
        //print_r($permissionsdata);

        if(count($permissionsdata) == 0 || !in_array('fh',$permissionsdata)){
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
            $tbl='slj_fh.id';
            $id=0;
            $operator='!=';
        }


        $data = \App\FH::leftjoin('slj_franchises','slj_fh.franchise', '=', 'slj_franchises.id')
				->leftjoin('slj_fiber_laying','slj_fiber_laying.id', '=', 'slj_fh.fiber')
				->leftjoin('slj_distributors','slj_distributors.id', '=', 'slj_fh.distributor')
				->leftjoin('slj_subdistributors','slj_subdistributors.id', '=', 'slj_fh.subdistributor')
				->leftjoin('slj_branches','slj_branches.id', '=', 'slj_fh.branch')
                ->leftJoin('slj_cities','slj_cities.id', '=', 'slj_fh.city')
				->select('slj_fh.*','slj_distributors.distributor_name','slj_subdistributors.subdistributor_name','slj_fiber_laying.fiber_name','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name')
				->where($tbl, $operator, $id)->orderBy('slj_fh.id')
				->paginate(20);
	 $employeedata=array();
	  $id = \Auth::user()->id;
       
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="List FH";
     
      \App\Employees_Logs::create($employeedata);

				
		return view('technical.fh.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        
        //check user permission for this page
        $user = Auth::user();  
        $permissions = $user->getPermissionsViaRoles();

        $permissionsdata = array();
        foreach($permissions as $permission){
            $permissionsdata[] =  $permission->name;   
        }
        if(count($permissionsdata) == 0 || !in_array('fh',$permissionsdata)){
            abort(403, "Unauthorized action. Access Denied You don't have permission to access.");
        }
        
        $id = \Auth::user()->id;
        $roles = $user->getRoleNames(); 
        $franchise_list=array();
         $franchise_id = null;
         /*
        if($roles[0]=='branch'){
            $tbl='slj_branches.user_id'; 
            $column='slj_branches.id';
            $ids = \App\Branches::join('users','users.id', '=', $tbl)->where('users.id',$id)->pluck($column, $column);
        
            $franchise_list = \App\Franchises::whereIn('branch',$ids)->pluck('franchise_name', 'id');
        }
        if($roles[0]=='franchise'){
                                    $franchise_id = \App\Franchises::where('user_id',$id)->pluck('id');
                         }
*/
 if($roles[0]=='superadmin'){
        $cities = \App\City::where('status','Y')->pluck('name', 'id');
         $tbl='slj_branches.user_id';
        $column='slj_branches.id';
            $ids = \App\Branches::join('users','users.id', '=', $tbl)->where('users.id',$id)->pluck($column, $column);
        
            $franchise_list = \App\Franchises::whereIn('branch',$ids)->pluck('franchise_name', 'id');
            $t=9;
        $terminationbox=\App\ProductCategories::where('parent',$t)->pluck('name', 'id');
		
		 $getdata = \App\StockProducts::join('slj_products','slj_products.id','=','slj_stock_products.product')            
        ->where('slj_products.category',$terminationbox)
		->where('slj_stock_products.assign_status',0)
        ->orderBy('slj_stock_products.id','DESC')
		->pluck('serial_no'); 
       
                                    $franchise_id = \App\Franchises::where('user_id',$id)->pluck('id');
        return view('technical.fh.create',['cities'=>$cities,'franchise'=>$franchise_list, 'franchise_id'=>$franchise_id,'terminationbox'=>$terminationbox,'getdata'=>$getdata]);
 }
 else
 {
        $empdata=\App\Employees::where('user_id',$id)->get();
     $cities = \App\City::where('status','Y')->pluck('name', 'id');
      $t=9;
        $terminationbox=\App\ProductCategories::where('parent',$t)->pluck('name', 'id');
          
		   $getdata = \App\StockProducts::join('slj_products','slj_products.id','=','slj_stock_products.product')            
        ->where('slj_products.category',$terminationbox)
		->where('slj_stock_products.assign_status',0)
        ->orderBy('slj_stock_products.id','DESC')
		->pluck('serial_no'); 
                              
return view('technical.fh.create',['empdata'=>$empdata,'terminationbox'=>$terminationbox,'getdata'=>$getdata]);
 }
                         


		
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
			'subdistributor' => 'required',
             'branch' => 'required',
			'franchise' => 'required',
			'fiber' => 'required',
			'olt_id' => 'required',
			'dp_num' => 'required',
			'fiber_color' => 'required',
			'splitter_core' => 'required',
			'long_lat' => 'required',
			'generate_fh_id' => 'required'
		);
        if($roles[0]=='branch'){
            $validation_list=array('franchise' => 'required',
			'fiber' => 'required',
			'olt_id' => 'required',
			'dp_num' => 'required',
			'fiber_color' => 'required',
			'splitter_core' => 'required',
			'long_lat' => 'required',
			'generate_fh_id' => 'required'
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
			'olt_id' => 'required',
			'dp_num' => 'required',
			'fiber_color' => 'required',
			'splitter_core' => 'required',
			'long_lat' => 'required',
			'generate_fh_id' => 'required'
		);
            $franchise = \App\Franchises::where('user_id',$id)->select('id','city','distributor_id','subdistributor_id','branch')->first();
            $input['city']=$franchise->city;
            $input['distributor']=$franchise->distributor_id;
			$input['subdistributor']=$franchise->subdistributor_id;
            $input['branch']=$franchise->branch;
            $input['franchise']=$franchise->id;
            //$input['termination_box']=$franchise->id;
            
        }
        $validatedData = $request->validate($validation_list);
		 $input['user_id']= $id;
		//print_r($input); exit;
		$requestdata = $request->all(); 
        $input['termination_box']=$requestdata['termination_box'];
		
		\App\FH::create($input);
		
		 $update = [
                'assign_status'   => 1,
                'identification'    => "JC BOX -1"
               
            ];   
            
            $terminationdata=\App\StockProducts::where('serial_no',$requestdata['termination_box_serial_no'])->update($update);
		
		$data=array();
	$data['franch']=$requestdata['franchise'];
		
		$data['seriatype']=$requestdata['splitter'];
		$data['splitter_serialno']= $requestdata['splitter_serialno'];
		$data['type']="fh";

	\App\Serial_Data::create($data);
		
	$employeedata=array();
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Create FH";
     $employeedata['value_of_action']=$input['fiber'];
     
      \App\Employees_Logs::create($employeedata);
     

        return redirect('admin/fh')->with('success', 'FH created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('technical.fh.show');
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
        if(count($permissionsdata) == 0 || !in_array('fh',$permissionsdata)){
            abort(403, "Unauthorized action. Access Denied You don't have permission to access.");
        }
        $roles = $user->getRoleNames();
        $fhdetails = \App\FH::find($id);
        $cities = \App\City::where('status','Y')->pluck('name', 'id');
		$items = \App\Franchises::where('branch',$fhdetails->branch)->pluck('franchise_name as name', 'id');
		$branches = \App\Branches::where('city',$fhdetails->city)->pluck('branch_name as name', 'id');
		
		$distributors = \App\Distributors::join('users','users.id', '=', 'slj_distributors.user_id')->where('city',$fhdetails->city)->where('users.status','Y')
       ->pluck('distributor_name as name', 'slj_distributors.id as id');
	   
	   $subdistributors = \App\SubDistributors::join('users','users.id', '=', 'slj_subdistributors.user_id')->where('city',$fhdetails->city)->where('users.status','Y')
       ->pluck('subdistributor_name as name', 'slj_subdistributors.id as id');
	   
	    $franchisefibers = \App\FiberLaying::where('franchise',$fhdetails->franchise)->where('fiber_to','fh')->pluck('fiber_name as name','id');
		
		$fibercolors = \App\FiberLaying::where('id',$fhdetails->fiber)->select('fiber_color')->first();
		
		$data = array();
		$fiber_colors = array();
		if(!empty($fibercolors->fiber_color)){
			$data = explode(",",$fibercolors->fiber_color);
		}	
		
		foreach($data as $color){
			$fiber_colors[$color] = ucfirst($color);
		}	
		
		
		$olt_items = \App\OLT::where('franchise_id',$fhdetails->franchise)->pluck('id as name','id');
		
        $dp_items = \App\DP::where('franchise',$fhdetails->franchise)->pluck('id as name', 'id');
        
        //echo "<pre>"; print_r($fhdetails); exit;
        $dp_id = $fhdetails->dp_num;

        $dp_data = \App\DP::find($dp_id);
        $splitters = array(1=>"Blue",2=>"Orange",3=>"Green",4=>"Brown",5=>"Slate",6=>"White",7=>"Red",8=>"Black",9=>"Yellow",10=>"Violet",11=>"Rose",12=>"Aqua",13=>"Color 13",14=>"Color 14",15=>"Color 15",16=>"Color 16");

        if($dp_data->splitter == '1:8'){
            $colors = 8;
        }else{
            $colors = 16;
        }


        $dp_data = \App\FH::where('dp_num',$dp_id)->where('id','!=',$id)->get();
        $used_splitter_core_colors = array();
        foreach($dp_data as $dp){
            $used_splitter_core_colors[] =  $dp->splitter_core;
        }

        $used_splitter_core_colors = array_unique($used_splitter_core_colors);

        //echo "<pre>"; print_r($used_splitter_core_colors); exit;
        $splitter_core_colors = array();
        $html = "<option value=''>-- Select Splitter Core --</option>";
        for($cnt = 1; $cnt <= $colors; $cnt++){
            if(!in_array($cnt,$used_splitter_core_colors)){
                //$html.="<option value='".$cnt."'>".$splitters[$cnt]."</option>";
                $splitter_core_colors[$cnt] = $splitters[$cnt];
            }
        }
$branch_id = null;
if($roles[0]=='franchise'){
                                    $branch_id = \App\Franchises::where('user_id',$id)->pluck('branch');
                         }
		return view('technical.fh.edit',['splitter_core_colors'=>$splitter_core_colors, 'cities'=>$cities,'fiber_colors'=>$fiber_colors,'dp_items'=>$dp_items,'distributors'=>$distributors,'subdistributors'=>$subdistributors,'branches'=>$branches,'items'=>$items, 'fhdetails'=>$fhdetails, 'franchisefibers'=>$franchisefibers,'olt_items'=>$olt_items]);
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
			'olt_id' => 'required',
			'dp_num' => 'required',
			'fiber_color' => 'required',
			'splitter_core' => 'required',
			'long_lat' => 'required',
			'generate_fh_id' => 'required'
		);
        if($roles[0]=='branch'){
            $validation_list=array('franchise' => 'required',
			'fiber' => 'required',
			'olt_id' => 'required',
			'dp_num' => 'required',
			'fiber_color' => 'required',
			'splitter_core' => 'required',
			'long_lat' => 'required',
			'generate_fh_id' => 'required'
		);
        }
        if($roles[0]=='franchise'){
            $validation_list=array(
			'fiber' => 'required',
			'olt_id' => 'required',
			'dp_num' => 'required',
			'fiber_color' => 'required',
			'splitter_core' => 'required',
			'long_lat' => 'required',
			'generate_fh_id' => 'required'
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
		
		$data['olt_id'] = $requestdata['olt_id'];
		$data['dp_num'] = $requestdata['dp_num'];
		$data['fiber_color'] = $requestdata['fiber_color'];
		$data['splitter_core'] = $requestdata['splitter_core'];
		
		//$data['fh_port'] = $requestdata['fh_port'];
		$data['long_lat'] = $requestdata['long_lat'];
		$data['generate_fh_id'] = $requestdata['generate_fh_id'];
		
		//Update details
		$fh = \App\FH::find($id);
		$fh->update($data);
		
		return redirect('admin/fh')->with('success', 'FH details updated successfully.');
		
		
    }
	
	
	
	public function getFHColors($fh)
    {
        $fh = \App\FH::where('id',$fh)->select('fiber_color')->first();
		
		$html = $fh->fiber_color;
        
        return $html;
    }
    /**
     * getDPData this method for getting dp data by olt id.
     */
    public function getFHData($id)
    {
        
        $list = \App\FH::where('dp_num',$id)->pluck('generate_fh_id as name', 'id');
                      
        $html = "<option value=''>-- Select FH --</option>";
        foreach($list as $k=>$val){
            $html.="<option value='".$k."'>".$val."</option>";
        }

        return $html;
    }
    public function getFHPorts($fh_id)
    {
        //echo "<pre>"; print_r($fh); exit;
        $fh_data = \App\FH::where('id',$fh_id)->first();
        if($fh_data->splitter == '1:8'){
            $ports = 8;
        }else{
            $ports = 16;
        }

        $customers = \App\Customers::where('fh',$fh_id)->get();
        
        $used_fhcustomer_ports = array();
        foreach($customers as $customer){
            $used_fhcustomer_ports[] =  $customer->fh_port;
        }

        $used_fhcustomer_ports = array_unique($used_fhcustomer_ports);

        //echo "<pre>"; print_r($used_fhcustomer_ports); exit;

        $html = "<option value=''>-- Select FH Port --</option>";
        for($cnt = 1; $cnt <= $ports; $cnt++){
            if(!in_array($cnt,$used_fhcustomer_ports)){
                $html.="<option value='".$cnt."'>".$cnt."</option>";
            }
        }
        return $html;
    }

    public function getFHPortsCustomers($fh_id)
    {
        $customers = \App\Customers::leftjoin('users','slj_customers.user_id', '=', 'users.id')->whereNotNull('fh_port')->where('fh',$fh_id)->orderBy('fh_port','asc')->get();
        //echo "<pre>"; print_r($customers); exit;

        $fh_data = \App\FH::where('id',$fh_id)->first();
        if($fh_data->splitter == '1:8'){
            $ports = 8;
        }else{
            $ports = 16;
        }
        $html = "";
        $html = "<button type='button' class='btn btn-success'>Total Ports :<span class='badge'>".$ports."</span></button>&nbsp; <button type='button' class='btn btn-primary'>Used Ports :<span class='badge'>".count($customers)."</span></button> &nbsp; <button type='button' class='btn btn-warning'>Remaining Ports :<span class='badge'>".($ports - count($customers))."</span></button>";
        $html.= "<br><br><h3>Customers</h3><table class='table'>";
        $html.= "<tr><th>FH Port</th><th>Name</th><th>Status</th><th>Expiry Date</th></tr>";
        if(count($customers)>0){
            foreach($customers as $customer){
                $expiry_date = " - ";
                if(!empty($customer->expiry_date)){
                    $expiry_date = date('d-m-Y',strtotime($customer->expiry_date));
                }

                $customer_status = "";
                if($customer->current_status == "technical"){$customer_status = "<span class='badge badge-primary'>In Technical</span>";}
				elseif($customer->current_status == "active"){$customer_status = "<span class='badge badge-success'>Active</span>";}
				elseif($customer->current_status == "activation"){$customer_status = "<span class='badge badge-warning'>In Activation</span>";}
                elseif($customer->current_status == "activated"){$customer_status = "<span class='badge badge-success'>Activated</span>";}
				elseif($customer->current_status == "new"){$customer_status = "<span class='badge badge-danger'>New</span>";}
				elseif($customer->current_status == "scheduled"){$customer_status = "<span class='badge badge-info'>Scheduled</span>";}
                else{$customer_status = "<span class='badge badge-secondary'>".$customer->current_status."</span>";}
                
                $html.="<tr><td>".$customer->fh_port."</td><td>".ucfirst($customer->name)."</td><td>".$customer_status."</td><td>".$expiry_date."</td></tr>";
            }
        }else{
            $html.= "<tr><td colspan='4'>No Data Found</td></tr>";
        }
        $html.= "</table>";
        
        //$used_olt_port_numbers = array_unique($used_olt_port_numbers);
        //echo "<pre>"; print_r($used_olt_port_numbers); exit;
		//$html = "hello";
        
        return $html;
    }

    public function getDPColors($dp_id)
    {
        $dp_data = \App\DP::find($dp_id);
        $splitters = array(1=>"Blue",2=>"Orange",3=>"Green",4=>"Brown",5=>"Slate",6=>"White",7=>"Red",8=>"Black",9=>"Yellow",10=>"Violet",11=>"Rose",12=>"Aqua",13=>"Color 13",14=>"Color 14",15=>"Color 15",16=>"Color 16");

        if($dp_data->splitter == '8'){
            $colors = 8;
           // $dp_data->$colors1=8;
        }else{
            $colors = 4;
           // $dp_data->$colors1=4;
        }
        


        $dp_data = \App\FH::where('dp_num',$dp_id)->get();
        $used_splitter_core_colors = array();
        foreach($dp_data as $dp){
            $used_splitter_core_colors[] =  $dp->splitter_core;
        }

        $used_splitter_core_colors = array_unique($used_splitter_core_colors);

        //echo "<pre>"; print_r($used_splitter_core_colors); exit;

        $html = "<option value=''>-- Select Splitter Core --</option>";
        for($cnt = 1; $cnt <= $colors; $cnt++){
            if(!in_array($cnt,$used_splitter_core_colors)){
                $html.="<option value='".$cnt."'>".$splitters[$cnt]."</option>";
            }
        }
        return $html;
    }
    
    public function GetTerminationData($pid,$franch)
    {
        $da=\App\Products::where('sub_category',$pid)->first();
        
       $getsplitterdata=\App\StockProducts::where('product',$da->id)->get();
       
        $splitterdata=\App\Serial_Data::where('franch',$franch)->get();
        
         $used_splitter = array();
        foreach($splitterdata as $fb){
            $used_splitter[] =  $fb->serial_no;
        }

        $used_splitter = array_unique($used_splitter);
     
         $html = "<option value=''>-- Select Termination Serial Number --</option>";
         
          

          
          foreach($getsplitterdata as $geten)
			{
			     //$html = "<option value=''>-- Select Enclosure --</option>";
			     if(!in_array($geten->serial_no,$used_splitter))
                    {
			     $html.="<option value='".$geten->serial_no."'>".$geten->serial_no."</option>";
                    }
	        }
      
      
         return $html;     
     
        
    }
     public function GetFhSplitterData($splitter,$franch)
     {
        
        $j="available";
        $kk=1;
        $kk="PLC SPLITTER 1X8 -1";
        if($splitter=="8")
         {
        $gg="PLC SPLITTER 1X8 -1";
       $getsplitterdata=\App\StockProducts::where('identification',$gg)->get();
       
        $splitterdata=\App\Serial_Data::where('franch',$franch)->get();
        
         $used_splitter = array();
        foreach($splitterdata as $fb){
            $used_splitter[] =  $fb->serial_no;
        }

        $used_splitter = array_unique($used_splitter);
         }
       if($splitter=="4")
         {
        $gg="PLC SPLITTER 1X4 -1";
       $getsplitterdata=\App\StockProducts::where('identification',$gg)->get();
     $splitterdata=\App\Serial_Data::where('franch',$franch)->get();
           
         $used_splitter = array();
        foreach($splitterdata as $fb){
            
            $used_splitter[] =  $fb->serial_no;
        }

        $used_splitter = array_unique($used_splitter);
         }
         $html = "<option value=''>-- Select SplitterData --</option>";
         
          

          
          foreach($getsplitterdata as $geten)
			{
			     //$html = "<option value=''>-- Select Enclosure --</option>";
			     if(!in_array($geten->serial_no,$used_splitter))
                    {
			     $html.="<option value='".$geten->serial_no."'>".$geten->serial_no."</option>";
                    }
	        }
      
      
         return $html;     
     
         
     }
    
     public function getDPColorsExtra($dp_id)
    {
        $dp_data = \App\DP::find($dp_id);
        $splitters = array(1=>"Blue",2=>"Orange",3=>"Green",4=>"Brown",5=>"Slate",6=>"White",7=>"Red",8=>"Black",9=>"Yellow",10=>"Violet",11=>"Rose",12=>"Aqua",13=>"Color 13",14=>"Color 14",15=>"Color 15",16=>"Color 16");

        if($dp_data->splitter == '8'){
            $portno=8;
            $colorsport = '1:8';
          
        }
        if($dp_data->splitter == '4'){
            
            $portno=16;
            $colorsport = '1:16';
           
        }
        


        $html = "<option value=''>-- Select Splitter  --</option>";
        
                $html.="<option value='".$portno."'>".$colorsport."</option>";
           
       
        return $html;
    }

    /**	
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $customers = \App\Customers::where('fh',$id)->count(); // added by durga
        if($id > 0 && $customers == 0){
            \App\FH::destroy($id);
             return redirect('admin/fh')->with('success', 'FH details deleted successfully.');
        }else{
            return redirect('admin/fh')->with('error', 'FH details cannot be deleted because of dependency');
        }
    }
}
