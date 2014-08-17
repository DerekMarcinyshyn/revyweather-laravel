<?php namespace Revyweather\Weather\Local;
/**
 * Get the local weather data
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    July 29, 2014
 */

use GuzzleHttp\Client;
use Illuminate\Filesystem\Filesystem;
use Revyweather\Exception\RevyweatherException;

class LocalDataException extends RevyweatherException {}

class Data {

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $filename;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $filesystem;

    /**
     * @param Client $client
     * @param Filesystem $filesystem
     */
    public function __construct(Client $client, Filesystem $filesystem) {
        $this->client = $client;
        $this->filesystem = $filesystem;
        $this->url = getenv('LOCAL_SERVER_URL');
        $this->filename = storage_path('data/forecasts/local.json');
    }

    /**
     * Get the local weather data from local server
     *
     * @return bool
     */
    public function getWeatherData() {
        try {
            $response = $this->client->get($this->url);

            if ($response->getStatusCode() == '200') {
                $body = $response->getBody();

                $this->filesystem->put($this->filename, $body);
            }
        } catch (\Exception $e) {
            throw new LocalDataException($e);
        }
    }
} 