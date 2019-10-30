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

Route::middleware('api')->get('test', 'ApiController@test');

Route::middleware('api')->post('applicants', 'ApiController@post_applicants');
Route::middleware('api')->post('employers', 'ApiController@post_employers');
Route::middleware('api')->post('swipe', 'ApiController@post_swipe');
