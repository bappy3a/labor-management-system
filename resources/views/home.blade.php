@extends('layouts.app')

@section('title','Dashboard')

@section('content')


<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <span class="badge badge-soft-primary float-right">All</span>
                    <h5 class="card-title mb-0">Total Labor</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                            {{ \App\Models\Labor::count() }}
                        </h2>
                    </div>
                    <div class="col-4 text-right">
                        <span class="text-muted">12.5% <i
                                class="mdi mdi-arrow-up text-success"></i></span>
                    </div>
                </div>

                <div class="progress shadow-sm" style="height: 5px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 57%;">
                    </div>
                </div>
            </div>
            <!--end card body-->
        </div><!-- end card-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <span class="badge badge-soft-primary float-right">All</span>
                    <h5 class="card-title mb-0">Total Runing Project</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                            {{ \App\Models\Project::count() }}
                        </h2>
                    </div>
                    <div class="col-4 text-right">
                        <span class="text-muted">18.71% <i
                                class="mdi mdi-arrow-down text-danger"></i></span>
                    </div>
                </div>

                <div class="progress shadow-sm" style="height: 5px;">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 57%;">
                    </div>
                </div>
            </div>
            <!--end card body-->
        </div><!-- end card-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <span class="badge badge-soft-primary float-right">All</span>
                    <h5 class="card-title mb-0">Total Pay Salary</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                            Tk.{{ \App\Models\Salary::sum('pay') }}
                        </h2>
                    </div>
                    <div class="col-4 text-right">
                        <span class="text-muted">57% <i
                                class="mdi mdi-arrow-up text-success"></i></span>
                    </div>
                </div>

                <div class="progress shadow-sm" style="height: 5px;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 57%;">
                    </div>
                </div>
            </div>
            <!--end card body-->
        </div>
        <!--end card-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <span class="badge badge-soft-primary float-right">All Time</span>
                    <h5 class="card-title mb-0">Toal Project Budget</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                            Tk.{{ \App\Models\Project::sum('budget') }}
                        </h2>
                    </div>
                    <div class="col-4 text-right">
                        <span class="text-muted">17.8% <i
                                class="mdi mdi-arrow-up text-success"></i></span>
                    </div>
                </div>

                <div class="progress shadow-sm" style="height: 5px;">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 57%;"></div>
                </div>
            </div>
            <!--end card body-->
        </div><!-- end card-->
    </div> <!-- end col-->
</div>
<!-- end row-->


<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-inline-block">Salary Revenue</h4>

                <div id="morris-salary" class="morris-chart" style="height: 290px;"></div>

                <div class="row text-center mt-4">
                    <div class="col-6">
                        <h4>{{ \App\Models\Salary::sum('pay') }}</h4>
                        <p class="text-muted mb-0">Total Revenue</p>
                    </div>
                    <div class="col-6">
                        <h4>{{ \App\Models\SalaryDetails::count() }}</h4>
                        <p class="text-muted mb-0">Pay Count</p>
                    </div>
                </div>

            </div>
            <!--end card body-->

        </div>
    </div> <!-- end col -->

    <div class="col-lg-3">

        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Toal Project Budget</h4>
                        <p class="card-subtitle mb-4">Budget period from {{ \App\Models\Project::first()->created_at->format('M') }} to
                            {{ date('M') }}</p>
                        <h3>{{ \App\Models\Project::sum('budget') }} <span class="badge badge-soft-success float-right">+7.5%</span></h3>
                    </div>
                </div> <!-- end row -->

                <div id="sparkline1" class="mt-3"></div>
            </div>
            <!--end card body-->
        </div>
        <!--end card-->

    </div><!-- end col -->

</div>
<!--end row-->



@php
    $salarys = DB::table('salary_details')
        ->select(
            DB::raw('DAY(created_at) as date'),
            DB::raw('SUM(pay) as sum')
        )
        ->groupBy('date')
        ->get();
@endphp
<!--end row-->


@endsection

@section('js')
        <script src="{{ asset('plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
         <script src="{{ asset('assets/pages/knob-chart-demo.js') }}"></script>
        <script src="{{ asset('plugins/morris-js/morris.min.js') }}"></script>
        <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('assets/pages/dashboard-demo.js') }}"></script>
        <script>
            $(function () {
                "use strict";
                $("#morris-salary").length &&
                    Morris.Line({
                        element: "morris-salary",
                        gridLineColor: "#eef0f2",
                        lineColors: ["#f15050", "#e9ecef"],
                        data: [
                            @foreach($salarys as $salary)
                                { y: "2021-{{ date('m') }}-{{ $salary->date }}", a: {{ $salary->sum }} },
                            @endforeach
                        ],
                        xkey: "y",
                        ykeys: ["a"],
                          xLabels: 'day',
                          xLabelAngle: 90,
                        hideHover: "auto",
                        resize: !0,
                        labels: ["Salary"],
                    });
            });
        </script>
@endsection
