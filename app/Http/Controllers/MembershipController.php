<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Members;
use App\Admin;
use Illuminate\Support\Facades\Storage;


class MembershipController extends Controller
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
        // $members = Members::all()->get();

        // return view('members-groups.view-members')->with('members',$members);

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
        return view('members-groups.add_member')->with('admins',$admins)->with('members',$members);
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
              'Title'=>'required',  
              'surname'=>'required',
              'othernames'=> 'required',
              'sex'=>'required',
              'birth_place'=>'required',  
              'marital_status'=>'required',
              'date'=> 'required',
              'e_mail_address'=>'required',
              'address'=>'required',  
              'city_town'=>'required',
              'occupation'=> 'required',
              'telephone'=> 'required',
              'position'=>'required',
              'profile_pic'=>'image|nullable|max:1999'
                        ]);

        //handle the file upload 
        if ($request->hasFile('profile_pic')) {

            $filenamewithExt = $request->file('profile_pic')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
            $ext = $request->file('profile_pic')->getClientOriginalExtension();

            $fileNameToStore =$filename.time().'.'.$ext;

            //upload the image 
            $path =$request->file('profile_pic')->storeAs('public/profile_pics',$fileNameToStore);
            
        }else {
            
            $fileNameToStore ='noimage.jpg';
        }






        //inserting data into the database 
        $members = new Members();
        $members->Title = $request->input('Title');
        $members->surname = $request->input('surname');
         $members->othernames = $request->input('othernames');
        $members->sex = $request->input('sex');
        $members->birth_place = $request->input('birth_place');
        $members->marital_status = $request->input('marital_status');
        $members->profile_pic = $fileNameToStore;
         $members->date_of_birth = $request->input('date');
        $members->telephone = $request->input('telephone');
        $members->e_mail_address = $request->input('e_mail_address');
        $members->address = $request->input('address');
       $members->city_town = $request->input('city_town');
        $members->occupation = $request->input('occupation');
        $members->postion = $request->input('position');
       
      

        
        $members->save();

        //redirecting to the user dashboard after creating a new member
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
        $admins = Admin::all();
        $memberrs = Members::all();
        $members = Members::find($id);
        return view('members-groups.view_member')->with('members',$memberrs)->with('admins',$admins);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $membs = Members::all();
        $admins = Admin::all();
        $members = Members::find($id);
        return view('members-groups.edit_member')->with('members',$members)->with('admins',$admins)->with('membs',$membs);
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
              'surname'=>'required',
              'othernames'=> 'required',
              'sex'=>'required',
              'birth_place'=>'required',  
              'marital_status'=>'required',
              'date'=> 'required',
              'e_mail_address'=>'required',
              'address'=>'required',  
              'city_town'=>'required',
              'occupation'=> 'required',
              'telephone'=> 'required',
              'position'=>'required',
              'profile_pic'=>'image|nullable|max:1999'
                        ]);

        //handle the file upload 
        if ($request->hasFile('profile_pic')) {

            $filenamewithExt = $request->file('profile_pic')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt,PATHINFO_FILENAME);
            $ext = $request->file('profile_pic')->getClientOriginalExtension();

            $fileNameToStore =$filename.time().'.'.$ext;

            //upload the image 
            $path =$request->file('profile_pic')->storeAs('public/profile_pics',$fileNameToStore);
            
        }else {
            
            $fileNameToStore ='noimage.jpg';
        }






        //inserting data into the database 
        $members = Members::find($id);
        $members->Title = $request->input('Title');
        $members->surname = $request->input('surname');
         $members->othernames = $request->input('othernames');
        $members->sex = $request->input('sex');
        $members->birth_place = $request->input('birth_place');
        $members->marital_status = $request->input('marital_status');
        $members->profile_pic = $fileNameToStore;
         $members->date_of_birth = $request->input('date');
        $members->telephone = $request->input('telephone');
        $members->e_mail_address = $request->input('e_mail_address');
        $members->address = $request->input('address');
       $members->city_town = $request->input('city_town');
        $members->occupation = $request->input('occupation');
        $members->postion = $request->input('position');
       
      

        
        $members->save();

        //redirecting to the admin dashboard after creating a new member
        return redirect('/admin/member/view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $members = Members::find($id);
        $members->delete();

        Storage::delete('public/profile_pics'. $members->profile_pics);


        return redirect('/admin/member/view');
    }


  
}
