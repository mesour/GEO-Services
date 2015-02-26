<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Direction\Transit;

/**
 * @author Matous Nemec
 */
class Line {

	private $line = array();

	/**
	 * @var AgencyList
	 */
	private $agencies;

	/**
	 * @var Vehicle
	 */
	private $vehicle;

	public function __construct($line) {
		$this->line = $line;
	}

	/**
	 * @return string|null
	 */
	public function getName() {
		return isset($this->line['name']) ? $this->line['name'] : NULL;
	}

	/**
	 * @return string|null
	 */
	public function getShortName() {
		return isset($this->line['short_name']) ? $this->line['short_name'] : NULL;
	}

	/**
	 * Returns color in hex string
	 *
	 * @return string|null
	 */
	public function getColor() {
		return isset($this->line['color']) ? $this->line['color'] : NULL;
	}

	/**
	 * Returns color in hex string
	 *
	 * @return string|null
	 */
	public function getTextColor() {
		return isset($this->line['text_color']) ? $this->line['text_color'] : NULL;
	}

	/**
	 * Returns the URL for this transit line as provided by the transit agency.
	 *
	 * @return string|null
	 */
	public function getUrl() {
		return isset($this->line['short_name']) ? $this->line['short_name'] : NULL;
	}

	/**
	 * Returns the URL for the icon associated with this line.
	 *
	 * @return string|null
	 */
	public function getIcon() {
		return isset($this->line['short_name']) ? $this->line['short_name'] : NULL;
	}

	/**
	 * Returns the URL for the icon associated with this line.
	 *
	 * @return AgencyList|null
	 */
	public function getAgencies() {
		if(!isset($this->line['agencies'])) {
			return NULL;
		}
		if(!$this->agencies) {
			$this->agencies = new AgencyList($this->line['agencies']);
		}
		return $this->agencies;
	}

	/**
	 * @return Vehicle|null
	 */
	public function getVehicle() {
		if(!isset($this->line['vehicle'])) {
			return NULL;
		}
		if(!$this->vehicle) {
			$this->vehicle = new Vehicle($this->line['vehicle']);
		}
		return $this->vehicle;
	}

}