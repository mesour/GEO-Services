<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Gps;

/**
 * @author Matous Nemec
 */
class Coordinates {

	private $lat;

	private $lng;

	public function __construct(array $lat_lng) {
		$this->lat = isset($lat_lng[0]) ? $lat_lng[0] : $lat_lng['lat'];
		$this->lng = isset($lat_lng[1]) ? $lat_lng[1] : $lat_lng['lng'];
	}

	/**
	 * @return float
	 */
	public function getLat() {
		return (double) $this->lat;
	}

	/**
	 * @return float
	 */
	public function getLng() {
		return (double) $this->lng;
	}

}