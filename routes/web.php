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

Route::get('/', 'Tv@index');
Route::get('newcat', 'Tv@createCategory');
Route::post('newcat', 'Tv@storeCategory');

//Route::get('test', 'Tv@test');
Route::get('/showcat', 'Tv@showCategories');

Route::get('cat', 'Tv@categoryAPI');
Route::get('vid', 'Tv@videoAPI');

Route::get('newvideo', 'Tv@createVideo');
Route::post('newvideo', 'Tv@storeVideo');

//Auth
Route::get('register', 'RegistrationController@create');
Route::post('register', 'RegistrationController@store');

Route::get('login', 'SessionsController@create');
Route::post('login', 'SessionsController@store');

Route::get('logout', 'SessionsController@destroy');