<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::post('/login','LoginController@login');
Route::post('/auth','LoginController@auth');
Route::get('/auth/token','LoginController@getToken');

Route::get('logout','LoginController@logout');

Route::get('user',['before' => 'auth', function() {
	$user = User::find(Auth::id());
	return $user;
}]);

