<?php

namespace App\Http\Controllers\Packages;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;

class CableAllacartController extends Controller
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
		$data = \App\CablePackages::where('type','allacart')->orderBy('package_name')->paginate(25);
		return view('packages.cable-allacart.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('packages.cable-allacart.create');
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
        $input['status'] = "Y";
		$input['type'] = "allacart";
        
		//echo "<pre>"; print_r($input); exit;

		\App\CablePackages::create($input);

        return redirect('admin/cable-packages/allacart')->with('success', 'Allacart - Cable Package created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('packages.cable-allacart.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $cableallacartdetails = \App\CablePackages::where('type','allacart')->find($id);
		
		return view('packages.cable-allacart.edit',['cableallacartdetails'=>$cableallacartdetails]);
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
        $data['channels_description'] = $requestdata['channels_description'];

        //$data['distributor_share'] = $requestdata['distributor_share'];
        $data['franchise_share'] = $requestdata['franchise_share'];
		
		//Update details
		$cablepackages = \App\CablePackages::find($id);
		$cablepackages->update($data);
		
		return redirect('admin/cable-packages/allacart')->with('success', 'Allacart Cable Package details updated successfully.');
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

        return redirect('admin/cable-packages/allacart')->with('success', 'Cable details deleted successfully.');
    }

}
