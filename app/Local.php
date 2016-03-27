<?php

namespace RevyWeather;

/**
 * Local weather
 */

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    
    /**
     * @var array
     */
    protected $fillable = [
        'temp',
        'humidity',
        'relative_humidity',
        'bmp_temperature',
        'barometer',
        'direction',
        'speed'
    ];
}
