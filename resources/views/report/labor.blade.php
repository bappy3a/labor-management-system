@extends('layouts.app')

@section('title','Labor > Report')

@section('content')

<div class="row">
    <div class="col-12">
        <button class="btn btn-info float-right mb-2" onclick="window.print()"><i class="mdi mdi-printer"></i> Print </button>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <span class="badge badge-soft-primary float-right">All Time</span>
                    <h5 class="card-title mb-0">Total Labors</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                            {{ $all }}
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
                    <span class="badge badge-soft-primary float-right">This Week</span>
                    <h5 class="card-title mb-0">Add New Labors</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                            {{ $week }}
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
                    <span class="badge badge-soft-primary float-right">Per Month</span>
                    <h5 class="card-title mb-0">Add New Labors</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                            {{ $months }}
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
                    <span class="badge badge-soft-primary float-right">Day</span>
                    <h5 class="card-title mb-0">Add New Labors</h5>
                </div>
                <div class="row d-flex align-items-center mb-4">
                    <div class="col-8">
                        <h2 class="d-flex align-items-center mb-0">
                            {{ $days }}
                        </h2>
                    </div>
                    <div class="col-4 text-right">
                        <span class="text-muted">17.8% <i
                                class="mdi mdi-arrow-down text-danger"></i></span>
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

@endsection
