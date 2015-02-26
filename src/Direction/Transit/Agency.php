<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Direction\Transit;

/**
 * @author Matous Nemec
 */
class Agency {

	private $agency = array();

	public function __construct($agency) {
		$this->agency = $agency;
	}

	/**
	 * @return string|null
	 */
	public function getName() {
		return isset($this->agency['name']) ? $this->agency['name'] : NULL;
	}

	/**
	 * @return string|null
	 */
	public function getUrl() {
		return isset($this->agency['url']) ? $this->agency['url'] : NULL;
	}

	/**
	 * @return string|null
	 */
	public function getPhone() {
		return isset($this->agency['phone']) ? $this->agency['phone'] : NULL;
	}

}