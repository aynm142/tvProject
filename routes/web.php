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

// ================= Videos =================== //

Route::get('video/all', 'VideoController@videoAPI');
Route::resource('video', 'VideoController');

// ================ Authentication ================ //

Route::get('register', 'Auth\RegisterController@create');
Route::post('register', 'Auth\RegisterController@store');

Route::get('login', 'Auth\LoginController@create');
Route::post('login', 'Auth\LoginController@store');

Route::get('logout', 'Auth\LoginController@logout');
//Route::get('test', 'TvController@test');

Auth::routes();

Route::get('/home', 'HomeController@index');
