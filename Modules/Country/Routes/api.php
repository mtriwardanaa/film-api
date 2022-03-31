<?php

Route::middleware('auth:api')->prefix('country')->group(function() {
    Route::get('list', 'Api\V1\ApiCountryController@list');
});