<?php

namespace RevyWeather\Http\Controllers;

/**
 * History controller
 * @author  Derek Marcinyshyn
 * @date    2016-03-27
 */

use Illuminate\Http\Request;
use RevyWeather\Services\Weather\GetLocalHistory;
use RevyWeather\Http\Requests;
use RevyWeather\Services\Log\Daily;

class HistoryController extends Controller
{

    /**
     * @var GetLocalHistory
     */
    protected $getLocalHistory;

    /**
     * @var Daily
     */
    protected $daily;

    /**
     * HistoryController constructor.
     * @param GetLocalHistory $getLocalHistory
     * @param Daily $daily
     */
    public function __construct(GetLocalHistory $getLocalHistory, Daily $daily)
    {
        $this->getLocalHistory = $getLocalHistory;
        $this->daily = $daily;
    }

    /**
     * @param Request $request
     * @return array|string
     */
    public function getHistory(Request $request)
    {
        try {
            $this->validate($request, [
                'from'  => 'required|date:"YYYY-MM-DD HH:mm:ss"',
                'to'    => 'required|date:"YYYY-MM-DD HH:mm:ss"'
            ]);

            return $this->getLocalHistory->getLocalWeatherHistory($request['from'], $request['to']);
        } catch (\Exception $e) {
            $this->daily->save($e->getMessage());
            dd($e->getTraceAsString());
            return 'false';
        }
    }
}
