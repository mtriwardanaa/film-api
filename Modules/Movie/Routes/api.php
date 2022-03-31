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

Route::middleware('auth:api')->prefix('movie')->group(function() {
    Route::get('list-by-data', 'Api\V1\ApiMovieController@listByData');
    Route::get('list-by-category', 'Api\V1\ApiMovieController@listByCategory');
});