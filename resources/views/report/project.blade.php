@extends('layouts.app')

@section('title','Project > Report')

@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-centered table-striped table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Project Work</th>
                                <th>Budget</th>
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
