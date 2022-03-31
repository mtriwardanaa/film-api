<?php

Route::middleware('auth:api')->prefix('genre')->group(function() {
    Route::get('list', 'Api\V1\ApiGenreController@list');
});