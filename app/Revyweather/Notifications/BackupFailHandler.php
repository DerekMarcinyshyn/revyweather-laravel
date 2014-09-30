<?php namespace Revyweather\Notifications;
/**
 * BackupHandler.php
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    29/09/14
 */
class BackupFailHandler {

    /**
     * Backup fail handler
     */
    public function handle($exception)
    {
        $mailData = array(
            'details'   => 'Something went wrong with the backup.',
            'exception' => $exception
        );

        \Mail::send('emails.notifications.backup', $mailData, function($message) {
            $message->from('revyweather@gmail.com', 'Revyweather.com');
            $message->to('derek@revelstokewebhosting.com', 'Derek Marcinyshyn')->subject('Error with backup');
        });
    }
} 