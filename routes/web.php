<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::group(['middleware' => 'web'], function (){
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/', 'HomeController@index')->name('home');

	Route::group(['middleware' => 'auth'], function (){
		Route::get('settings', 'Settings\SettingsController@settings')->name('settings');
		Route::resource('companies', 'Settings\CompaniesController');
		Route::resource('shifts', 'ShiftsController');
		Route::resource('companies.incomes', 'Settings\IncomesController');
		Route::group(['middleware' => ['role:superadmin']], function (){
			Route::resource('income-types', 'Settings\IncomeTypesController');
		});

	});
	Auth::routes();
});


