<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Direction\Transit;

use Mesour\GeoServices\Gps;

/**
 * @author Matous Nemec
 */
class Station {

	private $station = array();

	/**
	 * @var Gps\Coordinates
	 */
	private $coordinates;

	public function __construct($station) {
		$this->station = $station;
	}

	/**
	 * @return Gps\Coordinates
	 */
	public function getCoordinates() {
		if(!$this->coordinates) {
			$this->coordinates = new Gps\Coordinates($this->station['location']);
		}
		return $this->coordinates;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->station['name'];
	}

}