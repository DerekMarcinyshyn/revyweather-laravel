<?php

namespace RevyWeather\Services\Weather;

/**
 * Local
 * @author  Derek Marcinyshyn
 * @date    2016-03-25
 */

use Storage;
use GuzzleHttp\Client;
use RevyWeather\Services\Log\Daily;

class GetLocal
{
    
    const FILENAME = 'public/data/forecasts/revelstoke.json';

    /**
     * @var string
     */
    protected $url;

    /**
     * GetLocal constructor.
     */
    public function __construct()
    {
        $this->url = env('LOCAL_URL');
    }

    /**
     * Get local weather from my house
     * 
     * @param Client $client
     * @param Daily $daily
     */
    public function getWeather(Client $client, Daily $daily)
    {
        try {
            $response = $client->request('GET', $this->url);
            
            if ($response->getStatusCode() == '200') {
                $body = (string) $response->getBody();
                Storage::disk('local')->put(self::FILENAME, $body);
            }
        } catch (\Exception $e) {
            $daily->save('Exception saving local json to disk. '.$e->getMessage());
        }
    }
}