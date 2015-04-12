<?php

use Tester\Assert;
use Mesour\GeoServices\Http\Authenticator;

$container = require_once __DIR__ . '/../bootstrap.php';

class AuthenticatorTest extends \Test\BaseTestCase {

    const API_KEY = 'AIzaSyBJy5hDsxxVxDeFz1Wh2gaH8OHMh5Hds1k';

	public function testApiKey() {
        $authenticator = new Authenticator(self::API_KEY);

		Assert::same(self::API_KEY, $authenticator->getApiKey());
	}

}

$test = new AuthenticatorTest($container);
$test->run();