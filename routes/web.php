<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post('/store', 'HomeController@store');
Route::delete('/delete/{task}', 'HomeController@destroy');
Route::post('/complete/{task}', 'HomeController@update');
