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
	Route::get('/home', 'HomeController@index');
	Route::get('/', 'HomeController@index');

	Route::get('settings', 'Settings\SettingsController@settings')->name('settings');

	Route::resource('places', 'Settings\PlacesController');
	Auth::routes();
});


