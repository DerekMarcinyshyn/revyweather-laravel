<?php
use JasonNZ\Jinput\Jinput;
use Revyweather\Calendar\Dates;

/**
 * API Controller
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    September 14, 2014
 */

class TimelapseController extends BaseController {

    /**
     * @var Dates
     */
    protected $dates;

    /**
     * @param Dates $dates
     */
    public function __construct(Dates $dates)
    {
        $this->dates = $dates;
    }

    /**
     * Get timelapse calendar dates and return a html calendar
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTimelapseCalendarDates() {
        $year = Jinput::get('year');
        $month = Jinput::get('month');

        return Response::json($this->dates->getCalendarDates($year, $month));
    }
}