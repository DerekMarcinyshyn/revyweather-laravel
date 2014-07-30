<?php
/**
 * API routes
 */

Route::get('/api/revelstoke.json', function(){
    return file_get_contents(storage_path('data/forecasts/revelstoke.json'));
});