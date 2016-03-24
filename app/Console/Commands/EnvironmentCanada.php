<?php

namespace RevyWeather\Console\Commands;

/**
 * Environment Canada
 * @author  Derek Marcinyshyn
 * @date    2016-03-23
 */

use Illuminate\Console\Command;
use RevyWeather\Services\Weather\GetEnvironmentCanada;

class EnvironmentCanada extends Command
{

    /**
     * @var GetEnvironmentCanada
     */
    protected $ec;
    
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
    public function __construct(GetEnvironmentCanada $ec)
    {
        parent::__construct();
        $this->ec = $ec;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Getting the Revelstoke XML feed');
        $this->ec->getRevelstokeWeather();
    }
}
