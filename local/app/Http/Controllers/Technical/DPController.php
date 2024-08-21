<?php

namespace App\Http\Controllers\Technical;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use DB;

class DPController extends Controller
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
        if(count($permissionsdata) == 0 || !in_array('dp',$permissionsdata)){
            abort(403, "Unauthorized action. Access Denied You don't have permission to access.");
        }
        $id = Auth::user()->id;
		
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
            $tbl='slj_dp.id';
            $id=0;
            $operator='!=';
        }
        $data = \App\DP::leftjoin('slj_branches','slj_dp.branch','=','slj_branches.id')
				->leftjoin('slj_franchises','slj_dp.franchise', '=', 'slj_franchises.id')
				->leftjoin('slj_fiber_laying','slj_fiber_laying.id', '=', 'slj_dp.fiber')
				->leftjoin('slj_distributors','slj_distributors.id', '=', 'slj_dp.distributor')
				->leftjoin('slj_subdistributors','slj_subdistributors.id', '=', 'slj_dp.subdistributor')
				->leftjoin('slj_cities','slj_cities.id', '=', 'slj_dp.city')
				//->leftjoin('slj_fiber_laying','slj_dp.fiber','=','slj_fiber_laying.id')
				->select('slj_dp.*','slj_distributors.distributor_name','slj_subdistributors.subdistributor_name','slj_fiber_laying.fiber_name','slj_franchises.franchise_name','slj_branches.branch_name','slj_cities.name as city_name')
				->where($tbl, $operator, $id)->orderBy('slj_dp.generate_dp')
				->paginate(20);
		
		//echo "<pre>"; print_r($data); exit;
		
		$employeedata=array();
	  $id = \Auth::user()->id;
       
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="List DP";
     \App\Employees_Logs::create($employeedata);
       
     
		
		return view('technical.dp.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
     public function GetSplitterData($splitter,$franch)
     {
        
        $j="available";
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
            $used_splitter[] =  $fb->splitter_serialno;
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
            
            $used_splitter[] =  $fb->splitter_serialno;
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
    public function create()
    {
        //check user permission for this page
        $user = Auth::user();
        $permissions = $user->getPermissionsViaRoles();

        $permissionsdata = array();
        foreach($permissions as $permission){
            $permissionsdata[] =  $permission->name;   
        }
        if(count($permissionsdata) == 0 || !in_array('dp',$permissionsdata)){
            abort(403, "Unauthorized action. Access Denied You don't have permission to access.");
        }
        
        $id = \Auth::user()->id;
        $roles = $user->getRoleNames(); 
        $franchise_list=array();
        $franchise_id = null;
        $products = \App\Products::where('status','Y')->pluck('name', 'id');

        if($roles[0]=='branch'){
            $tbl='slj_branches.user_id'; 
            $column='slj_branches.id';
            $ids = \App\Branches::join('users','users.id', '=', $tbl)->where('users.id',$id)->pluck($column, $column);
        
            $franchise_list = \App\Franchises::whereIn('branch',$ids)->pluck('franchise_name', 'id');
        }
        if($roles[0]=='franchise'){
                            $franchise_id = \App\Franchises::where('user_id',$id)->pluck('id');
                 }
                  if($roles[0]=='superadmin'){
       $cities = \App\City::where('status','Y')->pluck('name', 'id');
       $no="GENERAL ENCLOSER";
       $j="available";
       $kk=1;
       $gg="PLC SPLITTER 1X8 -1";
       $getsplitterdata=\App\StockProducts::where('identification',$gg)->where('status',$j)->pluck('serial_no','serial_no');
     
      //  $getdata=\App\StockProducts::where('identification',$no)->where('employee_status',$j)->where('assign_status',$kk)->pluck('serial_no','serial_no');
	 
	  $getdata = \App\StockProducts::join('slj_products','slj_products.id','=','slj_stock_products.product')            
        ->where('slj_products.sub_category',19)
		->where('slj_stock_products.assign_status',0)
        ->orderBy('slj_stock_products.id','DESC')
		->pluck('serial_no'); 
      // print_r($getdata);die;
		return view('technical.dp.create',['cities'=>$cities,'franchise'=>$franchise_list, 'franchise_id'=>$franchise_id,'getdata'=>$getdata,'getsplitterdata'=>$getsplitterdata,'products'=>$products]);
                  }
                   else
 {
   
        $empdata=\App\Employees::where('user_id',$id)->get();
        $cities = \App\City::where('status','Y')->pluck('name', 'id');
    
     $no="GENERAL ENCLOSER";
        $j="available";
        $kk=1;
       // $getdata=\App\StockProducts::where('identification',$no)->where('employee_status',$j)->where('assign_status',$kk)->pluck('serial_no','serial_no');
      
	  $getdata = \App\StockProducts::join('slj_products','slj_products.id','=','slj_stock_products.product')            
        ->where('slj_products.sub_category',19)
		 ->where('slj_stock_products.assign_status',0)
        ->orderBy('slj_stock_products.id','DESC')
		->pluck('serial_no');
      
//return redirect('admin/dp/create');
                              
	return view('technical.dp.create',['cities'=>$cities,'franchise'=>$franchise_list, 'franchise_id'=>$franchise_id,'getdata'=>$getdata,'products'=>$products]);
   
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
        $validation_list=array('branch' => 'required',
			'olt_id' => 'required',
			'olt_port_num' => 'required',
			'fiber' => 'required',
			'long_lat' => 'required',
			'splitter' => 'required',
			'generate_dp' => 'required',
			'enclosure' => 'required'
		);
        if($roles[0]=='branch'){
            $validation_list=array('franchise' => 'required',
			'olt_id' => 'required',
			'olt_port_num' => 'required',
			'fiber' => 'required',
			'long_lat' => 'required',
			'splitter' => 'required',
			'generate_dp' => 'required',
			'enclosure' => 'required'
		);
            $branch = \App\Branches::where('user_id',$id)->select('id','city','distributor_id')->first();
            $input['city']=$branch->city;
            $input['distributor']=$branch->distributor_id;
			 $input['subdistributor']=$branch->subdistributor_id;
            $input['branch']=$branch->id;
        }
        if($roles[0]=='franchise'){
            $validation_list=array(
			'olt_id' => 'required',
			'olt_port_num' => 'required',
			'fiber' => 'required',
			'long_lat' => 'required',
			'splitter' => 'required',
			'generate_dp' => 'required'
		);
            $franchise = \App\Franchises::where('user_id',$id)->select('id','city','distributor_id','branch')->first();
            $input['city']=$franchise->city;
            $input['distributor']=$franchise->distributor_id;
			 $input['subdistributor']=$franchise->subdistributor_id;
            $input['branch']=$franchise->branch;
            $input['franchise']=$franchise->id;
        }
        $validatedData = $request->validate($validation_list);
        
        $latlong = explode(",",$input['long_lat']);
        $input['latitude'] = $latlong[0];
        $input['longitude'] = $latlong[1];
			$input['user_id']= $id;
				$requestdata = $request->all(); 
				
				$input['fiber_color']=$requestdata['fibercolor'];
    
	$input['splitter_serialno']= $requestdata['splitterdata'];
	//$input['enclosure_serialno']= $requestdata['enclosure'];
	
	    
	  // $no="GENERAL ENCLOSER";
      //  $kk=1;
        //$dpenclosure=[];
       //$enclosuredata=\App\StockProducts::where('serial_no',$requestdata['enclosure'])->where('identification',$no)->where('assign_status',$kk)->first();
	   \App\DP::create($input); 
	  
	  $update = [
                'assign_status'   => 1,
                'identification'    => "GENERAL ENCLOSER"
               
            ];   
            
            $enclosuredata=\App\StockProducts::where('serial_no',$requestdata['enclosure'])->update($update);
	   // $enclosuredata=\App\StockProducts::where('serial_no',$requestdata['enclosure'])->where('identification',$no)->where('assign_status',$kk)->first();
	  
   // $ku = [];
   // \App\DP::create($input);
   // $ku['assign_status'] = 0;
   // $enclosuredata->update($ku);

	  
		$data=array();
		$data['franch']=$requestdata['franchise'];
		
		//$data['seriatype']=$requestdata['serial'];
		$data['splitter_serialno']= $requestdata['splitterdata'];
		$data['type']="dp";

	\App\Serial_Data::create($data);
    	\App\FH::create($input);
		
	$employeedata=array();
     $employeedata['employee_id']=$id;
     $employeedata['action_name']="Create DP";
     $employeedata['value_of_action']=$input['generate_dp'];
     
      \App\Employees_Logs::create($employeedata);
        return redirect('admin/dp')->with('success', 'DP created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('technical.dp.show');
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
        if(count($permissionsdata) == 0 || !in_array('dp',$permissionsdata)){
            abort(403, "Unauthorized action. Access Denied You don't have permission to access.");
        }
        
        
        
        $dpdetails = \App\DP::find($id);
        $oltdetails = \App\OLT::find($dpdetails->olt_id);
         $no="GENERAL ENCLOSER";
        $kk=1;
        $dpenclosure=[];
       $enclosuredata=\App\StockProducts::where('identification',$no)->where('assign_status',$kk)->get();
     $dpenclosure=\App\DP::where('id',$dpdetails->id)->get();
     $splitterd=\App\DP::where('id',$dpdetails->id)->pluck('splitter','splitter');
    //$spl=$splitterd->splitter;
    $splitterserial=\App\DP::where('id',$dpdetails->id)->pluck('splitter_serialno','splitter_serialno');
    $fiber_color=\App\DP::where('id',$dpdetails->id)->pluck('fiber_color','fiber_color');
     
        
        $cities = \App\City::where('status','Y')->pluck('name', 'id');
		$items = \App\Franchises::where('branch',$dpdetails->branch)->pluck('franchise_name as name', 'id');
		$branches = \App\Branches::where('city',$dpdetails->city)->pluck('branch_name as name', 'id');
		
		$distributors = \App\Distributors::join('users','users.id', '=', 'slj_distributors.user_id')->where('city',$dpdetails->city)->where('users.status','Y')
       ->pluck('distributor_name as name', 'slj_distributors.id as id');
	   
	   $subdistributors = \App\SubDistributors::join('users','users.id', '=', 'slj_subdistributors.user_id')->where('city',$dpdetails->city)->where('users.status','Y')
       ->pluck('subdistributor_name as name', 'slj_subdistributors.id as id');
	   
	    $franchisefibers = \App\FiberLaying::where('franchise',$dpdetails->franchise)->where('fiber_to','dp')->pluck('fiber_name as name','id');
        
        $olt_items = \App\OLT::where('branch',$dpdetails->branch)->pluck('id as name','id');
        
        $dp_data = \App\DP::where('franchise',$dpdetails->franchise)->where('olt_id',$dpdetails->olt_id)->where('id','!=',$id)->get();
        
        $oltports = \App\OLTPorts::leftjoin('slj_franchises','slj_olt_ports.franchise_id', '=', 'slj_franchises.id')
                    ->where('olt_id',$dpdetails->olt_id)
                    ->where('slj_olt_ports.franchise_id',$dpdetails->franchise)
                    ->select('slj_olt_ports.*','slj_franchises.franchise_name')
                    ->orderBy('slj_olt_ports.olt_port','asc')
                    ->get();

            $used_olt_port_numbers = array();
            foreach($dp_data as $dp){
                $used_olt_port_numbers[] =  $dp->olt_port_num;
            }
    
            $available_olt_ports = array();
            foreach($oltports as $olt){
                if(in_array($olt->olt_port,$used_olt_port_numbers)){
                    $available_olt_ports[] =  $olt->olt_port;
                }
            }
            
            $available_olt_ports = array_unique($available_olt_ports);
            
            $ports = array();
             array_push($ports,$dpdetails->olt_port_num);
            foreach($available_olt_ports as $port){
                $ports[$port] = $port;
            }
           
           // $ports[$port]=;
        //print_r($olt_port_numbers); exit;
	   
		return view('technical.dp.edit',['olt_port_numbers'=>$ports,'cities'=>$cities,'distributors'=>$distributors,'subdistributors'=>$subdistributors,'branches'=>$branches,'items'=>$items, 'dpdetails'=>$dpdetails, 'franchisefibers'=>$franchisefibers,'olt_items'=>$olt_items,'oltdetails'=>$oltdetails,'enclosuredata'=>$enclosuredata,'dpenclosure'=>$dpenclosure,'splitterd'=>$splitterd,'splitterserial'=>$splitterserial,'fiber_color'=>$fiber_color]); 
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
        $validation_list=array('branch' => 'required',
			'olt_id' => 'required',
			'olt_port_num' => 'required',
			'fiber' => 'required',
			'long_lat' => 'required',
			'splitter' => 'required',
			'generate_dp' => 'required'
		);
        if($roles[0]=='branch'){
            $validation_list=array('franchise' => 'required',
			'olt_id' => 'required',
			'olt_port_num' => 'required',
			'fiber' => 'required',
			'long_lat' => 'required',
			'splitter' => 'required',
			'generate_dp' => 'required'
		);
        }
        if($roles[0]=='franchise'){
            $validation_list=array(
			'olt_id' => 'required',
			'olt_port_num' => 'required',
			'fiber' => 'required',
			'long_lat' => 'required',
			'splitter' => 'required',
			'generate_dp' => 'required'
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
		$data['olt_id'] = $requestdata['olt_id'];
		$data['olt_port_num'] = $requestdata['olt_port_num'];
		$data['fiber'] = $requestdata['fiber'];
		$data['long_lat'] = $requestdata['long_lat'];
		$data['splitter'] = $requestdata['splitter'];
        $data['generate_dp'] = $requestdata['generate_dp'];
        $data['fiber_color'] = $requestdata['fibercolor'];
        
        $data['enclosure_serialno'] = $requestdata['enclosure'];
        $data['splitter_serialno'] = $requestdata['splitter_serialno'];
        
        
        $latlong = explode(",",$requestdata['long_lat']);
        $requestdata['latitude'] = $latlong[0];
        $requestdata['longitude'] = $latlong[1];
		
		//Update details
		$dp = \App\DP::find($id);
		$dp->update($data);
		
		return redirect('admin/dp')->with('success', 'DP details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $customers = \App\Customers::where('dp',$id)->count();
         $dpid=\App\FH::where('dp_num',$id)->count(); // added by durga
        if($id > 0 && $customers == 0 && $dpid == 0){
            \App\DP::destroy($id);
             return redirect('admin/dp')->with('success', 'DP details deleted successfully.');
        }else{
            return redirect('admin/dp')->with('error', 'DP details cannot be deleted because of dependency');
        }
    }
	
	
	public function getFranchiseDPs($franchise)
    {
        $franchisedps = \App\DP::where('franchise',$franchise)->select('id')->get();

        $html = "<option value=''>-- Select DP --</option>";
        foreach($franchisedps as $dp){
            $html.="<option value='".$dp->id."'>".$dp->id."</option>";
        }

        return $html;
    }

    public function getFHsData($dp_id)
    {
        $fhs = \App\FH::where('dp_num',$dp_id)->whereNotNull('dp_port')->orderBy('dp_port','asc')->get();
        //echo "<pre>"; print_r($fh); exit;
        $dp_data = \App\DP::where('id',$dp_id)->first();
        //echo "<pre>"; print_r($dp_data); exit;
        if($dp_data->splitter == '1:8'){
            $ports = 8;
        }else if($dp_data->splitter == '1:32'){
            $ports = 32;
        }else{
            $ports = 16;
        }
        //return $html = '';

        $html = "";
        $html = "<button type='button' class='btn btn-success'>Total DP Ports :<span class='badge'>".$ports."</span></button>&nbsp; <button type='button' class='btn btn-primary'>Used DP Ports :<span class='badge'>".count($fhs)."</span></button> &nbsp; <button type='button' class='btn btn-warning'>Remaining DP Ports :<span class='badge'>".($ports - count($fhs))."</span></button>";
        $html.= "<br><br><h3>Ports</h3><table class='table'>";
        $html.= "<tr><th>DP Port</th><th>FH ID</th><th>Splitter</th></tr>";
        if(count($fhs)>0){
            foreach($fhs as $fh){
                
                $html.="<tr><td>".$fh->dp_port."</td><td>".$fh->generate_fh_id."</td><td>".$fh->splitter."</td></tr>";
            }
        }else{
            $html.= "<tr><td colspan='4'>No Data Found</td></tr>";
        }
        $html.= "</table>";

        
        
        return $html;
    }
    /**
     * getDPData this method for getting dp data by olt id.
     */
    public function getDPData($id)
    {
        
        $list = \App\DP::where('olt_id',$id)->pluck('generate_dp as name', 'id');
                      
        $html = "<option value=''>-- Select DP --</option>";
        foreach($list as $k=>$val){
            $html.="<option value='".$k."'>".$val."</option>";
        }

        return $html;
    }

    public function get_enclosers($product)
    {
       
        $getdata=\App\StockProducts::where('product',$product)->select('serial_no')->get();
       // print_r($getdata);die;

        $html = "<option value=''>-- Select Sub Distributor --</option>";
        foreach($getdata as $d){
            $html.="<option value='".$d->serial_no."'>".$d->serial_no."</option>";
        }

        return $html;
    }
    
}
