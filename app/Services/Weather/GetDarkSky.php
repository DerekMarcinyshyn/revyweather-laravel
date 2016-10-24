<?php

namespace RevyWeather\Services\Weather;

use Storage;
use GuzzleHttp\Client;
use RevyWeather\Services\Log\Daily;

/**
 * Class GetDarkSky
 * @package RevyWeather\Services\Weather
 * @author  Derek Marcinyshyn
 * @since   2016-10-23
 */

class GetDarkSky
{

    const FILENAME = 'public/data/forecasts/dark-sky-revelstoke.json';

    /** @var string */
    protected $apiSecretKey;

    /** @var  Client */
    protected $client;

    /** @var  Daily */
    protected $daily;

    /**
     * GetDarkSky constructor.
     * @param Client $client
     * @param Daily $daily
     */
    public function __construct(Client $client, Daily $daily)
    {
        $this->apiSecretKey = env('DARK_SKY_SECRET_KEY');
        $this->client = $client;
        $this->daily = $daily;
    }

    /**
     * Get the Dark Sky Revelstoke weather and save to disk
     *
     */
    public function getRevelstoke()
    {
        try {
            $response = $this->client->get($this->getApiUrl());

            if ($response->getStatusCode() == '200') {
                $body = (string) $response->getBody();
                Storage::disk('local')->put(self::FILENAME, $body);
            }
        } catch (\Exception $e) {
            $this->daily->save('Exception saving Dark Sky api to disk. ' . $e->getMessage());
        }
    }

    /**
     * Get Dark Sky API URL
     *
     * @return string
     */
    protected function getApiUrl()
    {
        return 'https://api.darksky.net/forecast/' . $this->apiSecretKey . '/50.9987,-118.1950?units=ca';
    }
}