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

});


/**
 * Authenticated Routes
 */
Route::group([
    'middleware' => 'auth:api',
    'namespace' => 'Api\v1',
    'prefix' => 'v1'
], function()
{

});
