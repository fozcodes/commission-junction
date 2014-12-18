<?php
/**
 * Created by PhpStorm.
 * User: Ian Fosbery
 * Date: 12/18/14
 * Time: 11:30 AM
 */

namespace Nmrkt\CommissionJunction;

use GuzzleHttp\Client as GuzzleClient;
//use Guzzle\Service\Description\ServiceDescription;

class Client extends GuzzleClient
{

	public function __construct($auth_token)
	{

		parent::__construct();

		// Set the service description
//		$this->setDescription(ServiceDescription::factory(__DIR__.'/Resources/bitly.json'));
//
//		$this->addSubscriber(new TokenAuthPlugin($auth_token));
//		$this->addSubscriber(new ArrayAggregatorSubscriber());
//		$this->addSubscriber(new ResponseStandardizationSubscriber());

	}

}
