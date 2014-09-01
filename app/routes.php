<?php

require_once 'routes/api.php';

Route::get('/', array(
    'uses'      => 'HomeController@index'
));

Route::get('webcams', array(
    'uses'      => 'WebcamsController@index'
));