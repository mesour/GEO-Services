<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Direction;

use Mesour\GeoServices\Gps,
    Mesour\GeoServices\PolyLineDecoder;

/**
 * @author Matous Nemec
 */
class Route {

	private $route = array();

	/**
	 * @var Gps\Bounds
	 */
	private $bounds;

	/**
	 * @var Route\LegList
	 */
	private $legs;

	/**
	 * @var PolyLineDecoder
	 */
	private $poly_line;

	public function __construct($route) {
		$this->route = $route;
	}

	/**
	 * @return Gps\Bounds
	 */
	public function getBounds() {
		if(!$this->bounds) {
			$this->bounds = new Gps\Bounds(
			    new Gps\Coordinates($this->route['bounds']['northeast']),
			    new Gps\Coordinates($this->route['bounds']['southwest'])
			);
		}
		return $this->bounds;
	}

	/**
	 * @return string|null
	 */
	public function getCopyrights() {
		return isset($this->route['copyrights']) ? $this->route['copyrights'] : NULL;
	}

	/**
	 * @return array|null
	 */
	public function getFare() {
		return isset($this->route['fare']) ? $this->route['fare'] : NULL;
	}

	/**
	 * @return PolyLineDecoder
	 */
	public function getPolyLine() {
		if(!$this->poly_line) {
			$this->poly_line = new PolyLineDecoder($this->route['overview_polyline']['points']);
		}
		return $this->poly_line;
	}

	/**
	 * @return Route\LegList
	 */
	public function getLegs() {
		if(!$this->legs) {
			$this->legs = new Route\LegList($this->route['legs']);
		}
		return $this->legs;
	}

	/**
	 * @return string|null
	 */
	public function getSummary() {
		return isset($this->route['summary']) ? $this->route['summary'] : NULL;
	}

	/**
	 * @return array
	 */
	public function getWarnings() {
		return $this->route['warnings'];
	}

	/**
	 * @return array
	 */
	public function getWayPointOrder() {
		return $this->route['waypoint_order'];
	}

}