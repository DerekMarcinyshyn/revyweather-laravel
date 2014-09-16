<?php namespace Revyweather\Calendar;
/**
 * Dates.php
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    14/09/14
 */

use Gloudemans\Calendar\Facades\Calendar;

class Dates
{
    /**
     * @param $year
     * @param $month
     * @return array
     */
    public function getCalendarDates($year, $month)
    {
        $config = array(
            'show_next_prev'    => false,
            'day_type'          => 'short'
        );

        $data = $this->getDatesWithVideo($year, $month);
        $template = '
            {table_open}<table border="0" cellpadding="0" cellspacing="0">{/table_open}
            {cal_cell_content}<a class="timelapse-start-video" rel="{content}">{day}</a>{/cal_cell_content}
            ';

        $calendar = \Calendar::initialize($config);
        $calendar = \Calendar::initialize(array('template'  => $template));
        $calendar = \Calendar::generate($year, $month, $data);

        return array('data' => $calendar);
    }

    /**
     * @param $year
     * @param $month
     * @return array
     */
    private function getDatesWithVideo($year, $month)
    {
        $data = array();

        $thisMonth = date('m');
        $thisYear = date('Y');

        if ($year < 2013 && $month < 8) {
            return $data;

        } elseif ($year == 2013 && $month == 8) {
            // first video August 25, 2013
            for ($i = 25; $i < 32; $i++)
            {
                $data[$i] = $this->createVideoLink($i, $month, $year);
            }

            return $data;

        } elseif ($month == $thisMonth && $year == $thisYear) {
            $today = date('d');
            for ($i = 1; $i < $today; $i++)
            {
                $data[$i] = $this->createVideoLink($i, $month, $year);
            }

            return $data;

        } else {
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
            for ($i = 1; $i < $daysInMonth + 1; $i++)
            {
                $data[$i] = $this->createVideoLink($i, $month, $year);
            }

            return $data;
        }
    }

    /**
     * @param $day
     * @param $month
     * @param $year
     * @return string
     */
    private function createVideoLink($day, $month, $year)
    {
        // 2014/September/07/September-07
        $monthName = date('F', mktime(0, 0, 0, $month, 10));

        return $year.'/'.$monthName.'/'.sprintf("%02s", $day).'/'.$monthName.'-'.sprintf("%02s", $day);
    }
} 