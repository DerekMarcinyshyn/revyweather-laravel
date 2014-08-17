<?php

use Illuminate\Console\Command;
use Revyweather\Weather\Forecastio\ForecastioException;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Revyweather\Weather\Forecastio\Revelstoke;
use Indatus\Dispatcher\Scheduling\ScheduledCommand;
use Indatus\Dispatcher\Scheduling\Schedulable;
use Indatus\Dispatcher\Drivers\Cron\Scheduler;

class ForecastioRevelstokeCommand extends ScheduledCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'revyweather:revelstoke';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Get the Forecast.io for Revelstoke, BC.';

    protected $revelstoke;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Revelstoke $revelstoke)
	{
        $this->revelstoke = $revelstoke;
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        try {
            $this->revelstoke->revelstoke();
        } catch (ForecastioException $e) {
            Event::fire('forecastio.fail', $e);
        }
	}

    /**
     * Set up schedule on when to run command
     * TODO: still needs configuring
     *
     * @param Schedulable $scheduler
     * @return Schedulable|\Indatus\Dispatcher\Scheduling\Schedulable[]
     */
    public function schedule(Schedulable $scheduler) {
        return $scheduler;
    }
}
