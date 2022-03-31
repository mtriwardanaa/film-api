<?php

Route::middleware('auth_client')->prefix('genre')->group(function() {
    Route::get('list', 'Api\V1\ApiGenreController@list');
});