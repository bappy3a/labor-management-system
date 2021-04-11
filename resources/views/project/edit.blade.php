@extends('layouts.app')

@section('title','Project edit')
@section('css')
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col-xl-6">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                        {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <br>
                @endforeach
            @endif
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('project.update',$project->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name *</label>
                            <input name="name" value="{{ $project->name }}" type="text" class="form-control" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label>Companyr Name *</label>
                            <input name="companyr_name" value="{{ $project->companyr_name }}" type="text" class="form-control" placeholder="Enter companyr name">
                        </div>
                        <div class="form-group">
                            <label>Location *</label>
                            <input name="location" value="{{ $project->location }}" type="text" class="form-control" placeholder="Enter location">
                        </div>
                        <div class="form-group">
                            <label>Area *</label>
                            <input name="area" value="{{ $project->area }}" type="text" class="form-control" placeholder="Enter area">
                        </div>
                        <div class="form-group">
                            <label>Budget *</label>
                            <input name="budget" value="{{ $project->budget }}" type="text" class="form-control" placeholder="Enter budget">
                        </div>
                        <div class="form-group">
                            <label>Strat Date *</label>
                            <input name="strat_date" value="{{ $project->strat_date }}" type="date" class="form-control" placeholder="Enter strat_date">
                        </div>
                        <div class="form-group">
                            <label>End Date *</label>
                            <input name="end_date" value="{{ $project->end_date }}" type="date" class="form-control" placeholder="Enter end date">
                        </div>
                        <div class="form-group">
                            <label>Rate *</label>
                            <input name="rate" value="{{ $project->rate }}" type="number" step="0.01" class="form-control" placeholder="Enter rate">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ $project->description }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
