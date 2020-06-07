<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Members;
use App\Admin;

class ViewMembersController extends Controller
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
		return view('members-groups.view_members')->with('members', $members)->with('admins',$admins);
	}
}
