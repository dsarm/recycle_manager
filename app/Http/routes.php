<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', ['as' => 'front.index', 'uses' => 'FrontController@index']);
Route::post('/search/recycles', ['as' => 'front.search.recycles', 'uses' => 'Front\SearchController@searchRecycles']);



// Authentication routes...
Route::group(['prefix' => 'auth'], function() {

	Route::get('/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
	Route::post('/login', ['uses' => 'Auth\AuthController@postLogin']);
	Route::get('/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);

	// Registration routes...
	Route::post('/register', 'Auth\AuthController@postRegister');
	Route::get('/register', [
		'as' => 'register', 
		'uses' => 'Auth\AuthController@getRegister'
	]);
	Route::get('register/verify/{confirmationCode}', [
	    'as' => 'confirmation_path',
	    'uses' => 'Auth\AuthController@confirm'
	]);
});

// Password routes...
Route::group(['prefix' => 'auth'], function() {

	// Password reset link request routes...
	Route::get('/email', ['as' => 'password.reset', 'uses' => 'Auth\PasswordController@getEmail']);
	Route::post('/email', 'Auth\PasswordController@postEmail');

	// Password reset routes...
	Route::get('/reset/{token}', 'Auth\PasswordController@getReset');
	Route::post('/reset', 'Auth\PasswordController@postReset');

});



Route::group(['prefix' => 'home', 'middleware' => 'auth'], function() {

	Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);

	Route::group(['prefix' => 'users'], function() {

		Route::get('/', ['as' => 'home.users', 'uses' => 'UserController@index']);
		Route::get('/create', ['as' => 'home.users.create', 'uses' => 'UserController@create']);
		Route::post('/', ['as' => 'home.users.store', 'uses' => 'UserController@store']);
		Route::get('/{id}', ['as' => 'home.users.edit', 'uses' => 'UserController@edit']);
		Route::post('/{id}', ['as' => 'home.users.update', 'uses' => 'UserController@update']);
		Route::get('/{id}/destroy', ['as' => 'home.users.delete', 'uses' => 'UserController@destroy']);

	});

	Route::group(['prefix' => 'recycles'], function() {

		Route::get('/', ['as' => 'home.recycles', 'uses' => 'RecycleController@index']);
		Route::get('/create', ['as' => 'home.recycles.create', 'uses' => 'RecycleController@create']);
		Route::post('/', ['as' => 'home.recycles.store', 'uses' => 'RecycleController@store']);
		Route::get('/map', ['as' => 'home.recycles.map', 'uses' => 'RecycleController@map']);
		Route::get('/{id}', ['as' => 'home.recycles.edit', 'uses' => 'RecycleController@edit']);
		Route::post('/{id}', ['as' => 'home.recycles.update', 'uses' => 'RecycleController@update']);
		Route::get('/{id}/destroy', ['as' => 'home.recycles.delete', 'uses' => 'RecycleController@destroy']);

	});

	Route::group(['prefix' => 'settings'], function() {

		Route::get('/', ['as' => 'home.settings', 'uses' => 'SettingController@index']);
		Route::get('/create', ['as' => 'home.settings.create', 'uses' => 'SettingController@create']);
		Route::post('/info', ['as' => 'home.settings.info', 'uses' => 'SettingController@info']);
		Route::post('/batch', ['as' => 'home.settings.batch', 'uses' => 'SettingController@batch']);
		Route::post('/', ['as' => 'home.settings.store', 'uses' => 'SettingController@store']);
		Route::get('/{id}', ['as' => 'home.settings.edit', 'uses' => 'SettingController@edit']);
		Route::post('/{id}', ['as' => 'home.settings.update', 'uses' => 'SettingController@update']);
		Route::get('/{id}/destroy', ['as' => 'home.settings.delete', 'uses' => 'SettingController@destroy']);

	});

});