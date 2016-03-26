<?php

namespace RevyWeather\Services\Log;

/**
 * Daily log
 * @author  Derek Marcinyshyn
 * @date    2016-03-25
 */
 
use Log;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Daily
{
    const FILENAME = 'logs/daily.log';

    /**
     * Save the message to the daily log
     * 
     * @param $message
     */
    public function save($message)
    {
        try {
            $log = new Logger('daily');
            $log->pushHandler(new StreamHandler(storage_path(self::FILENAME), Logger::ERROR));
            $log->addError($message);
        } catch (\Exception $e) {
            Log::critical($e->getTraceAsString());
        }
    }

    /**
     * Clear daily log
     */
    public function clear()
    {
        try {
            $fileHandler = fopen(storage_path(self::FILENAME), 'w');
            fwrite($fileHandler, '');
            fclose($fileHandler);
        } catch (\Exception $e) {
            Log::critical($e->getTraceAsString());
        }
    }
}