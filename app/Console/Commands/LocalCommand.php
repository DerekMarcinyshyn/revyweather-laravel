<?php

namespace RevyWeather\Console\Commands;

/**
 * Get local weather
 * @author  Derek Marcinyshyn
 * @date    2016-03-25
 */

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use RevyWeather\Services\Log\Daily;
use RevyWeather\Services\Weather\GetLocal;

class LocalCommand extends Command
{

    /**
     * @var GetLocal
     */
    protected $getLocal;

    /**
     * @var string
     */
    protected $signature = 'revyweather:local';

    /**
     * @var string
     */
    protected $description = 'Get the local weather from my house.';

    /**
     * LocalCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param GetLocal $getLocal
     * @param Client $client
     * @param Daily $daily
     */
    public function handle(GetLocal $getLocal, Client $client, Daily $daily)
    {
        $this->comment('Getting local weather...');
        $getLocal->getWeather($client, $daily);
        $this->info('done.');
    }
}
