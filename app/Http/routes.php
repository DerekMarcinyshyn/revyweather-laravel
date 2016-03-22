<?php

/**
 * Routes
 * @author  Derek Marcinyshyn
 * @date    2016-03-20
 */

use Illuminate\Support\Facades\Route;

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
