<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group_Unit;
use App\Admin;
use App\Members;

class GroupUnitsController extends Controller
{

	 public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $members = Members::all();
        $admins = Admin::all();
        return view('members-groups.add_group_unit')->with('admins',$admins)->with('members',$members);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {	

          //validate the user form data 
        $request->validate([
        'group_units'=>'required',  
        'members'=>'required',
        'head'=> 'required',
    ]);

         //inserting data into the database 
        $group_units = new Group_Unit();
        $group_units->group_units = $request->input('group_units');
        $group_units->members = $request->input('members');
         $group_units->head = $request->input('head');
         $group_units->save();

         return redirect('/admin/group-units/view');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $members = Members::all(); 
        $admins = Admin::all();
        $group_units = Group_Unit::find($id);
        

        return view('members-groups.edit_group_unit')->with('group_units',$group_units)->with('admins',$admins)->with('members',$members);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
          //validate the user form data 
        $request->validate([
        'group_units'=>'required',  
        'members'=>'required',
        'head'=> 'required',
    ]);

         //inserting data into the database 
        $group_units = Group_Unit::find($id);
        $group_units->group_units= $request->input('group_units');
        $group_units->members = $request->input('members');
         $group_units->head = $request->input('head');
         $group_units->save();

         return redirect('/admin/group-units/view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group_units = Group_Unit::find($id);
        $group_units->delete();

        return redirect('/admin/group-units/view');
    }
}
