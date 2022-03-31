<?php

Route::prefix('movie')->group(function() {
    Route::middleware('auth_client')->group(function() {
        Route::get('list-by-data', 'Api\V1\ApiMovieController@listByData');
        Route::get('list-by-category', 'Api\V1\ApiMovieController@listByCategory');
        Route::get('list-coming-soon', 'Api\V1\ApiMovieController@listComingSoon');
    });

    Route::middleware('auth:api')->group(function() {
        Route::middleware('admin_access')->group(function() {
            Route::post('create', 'Api\V1\ApiMovieController@create');
            Route::put('update', 'Api\V1\ApiMovieController@update');
            Route::delete('delete', 'Api\V1\ApiMovieController@delete');
        });

        Route::post('favorite', 'Api\V1\ApiMovieController@favorite');
        Route::post('rating', 'Api\V1\ApiMovieController@rating');
    });
});