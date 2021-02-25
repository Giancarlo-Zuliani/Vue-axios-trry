<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/* Route::get('/home', 'HomeController@index')->name('home'); */

Route::get('/' ,'MainController@index')
    -> name('index');
Route::get('/random' , 'ApiController@randomRestaurant')
    ->name('random-restaurant');
Route::get('/restaurant/{id}' , 'ApiController@restaurant')
    -> name ('restaurant-search');