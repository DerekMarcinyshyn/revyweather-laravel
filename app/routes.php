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

Route::get('about', array('as' => 'about', function() {
    return Response::view('content.about');
}));