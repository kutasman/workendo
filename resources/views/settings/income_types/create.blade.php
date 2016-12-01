@extends('layouts.app')
@include('errors._errors')

@section('content')
    <div class="panel panel-danger">
    	  <div class="panel-heading">
    			<h3 class="panel-title">Create new income type</h3>
    	  </div>
    	  <div class="panel-body">
              {!! BootForm::vertical(['route' => 'income-types.store', 'method' => 'post']) !!}

              {!! BootForm::text('income_type_name', 'Name', null, ['required']) !!}
              {!! BootForm::text('income_type_slug', 'Slug', null, ['required']) !!}
              {!! BootForm::textarea('income_type_desc', 'Description') !!}

              <div class="btn-group pull-right">
                  <button type="submit" class="btn btn-primary">Add</button>
                  <a href="{{ route('settings') }}" class="btn btn-default">Cancel</a>
              </div>
              {!! BootForm::close() !!}
    	  </div>
    </div>
@endsection