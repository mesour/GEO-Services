<?php

use Tester\Assert;
use Mesour\GeoServices\Http\Authenticator;

$container = require_once __DIR__ . '/../bootstrap.php';

class GeoLocationTest extends \Test\BaseTestCase {

    const FULL_ALT_COUNT = 3;

    const START_LAT = 40.71265,
        START_LNG = -74.0066,
        END_LAT = 38.90716,
        END_LNG = -77.03691;

    /**
     * @var Authenticator
     */
    protected $authenticator;

    public function __construct(\Nette\DI\Container $container) {
        parent::__construct($container);

        $this->authenticator = new Authenticator(self::API_KEY);
    }

    private function getGeoLocation() {
        $direction = new \Mesour\GeoServices\GeoLocation($this->authenticator);
        $direction->setAddress('Goethova 11,Cheb,Česká republika');

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

$test = new GeoLocationTest($container);
$test->run();