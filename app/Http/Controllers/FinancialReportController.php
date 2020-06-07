<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\Income;
use App\Admin;
use App\Members;

class FinancialReportController extends Controller
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
		$expenses= Expense::all();
		$incomes = Income::all();
		$admins = Admin::all();
		return view('members-groups.view_financial_report')->with('expenses',$expenses)->with('incomes',$incomes)->with('admins',$admins)->with('members',$members);;
}
}
