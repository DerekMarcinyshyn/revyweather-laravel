@extends('layout')

@section('content')
<md-content class="md-padding" layout="row" layout-align="center">
    <div flex="100" flex-gt-md="66">
        <md-card>
            <md-card-title><h1>About</h1></md-card-title>
            <md-card-content>
                <p>RevyWeather.com is my side project for playing with hardware and software.</p>
            </md-card-content>
            <img src="{{ url('img/weather-station.jpg') }}" />
        </md-card>
        <md-card>
            <md-card-title><h3>Versions</h3></md-card-title>
            <md-card-content>
                <p><strong>v1.0</strong> was built using Zend Framework 2 with the Zend Server on AWS EC2 to test out that DevOps workflow.</p>
                <p><strong>v2.0</strong> was built using Laravel v4.2 and runs on a Digital Ocean droplet and used Laravel Forge for server admin and deployments.</p>
                <p><strong>v3.0</strong> is built on Laravel v5.2 and runs on a <a href="https://www.revelstokewebhosting.net" target="_blank">Revelstoke Web Hosting</a> cloud server.</p>
            </md-card-content>
        </md-card>
        <md-card>
            <md-card-title><h3>Software</h3></md-card-title>
            <md-card-content>
                <p><a href="http://nginx.org/" target="_blank">Nginx</a></p>
                <p><a href="https://httpd.apache.org/" target="_blank">Apache HTTP server</a></p>
                <p><a href="http://php.net/" target="_blank">PHP 7</a></p>
                <p><a href="http://www.mysql.com/" target="_blank">MySQL</a></p>
                <p><a href="http://laravel.com/" target="_blank">Laravel</a></p>
                <p><a href="https://angularjs.org/" target="_blank">Angular JS</a></p>
                <p><a href="https://material.angularjs.org/latest/" target="_blank">Angular Material</a></p>
            </md-card-content>
        </md-card>
        <md-card>
            <md-card-title><h3>Hardware</h3></md-card-title>
            <md-card-content>
                <p><a href="http://netduino.com/netduinoplus2/specs.htm" target="_blank">Netduino Plus 2</a></p>
                <p><a href="http://www.raspberrypi.org/" target="_blank">Raspberry Pi</a></p>
                <p><a href="https://www.sparkfun.com/products/8942" target="_blank">Weather Station</a></p>
                <p><a href="https://www.sparkfun.com/products/9890" target="_blank">Humidity Sensor</a></p>
                <p><a href="https://solarbotics.com/product/52210/" target="_blank">Temperature Sensor</a></p>
                <p><a href="http://www.adafruit.com/products/391" target="_blank">Barometer Sensor</a></p>
            </md-card-content>
        </md-card>
        <md-card>
            <md-card-title><h3>Software</h3></md-card-title>
            <md-card-content>
                <p><a href="https://derek.marcinyshyn.com" target="_blank">Built by - Derek Marcinyshyn</a></p>
                <p><a href="https://github.com/DerekMarcinyshyn/MonasheeWeatherStation" target="_blank">GitHub - Weather Station Netduino C#</a></p>
                <p><a href="https://github.com/DerekMarcinyshyn/revyweather-laravel" target="_blank">GitHub - RevyWeather.com </a></p>
                <p><a href="https://github.com/DerekMarcinyshyn/localweather" target="_blank">GitHub - Local weather server</a></p>
            </md-card-content>
        </md-card>
    </div>
</md-content>
@endsection