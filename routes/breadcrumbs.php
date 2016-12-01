<?php
//Register breadcrumbs routes

Breadcrumbs::register('home', function($bc) {
	$bc->push('Home', route('home'));
});

Breadcrumbs::register('settings', function ($bc) {
	$bc->parent('home');
	$bc->push('Settings', route('settings'));
});

Breadcrumbs::register('shifts.edit', function ($bc, $shiftId){
	$bc->parent('home');
	$bc->push('Edit shift', route('shifts.edit', $shiftId));
});

Breadcrumbs::register('companies.edit', function ($bc, $companyId){
	$bc->parent('settings');
	$bc->push('Edit company', route('companies.edit', $companyId));
});

Breadcrumbs::register('companies.create', function ($bc){
	$bc->parent('settings');
	$bc->push('Create company');
});

Breadcrumbs::register('incomes.create', function ($bc){
	$bc->parent('settings');
	$bc->push('Create income');
});