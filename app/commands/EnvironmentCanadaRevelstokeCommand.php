<?php

use Indatus\Dispatcher\Scheduling\ScheduledCommand;
use Indatus\Dispatcher\Scheduling\Schedulable;
use Indatus\Dispatcher\Drivers\Cron\Scheduler;
use Revyweather\Weather\EnvironmentCanada\EnvironmentCanadaException;
use Revyweather\Weather\EnvironmentCanada\Forecast;

class EnvironmentCanadaRevelstokeCommand extends ScheduledCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'revyweather:ec';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Gets the Environment Canada Revelstoke weather.';

    /**
     * @var Forecast
     */
    protected $forecast;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Forecast $forecast)
	{
        $this->forecast = $forecast;
		parent::__construct();
	}

	/**
	 * When a command should run
	 *
	 * @param Scheduler $scheduler
	 * @return \Indatus\Dispatcher\Scheduling\Schedulable
	 */
	public function schedule(Schedulable $scheduler)
	{
		return $scheduler->hourly()->minutes(10);
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        try {
            $this->forecast->getRevelstokeWeather();
        } catch (EnvironmentCanadaException $e) {
            Event::fire('environment.canada.fail', $e);
        }
	}
}
