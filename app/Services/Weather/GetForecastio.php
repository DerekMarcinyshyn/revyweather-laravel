<?php

namespace RevyWeather\Services\Weather;

/**
 * GetForecastio
 *
 * @author  Derek Marcinyshyn
 * @date    2016-03-24
 */

use Storage;
use GuzzleHttp\Client;

class GetForecastio
{

    const FILENAME = 'public/data/forecasts/forecastio-revelstoke.json';

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $key;

    /**
     * GetForecastio constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->key = env('FORECAST_IO_KEY');
    }

    /**
     * Get Revelstoke json from Forecast.io
     */
    public function getRevelstoke()
    {
        try {

            $response = $this->client->get($this->createUrl());
            
            if ($response->getStatusCode() == '200') {
                $body = (string) $response->getBody();
                Storage::disk('local')->put(self::FILENAME, $body);
            }
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }

    /**
     * @return string
     */
    private function createUrl()
    {
        return 'https://api.forecast.io/forecast/' . $this->key . '/50.9987,-118.1950?units=ca';
    }
}