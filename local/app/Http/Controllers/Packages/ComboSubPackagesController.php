<?php

namespace App\Http\Controllers\Packages;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;

class ComboSubPackagesController extends Controller
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
    	$data = \App\ComboSubPackages::leftJoin('slj_combo_packages', 'slj_combo_packages.id', '=', 'slj_combo_subpackages.package')
				->select('slj_combo_subpackages.*','slj_combo_packages.*','slj_combo_subpackages.id as subpackageid','slj_combo_subpackages.status as status')->orderBy('package_name')->paginate(20);
		return view('packages.combo-subpackages.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($id)
    {
        $combopackagedetails = \App\ComboPackages::find($id);
        $items = \App\ComboPackages::where('status','Y')->pluck('package_name as name', 'id');
		
		return view('packages.combo-subpackages.create',['items'=>$items,'package'=>$id,'combopackagedetails'=>$combopackagedetails]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request,$id)
    {
        $validatedData = $request->validate([
			'package' => 'required',
			'sub_plan_name' => 'required',
			'price' => 'required',
			'gst' => 'required',
			'total_amount' => 'required',
			'unit_type' => 'required',
			'myFrame' => 'required',
		]);
		
		
		$input = request()->all();

		$sub_plan = array();
		$sub_plan['package'] = $input['package'];
		$sub_plan['sub_plan_name'] = $input['sub_plan_name'];
		$sub_plan['price'] = $input['price'];
		$sub_plan['gst'] = $input['gst'];
		$sub_plan['total'] = $input['total_amount'];
		$sub_plan['unit_type'] = $input['unit_type'];
		$sub_plan['time_unit'] = $input['myFrame'];
		$sub_plan['package_selection'] = $input['package_selection'];
		$sub_plan['distributor_share'] = $input['distributor_share'];
		$sub_plan['franchise_share'] = $input['franchise_share'];
		$sub_plan['status'] = $input['status'];
		$sub_plan['short_description'] = $input['short_description'];
		
		//echo "<pre>"; print_r($sub_plan); exit;

		\App\ComboSubPackages::create($sub_plan);
		
        return redirect('admin/combo-packages/edit/'.$input['package']."#package_subplans")->with('success', 'Combo Sub Package created successfully.');
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
        $combosubpackagedetails = \App\ComboSubPackages::find($id);
		$items = \App\ComboPackages::pluck('package_name as name', 'id');

		$combopackagedetails = \App\ComboPackages::find($combosubpackagedetails->package);
		
		return view('packages.combo-subpackages.edit',['items'=>$items, 'combosubpackagedetails'=>$combosubpackagedetails,'combopackagedetails'=>$combopackagedetails]);
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
			'package' => 'required',
			'sub_plan_name' => 'required',
			'price' => 'required',
			'gst' => 'required',
			'total' => 'required',
			'unit_type' => 'required',
			'time_unit' => 'required',
		]);


        $input = request()->all();

		$sub_plan = array();
		$sub_plan['package'] = $input['package'];
		$sub_plan['sub_plan_name'] = $input['sub_plan_name'];
		$sub_plan['price'] = $input['price'];
		$sub_plan['gst'] = $input['gst'];
		$sub_plan['total'] = $input['total'];
		$sub_plan['unit_type'] = $input['unit_type'];
		$sub_plan['time_unit'] = $input['time_unit'];
		$sub_plan['package_selection'] = $input['package_selection'];
		$sub_plan['distributor_share'] = $input['distributor_share'];
		$sub_plan['franchise_share'] = $input['franchise_share'];
		$sub_plan['status'] = $input['status'];
		$sub_plan['short_description'] = $input['short_description'];
		
		//echo "<pre>"; print_r($sub_plan); exit;

		//\App\BroadbandSubPackages::create($sub_plan);

		//Update details
		$subpackage = \App\ComboSubPackages::find($id);
		$subpackage->update($sub_plan);
		
        return redirect('admin/combo-packages/edit/'.$input['package']."#package_subplans")->with('success', 'Combo Sub Package updated successfully.');
    }
	
	
	/**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $customers = \App\Customers::where('sub_package',$id)->count();
        
        if($id > 0 && $customers == 0){
            \App\ComboSubPackages::destroy($id);
            
            return redirect('admin/combo-sub-packages')->with('success', 'Sub Package deleted successfully.');
        }else{
            return redirect('admin/combo-sub-packages')->with('error', 'Sub Package cannot be deleted because of dependency');
        }
    }



}
