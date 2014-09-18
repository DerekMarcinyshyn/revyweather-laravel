<?php

use Illuminate\Console\Command;
use Revyweather\Weather\Local\Data;
use Revyweather\Weather\Local\LocalDataException;

class GetCourthouseCommand extends Command {

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
	protected $description = 'Get the local weather data used for daemon every 10 seconds.';

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
