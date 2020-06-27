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
	Route::get('/', 'ApiController@index');
    Route::post('/patient_otp_generate', 'ApiController@patient_otp_generate');
    Route::post('/patient_otp_verify', 'ApiController@patient_otp_verify');
    Route::post('/patient_registration', 'ApiController@patient_registration');
    Route::post('/patient_login', 'ApiController@patient_login');
    Route::get('/search_doctor', 'ApiController@search_doctor');
    Route::get('/doctor_profile_view', 'ApiController@doctor_profile_view');
    Route::get('/doctor_slot_view', 'ApiController@doctor_slot_view');
    Route::get('/patient_profile_view', 'ApiController@patient_profile_view');
    Route::post('/patient_appointment_submit', 'ApiController@patient_appointment_submit');
    Route::get('/patient_booking_history', 'ApiController@patient_booking_history');
    Route::get('/patient_appointment_details', 'ApiController@patient_appointment_details');
    Route::get('/get_state_list', 'ApiController@get_state_list');
    Route::post('/patient_profile_update', 'ApiController@patient_profile_update');
    Route::post('/patient_family_update', 'ApiController@patient_family_update');
    Route::post('/patient_family_remove', 'ApiController@patient_family_remove');
    Route::post('/patient_appointment_cancel', 'ApiController@patient_appointment_cancel');
    Route::post('/patient_member_history', 'ApiController@patient_member_history');
    Route::post('/patient_appointment_rating', 'ApiController@patient_appointment_rating');
    Route::post('/patient_change_password', 'ApiController@patient_change_password');
    Route::post('/patient_forget_password', 'ApiController@patient_forget_password');
    
    



    Route::get('/get-config', 'ApiController@get_config');
    Route::post('/add-host-section', 'ApiController@add_host_section');
    Route::post('/add-api-host', 'ApiController@add_api_host');

});


// Route::middleware('guest:api')->get('/user', 'ApiController@getName');
