<?php

namespace App\Http\Controllers\Packages;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;

class BroadbandController extends Controller
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
    	$data = \App\BroadbandPackages::orderBy('package_name')->paginate(20);
		return view('packages.broadband.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        //Select only Fallback Plans
        $items = \App\BroadbandPackages::where('status','Y')->where('package_type','fall back plan')->pluck('package_name as name', 'id');
		
		return view('packages.broadband.create',['items'=>$items]);
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


		$broadbandpackage = \App\BroadbandPackages::create($input);
		//echo $broadbandpackage->id;
		//exit;

		

        return redirect('admin/broadband-packages')->with('success', 'Broadband Package created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('packages.broadband.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $broadbandpackagedetails = \App\BroadbandPackages::find($id);
		
		//Select only Fallback Plans
        $items = \App\BroadbandPackages::where('status','Y')->where('package_type','fall back plan')->pluck('package_name as name', 'id');

		$broadbandsubplans = \App\BroadbandSubPackages::where('package',$id)->get();

		return view('packages.broadband.edit',['items'=>$items, 'broadbandpackagedetails'=>$broadbandpackagedetails,'broadbandsubplans'=>$broadbandsubplans]);
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
		
		// $data['distributor_share'] = $requestdata['distributor_share'];
  		// $data['franchise_share'] = $requestdata['franchise_share'];
		
		//Update details
		$broadband = \App\BroadbandPackages::find($id);
		$broadband->update($requestdata);
		
		return redirect('admin/broadband-packages')->with('success', 'Broadband Package details updated successfully.');
    }
	
	
	/**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $customers = \App\Customers::where('package',$id)->count();
        
        $subpackages = \App\BroadbandSubPackages::where('package',$id)->count();
        
        if($id > 0 && $customers == 0 && $subpackages == 0){
            \App\BroadbandPackages::destroy($id);
            
            return redirect('admin/broadband-packages')->with('success', 'Package deleted successfully.');
        }else{
            return redirect('admin/broadband-packages')->with('error', 'Package cannot be deleted because of dependency');
        }
    }



	/**
     * Display a listing of the resource.
     * @return Response
     */
    public function subPackages()
    {	
		$data = \App\BroadbandPackages::orderBy('package_name')->paginate(20);
		return view('packages.broadband.index',['data'=>$data]);
    }



}
