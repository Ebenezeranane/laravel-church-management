<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Income;
use App\Expense;
use App\Members;

class ViewIncomeExpensesController extends Controller
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
	 // * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index() {
		$members = Members::all();
		$admins = Admin::all();
		$incomes= Income::all();
		$expenses = Expense::all();

		return view('members-groups.view_income_expenses')->with('incomes', $incomes)->with('admins',$admins)->with('expenses',$expenses)->with('members',$members);
	}
}
