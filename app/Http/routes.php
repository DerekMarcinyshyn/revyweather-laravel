<?php

/**
 * Routes
 * @author  Derek Marcinyshyn
 * @date    2016-03-20
 */

Route::group(['middleware' => ['web']], function() {
    
    // Pages
    Route::get('/', function () {
        return view('home');
    });
    Route::get('history', function() {
        return view('history');
    });
    Route::get('webcams', function() {
        return view('webcams');
    });
    Route::get('map', function() {
        return view('map');
    });
    Route::get('timelapse', function() {
        return view('timelapse');
    });
    Route::get('about', function() {
        return view('about');
    });
    
    // API
    Route::group(['middleware' => ['api']], function() {
        // JSON
        Route::get('api/v1/ec-revelstoke.json', function() {
            return response(file_get_contents(storage_path('app/public/data/forecasts/ec-revelstoke.json')))
                ->withHeaders([
                    'Content-Type'  => 'application/json'
                ]);
        });
        Route::get('api/v1/forecastio-revelstoke.json', function() {
            return response(file_get_contents(storage_path('app/public/data/forecasts/forecastio-revelstoke.json')))
                ->withHeaders([
                    'Content-Type'  => 'application/json'
                ]);
        });
        Route::get('api/v1/history', [
            'uses' => 'HistoryController@getHistory'
        ]);
    });

    Route::get('api/v1/revelstoke.json', function() {
        return response(file_get_contents(storage_path('app/public/data/forecasts/revelstoke.json')))
            ->withHeaders([
                'Content-Type'  => 'application/json'
            ]);
    });
});