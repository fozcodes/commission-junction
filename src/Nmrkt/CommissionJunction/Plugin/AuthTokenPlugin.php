<?php
/**
 * Created by PhpStorm.
 * User: ian
 * Date: 12/18/14
 * Time: 1:23 PM
 */

namespace Nmrkt\CommissionJunction\Plugin;

use GuzzleHttp\Event\EmitterInterface;
use GuzzleHttp\Event\SubscriberInterface;
use GuzzleHttp\Event\BeforeEvent;
use GuzzleHttp\Event\CompleteEvent;


class AuthTokenPlugin extends SubscriberInterface
{
    private $auth_token;

    public function __construct($auth_token)
    {
        $this->auth_token = $auth_token;
    }

}