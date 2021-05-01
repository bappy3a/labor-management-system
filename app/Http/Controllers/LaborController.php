<?php

namespace App\Http\Controllers;

use App\Models\Labor;
use App\Models\Salary;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class LaborController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labors = Labor::latest()->get();
        return view('labor.index',compact('labors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('labor.create');
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
            'type' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'salary' => 'required',
            'nid' => 'required|unique:labors',
        ]);
        $labor = New Labor;
        $labor->type = $request->type;
        $labor->name = $request->name;
        $labor->phone = $request->phone;
        $labor->nid = $request->nid;
        $labor->salary = $request->salary;
        $labor->other = $request->other;
        $labor->save();
        Toastr::success('Data successfully saved', 'Success');
        return redirect()->route('labor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Labor  $labor
     * @return \Illuminate\Http\Response
     */
    public function show(Labor $labor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Labor  $labor
     * @return \Illuminate\Http\Response
     */
    public function edit(Labor $labor)
    {
        return view('labor.edit',compact('labor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Labor  $labor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Labor $labor)
    {
        
        $this->validate($request,[
            'type' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'nid' => 'required',
        ]);
        $labor->type = $request->type;
        $labor->name = $request->name;
        $labor->phone = $request->phone;
        $labor->nid = $request->nid;
        $labor->salary = $request->salary;
        $labor->other = $request->other;
        $labor->save();
        Toastr::success('Data successfully update', 'Success');
        return redirect()->route('labor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Labor  $labor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Labor $labor)
    {
        $salarys = Salary::where('labor_id',$labor->id)->get();
        foreach ($salarys as $key => $value) {
            $value->delete();
        }
        $labor->delete();
        Toastr::success('Data successfully delete', 'Success');
        return redirect()->route('labor.index');
    }
}
