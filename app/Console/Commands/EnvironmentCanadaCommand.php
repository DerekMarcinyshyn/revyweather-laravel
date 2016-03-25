<?php

namespace RevyWeather\Console\Commands;

/**
 * Environment Canada
 * @author  Derek Marcinyshyn
 * @date    2016-03-23
 */

use Illuminate\Console\Command;
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
     * @return mixed
     */
    public function handle(GetEnvironmentCanada $ec)
    {
        $this->info('Getting the Revelstoke XML feed');
        $ec->getRevelstokeWeather();
        $this->info('done.');
    }
}
