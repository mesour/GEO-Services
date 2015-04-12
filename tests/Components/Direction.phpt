<?php

use Tester\Assert;
use Mesour\GeoServices\Http\Authenticator;

$container = require_once __DIR__ . '/../bootstrap.php';

class DirectionTest extends \Test\BaseTestCase {

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

    private function getDirection() {
        $direction = new \Mesour\GeoServices\Direction($this->authenticator);
        $direction->setOrigin('New York')
            ->setDestination('Washington');

        return $direction;
    }

	public function testLookup() {
        $direction = $this->getDirection();

        $result = $direction->lookup();

        if($result->isOk()) {
            Assert::same($result->getRoutes()->count(), 1);
        } else {
            Assert::same('OK', $result->getStatus());
        }
	}

    public function testLookupAlternatives() {
        $direction = $this->getDirection();

        $direction->setAlternatives();

        $result = $direction->lookup();

        if($result->isOk()) {
            Assert::same($result->getRoutes()->count(), self::FULL_ALT_COUNT);
        } else {
            Assert::same('OK', $result->getStatus());
        }
    }

    public function testLookupWayPoint() {
        /** @var Mesour\GeoServices\Gps\Coordinates $start */
        /** @var Mesour\GeoServices\Gps\Coordinates $end */
        $direction = $this->getDirection();

        $direction->setAlternatives();

        $direction->addWayPoint('Trenton');

        $result = $direction->lookup();

        if($result->isOk()) {
            Assert::same($result->getRoutes()->count(), 1);

            $bounds = $result->getRoutes(0)->getBounds();
            $polyline = $result->getRoutes(0)->getPolyLine();
            $coords = $polyline->toGpsCoordinates();
            $start = $coords[0];
            $end = $coords[$coords->count()-1];

            Assert::equal(self::START_LAT, $start->getLat());
            Assert::equal(self::START_LNG, $start->getLng());
            Assert::equal(self::END_LAT, $end->getLat());
            Assert::equal(self::END_LNG, $end->getLng());
        } else {
            Assert::same('OK', $result->getStatus());
        }
    }

}

$test = new DirectionTest($container);
$test->run();