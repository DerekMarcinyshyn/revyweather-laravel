<?php
/**
 * Class HistoryController
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    September 27, 2014
 */

use Revyweather\Weather\Local\History;

class HistoryController extends BaseController
{

    /**
     * @var History
     */
    protected $history;

    /**
     * @param History $history
     */
    public function __construct(History $history)
    {
        $this->history = $history;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return View::make('content.history');
    }

    /**
     * @param $from
     * @param $to
     * @return \Illuminate\Http\JsonResponse
     */
    public function getHistoryJson($from, $to)
    {
        return Response::json($this->history->getHistory($from, $to));
    }

}