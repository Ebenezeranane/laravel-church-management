<?php

namespace App\Http\Controllers;
use App\Group_Unit;
use App\Admin;
use App\Members;


use Illuminate\Http\Request;

class ViewGroupUnitsController extends Controller
{
     /* Create a new controller instance.
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
		$group_units = Group_Unit::all();
		return view('members-groups.view_group_units')->with('group_units', $group_units)->with('admins',$admins)->with('members',$members);
	}
}
