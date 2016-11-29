@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('companies.edit', $company->id))

@section('content')
    <div class="panel panel-default">
    	<div class="panel-body">
            <form  action="{{ route('companies.update', ['id '=> $company->id]) }}" method="post" role="form">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <legend>Edit company</legend>

                @forelse( $errors->all() as $error )
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Sorry!</strong> {{ $error }}
                    </div>
                @empty
                @endforelse

                <div class="form-group">
                    <label for="">Company name</label>
                    <input type="text" class="form-control" name="name" value="{{ $company->name }}" required>
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ $company->address }}">
                </div>
                <div class="form-group">
                    <label for="">Salary</label>
                    <input type="number" max="10000" min="0" class="form-control" name="salary" value="{{ $company->salary }}" required>
                </div>
                <div class="form-group">
                    <label>Salary type</label>
                    <select name="salary_type_id" class="form-control">
                        @foreach($salaryTypes as $salaryType)
                            <option value="{{ $salaryType->id }}" {{ ( $salaryType->id == $company->salary_type_id ) ? 'selected' : '' }}>{{ $salaryType->type }} ( {{ $salaryType->description }} )</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Songs percent</label>
                    <input type="number" max="100" min="0" class="form-control" name="song_percent" value="{{ $company->song_percent }}">
                </div>
                <div class="pull-right">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('settings') }}" class="btn btn-default">Cancel</a>
                </div>
            </form>
    	</div>
    </div>

@endsection