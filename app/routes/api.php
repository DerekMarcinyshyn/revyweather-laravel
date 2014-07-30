<?php
/**
 * API routes
 */

Route::get('/api/revelstoke.json', function(){
    return file_get_contents(storage_path('data/forecasts/revelstoke.json'));
});

Route::get('/api/local.json', function(){
    return file_get_contents(storage_path('data/forecasts/local.json'));
});
