<?php

namespace RevyWeather\Services\Mailer;

/**
 * Daily reports
 * @author  Derek Marcinyshyn
 * @date    2016-03-25
 */

use Log;

class DailyReport extends AbstractMailer
{
    
    const FILENAME = 'logs/daily.log';

    /**
     * Send daily report email
     * @return bool|mixed
     */
    public function sendReport()
    {        
        try {            
            $subject = 'Revy Weather Daily Report';
            $view = 'email.daily-report';
            $data = [
                'log'   => $this->getLog()
            ];

            return $this->notification($subject, $view, $data);
        } catch (\Exception $e) {
            Log::critical($e->getTraceAsString());
            return false;
        }
    }

    /**
     * Get the daily log file
     * @return string
     */
    private function getLog()
    {
        $log = file_get_contents(storage_path(self::FILENAME));
        if ($log == '') {
            return 'Nothing to report today.';
        } else {
            return $log;
        }
    }
}