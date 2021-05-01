<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Labor;
use App\Models\Project;
use App\Models\ProjectDetail;
use App\Models\Salary;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'companyr_name' => 'required',
            'location' => 'required',
            'area' => 'required',
            'strat_date' => 'required|date',
            'end_date' => 'required|date',
            'rate' => 'required',
        ]);

        $project = New Project;
        $project->name = $request->name;
        $project->companyr_name = $request->companyr_name;
        $project->location = $request->location;
        $project->area = $request->area;
        $project->budget = $request->budget;
        $project->strat_date = $request->strat_date;
        $project->end_date = $request->end_date;
        $project->rate = $request->rate;
        $project->description = $request->description;
        $project->save();
        Toastr::success('Data successfully saved', 'Success');
        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $labors = Labor::all();
        return view('project.view',compact('project','labors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        
        $this->validate($request,[
            'name' => 'required',
            'companyr_name' => 'required',
            'location' => 'required',
            'area' => 'required',
            'strat_date' => 'required',
            'end_date' => 'required',
            'rate' => 'required',
        ]);
        $project->name = $request->name;
        $project->companyr_name = $request->companyr_name;
        $project->location = $request->location;
        $project->area = $request->area;
        $project->budget = $request->budget;
        $project->strat_date = $request->strat_date;
        $project->end_date = $request->end_date;
        $project->rate = $request->rate;
        $project->description = $request->description;
        $project->save();
        Toastr::success('Data successfully update', 'Success');
        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $projectdeteles = ProjectDetail::where('project_id',$project->id)->get();
        foreach ($projectdeteles as $key => $value) {
            $value->delete();
        }
        $salarys = Salary::where('project_id',$project->id)->get();
        foreach ($salarys as $key => $value) {
            $value->delete();
        }
        $Attendances = Attendance::where('project_id',$project->id)->get();
        foreach ($Attendances as $key => $value) {
            $value->delete();
        }

        $project->delete();
        Toastr::success('Data successfully delete', 'Success');
        return redirect()->route('project.index');
    }

    public function project_work(Request $request)
    {
        $date = New ProjectDetail;
        $date->project_id = $request->project_id;
        $date->name = $request->name;
        $date->strat_date = $request->strat_date;
        $date->end_date = $request->end_date;
        $date->description = $request->description;
        if ($request->labor_id) {
            $date->labor_id = json_encode($request->labor_id);
        }else{
            $date->labor_id = [];
        }
        
        $date->save();
        Toastr::success('Data successfully added', 'Success');
        return back();
    }

}
