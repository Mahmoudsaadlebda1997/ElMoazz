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

Route::group(['prefix' => 'common' , 'namespace' => 'Api'], function () {

    Route::post('contact-us','CommonApiController@createContactUs');
    Route::post('sendEmail','CommonApiController@sendEmail');
    Route::get('search','CommonApiController@search');

});
