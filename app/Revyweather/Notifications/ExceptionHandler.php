<?php namespace Revyweather\Notifications;
use Revyweather\Exception\RevyweatherException;

/**
 * ErrorHandler.php
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    16/08/14
 */
class ExceptionHandler {

    /**
     * Send generic error email
     */
    public function handle(RevyweatherException $data) {
        $mailData = array(
            'details'   => $data->getMessage(),
            'trace'     => $data->getTraceAsString()
        );

        \Mail::send('emails.notifications.exception', $mailData, function($message) {
            $message->from('revyweather@gmail.com', 'RevyWeather.com');
            $message->to('derek@revelstokewebhosting.com', 'Derek Marcinyshyn')->subject('Error with RevyWeather.com');
        });
    }
} 