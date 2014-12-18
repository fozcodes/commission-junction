<?php
/**
 * Created by PhpStorm.
 * User: Ian Fosbery
 * Date: 12/18/14
 * Time: 11:30 AM
 */

namespace Nmrkt\CommissionJunction;

use GuzzleHttp\Client as GuzzleClient;

class Client extends GuzzleClient
{

	private $base_url = "https://%s.api.cj.com/%s/%s";

	public function __construct($auth_token)
	{

		parent::__construct();

//		$this->addSubscriber(new TokenAuthPlugin($auth_token));
//		$this->addSubscriber(new ArrayAggregatorSubscriber());
//		$this->addSubscriber(new ResponseStandardizationSubscriber());

	}



}
