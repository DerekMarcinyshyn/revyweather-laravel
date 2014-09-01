<?php namespace Revyweather\Weather\Local;
/**
 * Image.php
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    31/08/14
 */

use Revyweather\Exception\RevyweatherException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Filesystem\Filesystem;

class ImageException extends RevyweatherException {}

class Image {

    /**
     * @var string
     */
    private $filename;

    /**
     * @var \Illuminate\Filesystem\Filesystem
     */
    private $filesystem;

    /**
     * @var string
     */
    private $url;

    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * @param Client $client
     * @param Filesystem $filesystem
     */
    public function __construct(Client $client, Filesystem $filesystem) {
        $this->client = $client;
        $this->filesystem = $filesystem;
        $this->filename = storage_path('data/images/latest-image.jpg');
        $this->url = getenv('LOCAL_IMAGE_URL');
    }

    /**
     * Get latest image from local server
     *
     * @throws ImageException
     */
    public function getLatestImage() {
        try {
            $response = $this->client->get($this->url);
            if ($response->getStatusCode() == '200') {
                $this->filesystem->put($this->filename, $response->getBody());
            }
        } catch (RequestException $e) {
            throw new ImageException($e);
        }
    }
} 