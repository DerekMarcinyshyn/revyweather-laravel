<?php namespace Revyweather\Weather\EnvironmentCanada;
/**
 * Forecast from Environment Canada
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    August 4, 2014
 */

use Illuminate\Filesystem\Filesystem;
use GuzzleHttp\Client;
use SoapBox\Formatter\Formatter;
use Revyweather\Exception\RevyweatherException;

class EnvironmentCanadaException extends RevyweatherException {}

class Forecast {


    const REVELSTOKE = 'http://dd.weatheroffice.gc.ca/citypage_weather/xml/BC/s0000679_e.xml';

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $filesystem;

    /**
     * @var string
     */
    protected $filename;

    /**
     * @param Filesystem $filesystem
     * @param Client $client
     */
    public function __construct(Filesystem $filesystem, Client $client) {
        $this->filesystem = $filesystem;
        $this->client = $client;
        $this->filename = storage_path('data/forecasts/revelstoke-ec.json');
    }

    /**
     * Get Environment Canada Revelstoke weather xml feed
     *
     * @throws EnvironmentCanadaException
     */
    public function getRevelstokeWeather() {
        try {
            $response = $this->client->get(self::REVELSTOKE);

            if ($response->getStatusCode() == '200') {
                $body = $response->xml();

                // convert from XML to JSON
                $data = Formatter::make($body, 'XML')->to_array();

                // save to file
                $this->filesystem->put($this->filename, json_encode($data));
            }
        } catch (\Exception $e) {
            throw new EnvironmentCanadaException($e);
        }
    }
}