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

Route::group(['prefix' => '','namespace' => 'Api'],function (){

    Route::group(['prefix' => 'admins'],function (){
        Route::post('password/email', 'AdminApiController@forgot');
        Route::post('password/reset', 'AdminApiController@reset');
        Route::post('/login','AdminApiController@login');
        Route::get('/','AdminApiController@index')->middleware('auth:admin_api');
        Route::post('/register','AdminApiController@create');//->middleware('auth:admin_api');
        Route::put('/{id}','AdminApiController@update');//->middleware('auth:admin_api');;
        Route::get('/{id}','AdminApiController@find')->middleware('auth:admin_api');
        Route::delete('/{id}','AdminApiController@delete')->middleware('auth:admin_api');
    });
    Route::group(['prefix' => 'role'],function (){
        Route::get('/','RoleApiController@index');//->middleware('auth:admin_api');
        Route::post('/create','RoleApiController@create');//->middleware('auth:admin_api');
        Route::put('/{id}','RoleApiController@update');//->middleware('auth:admin_api');;
        Route::get('/{id}','RoleApiController@find');//->middleware('auth:admin_api');
        Route::delete('/{id}','RoleApiController@delete');//->middleware('auth:admin_api');
    });

    });
