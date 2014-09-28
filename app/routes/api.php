<?php
/**
 * API routes
 */

Route::get('api/revelstoke.json', function(){
    return file_get_contents(storage_path('data/forecasts/revelstoke.json'));
});

Route::get('api/local.json', function(){
    return file_get_contents(storage_path('data/forecasts/local.json'));
});

Route::get('api/revelstoke-ec.json', function(){
    return file_get_contents(storage_path('data/forecasts/revelstoke-ec.json'));
});

Route::get('api/latest-image.jpg', function(){
    return file_get_contents(storage_path('data/images/latest-image.jpg'));
});

Route::post('api/get-timelapse-calendar-dates', array(
    'uses' => 'TimelapseController@getTimelapseCalendarDates'
));

Route::get('api/history/{from}/{to}', array(
    'uses' => 'HistoryController@getHistoryJson'
));