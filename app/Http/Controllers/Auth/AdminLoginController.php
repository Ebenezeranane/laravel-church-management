<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Route;

class AdminLoginController extends Controller
{
	public function __construct() {
		$this->middleware('guest:admin');
	}


    // ShowLoginForm for admin
    public function ShowLoginForm()
    {

   	return view('auth.admin_login');
    }


	//The admin login
	public function login(Request $request)
	{
		//validate before logging in the admin
		$request->validate([
			'email'=>'required|email',
			'password'=>'required|min:6']);

		
		if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)) {

			//if the login is successful redirect to the intended page
			return redirect()->intended(route('admin.dashboard'));
			
		}
		//if login is unsucessful redirect back to the admin page 
			return redirect()->back()->withInput($request->only('email','remember'));
	} 


	//The admin logout
	public function logout()
	{
		Auth::guard('admin')->logout();
		return redirect('/admin');
	}




}
