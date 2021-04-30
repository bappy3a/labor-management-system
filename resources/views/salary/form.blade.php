<div class="modal-header">
    <h5 class="modal-title" id="exampleModalPopoversLabel">Salary Form ({{ $salary->labor->name }})</h5>
    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="{{ route('salary.update',$salary->id) }}" method="Post">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="form-group">
            <label>Due Salary (Tk.{{ $salary->payable - $salary->pay }})</label>
            <input name="payable" type="number" step="0.01" class="form-control" placeholder="Salary pay {{ $salary->payable - $salary->pay }}" required value="{{ $salary->payable - $salary->pay }}">
        </div>                             
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
    </div>
</form>