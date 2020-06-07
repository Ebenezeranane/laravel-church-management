<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Service;
use App\Admin;
use App\Members;

class ViewServicesController extends Controller
{
    /**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
      
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
		$members = Members::all();
		$admins = Admin::all();
		$services = Service::all();
		return view('members-groups.view_services')->with('services', $services)->with('admins',$admins)->with('members',$members);
	}
}
