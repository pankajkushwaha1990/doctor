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

Route::middleware('guest:api')->group(function () {
    Route::post('/user-registration', 'ApiController@user_registration');
    Route::post('/user-registration-otp-generate', 'ApiController@user_registration_otp_generate');
    Route::post('/user-login', 'ApiController@user_login');

});


// Route::middleware('guest:api')->get('/user', 'ApiController@getName');
