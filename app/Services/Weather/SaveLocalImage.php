<?php namespace 

RevyWeather\Services\Weather;

/**
 * SaveLocalImage.php
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    27/03/16
 */

use Storage;
use GuzzleHttp\Client;
use RevyWeather\Services\Log\Daily;

class SaveLocalImage
{

    const FILENAME = 'public/data/images/courthouse.jpg';

    /**
     * @var string
     */
    protected $url;

    /**
     * GetLocal constructor.
     */
    public function __construct()
    {
        $this->url = env('LOCAL_IMAGE');
    }

    /**
     * Get local image from my house
     *
     * @param Client $client
     * @param Daily $daily
     */
    public function getWeather(Client $client, Daily $daily)
    {
        try {
            $response = $client->request('GET', $this->url);

            if ($response->getStatusCode() == '200') {
                Storage::disk('local')->put(self::FILENAME, $response->getBody());
            }

        } catch (\Exception $e) {
            $daily->save('Exception saving local image to disk. '.$e->getMessage());
        }
    }
}