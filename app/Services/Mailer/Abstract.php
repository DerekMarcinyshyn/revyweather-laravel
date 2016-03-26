<?php 

namespace RevyWeather\Services\Mailer;

/**
 * Abstract Mailer
 *
 * @author  Derek Marcinyshyn <derek@marcinyshyn.com>
 * @date    2016-03-25
 */ 

use Mail;

abstract class AbstractMailer
{

    /**
     * @param $user
     * @param string $subject
     * @param string $view
     * @param array $data
     * @return mixed
     */
    public function sendTo($user, $subject, $view, $data)
    {
        return Mail::queue($view, $data, function ($message) use ($user, $subject) {
            $message->from('info@revyweather.com', 'Revy Weather')
                ->to($user->email, $user->name)
                ->sender('info@revyweather.com', 'Revy Weather')
                ->replyTo('info@revyweather.com', 'Revy Weather')
                ->subject($subject);
        });
    }

    /**
     * @param string $subject
     * @param string $view
     * @param array $data
     * @return mixed
     */
    public function notification($subject, $view, $data)
    {
        return Mail::queue($view, $data, function ($message) use ($subject) {
            $message->from('info@revyweather.com', 'Revy Weather')
                ->to('derek@marcinyshyn.com', 'Derek')
                ->sender('info@revyweather.com', 'Revy Weather')
                ->replyTo('info@revyweather.com', 'Revy Weather')
                ->subject($subject);
        });
    }
}
