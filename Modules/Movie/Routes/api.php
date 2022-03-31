<?php

Route::prefix('movie')->group(function() {
    Route::middleware('auth_client')->group(function() {
        Route::get('list-by-data', 'Api\V1\ApiMovieController@listByData');
        Route::get('list-by-category', 'Api\V1\ApiMovieController@listByCategory');
    });

    Route::middleware('auth:api')->group(function() {
        Route::post('create', 'Api\V1\ApiMovieController@create');
    });
});