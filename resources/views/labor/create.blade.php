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
                    <form action="{{ route('labor.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Name *</label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" class="form-control">
                                <option selected value="">Select labor type</option>
                                <option value="foreman">Foreman</option>
                                <option value="rajmistri">Rajmistri</option>
                                <option value="general_labor">General labor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Phone Number *</label>
                            <input name="phone" value="{{ old('phone') }}" type="tel" class="form-control" placeholder="Enter phone">
                        </div>
                        <div class="form-group">
                            <label>Nid No *</label>
                            <input name="nid" value="{{ old('nid') }}" type="number" class="form-control" placeholder="Enter nid no">
                        </div>
                        <div class="form-group">
                            <label>Par Day Salary *</label>
                            <input name="salary" value="{{ old('salary') }}" type="number" step="0.01" class="form-control" placeholder="Par day salary">
                        </div>
                        <div class="form-group">
                            <label>Other Info</label>
                            <textarea name="other" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ old('other') }}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
