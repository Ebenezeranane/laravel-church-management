<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use App\Expense;
use App\Admin;
use App\Members;


class IncomeController extends Controller
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
        $admins =  Admin::all();
        $members = Members::all();

        return view('members-groups.add_expense_income')->with('admins',$admins)->with('members',$members);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //validate form data 
        $request->validate([
        'income_title'=>'required',  
        'income_amount'=>'required',
        'income_date'=> 'required',
        'expense_title'=>'required',
        'expense_amount'=>'required',
        'expense_date'=> 'required'
    ]);

         //inserting data into the database 
        $income = new Income();
        $income->income_title = $request->input('income_title');
        $income->income_amount = $request->input('income_amount');
        $income->income_date = $request->input('income_date');
         $income->save();

        $expense = new Expense();
        $expense->expense_title = $request->input('expense_title');
        $expense->expense_amount = $request->input('expense_amount');
        $expense->expense_date = $request->input('expense_date');
        $expense->save();


        

         return redirect('/admin/finance/income-expenses/view');
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
       $income = Income::find($id);
       $admins = Admin::all();
        return view('members-groups.edit_income')->with('income',$income)->with('admins',$admins)->with('members',$members); 
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
           //validate form data 
        $request->validate([
        'income_title'=>'required',  
        'income_amount'=>'required',
        'income_date'=> 'required'
       
    ]);

          //inserting data into the database 
        $income =  Income::find($id);
        $income->income_title = $request->input('income_title');
        $income->income_amount = $request->input('income_amount');
        $income->income_date = $request->input('income_date');
         $income->save();


         return redirect('admin/finance/income-expenses/view');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $income = Income::find($id);
        $income->delete();

        return redirect('/admin/finance/income-expenses/view');
    }
}
