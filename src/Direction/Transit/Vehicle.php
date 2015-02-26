<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Direction\Transit;

/**
 * @author Matous Nemec
 */
class Vehicle {

	private $vehicle = array();

	public function __construct($vehicle) {
		$this->vehicle = $vehicle;
	}

	/**
	 * @return string|null
	 */
	public function getName() {
		return isset($this->vehicle['name']) ? $this->vehicle['name'] : NULL;
	}

	/**
	 * Returns constants from TransitMode
	 *
	 * @return string|null
	 */
	public function getType() {
		return isset($this->vehicle['type']) ? $this->vehicle['type'] : NULL;
	}

	/**
	 * @return string|null
	 */
	public function getIcon() {
		return isset($this->vehicle['icon']) ? $this->vehicle['icon'] : NULL;
	}

}