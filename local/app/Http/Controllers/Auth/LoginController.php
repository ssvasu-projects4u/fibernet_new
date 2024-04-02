<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
         $this->username = $this->findUsername();
    }
  public function findUsername()
    {
        $login = request()->input('login');
 
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
 
        request()->merge([$fieldType => $login]);
 
        return $fieldType;
    }
 
    /**
     * Get username property.
     *
     * @return string
     */
    public function username()
    {
        return $this->username;
    }
	public function authenticated(Request $request, $user)
    {
		// User role
        $roles = Auth::user()->getRoleNames();
        
        //$roleName = 'user';
        //foreach($roles as $role){
          // $roleName = $role;
        //}
        $userdetails1 = \App\User::find($user);
        
        //Update Last Login Details
        $userid = Auth::user()->id; 
        $userdetails = \App\User::find($userid);
        $data['last_login'] = date("Y-m-d H:i:s");
        $userdetails->update($data);
		
		//Role Name
		$role = $roles[0];
		
		  $usernameinput = $request->input('username');
        $password = $request->input('password');
        $field = filter_var($usernameinput, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

       // if (Auth::attempt([$field => $usernameinput, 'password' => $password])) {
            //return redirect()->intended('/admin/dashboard');
     //   } else {
       //     return $this->sendFailedLoginResponse($request);
        //}
		
        //Check user role
        switch ($role) {
            case 'superadmin':
                if($request->usertype == 'superadmin' || $request->usertype == 'common'){
					return redirect('/admin/dashboard');
				}else
				{
					Auth::logout();
					return redirect()->back()->withErrors(['', 'Invalid Login Credentials !']);
				}
                break;
            case 'customer':
				if($request->usertype == 'customer' || $request->usertype == 'common'){
					return redirect('/customer/dashboard');
				}else
				{
					Auth::logout();
					return redirect()->back()->withErrors(['', 'Invalid Login Credentials !']);
				}
                break; 
			case 'franchise':
				if($request->usertype == 'franchise' || $request->usertype == 'common'){
					return redirect('/franchise/dashboard');
				}else
				{
					Auth::logout();
					return redirect()->back()->withErrors(['', 'Invalid Login Credentials !']);
				}
                break; 
			case 'branch':
				if($request->usertype == 'branch' || $request->usertype == 'common'){
					return redirect('/branch/dashboard');
				}else
				{
					Auth::logout();
					return redirect()->back()->withErrors(['', 'Invalid Login Credentials !']);
				}
                break; 
			case 'distributor':
				if($request->usertype == 'distributor' || $request->usertype == 'common'){
					return redirect('/distributor/dashboard');
				}else
				{
					Auth::logout();
					return redirect()->back()->withErrors(['', 'Invalid Login Credentials !']);
				}
                break;	
            default:
                return redirect('/admin/dashboard');
                break;
        }
		
		return redirect('/home');
	}
	
	public function redirectTo(){
        
        // User role
        $roles = Auth::user()->getRoleNames();
        
        //$role = isset($roles[0])?$roles[0]:'user';
		$role = $roles[0];
		
        //Update Last Login Details
        $userid = Auth::user()->id; 
        $userdetails = \App\User::find($userid);
        $data['last_login'] = date("Y-m-d H:i:s");
        $userdetails->update($data);

        //Check user role
        switch ($role) {
            case 'superadmin':
                    return '/admin/dashboard';
                break;
            case 'customer':
                    return '/customer/dashboard';
                break; 
			case 'franchise':
                    return '/franchise/dashboard';
                break; 
			case 'branch':
                    return '/branch/dashboard';
                break; 
			case 'distributor':
                    return '/distributor/dashboard';
                break;	
            default:
                    return '/home'; 
            
        }
    }
    
}
