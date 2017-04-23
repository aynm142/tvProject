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

Route::group([], function() {
    Route::get('/', 'Main\MainSiteController@index');
    Route::get('/video/{id}-{name}', 'Main\MainSiteController@video')->name('video-page');
});

Route::group(['middleware' => 'AdminCheck', 'prefix' => '/dashboard'], function () {
    Route::get('/', 'TvController@index');

    Route::get('/promocodes', 'PromocodeController@index')->name('promo.show');
    Route::get('/promocodes/add', 'PromocodeController@add')->name('promo.add');
    Route::post('/promocodes/add', 'PromocodeController@addPost')->name('promo.post.add');
    Route::delete('/promocodes/delete/{id}', 'PromocodeController@delete')->name('promo.post.delete');
    Route::get('/promocodes/generate_code', 'PromocodeController@generateCode')->name('promo.generate.code');

    Route::get('/user/showAll', 'UserController@showAllUsers');
    Route::resource('user', 'UserController', ['except' => ['index']]);

    Route::get('/category/show', 'CategoryController@showAll');
    Route::resource('category', 'CategoryController', ['except' => ['index']]);

    Route::get('video/showAll', 'VideoController@showAll');
    Route::resource('video', 'VideoController', ['except' => ['index']]);

    Route::get('settings', 'SettingsController@index');
    Route::patch('settings', 'SettingsController@update');
});

// ================ Authentication ================ //


Route::get('register', 'Auth\RegisterController@create');
Route::post('register', 'Auth\RegisterController@store');

Route::post('login/api', 'UserController@api');
Route::get('login', 'Auth\LoginController@create');
Route::post('login', 'Auth\LoginController@store');

Route::get('logout', 'Auth\LoginController@logout');

Auth::routes();
