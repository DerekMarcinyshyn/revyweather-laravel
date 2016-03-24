<?php

namespace RevyWeather\Services\Weather;

/**
 * Environment Canada
 * @author  Derek Marcinyshyn
 * @date    2016-03-23
 */

use Storage;
use SoapBox\Formatter\Formatter;
use GuzzleHttp\Client;

class GetEnvironmentCanada
{

    const REVELSTOKE = 'http://dd.weatheroffice.gc.ca/citypage_weather/xml/BC/s0000679_e.xml';
    const FILENAME = 'public/data/forecasts/ec-revelstoke.json';

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * EnvironmentCanada constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return bool
     */
    public function getRevelstokeWeather()
    {
        try {
            $response = $this->client->get(self::REVELSTOKE);

            if ($response->getStatusCode() == '200') {
                $body = (string) $response->getBody();

                // convert xml to json
                $json = Formatter::make($body, Formatter::XML)->toJson();
                Storage::disk('local')->put(self::FILENAME, $json);

                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            return false;
        }
    }
}