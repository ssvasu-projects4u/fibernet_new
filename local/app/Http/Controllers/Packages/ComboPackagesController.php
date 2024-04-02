<?php

namespace App\Http\Controllers\Packages;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;

class ComboPackagesController extends Controller
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
    	$data = \App\ComboPackages::orderBy('package_name')->paginate(20);
		
		return view('packages.combo.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $packages = \App\BroadbandPackages::where('status','Y')->pluck('package_name as name', 'id');
		$cabledata = \App\CablePackages::where('status','Y')->select('package_name as name', 'id','type')->get();
		
		$cabledatabytype = array();
		foreach($cabledata as $cable){
			$data = array();
			$data['id'] = $cable['id'];
			$data['name'] = $cable['name'];
			$type = $cable['type'];
			$cabledatabytype[$type][] = $data;
		}	
		
		
		$iptvdata = \App\IptvPackages::where('status','Y')->select('package_name as name', 'id','type')->get();
		$iptvdatabytype = array();
		foreach($iptvdata as $iptv){
			$data = array();
			$data['id'] = $iptv['id'];
			$data['name'] = $iptv['name'];
			$type = $iptv['type'];
			$iptvdatabytype[$type][] = $data;
		}
		
		return view('packages.combo.create',['packages'=>$packages,'cabledatabytype'=>$cabledatabytype,'iptvdatabytype'=>$iptvdatabytype]);
		
		
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
			'package_name' => 'required'
		]);
		
		$input = request()->all();
		
		
		//echo "<pre>"; print_r($input); exit;
		
		if($input['connection_type'] == 'cable'){
            if(isset($input['cablepackage']) && count($input['cablepackage'])>0){
                $input['cable_packages'] = implode(",",$input['cablepackage']);
            }

            if(isset($input['cableallacart']) && count($input['cableallacart'])>0){
                $input['cable_allacart'] = implode(",",$input['cableallacart']);
            }
			
			if(isset($input['cablelocal']) && count($input['cablelocal'])>0){
                $input['cable_local'] = implode(",",$input['cablelocal']);
            }
			
			if(isset($input['cablebase']) && count($input['cablebase'])>0){
                $input['cable_base'] = implode(",",$input['cablebase']);
            }
			
        }else if($input['connection_type'] == 'iptv'){
            if(isset($input['iptvpackage']) && count($input['iptvpackage'])>0){
                $input['iptv_packages'] = implode(",",$input['iptvpackage']);
            }

            if(isset($input['iptvallacart']) && count($input['iptvallacart'])>0){
                $input['iptv_allacart'] = implode(",",$input['iptvallacart']);
            }
			
			if(isset($input['iptvlocal']) && count($input['iptvlocal'])>0){
                $input['iptv_local'] = implode(",",$input['iptvlocal']);
            }
			
			if(isset($input['iptvbase']) && count($input['iptvbase'])>0){
                $input['iptv_base'] = implode(",",$input['iptvbase']);
            }
			
        }
		
		$input['broadband_package'] = $input['package'];
		$input['status'] = "Y";
		
		$broadbandpackage = \App\ComboPackages::create($input);
		
        return redirect('admin/combo-packages')->with('success', 'Combo Package created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('packages.combo.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $combopackagedetails = \App\ComboPackages::find($id);
		
		$combosubplans = \App\ComboSubPackages::where('package',$id)->get();
		
		$packages = \App\BroadbandPackages::where('status','Y')->pluck('package_name as name', 'id');
        
		$cabledata = \App\CablePackages::where('status','Y')->select('package_name as name', 'id','type')->get();
		
		$cabledatabytype = array();
		foreach($cabledata as $cable){
			$data = array();
			$data['id'] = $cable['id'];
			$data['name'] = $cable['name'];
			$type = $cable['type'];
			$cabledatabytype[$type][] = $data;
		}	
		
		
		$iptvdata = \App\IptvPackages::where('status','Y')->select('package_name as name', 'id','type')->get();
		$iptvdatabytype = array();
		foreach($iptvdata as $iptv){
			$data = array();
			$data['id'] = $iptv['id'];
			$data['name'] = $iptv['name'];
			$type = $iptv['type'];
			$iptvdatabytype[$type][] = $data;
		}

		return view('packages.combo.edit',['packages'=>$packages,'combosubplans'=>$combosubplans, 'combopackagedetails'=>$combopackagedetails,'cabledatabytype'=>$cabledatabytype,'iptvdatabytype'=>$iptvdatabytype]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
       $validatedData = $request->validate([
			'package_name' => 'required',
			
		]);
		
		
		
		$requestdata = $request->all(); 
		//echo "<pre>";print_r($requestdata); exit;
		
		if($requestdata['connection_type'] == 'cable'){
            if(isset($requestdata['cablepackage']) && count($requestdata['cablepackage'])>0){
                $requestdata['cable_packages'] = implode(",",$requestdata['cablepackage']);
            }else{
			    $requestdata['cable_packages'] = '';	
			}	

            if(isset($requestdata['cableallacart']) && count($requestdata['cableallacart'])>0){
                $requestdata['cable_allacart'] = implode(",",$requestdata['cableallacart']);
            }else{
			    $requestdata['cable_allacart'] = '';	
			}
			
			if(isset($requestdata['cablelocal']) && count($requestdata['cablelocal'])>0){
                $requestdata['cable_local'] = implode(",",$requestdata['cablelocal']);
            }else{
			    $requestdata['cable_local'] = '';	
			}
			
			if(isset($requestdata['cablebase']) && count($requestdata['cablebase'])>0){
                $requestdata['cable_base'] = implode(",",$requestdata['cablebase']);
            }else{
			    $requestdata['cable_base'] = '';	
			}
			
        }else if($requestdata['connection_type'] == 'iptv'){
            if(isset($requestdata['iptvpackage']) && count($requestdata['iptvpackage'])>0){
                $requestdata['iptv_packages'] = implode(",",$requestdata['iptvpackage']);
            }else{
			    $requestdata['iptv_packages'] = '';	
			}

            if(isset($requestdata['iptvallacart']) && count($requestdata['iptvallacart'])>0){
                $requestdata['iptv_allacart'] = implode(",",$requestdata['iptvallacart']);
            }else{
			    $requestdata['iptv_allacart'] = '';	
			}
			
			if(isset($requestdata['iptvlocal']) && count($requestdata['iptvlocal'])>0){
                $requestdata['iptv_local'] = implode(",",$requestdata['iptvlocal']);
            }else{
			    $requestdata['iptv_local'] = '';	
			}
			
			if(isset($requestdata['iptvbase']) && count($requestdata['iptvbase'])>0){
                $requestdata['iptv_base'] = implode(",",$requestdata['iptvbase']);
            }else{
			    $requestdata['iptv_base'] = '';	
			}
			
        }
		
		//$requestdata['broadband_package'] = $requestdata['package'];
		
		// $data['distributor_share'] = $requestdata['distributor_share'];
  		// $data['franchise_share'] = $requestdata['franchise_share'];
		
		//Update details
		$combo = \App\ComboPackages::find($id);
		$combo->update($requestdata);
		
		return redirect('admin/combo-packages')->with('success', 'Combo Package details updated successfully.');
    }
	
	
	/**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $customers = \App\Customers::where('combo_package',$id)->count();
        
        $subpackages = \App\ComboSubPackages::where('package',$id)->count();
        
        if($id > 0 && $customers == 0 && $subpackages == 0){
            \App\ComboPackages::destroy($id);
            
            return redirect('admin/combo-packages')->with('success', 'Package deleted successfully.');
        }else{
            return redirect('admin/combo-packages')->with('error', 'Package cannot be deleted because of dependency');
        }
    }



	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function subPackages()
    {	
		$data = \App\ComboPackages::orderBy('package_name')->paginate(20);
		return view('packages.combo.index',['data'=>$data]);
    }



}
