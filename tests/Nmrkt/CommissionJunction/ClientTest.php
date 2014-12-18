<?php
/**
 * Created by PhpStorm.
 * User: ian
 * Date: 12/18/14
 * Time: 1:33 PM
 */

namespace Nmrkt\Tests\CommissionJunction;

use Nmrkt\CommissionJunction\Client as Client;
use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Message\Response;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    private $cj_client;

    private $auth_token = 'fake_de_token_for_de_testing';

    public function setup()
    {
        $this->cj_client = new Client($this->auth_token);
    }

    public function addClientMock($data, $response_code = 200)
    {
        //create a response with the data and response code
        $api_response = new Response($response_code);
        $api_response->setBody($data);

        $mock_response = new Mock([$api_response]);

        $this->cj_client->getEmitter()->attach($mock_response);
    }

    public function testClientIsGuzzleClient()
    {
        $this->assertTrue(is_a($this->cj_client, 'GuzzleHttp\Client'));
    }

    public function testAuthTokenIsAddedToRequest()
    {
        $this->addClientMock(new \GuzzleHttp\Stream\Stream(fopen(RESOURCE_PATH . '/commission-detail-response.xml', 'r')));
        $command = $this->cj_client->getCommand('CommissionDetail', [
            'date-type' => 'posting',
            'start-date' => '2014-07-15',
            'end-date' => '2014-08-15'
        ]);

        $this->assertEquals($command->prepare()->getQuery()->get('authorization'), $this->auth_token);

    }
}
