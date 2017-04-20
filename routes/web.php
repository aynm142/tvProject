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

Route::group([],function() {
    Route::get('/', 'Main\MainSiteController@index');
});

Route::group(['middleware' => 'AdminCheck', 'prefix' => '/dashboard'], function () {
    Route::get('/', 'TvController@index');
    Route::get('/user/showAll', 'UserController@showAllUsers');
    Route::resource('user', 'UserController', ['except' => ['index']]);
    Route::get('/category/show', 'CategoryController@showAll');
    Route::resource('category', 'CategoryController', ['except' => ['index']]);
    Route::get('video/showAll', 'VideoController@showAll');
    Route::resource('video', 'VideoController', ['except' => ['index']]);
});

// ================ Authentication ================ //


Route::get('register', 'Auth\RegisterController@create');
Route::post('register', 'Auth\RegisterController@store');

Route::post('login/api', 'UserController@api');
Route::get('login', 'Auth\LoginController@create');
Route::post('login', 'Auth\LoginController@store');

Route::get('logout', 'Auth\LoginController@logout');

Auth::routes();
