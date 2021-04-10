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
                            <h4 class="card-title">Laborer List</h4>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('labor.create') }}" class="btn btn-info float-right"><i class="mdi mdi-plus"></i> Add New</a>
                        </div>
                    </div>

                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Nid No</th>
                                <th>Salary</th>
                                <th>Other Info</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    
                    
                        <tbody>
                            @foreach($labors as $key=>$labor)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $labor->type }}</td>
                                    <td>{{ $labor->name }}</td>
                                    <td>{{ $labor->number }}</td>
                                    <td>{{ $labor->nid }}</td>
                                    <td>Tk {{ $labor->salay }}</td>
                                    <td>{{ $labor->other }}</td>
                                    <td>
                                        <a href="{{ route('labor.edit', $labor->id) }}" class="btn btn-sm btn-primary" style="float: left;margin-right: 2px;"><i class="mdi mdi-square-edit-outline"></i></a>
                                        <form action="{{ route('labor.destroy', $labor->id) }}" method="post">
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
