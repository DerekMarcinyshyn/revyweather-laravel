<?php

use Indatus\Dispatcher\Scheduling\ScheduledCommand;
use Indatus\Dispatcher\Scheduling\Schedulable;
use Indatus\Dispatcher\Drivers\Cron\Scheduler;
use Revyweather\Weather\Local\Save;
use Revyweather\Weather\Local\LocalSaveException;

class SaveCourthouseCommand extends ScheduledCommand {

    /**
     * @var Save
     */
    protected $save;

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'revyweather:save';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Saves courthouse weather to database.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Save $save)
	{
        $this->save = $save;
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
		return $scheduler->everyMinutes(30);
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        try {
            $this->save->weatherToDatabase();
        } catch (LocalSaveException $e) {
            Log::error($e->getTraceAsString());
        }
	}
}
