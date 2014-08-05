<?php

use Illuminate\Console\Command;
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
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $this->info('Get Revelstoke Forecast.io');
        $this->revelstoke = new Revelstoke;
		$this->revelstoke->revelstoke();
        $this->info('all done.');
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


	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}
