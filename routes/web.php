<?php

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/movies/{sort?}', 'HomeController@index')->name('home.index');
Route::get('/logout', 'HomeController@logout')->name('home.logout');
Route::get('user/{nickname}', 'UserController@show')->name('user.show');

Route::get('movie/create', 'MovieController@create')->name('movie.create');
Route::post('movie', 'MovieController@store')->name('movie.store');
Route::get('movie/act', 'MovieController@act')->name('movie.act');

Route::get('login/github', 'Auth\LoginController@redirectToProvider')->name('login.github');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
