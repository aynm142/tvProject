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


Route::group(['middleware' => 'AdminCheck'], function () {
    Route::get('/', 'TvController@index');
    Route::get('/category/show', 'CategoryController@showAll');
    Route::resource('category', 'CategoryController', ['except' => ['index']]);
    Route::get('video/showAll', 'VideoController@showAll');
    Route::resource('video', 'VideoController', ['except' => ['index']]);
});

// ================ Authentication ================ //


Route::get('register', 'Auth\RegisterController@create');
Route::post('register', 'Auth\RegisterController@store');

Route::get('login/test', 'Auth\LoginController@test');
Route::post('login/api', 'Auth\LoginController@api');
Route::get('login', 'Auth\LoginController@create');
Route::post('login', 'Auth\LoginController@store');

Route::get('logout', 'Auth\LoginController@logout');

Route::get('/email', 'TvController@email')->name('sendEmail');

Auth::routes();
