<?php

namespace App\Http\Controllers\Complaints;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use DB;

class ComplaintTypesController extends Controller
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
        $data = \App\ComplaintType::join('slj_connection_types','slj_complaint_types.connection_type', '=', 'slj_connection_types.id')->select('slj_complaint_types.id','slj_complaint_types.title','slj_complaint_types.description','slj_connection_types.title as connection_type')->orderBy('slj_complaint_types.title')->paginate(20);

		return view('complaints.complaint-types.index',['data'=>$data]);
    }
	
	/**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $items = \App\ConnectionType::pluck('title', 'id');
		
		return view('complaints.complaint-types.create',['items'=>$items]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
			'title' => 'required',
			'connection_type' => 'required'
		]);
		
		
		$input = request()->all();
        
		\App\ComplaintType::create($input);

        return redirect('admin/complaint-types')->with('success', 'Complaint Type Created Successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('complaints.complaint-types.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $complainttypedetails = \App\ComplaintType::find($id);
		$items = \App\ConnectionType::pluck('title', 'id');
		
		return view('complaints.complaint-types.edit',['items'=>$items, 'complainttypedetails'=>$complainttypedetails]);
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
			'title' => 'required',
			'connection_type' => 'required'
		]);
		
		$requestdata = $request->all(); 
		
		$data['title'] = $requestdata['title'];
		$data['connection_type'] = $requestdata['connection_type'];
		$data['description'] = $requestdata['description'];
        $complainttype = \App\ComplaintType::find($id);
		
		//Update details
		$complainttype->update($data);
		
		return redirect('admin/complaint-types')->with('success', 'Complaint Type Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $employees = \App\Employees::where('designation',$id)->count();
        
        if($id > 0 && $employees == 0){
            \App\Designations::destroy($id);
             return redirect('admin/complaint-types')->with('success', 'Designation deleted successfully.');
        }else{
            return redirect('admin/complaint-types')->with('error', 'Designation cannot be deleted because of dependency');
        }
    }
	
	public function getSubComplaintTypes($type)
    {
        $subcomplainttypes = \App\ComplaintType::join('slj_connection_types','slj_complaint_types.connection_type', '=', 'slj_connection_types.id')->where('slj_connection_types.title',ucfirst($type))->select('slj_complaint_types.id','slj_complaint_types.title')->get();

        $html = "<option value=''> --Select Complaint Type-- </option>";
        foreach($subcomplainttypes as $subcomplainttype){
            $html.="<option value='".$subcomplainttype->id."'>".$subcomplainttype->title."</option>";
        }
		echo $html; exit;

        return $html;
    }

}
