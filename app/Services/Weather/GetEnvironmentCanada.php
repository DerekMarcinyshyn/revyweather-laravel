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
use RevyWeather\Services\Log\Daily;

class GetEnvironmentCanada
{

    const REVELSTOKE = 'http://dd.weatheroffice.gc.ca/citypage_weather/xml/BC/s0000679_e.xml';
    const FILENAME = 'public/data/forecasts/ec-revelstoke.json';

    /**
     * Get Environment Canada Revelstoke XML feed and
     * convert to JSON and
     * save to filesystem
     * 
     * @param Client $client
     * @param Daily $daily
     */
    public function getRevelstokeWeather(Client $client, Daily $daily)
    {
        try {
            $response = $client->get(self::REVELSTOKE);

            if ($response->getStatusCode() == '200') {
                $body = (string)$response->getBody();
                $json = Formatter::make($body, Formatter::XML)->toJson();
                Storage::disk('local')->put(self::FILENAME, $json);
            }
        } catch (\Exception $e) {
            $daily->save('Exception saving Environment Canada forecast to disk. '.$e->getMessage());
        }
    }
}