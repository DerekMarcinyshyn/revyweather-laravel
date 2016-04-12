# Revy Weather

[![Build Status](https://travis-ci.org/DerekMarcinyshyn/revyweather-laravel.svg?branch=master)](https://travis-ci.org/DerekMarcinyshyn/revyweather-laravel)

This version is deprecated and will be updating to Laravel 5 shortly.

The hardware is a Netduino Plus 2 and a RaspberryPi connected to a local server at my home.

The software is this Laravel web application collecting the data from local server and serving it on the internet.

The software stack includes [HHVM](http://hhvm.com/), [nginx](http://nginx.org/), [Laravel](http://laravel.com/) and [AngularJS](https://angularjs.org/) with [Laravel Forge](https://forge.laravel.com/) on [AWS EC2](http://aws.amazon.com/).

More on [http://revyweather.com/about](http://revyweather.com/about)

## Hardware

[Netduino Plus 2](https://github.com/DerekMarcinyshyn/MonasheeWeatherStation)
Weather Station drivers for real-time data.
* Temperature
* Humidity
* Wind speed
* Wind direction
* Rain gauge

A RaspberryPi uses [RPi.GPIO](https://pypi.python.org/pypi/RPi.GPIO) for the barometer and second temperature sensors. The RaspberryPi also has a RaspberryPi camera attached.

Both are connected to a local server that creates the timelapse videos, syncs with AWS S3 and web server.

## Environment variables

You need to create a .env.php and .env.local.php

```php
<?php

return [
    'FORECAST_IO_KEY'   => 'forecast-io-key',
    'LOCAL_SERVER_URL'  => 'http://example.com',
    'GMAIL_USERNAME'    => 'username',
    'GMAIL_PASSWORD'    => 'password',
    'LOCAL_IMAGE_URL'   => 'http://example.com/image.jpg'
];
```

## Testing
```php
vendor/bin/codecept run
```

### License

The MIT License (MIT)

Copyright (c) 2014 Derek Marcinyshyn

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.