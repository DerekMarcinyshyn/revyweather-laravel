<?php namespace Revyweather\Weather\Local;
/**
 * Get the local weather data
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    July 29, 2014
 */

use GuzzleHttp\Client;
use Illuminate\Filesystem\Filesystem;

class Data {

    protected $url;
    protected $client;
    protected $filesystem;
    protected $filename;

    public function __construct() {
        $this->url = getenv('LOCAL_SERVER_URL');
        $this->client = new Client;
        $this->filesystem = new Filesystem;
        $this->filename = storage_path('data/forecasts/local.json');
    }

    /**
     * Get the local weather data from local server
     *
     * @return bool
     */
    public function getWeatherData() {
        $response = $this->client->get($this->url);

        if ($response->getStatusCode() == '200') {
            $body = $response->getBody();

            $this->filesystem->put($this->filename, $body);

            return true;
        } else {
            return false;
        }
    }
} 