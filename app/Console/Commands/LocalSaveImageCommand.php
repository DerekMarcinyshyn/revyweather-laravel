<?php

namespace RevyWeather\Console\Commands;

/**
 * Save Local image command
 * @author  Derek Marcinyshyn
 * @date    2016-03-27
 */

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use RevyWeather\Services\Log\Daily;
use RevyWeather\Services\Weather\SaveLocalImage;

class LocalSaveImageCommand extends Command
{

    /**
     * @var SaveLocalImage
     */
    protected $saveLocalImage;

    /**
     * @var string
     */
    protected $signature = 'revyweather:local-save-image';

    /**
     * @var string
     */
    protected $description = 'Get the latest image from my house and save to disk.';

    /**
     * LocalSaveImageCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param SaveLocalImage $saveLocalImage
     * @param Client $client
     * @param Daily $daily
     */
    public function handle(SaveLocalImage $saveLocalImage, Client $client, Daily $daily)
    {
        $this->comment('Getting and saving local image');
        $saveLocalImage->getWeather($client, $daily);
        $this->info('done');
    }
}
