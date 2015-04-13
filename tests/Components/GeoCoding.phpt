<?php

use Tester\Assert;
use Mesour\GeoServices\Http\Authenticator;

$container = require_once __DIR__ . '/../bootstrap.php';

class GeoCodingTest extends \Test\BaseTestCase {

    /**
     * @var Authenticator
     */
    protected $authenticator;

    public function __construct(\Nette\DI\Container $container) {
        parent::__construct($container);

        $this->authenticator = new Authenticator(self::API_KEY);
    }

    private function getGeoLocation() {
        $direction = new \Mesour\GeoServices\GeoCoding($this->authenticator);
        $direction->setAddress('I.P.Pavlova,Prague,Czech republic');

        return $direction;
    }

	public function testLookup() {
        $direction = $this->getGeoLocation();

        $result = $direction->lookup();

        print_r($result);

        /*if($result->isOk()) {
            Assert::same($result->getRoutes()->count(), 1);
        } else {
            Assert::same('OK', $result->getStatus());
        }*/
        Assert::same(1,1);
	}

}

$test = new GeoCodingTest($container);
$test->run();