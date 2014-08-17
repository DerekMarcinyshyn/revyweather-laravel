<?php namespace Revyweather\Weather\Forecastio;
/**
 * Revelstoke Forecast.io
 *
 * @author  Derek Marcinyshyn
 * @date    July 28, 2014
 */

use Illuminate\Filesystem\Filesystem;
use GuzzleHttp\Client;
use Revyweather\Exception\RevyweatherException;

class ForecastioException extends RevyweatherException {}

class Revelstoke {

    /**
     * @var string
     */
    protected $key;

    /**
     * @var string
     */
    protected $filename;

    /**
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $filesystem;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @param Filesystem $filesystem
     * @param Client $client
     */
    public function __construct(Filesystem $filesystem, Client $client) {
        $this->filesystem = $filesystem;
        $this->client = $client;
        $this->key = getenv('FORECAST_IO_KEY');
        $this->filename = storage_path('data/forecasts/revelstoke.json');
    }

    /**
     * Get Revelstoke Forecast.io and save json file
     *
     * @return bool
     */
    public function revelstoke() {
        try {
            $gps = '50.9987,-118.1950';
            $url = 'https://api.forecast.io/forecast/' . $this->key . '/' . $gps . '?units=ca';
            $response = $this->client->get($url);

            if ($response->getStatusCode() == '200') {
                $body = $response->getBody();
                $this->filesystem->put($this->filename, $body);
            }
        } catch (\Exception $e) {
            throw new ForecastioException($e);
        }
    }
} 