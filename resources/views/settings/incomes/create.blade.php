@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('incomes.create'))
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Add new income for {{ $company->name }}</h3>
        </div>
    	<div class="panel-body">
            {!! BootForm::vertical(['method' => 'post', 'url'=> route('companies.incomes.store', ['company_id' => $company->id]), 'class'=>'income-create-form']) !!}
            {!! BootForm::select('income_type_slug', 'Type', $income_types->all()) !!}
            {!! BootForm::text('description') !!}

            {{-- Song --}}
            <div class="song-groups" hidden>
                <div class="song-type" id="song-group-1">
                    {!! BootForm::number('rules[song][1][value]', 'Song price') !!}
                    {!! BootForm::number('rules[song][1][percent]', 'Percent') !!}
                    {!! BootForm::select('rules[song][1][days][]','For days', [1,2,3,4,5,6,7], null, ['multiple']) !!}
                </div>
            </div>
            {{-- Salary --}}
            <div class="salary-type" hidden>
                {!! BootForm::number('rules[salary][value]', 'Salary value', null, [ 'min' => '0', ]) !!}
            </div>

            {{-- Rate --}}
            <div class="rate-type" hidden>
                {!! BootForm::number('rules[rate][value]', 'Rate value', null, ['min' => '0']) !!}
            </div>

            <div class="btn-group pull-right">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-default">Cancel</a>
                </div>
            {!! BootForm::close() !!}
    	</div>
    </div>
@endsection