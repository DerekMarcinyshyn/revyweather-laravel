<?php

namespace RevyWeather\Console\Commands;

/**
 * Forecast.io Command
 * @author  Derek Marcinyshyn
 * @date    2016-03-24
 */

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use RevyWeather\Services\Weather\GetForecastio;

class ForecastIoCommand extends Command
{
    
    /**
     * @var string
     */
    protected $signature = 'revyweather:forecast-io';

    /**
     * @var string
     */
    protected $description = 'Get the latest Forecast.io forecast for Revelstoke.';

    /**
     * ForecastIoCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param GetForecastio $getForecastio
     * @param Client $client
     */
    public function handle(GetForecastio $getForecastio, Client $client)
    {
        $this->info('Get Forecast.io Revelstoke forecast...');
        $getForecastio->getRevelstoke($client);
        $this->info('done.');
    }
}
