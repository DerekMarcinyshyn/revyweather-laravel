# Revy Weather

[![Build Status](https://travis-ci.org/DerekMarcinyshyn/revyweather-laravel.svg?branch=master)](https://travis-ci.org/DerekMarcinyshyn/revyweather-laravel)

This is one of my side projects.

More on info: [http://revyweather.com/about](http://revyweather.com/about)

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

.env

```php
APP_ENV=local
APP_DEBUG=true
APP_KEY=some_key_
APP_URL=http://example.com

DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.sendgrid.net
MAIL_PORT=587
MAIL_USERNAME=username
MAIL_PASSWORD=password
MAIL_ENCRYPTION=tls

FORECAST_IO_KEY=forecast_io_key
LOCAL_URL=http://example.com/current
LOCAL_IMAGE=http://example.com/latest-image
```

## Testing
```php
vendor/bin/phpunit
```

### License

The MIT License (MIT)

Copyright (c) 2014-2016 Derek Marcinyshyn

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