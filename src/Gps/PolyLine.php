<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Gps;

use Mesour\GeoServices\Exception;

/**
 * @author Matous Nemec
 */
class PolyLine implements \Iterator, \ArrayAccess, \Countable {

	/**
	 * @var array
	 */
	private $coordinates = array();

	private $is_polygon;

	public function __construct(array $coordinates, $is_polygon = FALSE) {
		$this->is_polygon = $is_polygon;
		foreach ($coordinates as $val) {
			$this->coordinates[] = new Coordinates($val);
		}
	}

	public function isPolygon() {
		return $this->is_polygon;
	}

	/**
	 * @return int
	 */
	public function count() {
		return count($this->coordinates);
	}

	/**
	 * @param mixed $offset
	 * @return bool
	 */
	public function offsetExists($offset) {
		return isset($this->coordinates[$offset]);
	}

	/**
	 * @param mixed $offset
	 * @return Coordinates
	 */
	public function offsetGet($offset) {
		return $this->coordinates[$offset];
	}

	public function offsetSet($offset, $value) {
		if(!$value instanceof Coordinates) {
			throw new Exception('Value of coordinates must be instance of GpsCoordinates.');
		}
		$this->coordinates[$offset] = $value;
	}

	public function offsetUnset($offset) {
		unset($this->coordinates[$offset]);
	}

	/**
	 * @return Coordinates
	 */
	public function rewind() {
		reset($this->coordinates);
	}

	/**
	 * @return Coordinates
	 */
	public function current() {
		$var = current($this->coordinates);
		return $var;
	}

	/**
	 * @return int
	 */
	public function key() {
		return key($this->coordinates);
	}

	/**
	 * @return Coordinates
	 */
	public function next() {
		$var = next($this->coordinates);
		return $var;
	}

	public function valid() {
		$key = key($this->coordinates);
		return ($key !== NULL && $key !== FALSE);
	}

    public function toArray() {
        $output = array();
        foreach($this->coordinates as $coordinates) {
            $output[] = $coordinates->toArray();
        }
        return $output;
    }

    public function __toArray() {
        return $this->toArray();
    }

}