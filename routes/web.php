<?php


Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::resource('movies', 'MovieController')->only(['index', 'show']);
Route::post('/movies/{movie}/increment_views', 'MovieController@increment_views')->name('movies.increment_views');



Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->where('provider', 'facebook|google');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->where('provider', 'facebook|google');

