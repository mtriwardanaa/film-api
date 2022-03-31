<?php

Route::middleware('auth_client')->prefix('category')->group(function() {
    Route::get('list', 'Api\V1\ApiCategoryController@list');
});