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

Route::get('/', function () {
    return view('pages.guest');
});

Route::get('/advertise/preview', 'AdvertiseController@preview');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/advertise/new/', 'AdvertiseController@add');
    Route::get('/advertise/edit/{id}', 'AdvertiseController@edit');
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
