<?php

require_once 'routes/api.php';

Route::get('/', array(
    'as'        => 'home',
    'uses'      => 'HomeController@index'
));

Route::get('webcams', array(
    'as'        => 'webcams',
    'uses'      => 'WebcamsController@index'
));

Route::get('map', array('as' => 'map', function() {
    return Response::view('content.map');
}));

Route::get('about', array('as' => 'about', function() {
    return Response::view('content.about');
}));

Route::get('timelapse', array('as'        => 'timelapse', function(){
    return Response::view('content.timelapse');
}));