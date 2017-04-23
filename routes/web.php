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
    Route::get('/', 'DashboardController@index');

    Route::get('/promocodes', 'PromocodeController@index')->name('promo.show');
    Route::get('/promocodes/add', 'PromocodeController@add')->name('promo.add');
    Route::post('/promocodes/add', 'PromocodeController@addPost')->name('promo.post.add');
    Route::get('/promocodes/generate_code', 'PromocodeController@generateCode')->name('promo.generate.code');

    Route::resource('user', 'UserController');
    Route::resource('category', 'CategoryController');
    Route::resource('video', 'VideoController');

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
