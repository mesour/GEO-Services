<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Direction\Transit;

/**
 * @author Matous Nemec
 */
class Time {

	private $time = array();

	public function __construct($time) {
		$this->time = $time;
	}

	/**
	 * The time specified as a string. The time is displayed in the
	 * time zone of the transit stop.
	 *
	 * @return string
	 */
	public function getText() {
		return $this->time['text'];
	}

	public function getTimestamp() {
		return $this->time['value'];
	}

	/**
	 * Returns the time zone of this station. The value is the name
	 * of the time zone as defined in the IANA Time Zone Database,
	 * e.g. "America/New_York".
	 *
	 * @return string
	 */
	public function getTimezone() {
		return $this->time['time_zone'];
	}

}