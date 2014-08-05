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

class Forecast {

    const REVELSTOKE = 'http://dd.weatheroffice.gc.ca/citypage_weather/xml/BC/s0000679_e.xml';

    protected $client;
    protected $filesystem;
    protected $filename;

    public function __construct() {
        $this->filesystem = new Filesystem;
        $this->client = new Client;
        $this->filename = storage_path('data/forecasts/revelstoke-ec.json');
    }

    public function getRevelstokeWeather() {
        $response = $this->client->get(self::REVELSTOKE);

        if ($response->getStatusCode() == '200') {
            $body = $response->xml();

            // convert from XML to JSON
            $data = Formatter::make($body, 'XML')->to_array();

            // save to file
            $this->filesystem->put($this->filename, json_encode($data));
        }
    }


}