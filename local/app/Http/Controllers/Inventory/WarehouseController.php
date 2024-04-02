<?php

namespace App\Http\Controllers\Inventory;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class WarehouseController extends Controller
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
        $data = \App\Warehouses::leftJoin('slj_cities','slj_warehouses.city', '=', 'slj_cities.id')->select('slj_warehouses.*','slj_cities.name as city_name')->orderBy('warehouse_name')->paginate(20);
		return view('inventory.warehouses.index',['data'=>$data]);
    }
	
	/**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
		$items = \App\City::where('status','Y')->pluck('name', 'id');
		
		return view('inventory.warehouses.create',['items'=>$items]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
			'name' => 'required',
            'city' => 'required',
			'address' => 'required',
			//'long_lat' => 'required',
            //'rent' => 'required',
            //'mobile' => 'required'
		]);
		
		$input = request()->all();

        //$userdata = \App\User::where('email',$input['email'])->first();
        //echo "<pre>";print_r($userdata->id); exit;

        //Assign Role
        if(!empty($input['long_lat'])){
            $lat_long = explode(",",$input['long_lat']);
            $input['latitude'] = $lat_long[0];
            $input['longitude'] = $lat_long[1];
        }
        $input['warehouse_name'] = $input['name'];
        $input['status'] = "Y";
        
        //echo "<pre>"; printf($input); exit;
        \App\Warehouses::create($input);

        return redirect('admin/inventory/warehouse')->with('success', 'Warehouse created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('inventory.warehouses.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $details = \App\Warehouses::where('slj_warehouses.id',$id)->first();
		$items = \App\City::where('status','Y')->pluck('name', 'id');
		$details->latitude=$details->latitude.','.$details->longitude;
		return view('inventory.warehouses.edit',['items'=>$items, 'details'=>$details]); 
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $warehouse = \App\Warehouses::find($id);
        $userid = $warehouse->user_id;

        $validatedData = $request->validate([
			'warehouse_name' => 'required',
            'city' => 'required',
            //'office_address' => 'required',
            //'long_lat' => 'required',
            //'rent' => 'required',
            //'email' => 'required|unique:users,email,'.$userid,
            //'mobile' => 'required'
		]);
		
		$requestdata = $request->all(); 

        $data = array();
		$data['warehouse_name'] = $requestdata['warehouse_name'];
		$data['city'] = $requestdata['city'];
		$data['address'] = $requestdata['address'];
                if(!empty($requestdata['latitude'])){
            $lat_long = explode(",",$requestdata['latitude']);
            $data['latitude'] = $lat_long[0];
            $data['longitude'] = $lat_long[1];
        }
        //$data['latitude'] = $requestdata['latitude'];
        //$data['longitude'] = $requestdata['longitude'];
        $data['description'] = $requestdata['description'];
        
        //Update details
		$warehouse->update($data);

        
		return redirect('admin/inventory/warehouse')->with('success', 'Warehouse details updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $branches = \App\Branches::where('distributor_id',$id)->count();
        
        if($id > 0 && $branches == 0){
            $distributor = \App\Distributors::find($id);
            \App\Distributors::destroy($id);
            if($distributor->user_id > 0){
                $user = \App\User::find($distributor->user_id);
                \App\User::destroy($distributor->user_id); //remove user
                
                if(!empty($user->roles->first()) && count($user->roles->first())>0){
                    $user->removeRole($user->roles->first()); //remove role from user
                }
                
                if(!empty($user->permissions) && count($user->permissions)>0){
                    $user->revokePermissionTo($user->permissions); //remove permissions from user
                }
            }

            return redirect('admin/distributors')->with('success', 'Distributor deleted successfully.');
        }else{
            return redirect('admin/distributors')->with('error', 'Distributor cannot be deleted because of dependency');
        }
    }

}
