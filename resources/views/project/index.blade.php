@extends('layouts.app')

@section('title','Laborer')

@section('css')
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}" type="text/css" />
    <link href="{{ asset('plugins/datatables/responsive.bootstrap4.css') }}" type="text/css" />
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
                            <h4 class="card-title">Project List</h4>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('project.create') }}" class="btn btn-info float-right"><i class="mdi mdi-plus"></i> Add New</a>
                        </div>
                    </div>

                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Companyr Name</th>
                                <th>Location</th>
                                <th>Rate</th>
                                <th>Strat Date</th>
                                <th>End Date</th>
                                <th width="12%"> Action</th>
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                            @foreach($projects as $key=>$project)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->companyr_name }}</td>
                                    <td>{{ $project->location }}</td>
                                    <td>Tk {{ $project->rate }}</td>
                                    <td>{{ $project->strat_date }}</td>
                                    <td>{{ $project->end_date }}</td>
                                    <td>
                                        <a href="{{ route('project.show', $project->id) }}" class="btn btn-sm btn-success" style="float: left;margin-right: 2px;"><i class="mdi mdi-eye-outline"></i></a>

                                        <a href="{{ route('project.edit', $project->id) }}" class="btn btn-sm btn-primary" style="float: left;margin-right: 2px;"><i class="mdi mdi-square-edit-outline"></i></a>
                                        <form action="{{ route('project.destroy', $project->id) }}" method="post">
                                            @method("DELETE")
                                            @csrf
                                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this item?')"  class="dropdown-item"> <i class="mdi mdi-delete-forever"></i></button>
                                        </form>
                                    </td>
                                </tr>
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
    <script src="{{ asset('assets/pages/datatables-demo.js') }}"></script>
@endsection
