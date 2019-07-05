<?php

Route::get('movies', 'API\MovieController@index')->name('movie.index');
Route::get('movies/{id}', 'API\MovieController@show')->name('movie.show');