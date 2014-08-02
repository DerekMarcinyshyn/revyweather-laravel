<?php namespace Revyweather\Forecastio;

/**
 * Revelstoke Forecast.io
 *
 * @author  Derek Marcinyshyn
 * @date    July 28, 2014
 */

use Illuminate\Filesystem\Filesystem;
use GuzzleHttp\Client;

class Revelstoke {

    protected $key;
    protected $filename;
    protected $filesystem;
    protected $client;

    public function __construct() {
        $this->key = getenv('FORECAST_IO_KEY');
        $this->filesystem = new Filesystem;
        $this->filename = storage_path('data/forecasts/revelstoke.json');
        $this->client = new Client;
    }

    /**
     * Get Revelstoke Forecast.io and save json file
     *
     * @return bool
     */
    public function revelstoke() {
        $gps = '50.9987,-118.1950';
        $url = 'https://api.forecast.io/forecast/' . $this->key . '/' . $gps . '?units=ca';
        $response = $this->client->get($url);

        if ($response->getStatusCode() == '200') {
            $body = $response->getBody();
            $this->filesystem->put($this->filename, $body);

            return true;
        } else {
            return false;
        }
    }
} 