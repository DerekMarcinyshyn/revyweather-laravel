<?php namespace Revyweather\Exception;
/**
 * IException
 *
 * @author      Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date        August 6, 2014
 * @reference   http://php.net/manual/en/language.exceptions.php
 */

interface IException {
    /* Protected methods inherited from Exception class */
    public function getMessage();                 // Exception message
    public function getCode();                    // User-defined Exception code
    public function getFile();                    // Source filename
    public function getLine();                    // Source line
    public function getTrace();                   // An array of the backtrace()
    public function getTraceAsString();           // Formatted string of trace

    /* Over ride methods inherited from Exception class */
    public function __toString();                 // formatted string for display
    public function __construct($message = null, $code = 0);
}