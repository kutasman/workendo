@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('companies.create'))


@section('content')
<h1>Add new company</h1>
<div class="panel panel-default">
	<div class="panel-body">
        {!! BootForm::vertical(['method' => 'post', 'route' => 'companies.store']) !!}
        <legend>Company info</legend>
        {!! BootForm::text('name', null, null, ['required']) !!}

        {!! BootForm::text('address', null, null, ['required']) !!}

        <div class="btn-group pull-right">
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-default">Cancel</a>
        </div>
        {!! BootForm::close() !!}
	</div>
</div>


@endsection