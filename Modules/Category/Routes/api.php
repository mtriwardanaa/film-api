<?php

Route::middleware('auth:api')->prefix('category')->group(function() {
    Route::get('list', 'Api\V1\ApiCategoryController@list');
});