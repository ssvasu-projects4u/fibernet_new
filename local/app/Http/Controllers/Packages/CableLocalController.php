<?php

namespace App\Http\Controllers\Packages;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;

class CableLocalController extends Controller
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
		$data = \App\CablePackages::orderBy('package_name')->where('type','local')->paginate(20);
		return view('packages.cable-local.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('packages.cable-local.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
			'price' => 'required',
            'gst' => 'required',
            'total_amount' => 'required'
		]);
		
		
		$input = request()->all();
		$input['type'] = "local";
        //$input['package_name'] = "Local";
		
		//echo "<pre>"; print_r($input); exit;

		\App\CablePackages::create($input);

        return redirect('admin/cable-packages/local')->with('success', 'Local - Cable Package created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('packages.cable-local.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $cablelocaldetails = \App\CablePackages::find($id);
		
		return view('packages.cable-local.edit',['cablelocaldetails'=>$cablelocaldetails]);
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
			'price' => 'required',
            'gst' => 'required',
            'total_amount' => 'required'
		]);
		
		$requestdata = $request->all(); 

        $data['package_name'] = $requestdata['package_name'];
        $data['price'] = $requestdata['price'];
		$data['gst'] = $requestdata['gst'];
		$data['total_amount'] = $requestdata['total_amount'];
        $data['channels_description'] = $requestdata['channels_description'];
        
        //$data['distributor_share'] = $requestdata['distributor_share'];
        $data['franchise_share'] = $requestdata['franchise_share'];
		
		//Update details
		$cablepackages = \App\CablePackages::find($id);
		$cablepackages->update($data);
		
		return redirect('admin/cable-packages/local')->with('success', 'Local Cable Package details updated successfully.');
    }
	
	
	/**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
