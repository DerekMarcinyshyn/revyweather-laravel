<?php namespace Revyweather\Weather\Local;
/**
 * History.php
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    28/09/14
 */

use Current;

class History {

    /**
     * @var Current
     */
    protected $current;

    /**
     * @param Current $current
     */
    public function __construct(Current $current)
    {
        $this->current = $current;
    }

    /**
     * @param $from
     * @param $to
     * @return array
     */
    public function getHistory($from, $to)
    {
        $data = $this->current->whereBetween('created_at', array($from, $to))->get();

        $airResult = $this->airResult($this->makeArray($data, 'bmp_temperature'));
        $barometerResult = $this->barometerResult($this->makeArray($data, 'barometer'));
        $relativeHumidityResult = $this->relativeHumidityResult($this->makeArray($data, 'relative_humidity'));
        $speedResult = $this->speedResult($this->makeArray($data, 'speed'));

        $result = array();
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
        $array = array();

        foreach ($data as $row)
        {
            $milliSeconds = strtotime($row->created_at) * 1000;
            $array[] = array($milliSeconds, (float) ($row->$value));
        }

        return $array;
    }

    /**
     * @param $air
     * @return array
     */
    private function airResult($air)
    {
        $airResult = array(
            'name' => 'Air Temperature',
            'data' => $air,
            'type' => 'spline',
            'tooltip' => array(
                'valueSuffix' => ' °C'
            ),
            'color' => '#B26969'
        );
        return $airResult;
    }

    /**
     * @param $barometer
     * @return array
     */
    private function barometerResult($barometer)
    {
        $barometerResult = array(
            'name' => 'Barometer',
            'data' => $barometer,
            'type' => 'spline',
            'color' => '#3B54FF',
            'yAxis' => 1,
            'dashStyle' => 'solid',
            'tooltip' => array(
                'valueSuffix' => ' kPa'
            )
        );
        return $barometerResult;
    }

    /**
     * @param $relativeHumidity
     * @return array
     */
    private function relativeHumidityResult($relativeHumidity)
    {
        $relativeHumidityResult = array(
            'name' => 'Relative Humidity',
            'data' => $relativeHumidity,
            'type' => 'spline',
            'dashStyle' => 'ShortDash',
            'color' => '#88E8A9',
            'yAxis' => 2,
            'tooltip' => array(
                'valueSuffix' => ' %'
            )
        );
        return $relativeHumidityResult;
    }

    /**
     * @param $speed
     * @return array
     */
    private function speedResult($speed)
    {
        $speedResult = array(
            'name' => 'Wind Speed',
            'data' => $speed,
            'type' => 'column',
            'color' => '#cccccc',
            'yAxis' => 3,
            'tooltip' => array(
                'valueSuffix' => ' km/h'
            )
        );
        return $speedResult;
    }
} 