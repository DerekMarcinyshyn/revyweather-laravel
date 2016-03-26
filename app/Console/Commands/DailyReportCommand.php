<?php

namespace RevyWeather\Console\Commands;

use Illuminate\Console\Command;
use RevyWeather\Services\Mailer\DailyReport;
use RevyWeather\Services\Log\Daily as Log;

class DailyReportCommand extends Command
{
    
    /**
     * @var string
     */
    protected $signature = 'revyweather:daily-report';

    /**
     * @var string
     */
    protected $description = 'Sends out daily report which is created from Services\Reports\Daily.';

    /**
     * DailyReportCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param DailyReport $dailyReport
     * @param Log $log
     */
    public function handle(DailyReport $dailyReport, Log $log)
    {
        $this->comment('Sending daily report...');
        $dailyReport->sendReport();
        $this->comment('clearing daily log file...');
        $log->clear();
        $this->info('done.');
    }
}
