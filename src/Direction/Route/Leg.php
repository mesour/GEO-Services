<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Direction\Route;

use Mesour\GeoServices\Gps;

/**
 * @author Matous Nemec
 */
class Leg {

	private $leg = array();

	/**
	 * @var StepList
	 */
	private $steps;

	/**
	 * @var Gps\Coordinates
	 */
	private $end_location;

	/**
	 * @var Gps\Coordinates
	 */
	private $start_location;

	public function __construct($leg) {
		$this->leg = $leg;
	}

	/**
	 * @return StepList
	 */
	public function getSteps() {
		if(!$this->steps) {
			$this->steps = new StepList($this->leg['steps']);
		}
		return $this->steps;
	}

	/**
	 * @return array
	 */
	public function getDistance() {
		return $this->leg['distance'];
	}

	/**
	 * @return array
	 */
	public function getDuration() {
		return $this->leg['duration'];
	}

	/**
	 * @return array|null
	 */
	public function getDurationInTraffic() {
		return isset($this->leg['duration_in_traffic']) ? $this->leg['duration_in_traffic'] : NULL;
	}

	/**
	 * @return array|null
	 */
	public function getArrivalTime() {
		return isset($this->leg['arrival_time']) ? $this->leg['arrival_time'] : NULL;
	}

	/**
	 * @return array|null
	 */
	public function getDepartureTime() {
		return isset($this->leg['departure_time']) ? $this->leg['departure_time'] : NULL;
	}

	/**
	 * @return string
	 */
	public function getEndAddress() {
		return $this->leg['end_address'];
	}

	/**
	 * @return Gps\Coordinates
	 */
	public function getEndCoordinates() {
		if(!$this->end_location) {
			$this->end_location = new Gps\Coordinates($this->leg['end_location']);
		}
		return $this->end_location;
	}

	/**
	 * @return string
	 */
	public function getStartAddress() {
		return $this->leg['start_address'];
	}

	/**
	 * @return Gps\Coordinates
	 */
	public function getStartCoordinates() {
		if(!$this->start_location) {
			$this->start_location = new Gps\Coordinates($this->leg['start_location']);
		}
		return $this->start_location;
	}

}