<?php

namespace RevyWeather\Services\Weather;

/**
 * GetLocalHistory.php
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    27/03/16
 */

use RevyWeather\Local;

class GetLocalHistory
{

    /**
     * @var Local
     */
    protected $local;

    /**
     * GetLocalHistory constructor.
     * @param Local $local
     */
    public function __construct(Local $local)
    {
        $this->local = $local;
    }

    /**
     * @param $from
     * @param $to
     * @return array
     */
    public function getLocalWeatherHistory($from, $to)
    {
        $data = $this->local->whereBetween('created_at', [$from, $to])->get();

        $airResult = $this->airResult($this->makeArray($data, 'bmp_temperature'));
        $barometerResult = $this->barometerResult($this->makeArray($data, 'barometer'));
        $relativeHumidityResult = $this->relativeHumidityResult($this->makeArray($data, 'relative_humidity'));
        $speedResult = $this->speedResult($this->makeArray($data, 'speed'));

        $result = [];
        array_push($result, $airResult);
        array_push($result, $barometerResult);
        array_push($result, $relativeHumidityResult);
        array_push($result, $speedResult);

        return $result;
    }

    /**
     * @param $data
     * @param $value
     * @return array
     */
    private function makeArray($data, $value)
    {
        $array = [];
        foreach ($data as $row)
        {
            $milliSeconds = strtotime($row->created_at) * 1000;
            $array[] = [$milliSeconds, (float) ($row->$value)];
        }
        return $array;
    }

    /**
     * @param $air
     * @return array
     */
    private function airResult($air)
    {
        $airResult = [
            'name' => 'Air Temperature',
            'data' => $air,
            'type' => 'spline',
            'tooltip' => [
                'valueSuffix' => ' °C'
            ],
            'color' => '#B26969'
        ];

        return $airResult;
    }
    /**
     * @param $barometer
     * @return array
     */
    private function barometerResult($barometer)
    {
        $barometerResult = [
            'name' => 'Barometer',
            'data' => $barometer,
            'type' => 'spline',
            'color' => '#3B54FF',
            'yAxis' => 1,
            'dashStyle' => 'solid',
            'tooltip' => [
                'valueSuffix' => ' kPa'
            ]
        ];

        return $barometerResult;
    }

    /**
     * @param $relativeHumidity
     * @return array
     */
    private function relativeHumidityResult($relativeHumidity)
    {
        $relativeHumidityResult = [
            'name'      => 'Relative Humidity',
            'data'      => $relativeHumidity,
            'type'      => 'spline',
            'dashStyle' => 'ShortDash',
            'color'     => '#7c919d',
            'yAxis'     => 2,
            'tooltip'   => [
                'valueSuffix' => ' %'
            ]
        ];

        return $relativeHumidityResult;
    }

    /**
     * @param $speed
     * @return array
     */
    private function speedResult($speed)
    {
        $speedResult = [
            'name'      => 'Wind Speed',
            'data'      => $speed,
            'type'      => 'column',
            'color'     => '#b7cfdb',
            'yAxis'     => 3,
            'index'     => 10,
            'tooltip'   => [
                'valueSuffix' => ' km/h'
            ]
        ];

        return $speedResult;
    }
}