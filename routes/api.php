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

Route::middleware('auth:api')->group(function () {
    
    // Create new item
    Route::post('/items', 'ItemController@store');

    // account
    Route::get('/account', 'AccountController@index');
    
    // account update password
    Route::put('/account/password', 'AccountController@updatePassword');

});

// Items Controller
Route::get('/items', 'ItemController@index');

// Signup
Route::post('/signup', 'SignupController@signup');

// Signin
Route::post('/signin', 'SigninController@signin');