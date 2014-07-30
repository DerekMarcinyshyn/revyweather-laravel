<?php

/**
 * Class HomeController
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    July 29, 2014
 */
class HomeController extends BaseController {

    /**
     * Homepage
     *
     * @return \Illuminate\View\View
     */
    public function index() {

        return View::make('content.index');
    }

}
