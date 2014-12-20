<?php
/**
 * Created by PhpStorm.
 * User: ian
 * Date: 12/19/14
 * Time: 1:04 PM
 */

namespace Nmrkt\Tests\CommissionJunction\Client;

use Nmrkt\Tests\ClientTestCase;
use Nmrkt\CommissionJunction\Client\CommissionDetail;

class CommissionDetailTest extends ClientTestCase
{
    public function setup()
    {
        $this->cj_client = new CommissionDetail($this->auth_token);
        //setup history subscriber
        $this->cj_client->getEmitter()->attach($this->getHistoryObject());
    }

    public function testSetsBaseUrlToCommissionDetail()
    {
        $base_url = $this->cj_client->getBaseUrl();

        $this->assertEquals('https://commission-detail.api.cj.com/v3/', $base_url);
    }

    public function testEventSetsFullRequestCorrectly()
    {
        //add the mock to fake a response
        $this->addClientMock(new \GuzzleHttp\Stream\Stream(fopen(RESOURCE_PATH . '/commission-detail-response.xml', 'r')));

        //get the mocked subscriber from parent and attach
        $this->cj_client->getEmitter()->attach($this->getMockObject());

        $params = [
            'start-date' => '2014-08-15',
            'end-date' => '2014-08-16'
        ];

        $postings = $this->cj_client->getPostings($params);

        $history = $this->getHistoryObject();

        $request = $history->getLastRequest();

        $this->assertEquals('https://commission-detail.api.cj.com/v3/commissions?date-type=posting&start-date=2014-08-15&end-date=2014-08-16', $request->getUrl());

    }
}