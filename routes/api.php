<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'namespace' => 'Api\v1',
    'prefix' => 'v1'
], function()
{

    /**
     * Open Access Routes
     */
    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');

    // get the list of advertisements for preview
    Route::post('preview', 'AdvertisementController@preview');
});


/**
 * Authenticated Routes
 */
Route::group([
    'middleware' => 'auth',
    'namespace' => 'Api\v1',
    'prefix' => 'v1'
], function()
{
    /**
     * GoogleTextAdvertisement Routes
     */
    Route::group(['prefix' => 'advertise'], function() {
        Route::get('index', 'AdvertisementController@index');
        Route::get('{id}', 'AdvertisementController@view');
        Route::post('create', 'AdvertisementController@create');
        Route::post('update/{id}', 'AdvertisementController@update');
        Route::delete('{id}', 'AdvertisementController@delete');
    });

});
