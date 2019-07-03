<?php

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/movies/{sort?}', 'HomeController@index')->name('home.index');
Route::get('user/{nickname}', 'UserController@show')->name('user.show');


Route::get('login/github', 'Auth\LoginController@redirectToProvider')->name('login');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');


Route::middleware('auth')->group(function () {
    Route::get('movie/create', 'MovieController@create')->name('movie.create');
    Route::post('movie', 'MovieController@store')->name('movie.store');
    Route::post('movie/{id}', 'MovieController@update')->name('movie.update');
    Route::get('movie/act', 'MovieController@act')->name('movie.act');
    Route::get('movie/{id}/edit', 'MovieController@edit')->name('movie.edit');
    Route::get('movie/{id}/delete', 'MovieController@delete')->name('movie.delete');

    Route::get('/logout', 'HomeController@logout')->name('home.logout');
});
