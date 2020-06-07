<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Admin;
use App\Members;

class ServiceController extends Controller
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
        return view('members-groups.add_service')->with('admins',$admins)->with('members',$members);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function store(Request $request)
    {
        //validate the user form data 
        $request->validate([
              'Title'=>'required',  
              'type'=>'required',
              'date'=> 'required',
              'venue'=> 'required',
              'address'=>'required',          
              'preacher'=>'required',
              'sermon_title'=>'required', 
              'bible_references'=>'required',
              'givings'=> 'required',
              'attendees'=> 'required',
              'sermon_notes'=> 'required',
              'first_timers'=>'required|nullable',
               ]);

       




        //inserting data into the database 
        $services = new Service();
        $services->Title = $request->input('Title');
        $services->type = $request->input('type');
        $services->date = $request->input('date');

        $services->venue = $request->input('venue');
        $services->address = $request->input('address');

        $services->preacher = $request->input('preacher');
       
        $services->sermon_title = $request->input('sermon_title');
       
        $services->bible_references = $request->input('bible_references');
 
        $services->sermon_notes = $request->input('sermon_notes');
         $services->attendees = $request->input('attendees');
       $services->first_timers= $request->input('first_timers');
        $services->givings = $request->input('givings');
       
       
      

        
        $services->save();

        //redirecting to the user dashboard after creating a new service
        return redirect('/admin');
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
        $admins = Admin::all();;
        $service  = Service::find($id);
        return view('members-groups.edit_service')->with('service',$service)->with('admins',$admins)->with('members',$members);
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
              'Title'=>'required',  
              'type'=>'required',
              'date'=> 'required',
              'venue'=> 'required',
              'address'=>'required',          
              'preacher'=>'required',
              'sermon_title'=>'required', 
              'bible_references'=>'required',
              'givings'=> 'required',
              'attendees'=> 'required',
              'sermon_notes'=> 'required',
              'first_timers'=>'required|nullable',
               ]);

       




        //inserting data into the database 
        $services = Service::find($id);
        $services->Title = $request->input('Title');
        $services->type = $request->input('type');
        $services->date = $request->input('date');

        $services->venue = $request->input('venue');
        $services->address = $request->input('address');

        $services->preacher = $request->input('preacher');
       
        $services->sermon_title = $request->input('sermon_title');
       
        $services->bible_references = $request->input('bible_references');
 
        $services->sermon_notes = $request->input('sermon_notes');
         $services->attendees = $request->input('attendees');
       $services->first_timers= $request->input('first_timers');
        $services->givings = $request->input('givings');
       
       
      

        
        $services->save();

        //redirecting to the user dashboard after creating a new service
        return redirect('/admin/services/view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = Service::find($id);
        $services->delete();

        return redirect('/admin/services/view');
    }
}
