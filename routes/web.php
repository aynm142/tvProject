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

// ============= Categories ============== //

Route::get('newcat', 'CategoryController@createCategory');
Route::post('newcat', 'CategoryController@storeCategory');
Route::get('cat/{id}', 'CategoryController@showCategory');
Route::get('/showcat', 'CategoryController@showCategories');
Route::get('cat', 'CategoryController@categoryAPI');

// =============== Videos ================= //

Route::get('newvideo', 'TvController@createVideo');
Route::post('newvideo', 'TvController@storeVideo');
Route::get('vid', 'TvController@videoAPI');

// ================ Authentication ================ //

Route::get('register', 'RegistrationController@create');
Route::post('register', 'RegistrationController@store');

Route::get('login', 'SessionsController@create');
Route::post('login', 'SessionsController@store');

Route::get('logout', 'SessionsController@destroy');
//Route::get('test', 'TvController@test');
