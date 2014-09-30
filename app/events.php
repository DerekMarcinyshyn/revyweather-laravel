<?php
/**
 * Events
 *
 * @author  Derek Marcinyshyn
 * @date    August 16, 2014
 */

Event::listen('environment.canada.fail', 'Revyweather\Notifications\ExceptionHandler');
Event::listen('forecastio.fail', 'Revyweather\Notifications\ExceptionHandler');
Event::listen('local.data.fail', 'Revyweather\Notifications\ExceptionHandler');
Event::listen('local.image.fail', 'Revyweather\Notifications\ExceptionHandler');
Event::listen('MonasheeBackupFail', 'Revyweather\Notifications\BackupFailHandler');
