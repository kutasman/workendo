@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('settings'))

@section('content')
    <h1>Settings</h1>

    @include('settings.companies.companies')
    @if(Auth::user()->hasRole('superadmin'))
        @include('settings.income_types.list')
    @endif
@endsection

