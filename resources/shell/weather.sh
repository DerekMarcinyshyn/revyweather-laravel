#!/usr/bin/env bash
#
# Get the weather data from the local server every 5 seconds
# @author   Derek Marcinyshyn
# @date     2014-08-04
while (sleep 5 && /usr/bin/php /var/www/vhosts/revelstokewebhosting.net/revyweather.ca/artisan revyweather:local)
do
    wait $!
done