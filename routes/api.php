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


Route::post('auth/signin', 'AuthController@authenticate');


// Protected routes
Route::group(['middleware' => 'jwt'], function () {

    //Users
   // Route::post('register', 'Auth\RegisterController@register');
    Route::get('users', 'UserController@index');
    Route::get('users/{uuid}', 'UserController@show');
    Route::post('register', 'UserController@store');
    Route::put('users/{uuid}', 'UserController@update');

    //Vehicles
    Route::get('vehicles', 'VehicleController@index');
    Route::get('vehicles/{uuid}', 'VehicleController@show');
    Route::post('vehicles', 'VehicleController@store');
    Route::put('vehicles/{uuid}', 'VehicleController@update');


});
