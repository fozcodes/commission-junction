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

    public function testCommissionDetailClientSetsBaseUrlToCommissionDetail()
    {
        $base_url = $this->cj_client->getBaseUrl();

        $this->assertEquals('https://commission-detail.api.cj.com/v3', $base_url);
    }
}