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

// Auth
//Route::post('register', 'Auth\RegisterController@create');
Route::post('auth/signin', 'AuthController@authenticate');
Route::post('register', 'LoginController@login');

    // Protected routes
Route::group(['middleware' => 'jwt'], function () {

  Route::resource('index', 'IndexController');

  Route::get('test', function(){
    return response()->json(['foo'=>'bar']);
    });
});
