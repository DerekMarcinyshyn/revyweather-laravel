<?php

namespace RevyWeather\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\EnvironmentCanadaCommand::class,
        Commands\ForecastIoCommand::class,
        Commands\DailyReportCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('revyweather:environment-canada')
            ->hourly();
        $schedule->command('revyweather:forecast-io')
            ->everyTenMinutes();
        $schedule->command('revyweather:daily-report')
            ->timezone('America/Vancouver')
            ->dailyAt('06:00');
    }
}
