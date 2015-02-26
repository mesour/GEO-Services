<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices;

/**
 * @author Matous Nemec
 */
class PolyLineDecoder {

	private $encoded;

	/**
	 * @param $encoded string
	 */
	public function __construct($encoded) {
		$this->encoded = $encoded;
	}

	/**
	 * @return array
	 */
	public function toArray() {
		return self::decodeToArray($this->encoded);
	}

	/**
	 * @return Gps\PolyLine
	 */
	public function toGpsCoordinates() {
		return self::decodeToGpsPolyLine($this->encoded);
	}

	public function __toArray() {
		return $this->toArray();
	}

	/**
	 * @param $encoded
	 * @return array
	 */
	static public function decodeToArray($encoded) {
		$length = strlen($encoded);
		$index = 0;
		$points = array();
		$lat = 0;
		$lng = 0;

		while ($index < $length) {
			$b = 0;

			$shift = 0;
			$result = 0;
			do {
				$b = ord(substr($encoded, $index++)) - 63;

				$result |= ($b & 0x1f) << $shift;
				$shift += 5;
			} while ($b >= 0x20);

			$dlat = (($result & 1) ? ~($result >> 1) : ($result >> 1));

			$lat += $dlat;
			$shift = 0;
			$result = 0;
			do {
				$b = ord(substr($encoded, $index++)) - 63;
				$result |= ($b & 0x1f) << $shift;
				$shift += 5;
			} while ($b >= 0x20);

			$dlng = (($result & 1) ? ~($result >> 1) : ($result >> 1));
			$lng += $dlng;
			$points[] = array($lat * 1e-5, $lng * 1e-5);
		}
		return $points;
	}

	/**
	 * @param $encoded
	 * @return Gps\PolyLine
	 */
	static public function decodeToGpsPolyLine($encoded) {
		return new Gps\PolyLine(self::decodeToArray($encoded));
	}

}