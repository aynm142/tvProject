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

Route::get('/category/api', 'CategoryController@api');
Route::get('/category/show', 'CategoryController@showAll');
Route::resource('category', 'CategoryController');
//Route::get('/category/new', ['middleware' => 'auth', 'uses' => 'CategoryController@create']);
//Route::get('/category/new', 'CategoryController@create');
//Route::post('/category/new', 'CategoryController@store');
//Route::get('/category/show', 'CategoryController@showAll');
//Route::get('/category/api', 'CategoryController@api');
//Route::get('/category/remove', 'CategoryController@destroy');
//Route::get('/category/{id}', 'CategoryController@show');

// ================= Videos =================== //

Route::get('newvideo', 'VideoController@createVideo');
Route::post('newvideo', 'VideoController@storeVideo');
Route::get('vid', 'VideoController@videoAPI');

// ================ Authentication ================ //

Route::get('register', 'Auth\RegisterController@create');
Route::post('register', 'Auth\RegisterController@store');

Route::get('login', 'Auth\LoginController@create');
Route::post('login', 'Auth\LoginController@store');

//Route::get('logout', 'SessionsController@destroy');
Route::get('logout', 'Auth\LoginController@logout');
//Route::get('test', 'TvController@test');

Auth::routes();

Route::get('/home', 'HomeController@index');
