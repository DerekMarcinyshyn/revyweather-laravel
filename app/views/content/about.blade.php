@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>About</h1>
            <p>This is a side project for my programming and hardware experimentation. I work on this project whenever I may have some spare time between family and work.</p>
            <p>Most of the hardware experimentation occurred over the summer of 2013.</p>
            <p>During the fall of 2013, I built version 1 using Zend Framework 2 running on Zend Server on AWS EC2.</p>
            <p>During the summer and fall of 2014, I rewrote both the local weather server and this application using Laravel. I find Laravel a much more enjoyable framework to code web applications.</p>
            <p>Contact: <a href="mailto:info@monasheemountainmultimedia.com"><em>info@monasheemountainmultimedia.com</em></a></p>

            <h2>Software Overview</h2>
            <ul>
                <li><a href="https://www.digitalocean.com/" target="_blank">Ubuntu Server on Digital Ocean</a></li>
                <li><a href="https://forge.laravel.com/" target="_blank">Laravel Forge</a></li>
                <li><a href="http://nginx.org/" target="_blank">Nginx</a></li>
                <li><a href="http://php.net/" target="_blank">PHP 5.6</a></li>
                <li><a href="http://www.mysql.com/" target="_blank">MySQL</a></li>
                <li><a href="http://laravel.com/" target="_blank">Laravel</a></li>
                <li><a href="http://getbootstrap.com/" target="_blank">Bootstrap</a></li>
                <li><a href="https://angularjs.org/" target="_blank">AngularJS</a></li>
                <li><a href="http://jquery.com/" target="_blank">jQuery</a></li>
            </ul>

            <h2>Hardware Overview</h2>
            <ul>
                <li><a href="http://netduino.com/netduinoplus2/specs.htm" target="_blank">Netduino Plus 2</a></li>
                <li><a href="http://www.raspberrypi.org/" target="_blank">Raspberry Pi</a></li>
                <li><a href="https://www.sparkfun.com/products/8942" target="_blank">Weather Station</a></li>
                <li><a href="https://www.sparkfun.com/products/9890" target="_blank">Humidity Sensor</a></li>
                <li><a href="https://solarbotics.com/product/52210/" target="_blank">Temperature Sensor</a></li>
                <li><a href="http://www.adafruit.com/products/391" target="_blank">Barometer Sensor</a></li>
            </ul>

            <h2>Resources</h2>
            <ul>
                <li><a href="https://github.com/DerekMarcinyshyn/MonasheeWeatherStation" target="_blank">Netduino Code GitHub</a></li>
                <li><a href="https://github.com/DerekMarcinyshyn/revyweather-laravel" target="_blank">Revyweather.com GitHub</a></li>
                <li><a href="https://github.com/DerekMarcinyshyn/localweather" target="_blank">Local weather server GitHub</a></li>
                <li><a href="https://github.com/DerekMarcinyshyn/monashee-backup" target="_blank">MySql backup utility</a></li>
            </ul>

        </div>
    </div>
</div>
@stop