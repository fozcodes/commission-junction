<?php
/**
 * Created by PhpStorm.
 * User: ian
 * Date: 12/18/14
 * Time: 1:23 PM
 */

namespace Nmrkt\CommissionJunction\Plugin;

use GuzzleHttp\Event\EmitterInterface;
use GuzzleHttp\Event\ErrorEvent;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Event\BeforeEvent;
use GuzzleHttp\Event\CompleteEvent;


class AuthTokenPlugin implements  SubscriberInterface
{
    private $auth_token;

    public function __construct($auth_token)
    {
        $this->auth_token = $auth_token;
    }

    public function getEvents()
    {
        return [
            // Provide name and optional priority
            'before'   => ['onBefore', 'first'],
            // You can pass a list of listeners with different priorities
            'error'    => [['beforeError', 'first'], ['afterError', 'last']]
        ];
    }

    public function onBefore(BeforeEvent $event, $name)
    {
        //add the authorization header
        $event->getRequest()->addHeader('authorization', $this->auth_token);
    }

    public function beforeError(ErrorEvent $event)
    {

    }

    public function afterError(ErrorEvent $event)
    {

    }
}