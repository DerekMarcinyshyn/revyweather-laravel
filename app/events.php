<?php
/**
 * Events
 *
 * @author  Derek Marcinyshyn
 * @date    August 16, 2014
 */

Event::listen('environment.canada.fail', 'Revyweather\Notifications\ExceptionHandler');