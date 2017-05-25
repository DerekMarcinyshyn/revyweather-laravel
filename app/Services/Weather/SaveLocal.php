<?php

namespace RevyWeather\Services\Weather;

/**
 * SaveLocal.php
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    27/03/16
 */

use RevyWeather\Local;
use GuzzleHttp\Client;
use RevyWeather\Services\Log\Daily;

class SaveLocal
{

    /**
     * @var string
     */
    protected $url;

    /**
     * @var Local
     */
    protected $local;

    /**
     * SaveLocal constructor.
     * @param Local $local
     */
    public function __construct(Local $local)
    {
        $this->url = env('LOCAL_URL');
        $this->local = $local;
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
            $response = $client->get($this->url);

            if ($response->getStatusCode() == '200') {
                $body = (string) $response->getBody();
                $this->saveToDatabase($body);
            }

        } catch (\Exception $e) {
            $daily->save('Exception saving local weather to database. '.$e->getMessage());
        }
    }

    /**
     * Save json to database
     *
     * @param $body
     */
    protected function saveToDatabase($body)
    {
        $data = json_decode($body);

        $this->local->temp = number_format($data->temperature, 1);
        $this->local->humidity = number_format($data->humidity, 0);
        $this->local->relative_humidity = number_format($data->relativehumidity, 0);
        $this->local->bmp_temperature = number_format($data->bmp_temperature);
        $this->local->barometer = number_format($data->barometer, 1);
        $this->local->direction = $data->direction;
        $gust = (float) $data->gust * 1.60934;
        $this->local->speed = number_format($gust, 1);
        $this->local->save();
    }
}