@extends('layouts.app')

@section('title','Laborer')

@section('css')
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}" type="text/css" />
    <link href="{{ asset('plugins/datatables/responsive.bootstrap4.css') }}" type="text/css" />
    <link href="{{ asset('plugins/switchery/switchery.min.css') }}" type="text/css" />
    <style>
        div#basic-datatable_paginate{
            float: right;
        }
        div#basic-datatable_filter{
            float: right;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Attendance List</h4>
                        </div>
                        <div class="col-6">
                            <h4 class="card-title float-right">To Day Date : {{ date('d/m/Y') }}</h4>
                        </div>
                    </div>

                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th width="20%">Project</th>
                                <th width="20%">Work</th>
                                <th>Labor</th>
                                <th width="10%">Attendance</th>
                                <th width="20%">Overtime (TK)</th>
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                            @foreach($attendances as $key=>$attendance)
                                @if($attendance->labor)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $attendance->project->name }}</td>
                                        <td>{{ $attendance->projectDetail->name }}</td>
                                        <td>{{ $attendance->labor->name }}</td>
                                        <td>
                                            @if($attendance->attendances == 0)
                                                <a href="{{ route('attendance.absent',$attendance->id) }}" onclick="return confirm('Are you sure you?')"  class="btn btn-danger btn-sm"> Absent</a>
                                            @else
                                                <a href="{{ route('attendance.present',$attendance->id) }}" onclick="return confirm('Are you sure you?')"  class="btn btn-success btn-sm"> Present</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($attendance->attendances == 1)
                                                <form class="form-inline" action="{{ route('attendance.overtime') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="labor_id" value="{{ $attendance->labor_id }}">
                                                    <input name="overtime" style="width: 70%;float: left;" type="number" step="0.01" class="form-control  mb-2" placeholder="In Tk">
                                                    <button type="submit" class="btn btn-primary mb-2"><i class="mdi mdi-content-save-outline"></i></button>
                                                </form>
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
@endsection

@section('js')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('assets/pages/datatables-demo.js') }}"></script>
    <script src="{{ asset('assets/pages/advanced-plugins-demo.js') }}"></script>
    <script>
        jQuery("input[type='checkbox']").change(function() {
            jQuery("#attendanceFrom").submit();
        });
    </script>
@endsection
