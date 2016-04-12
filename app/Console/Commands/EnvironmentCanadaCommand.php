<?php

namespace RevyWeather\Console\Commands;

/**
 * Environment Canada
 * @author  Derek Marcinyshyn
 * @date    2016-03-23
 */

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use RevyWeather\Services\Log\Daily;
use RevyWeather\Services\Weather\GetEnvironmentCanada;

class EnvironmentCanadaCommand extends Command
{

    /**
     * @var string
     */
    protected $signature = 'revyweather:environment-canada';

    /**
     * @var string
     */
    protected $description = 'Get the latest XML Environment Canada for Revelstoke';

    /**
     * EnvironmentCanada constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * @param GetEnvironmentCanada $ec
     * @param Client $client
     * @param Daily $daily
     * @return mixed
     */
    public function handle(GetEnvironmentCanada $ec, Client $client, Daily $daily)
    {
        $this->info('Getting the Revelstoke XML feed');
        $ec->getRevelstokeWeather($client, $daily);
        $this->info('done.');
    }
}
