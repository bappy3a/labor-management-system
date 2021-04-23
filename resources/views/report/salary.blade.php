@extends('layouts.app')

@section('title','Salary > Report')

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-inline-block">Total Revenue</h4>

                <div id="morris-salary" class="morris-chart" style="height: 290px;"></div>

                <div class="row text-center mt-4">
                    <div class="col-6">
                        <h4>Tk.{{ \App\Models\Salary::sum('payable') }}</h4>
                        <p class="text-muted mb-0">Total Payable</p>
                    </div>
                    <div class="col-6">
                        <h4>{{ \App\Models\Salary::count() }}</h4>
                        <p class="text-muted mb-0">Total Salary</p>
                    </div>
                </div>

            </div>
            <!--end card body-->
        </div>
        <!--end card-->
    </div>
</div>
<!-- end row-->
@endsection

@section('js')
        <script src="{{ asset('plugins/morris-js/morris.min.js') }}"></script>
        <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
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