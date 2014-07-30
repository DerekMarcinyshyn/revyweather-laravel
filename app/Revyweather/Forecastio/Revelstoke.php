<?php namespace Revyweather\Forecastio;

/**
 * Revelstoke Forecast.io
 *
 * @author  Derek Marcinyshyn
 * @date    July 28, 2014
 */

use Illuminate\Filesystem\Filesystem;

class Revelstoke {

    protected $key;
    protected $filename;

    public function __construct() {
        $this->key = getenv('FORECAST_IO_KEY');
        $this->filename = storage_path('data/forecasts/revelstoke.json');
    }

    /**
     * Get and save json file
     *
     * @return bool
     */
    public function start() {

        $gps = '51.0104,-118.2135';

        try {
            $json = file_get_contents('https://api.forecast.io/forecast/' . $this->key . '/' . $gps . '?units=ca');

            $fs = new Filesystem();
            $fs->put($this->filename, $json);

            return true;
        } catch (\Exception $e) {

            return false;
        }

    }



} 