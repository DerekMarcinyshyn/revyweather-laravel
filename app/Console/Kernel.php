<?php

namespace RevyWeather\Console;

/**
 * Console Kernel
 * @author  Derek Marcinyshyn
 * @date    2016-03-27
 */

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
        Commands\DailyReportCommand::class,
        Commands\LocalCommand::class,
        Commands\LocalSaveCommand::class,
        Commands\LocalSaveImageCommand::class
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
            ->everyTenMinutes();
        
        $schedule->command('revyweather:forecast-io')
            ->everyTenMinutes();
        
        $schedule->command('revyweather:daily-report')
            ->timezone('America/Vancouver')
            ->dailyAt('06:00');
        
        $schedule->command('revyweather:local-save')
            ->everyThirtyMinutes();

        $schedule->command('revyweather:local-save-image')
            ->everyFiveMinutes();
    }
}
