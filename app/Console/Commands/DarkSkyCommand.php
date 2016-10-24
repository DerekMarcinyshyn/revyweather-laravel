<?php

namespace RevyWeather\Console\Commands;

use Illuminate\Console\Command;
use RevyWeather\Services\Weather\GetDarkSky;

/**
 * Class DarkSkyCommand
 * @package RevyWeather\Console\Commands
 * @author  Derek Marcinyshyn
 * @since   2016-10-23
 */

class DarkSkyCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'revyweather:dark-sky';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get the latest Revelstoke weather from Dark Sky API';

    /**
     * DarkSkyCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get Revelstoke Dark Sky weather
     *
     * @param GetDarkSky $getDarkSky
     */
    public function handle(GetDarkSky $getDarkSky)
    {
        $this->info('Connecting to Dark Sky to get Revelstoke weather...');
        $getDarkSky->getRevelstoke();
        $this->info('done.');
    }
}
