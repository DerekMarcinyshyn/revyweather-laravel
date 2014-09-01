<?php

use Indatus\Dispatcher\Scheduling\ScheduledCommand;
use Indatus\Dispatcher\Scheduling\Schedulable;
use Indatus\Dispatcher\Drivers\Cron\Scheduler;
use Revyweather\Weather\Local\Image;
use Revyweather\Weather\Local\ImageException;

class CourthouseImageCommand extends ScheduledCommand {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'revyweather:image';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Get the image from Raspberry Pi looking at Mt Mackenzie.';

    /**
     * @var Revyweather\Weather\Local\Image
     */
    private $image;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Image $image)
	{
        $this->image = $image;

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
		return $scheduler->everyMinutes(3);
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->info('Get image start');
        try {
            $this->image->getLatestImage();
        } catch (ImageException $e) {
            Event::fire('local.image.fail', $e);
        }
	}
}
