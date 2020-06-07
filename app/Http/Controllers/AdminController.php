<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Members;
use App\Group_Unit;
use App\Service;

class AdminController extends Controller
{
    //
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
    public function index()
    {   
        $services = Service::all();
        $group_units = Group_Unit::all();
        $members = Members::all();
        $admins = Admin::all(); 
           return view('admin-dashboard')->with('admins',$admins)->with('members',$members)->with('group_units',$group_units)->with('services',$services);
    }
}
