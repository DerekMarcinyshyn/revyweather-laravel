<?php
/**
 * Current model
 *
 * @author      Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date        September 24, 2014
 */

class Current extends Eloquent
{

    /**
     * @var string
     */
    protected $table = 'revyweather_current';

    protected $fillable = array(
        'temp',
        'humidity',
        'relative_humidity',
        'bmp_temperature',
        'barometer',
        'direction',
        'speed'
    );
}