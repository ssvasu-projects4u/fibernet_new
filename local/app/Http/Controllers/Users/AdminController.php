<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function profile()
    {
        $id = Auth::user()->id; 
        //if($id <=0){return redirect('/');}

        $userdetails = \App\User::find($id);


        //echo "<pre>"; print_r($userroles); exit;

        return view('users.admin.profile',['userdetails'=>$userdetails]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function updateProfile (Request $request)
    {
        $id = Auth::user()->id; 
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $requestdata = $request->all(); 
        $data['name'] = $requestdata['name'];
        $data['first_name'] = $requestdata['name'];
        $data['email'] = $requestdata['email'];
        
        //Update details
        $user = \App\User::find($id);
        $user->update($data);

        return redirect('admin/profile')->with('success', 'Profile details updated successfully.');
    }


    
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Response
     */
    public function updateChangePassword (Request $request)
    {
        $user_id = Auth::user()->id; 
        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed|min:8',
			'password_confirmation' => 'required',
        ]);

        $requestdata = $request->all(); 
        //$data['oldpassword'] = $requestdata['oldpassword'];
        
        //Update details
        
        $current_password = Auth::User()->password;           
        if(Hash::check($requestdata['oldpassword'], $current_password))
        {           
            $obj_user = \App\User::find($user_id);
            $obj_user->password = Hash::make($requestdata['password']);;
            $obj_user->save(); 
            return redirect()->back()->with('success', 'Password updated successfully.');
        }
        else
        {           
            //return redirect('admin/changepassword')->withErrors('oldpassword.required', 'Failed - Invalid Old Password.');  
            return redirect()->back()->with("error","Invalid old password.");
        }

        
    }
}
