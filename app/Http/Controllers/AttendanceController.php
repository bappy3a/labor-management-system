<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Project;
use App\Models\Salary;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $attendances = Attendance::whereDate('date', date('Y-m-d'))->get();
        if (count($attendances) == 0) {
            $projects = Project::whereDate('strat_date','<=', date('Y-m-d'))->whereDate('end_date','>=', date('Y-m-d'))->get();
            foreach ($projects as $project) {
                foreach ($project->projectDetails as $projectDetails) {
                    foreach (json_decode($projectDetails->labor_id) as $id) {
                        $attendance = New Attendance;
                        $attendance->project_id = $projectDetails->project_id;
                        $attendance->project_detail = $projectDetails->id;
                        $attendance->labor_id = $id;
                        $attendance->date = date('Y-m-d');
                        $attendance->attendances = 0;
                        $attendance->save();
                    }
                }
            }
            $attendances = Attendance::whereDate('date', date('Y-m-d'))->get();
            return view('attendance.index',compact('attendances'));
        }else{
            return view('attendance.index',compact('attendances'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        return view('attendance.edit',compact('attendance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }

    public function absent($id)
    {

        $attendance = Attendance::find($id);
        $attendance->attendances = 1;
        $attendance->save();

        $old = Salary::where('labor_id',$attendance->labor_id)->first();
        if ($old) {
            $old->salary =  $old->salary + $attendance->labor->salary;
            $old->khoraki = $old->khoraki+100;
            $old->payable = $old->payable + $attendance->labor->salary + 100;
            $old->status = 'due';
            $old->save();
        }else{
            $salary = New Salary;
            $salary->labor_id = $attendance->labor_id;
            $salary->project_id = $attendance->project_id;
            $salary->project_detail = $attendance->project_detail;
            $salary->khoraki = 100;
            $salary->overtime = 0;
            $salary->salary =  $attendance->labor->salary;
            $salary->payable = $salary->payable + $attendance->labor->salary + 100;
            $salary->pay = 0;
            $salary->status = 'due';
            $salary->save();
        }

        Toastr::success('This labor is absent', 'Success');
        return back();
    }

    public function present($id)
    {
        $attendance = Attendance::find($id);
        $attendance->attendances = 0;
        $attendance->save();
        $old = Salary::where('labor_id',$attendance->labor_id)->first();
        if ($old) {
            $old->salary =  $old->salary - $attendance->labor->salary;
            $old->status = 'due';
            $old->save();
        }
        Toastr::success('This labor is present', 'Success');
        return back();
    }

    public function overtime(Request $request)
    {
        $old = Salary::where('labor_id',$request->labor_id)->first();
        $old->payable = $old->payable + $request->overtime;
        $old->overtime = $old->overtime + $request->overtime;
        $old->status = 'due';
        $old->save();
        Toastr::success('overtime is seet', 'Success');
        return back();
    }
}
