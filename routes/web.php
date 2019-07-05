<?php

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/movies/{sort?}', 'HomeController@index')->name('home.index');

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.provider.callback');

Route::get('user/signin', 'UserController@signin')->name('user.signin');
Route::get('user/{nickname}', 'UserController@show')->name('user.show');

Route::get('docs', 'DocsController@index')->name('docs.index');

Route::get('movie/act', 'MovieController@act')->name('movie.act');

Route::middleware('auth')->group(function () {
    Route::get('movie/create', 'MovieController@create')->name('movie.create');
    Route::post('movie', 'MovieController@store')->name('movie.store');
    Route::post('movie/{id}', 'MovieController@update')->name('movie.update');
    Route::get('movie/{id}/edit', 'MovieController@edit')->name('movie.edit');
    Route::get('movie/{id}/delete', 'MovieController@delete')->name('movie.delete');

    Route::get('/logout', 'HomeController@logout')->name('home.logout');
});
