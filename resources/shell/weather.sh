#!/usr/bin/env bash
#
# Get the weather data from the local server every 5 seconds
# @author   Derek Marcinyshyn
# @date     2016-10-10
while (sleep 5 && /usr/bin/php /var/www/vhosts/revyweather.ca/httpdocs/revyweather-laravel/artisan revyweather:local)
do
    wait $!
done