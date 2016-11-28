@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('settings'))

@section('content')
    <h1>Settings<small></small></h1>

    @include('settings.companies.companies')

@endsection