<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Gps;

/**
 * @author Matous Nemec
 */
class Bounds {

	/**
	 * @var Coordinates
	 */
	private $northeast;

	/**
	 * @var Coordinates
	 */
	private $southwest;

	public function __construct(Coordinates $northeast, Coordinates $southwest) {
		$this->northeast = $northeast;
		$this->southwest = $southwest;
	}

	public function getSouthWest() {
		return $this->southwest;
	}

	public function getNorthEast() {
		return $this->northeast;
	}

}