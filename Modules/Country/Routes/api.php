<?php

Route::middleware('auth_client')->prefix('country')->group(function() {
    Route::get('list', 'Api\V1\ApiCountryController@list');
});