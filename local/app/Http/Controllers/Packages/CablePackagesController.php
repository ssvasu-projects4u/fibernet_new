<?php

namespace App\Http\Controllers\Packages;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;

class CablePackagesController extends Controller
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
		$data = \App\CablePackages::where('status','Y')->where('type','packages')->orderBy('id')->paginate(20);
        return view('packages.cable-packages.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $items = \App\CablePackages::where('type','allacart')->select('package_name as name', 'id')->orderBy('name')->get();

        return view('packages.cable-packages.create',['items'=>$items]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
			'package_name' => 'required',
            'price' => 'required',
            'gst' => 'required',
            'total_amount' => 'required'
		]);
		
		
		$input = request()->all();
		$input['type'] = "packages";
        
		//echo "<pre>"; print_r($input); exit;

        $channels_description = '';
        if(isset($input['channels']) && count($input['channels'])>0){
           $channels_description = implode(",",$input['channels']);
        }
        $input['channels_description'] = $channels_description;

		\App\CablePackages.create($input);

        return redirect('admin/cable-packages/packages')->with('success', 'Packages - Cable Package created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('packages.cable-packages.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $cablepackagesdetails = \App\CablePackages::where('type','packages')->find($id);
		
        $items = \App\CablePackages::where('type','allacart')->select('package_name as name', 'id')->orderBy('name')->get();

		return view('packages.cable-packages.edit',['cablepackagesdetails'=>$cablepackagesdetails,'items'=>$items]);
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
            'price' => 'required',
            'gst' => 'required',
            'total_amount' => 'required'
		]);
		
		$requestdata = $request->all(); 

        $data['package_name'] = $requestdata['package_name'];
        $data['price'] = $requestdata['price'];
		$data['gst'] = $requestdata['gst'];
		$data['total_amount'] = $requestdata['total_amount'];
        
        $channels_description = '';
        if(isset($requestdata['channels']) && count($requestdata['channels'])>0){
           $channels_description = implode(",",$requestdata['channels']);
        }
        $data['channels_description'] = $channels_description;

        //$data['distributor_share'] = $requestdata['distributor_share'];
        $data['franchise_share'] = $requestdata['franchise_share'];
		
		//Update details
		$cablepackages = \App\CablePackages::find($id);
		$cablepackages->update($data);
		
		return redirect('admin/cable-packages/packages')->with('success', 'Packages Cable Package details updated successfully.');
    }
	
	
	/**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $data = array();
        $data['status'] = "D";

        $cable = \App\CablePackages::find($id);
        $cable->update($data);

        return redirect('admin/cable-packages/packages')->with('success', 'Cable details deleted successfully.');
    }

}
