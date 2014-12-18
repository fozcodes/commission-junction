<?php
/**
 * Created by PhpStorm.
 * User: ian
 * Date: 12/18/14
 * Time: 1:33 PM
 */

namespace Nmrkt\Tests\CommissionJunction;

use Nmrkt\CommissionJunction\Client as Client;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    private $cj_client;

    public function setup()
    {
        $this->cj_client = new Client('fake_de_token_for_de_testing');
    }

    public function testClientIsGuzzleClient()
    {
        $this->assertTrue(is_a($this->cj_client, 'GuzzleHttp\Client'));
    }
}
