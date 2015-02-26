<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Direction\Transit;

/**
 * @author Matous Nemec
 */
class Details {

	private $details = array();

	/**
	 * @var Station
	 */
	private $arrival_stop;

	/**
	 * @var Time
	 */
	private $arrival_time;

	/**
	 * @var Station
	 */
	private $departure_stop;

	/**
	 * @var Time
	 */
	private $departure_time;

	/**
	 * @var Line
	 */
	private $line;

	public function __construct($details) {
		$this->details = $details;
	}

	/**
	 * @return Time
	 */
	public function getArrivalTime() {
		if(!$this->arrival_time) {
			$this->arrival_time = new Time($this->details['arrival_time']);
		}
		return $this->arrival_time;
	}

	/**
	 * @return Station
	 */
	public function getArrivalStop() {
		if(!$this->arrival_stop) {
			$this->arrival_stop = new Station($this->details['arrival_stop']);
		}
		return $this->arrival_stop;
	}

	/**
	 * @return Station
	 */
	public function getDepartureStop() {
		if(!$this->departure_stop) {
			$this->departure_stop = new Station($this->details['departure_stop']);
		}
		return $this->departure_stop;
	}

	/**
	 * @return Time
	 */
	public function getDepartureTime() {
		if(!$this->departure_time) {
			$this->departure_time = new Time($this->details['departure_time']);
		}
		return $this->departure_time;
	}

	/**
	 * Specifies the direction in which to travel on this line, as it is
	 * marked on the vehicle or at the departure stop. This will often
	 * be the terminus station.
	 *
	 * @return string|null
	 */
	public function getHeadSign() {
		return isset($this->details['headsign']) ? $this->details['headsign'] : NULL;
	}

	/**
	 * Specifies the expected number of seconds between departures from
	 * the same stop at this time. For example, with a headway value of
	 * 600, you would expect a ten minute wait if you should miss your bus.
	 *
	 * @return string|null
	 */
	public function getHeadWay() {
		return isset($this->details['headway']) ? $this->details['headway'] : NULL;
	}

	/**
	 * Returns the number of stops in this step, counting the arrival stop,
	 * but not the departure stop. For example, if your directions involve
	 * leaving from Stop A, passing through stops B and C, and arriving at
	 * stop D, num_stops will return 3.
	 *
	 * @return integer
	 */
	public function getNumOfStops() {
		return (int) $this->details['num_stops'];
	}

	/**
	 * Returns information about the transit line used in this step.
	 *
	 * @return Line
	 */
	public function getLine() {
		if(!$this->line) {
			$this->line = new Line($this->details['line']);
		}
		return $this->line;
	}

}