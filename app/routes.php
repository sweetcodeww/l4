<?php

Route::post('/auth','AuthController@login');
Route::get('/logout',['before' => 'auth'],'AuthController@logout');

Route::group(['prefix' => '/','before' => 'auth'],function(){

	Route::get('auth-user','AuthController@getAuth');

});

