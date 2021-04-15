@extends('layouts.app')

@section('title','Project create')
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
                    <form action="{{ route('project.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Name *</label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label>Companyr Name *</label>
                            <input name="companyr_name" value="{{ old('companyr_name') }}" type="text" class="form-control" placeholder="Enter companyr name">
                        </div>
                        <div class="form-group">
                            <label>Location *</label>
                            <input name="location" value="{{ old('location') }}" type="text" class="form-control" placeholder="Enter location">
                        </div>
                        <div class="form-group">
                            <label>Area *</label>
                            <input id="area" name="area" value="{{ old('area') }}" type="number" step="0.01" class="form-control" placeholder="Enter area" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Rate *</label>
                            <input id="rate" name="rate" value="{{ old('rate') }}" type="number" step="0.01" class="form-control" placeholder="Enter rate" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Budget *</label>
                            <input id="budget" name="budget" value="{{ old('budget') }}" type="number" step="0.01" class="form-control" placeholder="Enter budget" readonly>
                        </div>
                        <div class="form-group">
                            <label>Strat Date *</label>
                            <input name="strat_date" value="{{ old('strat_date') }}" type="date" class="form-control" placeholder="Enter strat_date">
                        </div>
                        <div class="form-group">
                            <label>End Date *</label>
                            <input name="end_date" value="{{ old('end_date') }}" type="date" class="form-control" placeholder="Enter end date">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
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

<script>
    $('form').delegate('#area, #rate', 'keyup', function(){
            var tr = $(this).parent().parent();
            var rate = document.getElementById("rate").value;
            var area = document.getElementById("area").value;
            var budget =  area * rate;
            $('#budget').val(budget);
        });
</script>

@endsection
