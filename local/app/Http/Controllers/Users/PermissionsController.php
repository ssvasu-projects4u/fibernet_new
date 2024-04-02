<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
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
        $data = Permission::orderBy('category')->orderBy('display_name')->paginate(20);
		return view('users.permissions.index',['data'=>$data]);
    }
	
	/**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('users.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:permissions',
            'display_name' => 'required'
		]);

        $input = request()->all();
        $input['status'] = 'Y';
 		Permission::create($input);

        return redirect('admin/permissions')->with('success', 'Permission created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('users.permissions.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $permissiondetails = Permission::find($id);
        $subCategories = Permission::where("category", $permissiondetails->category)
          ->where("is_sub_category", 1)
          ->where("status", "Y")->pluck('display_name', 'display_name')->toArray();
		return view('users.permissions.edit',['permissiondetails'=>$permissiondetails, 'subCategories' => $subCategories]);
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
            'name' => 'required|unique:permissions,name,'.$id,
            'display_name' => 'required'
		]);

		$requestdata = $request->all(); 

        $data['name'] = $requestdata['name'];
        $data['display_name'] = $requestdata['display_name'];
        $data['category'] = $requestdata['category'];
        $data['status'] = 'Y';

        if (isset($requestdata['sub_category'])) {
            $data['sub_category'] = $requestdata['sub_category'];
        }

        if (isset($requestdata['is_sub_category']) && $requestdata['is_sub_category'] == 1 ) {
            $data['is_sub_category'] = 1;
            $data['sub_category'] = "";           
        } else {
            $data['is_sub_category'] = 0;
        }
        $permission = Permission::find($id);        
		//Update details
		$permission->update($data);
		return redirect('admin/permissions')->with('success', 'Permission updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //Permission::destroy($id);
        $data = array();
        $data['status'] = "D";

        $permission = Permission::find($id);
        $permission->update($data);

        return redirect('admin/permissions')->with('success', 'Permission deleted successfully.');
    }

    public function subCategory($selectedCategory) {
        $permissiondetails = Permission::where("category", $selectedCategory)
          ->where("is_sub_category", 1)
          ->where("status", "Y")->get();
        $html = "<option value=''>-- Select Sub Category --</option>";
        if (!empty($permissiondetails)) {
            foreach($permissiondetails as $permissiondetail) {
                $html.="<option value='".$permissiondetail->display_name."'>".$permissiondetail->display_name."</option>";
            }
        }
        return $html;
    }
}
