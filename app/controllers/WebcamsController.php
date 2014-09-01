<?php
/**
 * Class WebcamsController
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    September 1, 2014
 */

class WebcamsController extends BaseController {

    public function index() {
        return View::make('content.webcams');
    }
}