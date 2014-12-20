<?php
/**
 * Created by PhpStorm.
 * User: ian
 * Date: 12/19/14
 * Time: 1:02 PM
 */

namespace Nmrkt\CommissionJunction\Client;

use Nmrkt\CommissionJunction\Client as CJClient;

class CommissionDetail extends CJClient
{
    const SUBDOMAIN = 'commission-detail';

    public function __construct($auth_token)
    {
        parent::__construct($auth_token, self::SUBDOMAIN, 'v3');
    }

    public function getPostings($params = [])
    {
        $this->get('commissions?date-type=posting', [
            'query' => $params
        ]);
    }

}