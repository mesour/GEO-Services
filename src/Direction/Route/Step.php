<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Direction\Route;

use Mesour\GeoServices\Direction\Transit,
    Mesour\GeoServices\Gps,
    Mesour\GeoServices\PolyLineDecoder;

/**
 * @author Matous Nemec
 */
class Step {

	private $step = array();

	/**
	 * @var StepList
	 */
	private $steps;

	/**
	 * @var Transit\Details
	 */
	private $transit_details;

	/**
	 * @var Gps\Coordinates
	 */
	private $end_location;

	/**
	 * @var Gps\Coordinates
	 */
	private $start_location;

	/**
	 * @var PolyLineDecoder
	 */
	private $poly_line;

	public function __construct($step) {
		$this->step = $step;
	}

	/**
	 * @return array|null
	 */
	public function getDistance() {
		return isset($this->step['distance']) ? $this->step['distance'] : NULL;
	}

	/**
	 * @return array|null
	 */
	public function getDuration() {
		return isset($this->step['duration']) ? $this->step['duration'] : NULL;
	}

	/**
	 * @return StepList|null
	 */
	public function getSteps() {
		if(!isset($this->step['steps'])) {
			return NULL;
		}
		if(!$this->steps) {
			$this->steps = new StepList($this->step['steps']);
		}
		return $this->steps;
	}

	/**
	 * @return string
	 */
	public function getHtmlInstructions() {
		return $this->step['html_instructions'];
	}

	/**
	 * @return string constants from TravelMode
	 */
	public function getTravelMode() {
		return $this->step['travel_mode'];
	}

	/**
	 * @return Transit\Details|null
	 */
	public function getTransitDetails() {
		if(!isset($this->step['transit_details'])) {
			return NULL;
		}
		if(!$this->transit_details) {
			$this->transit_details = new Transit\Details($this->step['transit_details']);
		}
		return $this->transit_details;
	}

	/**
	 * @return Gps\Coordinates
	 */
	public function getEndCoordinates() {
		if(!$this->end_location) {
			$this->end_location = new Gps\Coordinates($this->step['end_location']);
		}
		return $this->end_location;
	}

	/**
	 * @return Gps\Coordinates
	 */
	public function getStartCoordinates() {
		if(!$this->start_location) {
			$this->start_location = new Gps\Coordinates($this->step['start_location']);
		}
		return $this->start_location;
	}

	/**
	 * @return PolyLineDecoder
	 */
	public function getPolyLine() {
		if(!$this->poly_line) {
			$this->poly_line = new PolyLineDecoder($this->step['polyline']['points']);
		}
		return $this->poly_line;
	}

}