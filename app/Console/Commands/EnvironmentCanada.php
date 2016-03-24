<?php

namespace RevyWeather\Console\Commands;

/**
 * Environment Canada
 * @author  Derek Marcinyshyn
 * @date    2016-03-23
 */

use Illuminate\Console\Command;

class EnvironmentCanada extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'revyweather:environment-canada';

    /**
     * The console command description.
     *
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
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Getting the Revelstoke XML feed');
    }
}
