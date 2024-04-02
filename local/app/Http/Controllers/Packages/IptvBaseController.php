<?php

namespace App\Http\Controllers\Packages;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;

class IptvBaseController extends Controller
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
		$data = \App\IptvPackages::orderBy('package_name')->where('type','base')->paginate(20);
		return view('packages.iptv-base.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('packages.iptv-base.create');
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
		$input['type'] = "base";
        //$input['package_name'] = "Base Plan";
		
		//echo "<pre>"; print_r($input); exit;

		\App\IptvPackages::create($input);

        return redirect('admin/iptv/base')->with('success', 'Base - IPTV Package created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('packages.iptv-base.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $iptvbasedetails = \App\IptvPackages::find($id);
		
		return view('packages.iptv-base.edit',['iptvbasedetails'=>$iptvbasedetails]);
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

        $data['distributor_share'] = $requestdata['distributor_share'];
        $data['franchise_share'] = $requestdata['franchise_share'];
		
		//Update details
		$iptvpackages = \App\IptvPackages::find($id);
		$iptvpackages->update($data);
		
		return redirect('admin/iptv/base')->with('success', 'Base IPTV Package details updated successfully.');
    }
	
	
	/**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $customers = \App\Customers::where('connection_type','iptv')->count();
        if($id > 0 && $customers == 0){
            \App\IptvPackages::destroy($id);
             return redirect('admin/iptv/base')->with('success', 'IPTV Base deleted successfully.');
        }else{
            return redirect('admin/iptv/base')->with('error', 'IPTV Base cannot be deleted because of dependency');
        } 
    }

}
