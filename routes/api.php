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
    Route::get('/get-config', 'ApiController@get_config');
    Route::post('/add-host-section', 'ApiController@add_host_section');
    Route::post('/add-api-host', 'ApiController@add_api_host');

});


// Route::middleware('guest:api')->get('/user', 'ApiController@getName');
