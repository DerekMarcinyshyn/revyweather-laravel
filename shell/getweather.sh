#!/bin/sh
#
# Get the weather data from local server
#
# @author Derek Marcinyshyn <derek@marcinyshyn.com>
# @date   August 4, 2014

while (sleep 5 && /usr/bin/php /home/monashee/code/revyweather/artisan revyweather:courthouse)
do
    wait $!
done