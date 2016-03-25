<?php

namespace RevyWeather\Console\Commands;

/**
 * Forecast.io Command
 * @author  Derek Marcinyshyn
 * @date    2016-03-24
 */

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
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(GetForecastio $getForecastio)
    {
        $this->info('Get Forecast.io Revelstoke forecast...');
        $getForecastio->getRevelstoke();
        $this->info('done.');
    }
}
