<?php namespace Revyweather\Weather\Local;
/**
 * Save.php
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    26/09/14
 */

use GuzzleHttp\Client;
use Revyweather\Exception\RevyweatherException;
use Current;
use Illuminate\Events\Dispatcher;

class LocalSaveException extends RevyweatherException {}

class Save {

    /**
     * @var Dispatcher
     */
    protected $event;

    /**
     * @var Current
     */
    protected $current;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $url;

    /**
     * @param Client $client
     * @param Current $current
     * @param Dispatcher $event
     */
    public function __construct(Client $client, Current $current, Dispatcher $event)
    {
        $this->client = $client;
        $this->current = $current;
        $this->event = $event;
        $this->url = getenv('LOCAL_SERVER_URL');
    }

    /**
     * @throws LocalSaveException
     */
    public function weatherToDatabase()
    {
        try {
            $response = $this->client->get($this->url);

            if ($response->getStatusCode() == '200') {
                $this->saveToDatabase($response->json());
            }

        } catch (\Exception $e) {
            $this->event->fire('local.save.fail');
            throw new LocalSaveException($e);
        }
    }

    /**
     * @param $json
     */
    private function saveToDatabase($json)
    {
        $this->current->temp = number_format($json['temperature'], 1);
        $this->current->humidity = number_format($json['humidity'], 0);
        $this->current->relative_humidity = number_format($json['relativehumidity'], 0);
        $this->current->bmp_temperature = number_format($json['bmp_temperature']);
        $this->current->barometer = number_format($json['barometer'], 1);
        $this->current->direction = $json['direction'];
        $this->current->speed = number_format($json['speed'], 1);
        $this->current->save();

        $this->event->fire('local.save.success');
    }
} 