<?php

namespace App\Http\Controllers;

use App\Models\Labor;
use App\Models\Salary;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function labor()
    {
    	$months = Labor::whereMonth('created_at', Carbon::now()->month)->count();
    	$days = Labor::whereDate('created_at', Carbon::today())->count();
    	$week = Labor::where('created_at','>=',Carbon::today()->subDays(7))->count();
    	$all = Labor::count();
    	return view('report.labor',compact('months','days','week','all'));
    }

    public function project()
    {
    	return view('report.project');
    }

    public function salary()
    {
    	$salarys = DB::table('salary_details')
    	->select(
        	DB::raw('DAY(created_at) as date'),
        	DB::raw('SUM(pay) as sum')
    	)
	    ->groupBy('date')
	    ->get();
    	return view('report.salary',compact('salarys'));
    }
}
