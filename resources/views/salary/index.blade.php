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
                            <h4 class="card-title">Salary List</h4>
                        </div>
                        <div class="col-6">
                            <h4 class="card-title float-right">To Day Date : {{ date('d/m/Y') }}</h4>
                        </div>
                    </div>

                    <table id="basic-datatable" class="table dt-responsive nowrap">
                        <thead>
                            <tr class="text-center">
                                <th width="10%">#</th>
                                <th>Labor</th>
                                <th>Khoraki</th>
                                <th>Salary</th>
                                <th>OverTime</th>
                                <th>Total Payable</th>
                                <th>Due Salary</th>
                                <th>Total Pay</th>
                                <th>Status</th>
                                <th width="10%">Pay Now</th>
                            </tr>
                        </thead>
                    
                    
                        <tbody class="text-center">
                            @foreach($salarys as $key=>$salary)
                                <tr >
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $salary->labor->name }}</td>
                                    <td>Tk. 100 -</td>
                                    <td>Tk .{{ $salary->salary }}</td>
                                    <td>Tk .{{ $salary->overtime }}</td>
                                    <td>Tk .{{ $salary->payable }}</td>
                                    <td class="{{ $salary->payable > $salary->pay ? 'table-danger' : 'table-success' }}">Tk .{{ $salary->payable - $salary->pay }}</td>
                                    <td>Tk .{{ $salary->pay }}</td>
                                    <td>{{ $salary->status }}</td>
                                    <td>
                                        @if($salary->payable > $salary->pay)
                                            <button onclick="show_salary_mode({{ $salary->id }})" class="btn btn-sm btn-success">Salary Pay</button>
                                        @else
                                            <button class="btn btn-sm btn-success waves-effect waves-light" disabled>Salary Pay</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

    <div id="order_model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalPopoversLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="salary-modal-body">
                
            </div>
        </div>
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

        function show_salary_mode(id)
        {
            console.log(id);
            $('#salary-modal-body').html(null);
            $.post('{{ route('salary.model') }}', { _token : '{{ @csrf_token() }}', id : id}, function(data){
                $('#salary-modal-body').html(data);
                $('#order_model').modal();
            });
        }
    </script>
@endsection
