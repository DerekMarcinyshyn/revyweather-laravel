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
     * @var GetForecastio
     */
    protected $getForecastio;

    /**
     * ForecastIoCommand constructor.
     * @param GetForecastio $getForecastio
     */
    public function __construct(GetForecastio $getForecastio)
    {
        parent::__construct();
        $this->getForecastio = $getForecastio;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Get Forecast.io Revelstoke forecast...');
        $this->getForecastio->getRevelstoke();
        $this->info('done.');
    }
}
