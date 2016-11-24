@extends('layouts.app')

@section('header')
    <link href="{{ asset('css/pickadate.css') }}" rel="stylesheet">
@endsection

@section('content')
    <form action="{{ route('shifts.update', ['id' => $shift->id]) }}" method="post" class="form-horizontal" >
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group">
            <legend>Update shift</legend>
        </div>

        @forelse($errors->all() as $error)
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Sorry!</strong> {{ $error }}
            </div>
        @empty
        @endforelse
        <div class="form-group">
            <label for="places" class="col-sm-2 control-label">Companies</label>
            <div class="col-sm-10">
                <select name="company_id" id="companies" class="form-control">
                    @forelse($companies as $company)
                        <option value="{{ $company->id }}" {{ $company->id == $shift->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
        </div>


        <div class="form-group">
            <label for="shift-date" class="col-sm-2 control-label">Date</label>
            <div class="col-sm-10">
                <input type="text" name="date" class="form-control" id="shift-date" placeholder="Date" value="{{ $shift->date }}" required/>
            </div>
        </div>

        <div class="form-group">
            <label for="shift-tip" class="col-sm-2 control-label">Tip</label>
            <div class="col-sm-10">
                <input type="number" name="tip" min="0" class="form-control" id="shift-tip" value="{{ $shift->tip }}" placeholder="Tip">
            </div>
        </div>

        <div class="form-group pull-right">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection

@section('footer')
    <script src="{{ asset('js/pickadate.js') }}"></script>
@endsection