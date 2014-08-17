<?php

use Indatus\Dispatcher\Scheduling\ScheduledCommand;
use Indatus\Dispatcher\Scheduling\Schedulable;
use Indatus\Dispatcher\Drivers\Cron\Scheduler;
use Revyweather\Weather\Local\Data;
use Revyweather\Weather\Local\LocalDataException;

class GetCourthouseCommand extends ScheduledCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'revyweather:courthouse';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Get the local weather data.';

    /**
     * @var \Revyweather\Weather\Local\Data
     */
    protected $data;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Data $data)
	{
        $this->data = $data;
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
		return $scheduler;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        try {
            $this->data->getWeatherData();
        } catch (LocalDataException $e) {
            Event::fire('local.data.fail', $e);
        }
	}
}
