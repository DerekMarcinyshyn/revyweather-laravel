<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('history', function() {
    return 'history';
});

Route::get('webcams', function() {
    return 'webcams';
});

Route::get('map', function() {
    return 'map';
});

Route::get('timelapse', function() {
    return 'timelapse';
});

Route::get('about', function() {
    return 'about';
});
