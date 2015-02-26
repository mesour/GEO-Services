<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Direction\Route;

use Mesour\GeoServices\Exception;

/**
 * @author Matous Nemec
 */
class LegList implements \Iterator, \ArrayAccess, \Countable {

	private $legs = array();

	public function __construct($legs) {
		foreach($legs as $leg) {
			$this->legs[] = new Leg($leg);
		}
	}

	/**
	 * @return int
	 */
	public function count() {
		return count($this->legs);
	}

	/**
	 * @param mixed $offset
	 * @return bool
	 */
	public function offsetExists($offset) {
		return isset($this->legs[$offset]);
	}

	/**
	 * @param mixed $offset
	 * @return Leg
	 */
	public function offsetGet($offset) {
		return $this->legs[$offset];
	}

	public function offsetSet($offset, $value) {
		throw new Exception('You cant set route leg.');
	}

	public function offsetUnset($offset) {
		throw new Exception('You cant unset route leg.');
	}

	/**
	 * @return Leg
	 */
	public function rewind() {
		reset($this->legs);
	}

	/**
	 * @return Leg
	 */
	public function current() {
		$var = current($this->legs);
		return $var;
	}

	/**
	 * @return int
	 */
	public function key() {
		return key($this->legs);
	}

	/**
	 * @return Leg
	 */
	public function next() {
		$var = next($this->legs);
		return $var;
	}

	public function valid() {
		$key = key($this->legs);
		return ($key !== NULL && $key !== FALSE);
	}

}