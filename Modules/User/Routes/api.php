<?php

Route::prefix('user')->group(function() {
    Route::middleware('auth_client')->group(function() {
        Route::post('create', 'Api\V1\ApiUserController@create');
    });
});