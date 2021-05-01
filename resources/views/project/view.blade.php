@extends('layouts.app')

@section('title','Project > '.$project->name)

@section('css')
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <h4><b>{{ $project->name }}</b></h4>
                    </div>
                    <div class="float-right">
                        <h4 class="m-0 d-print-none">Date</h4>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-6">
                        <h6 class="font-weight-bold">Rate: Tk {{ $project->rate }}</h6>

                        <address class="line-h-24">
                            <p class="mb-2"><strong>Companyr Name: </strong> {{ $project->companyr_name }}</p>
                            <p class="mb-2"><strong>Location: </strong> {{ $project->location }}</p>
                            <p class="mb-2"><strong>Area: </strong> {{ $project->area }}</p>
                            <p class="mb-2"><strong>Budget: </strong> {{ $project->budget }}</p>
                        </address>
                    </div><!-- end col -->
                    <div class="col-6">
                        <div class="mt-3 float-right">
                            <p class="mb-2"><strong>Strat Date: </strong> {{ date('F j, Y', strtotime($project->strat_date)) }}</p>
                            <p class="mb-2"><strong>End Date: </strong> {{ date('F j, Y', strtotime($project->end_date)) }}</p>
                            {{-- <p class="mb-2"><strong>Order Status: </strong> <span class="badge badge-soft-success">Paid</span></p> --}}
                            <p class="m-b-10"><strong>Project ID: </strong> #000{{ $project->id }}</p>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="clearfix pt-5">
                            <h6 class="text-muted">Project Description:</h6>

                            <p class="mb-2">{!! $project->description !!}</p>
                        </div>
                        
                    </div>
                </div>

                <hr>

                <div class="row">
                    {{-- <div class="d-print-none my-4">
                        <div class="text-right">
                            <a data-toggle="modal" data-target=".bd-example-modal-lg" href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-plus m-r-5"></i> Add Work</a>
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <form action="{{ route('project.work') }}" method="post">
                            @csrf
                                                
                            <h4 class="card-title">Add a work in project</h4>
                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                            <div class="form-group">
                                <label>Work Name</label>
                                <input placeholder="Work Name" type="text" name="name" class="form-control" maxlength="25" name="defaultconfig" required />
                            </div>

                            <div class="form-group">
                                <label>Strat Date</label>
                                <input type="date" name="strat_date" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label>End Date</label>
                                <input type="date" name="end_date" class="form-control" required />
                            </div>

                            <div class="form-group">
                                <label>Select labors</label>
                                <select name="labor_id[]" class="form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">
                                    @foreach($labors as $labor)
                                    <option value="{{ $labor->id }}">{{ $labor->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" placeholder="Description" id="textarea" class="form-control" maxlength="250" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Added</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h4 class="card-title">Work list in project</h4>
                        @foreach(\App\Models\ProjectDetail::where('project_id',$project->id)->orderBy('created_at', 'ASC')->get() as $detail)
                        <div class="card text-white bg-dark">
                            <div class="card-body">
                                <blockquote class="card-bodyquote mb-0">
                                    <h5 style="color: #fff;">{{ $detail->name }}</h5>
                                    <p>{!! $detail->description !!}</p>
                                    <footer class="blockquote-footer text-white-50">{{ date('F j, Y', strtotime($project->strat_date)) }} <cite title="Source Title"> <b>To =></b> </cite> {{ date('F j, Y', strtotime($project->strat_date))}}
                                    </footer>
                                    <p class="blockquote-footer" style="font-size: 14px;color: #fff;">Labors</p>
                                    @foreach(json_decode($detail->labor_id) as $id)
                                        @php
                                            $labor = \App\Models\Labor::find($id);
                                        @endphp
                                        <span class="badge badge-danger">{{ $labor ? $labor->name : '{Deleted labor }' }}</span>
                                    @endforeach
                                </blockquote>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>


@endsection

@section('js')
    <script src="{{ asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/pages/advanced-plugins-demo.js') }}"></script>
@endsection
