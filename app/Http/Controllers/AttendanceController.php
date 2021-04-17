<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Project;
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

        $attendances = Attendance::whereDate('date','=', date('Y-m-d'))->get();
        if (count($attendances) == 0) {
            $projects = Project::whereDate('strat_date','<=', date('Y-m-d'))->whereDate('end_date','>=', date('Y-m-d'))->get();
            foreach ($projects as $project) {
                foreach ($project->projectDetails as $projectDetails) {
                    foreach (json_decode($projectDetails->labor_id) as $id) {
                        $attendance = New Attendance;
                        $attendance->project_id = $projectDetails->project_id;
                        $attendance->labor_id = $id;
                        $attendance->date = date('Y-m-d');
                        $attendance->attendances = 0;
                        $attendance->save();
                    }
                }
            }
            $attendances = Attendance::whereDate('date','=', date('Y-m-d'))->get();
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
        Toastr::success('This labor is absent', 'Success');
        return back();
    }

    public function present($id)
    {
        $attendance = Attendance::find($id);
        $attendance->attendances = 0;
        $attendance->save();
        Toastr::success('This labor is present', 'Success');
        return back();
    }
}
