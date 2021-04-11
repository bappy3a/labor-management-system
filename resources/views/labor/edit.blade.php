@extends('layouts.app')

@section('title','Laborer create')
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
                    <form action="{{ route('labor.update',$labor->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name *</label>
                            <input name="name" value="{{ $labor->name }}" type="text" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" class="form-control">
                                <option value="">Select labor type</option>
                                <option @if($labor->type == 'foreman') selected @endif value="foreman">Foreman</option>
                                <option @if($labor->type == 'rajmistri') selected @endif value="rajmistri">Rajmistri</option>
                                <option @if($labor->type == 'general_labor') selected @endif value="general_labor">General labor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Phone Number *</label>
                            <input name="phone" value="{{ $labor->phone }}" type="tel" class="form-control" placeholder="Enter phone">
                        </div>
                        <div class="form-group">
                            <label>Nid No *</label>
                            <input name="nid" value="{{ $labor->nid }}" type="number" class="form-control" placeholder="Enter nid no">
                        </div>
                        <div class="form-group">
                            <label>Par Day Salary *</label>
                            <input name="salary" value="{{ $labor->salary }}" type="number" step="0.01" class="form-control" placeholder="Par day salary">
                        </div>
                        <div class="form-group">
                            <label>Other Info</label>
                            <textarea name="other" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $labor->other }}</textarea>
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
