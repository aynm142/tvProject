<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'TvController@index');

// ================ Categories ================= //

Route::get('/category/new', 'CategoryController@create');
Route::post('/category/new', 'CategoryController@store');
Route::get('/category/show', 'CategoryController@showAll');
Route::get('/category/get', 'CategoryController@api');
Route::get('/category/remove', 'CategoryController@destroy');
Route::get('/category/{id}', 'CategoryController@show');

// ================= Videos =================== //

Route::get('newvideo', 'VideoController@createVideo');
Route::post('newvideo', 'VideoController@storeVideo');
Route::get('vid', 'VideoController@videoAPI');

// ================ Authentication ================ //

Route::get('register', 'RegistrationController@create');
Route::post('register', 'RegistrationController@store');

Route::get('login', 'SessionsController@create');
Route::post('login', 'SessionsController@store');

Route::get('logout', 'SessionsController@destroy');
//Route::get('test', 'TvController@test');
