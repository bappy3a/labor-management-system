@extends('layouts.app')

@section('title','Project > Report')

@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <button class="btn btn-info float-right mb-2" onclick="window.print()"><i class="mdi mdi-printer"></i> Print </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-centered table-striped table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Project Work</th>
                                <th>Budget</th>
                                <th>Salary</th>
                                <th>Profit/Loos</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Models\Project::latest()->get() as $project )
                            <tr>
                                <td class="table-user">
                                    {{ $project->name }}
                                </td>
                                <td>
                                    @foreach($project->projectDetails as $work)
                                        <span class="badge badge-primary">{{ $work->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    Tk.{{ $project->budget }}
                                </td>
                                @php
                                    $salary =  \App\Models\Salary::where('project_id',$project->id)->sum('payable')
                                @endphp
                                <td>
                                    Tk. {{ $salary}}
                                </td>
                                <td class="{{ $project->budget < $salary ? 'table-danger' : 'table-success' }}">
                                    Tk.{{ $project->budget - $salary }} 
                                    @if($project->budget < $salary)
                                        <span class="badge badge-pill badge-danger">Loos</span>
                                    @else
                                        <span class="badge badge-pill badge-success">Profit</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $project->strat_date }}
                                </td>
                                <td>
                                    {{ $project->end_date }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <!--end card body-->

        </div>
        <!--end card-->
    </div>
</div>
<!-- end row-->



@endsection
