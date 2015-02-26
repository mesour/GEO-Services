<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Direction\Transit;

use Mesour\GeoServices\Exception;

/**
 * @author Matous Nemec
 */
class AgencyList implements \Iterator, \ArrayAccess, \Countable {

	private $agencies = array();

	public function __construct($agencies) {
		foreach($agencies as $agency) {
			$this->agencies[] = new Agency($agency);
		}
	}

	/**
	 * @return int
	 */
	public function count() {
		return count($this->agencies);
	}

	/**
	 * @param mixed $offset
	 * @return bool
	 */
	public function offsetExists($offset) {
		return isset($this->agencies[$offset]);
	}

	/**
	 * @param mixed $offset
	 * @return Agency
	 */
	public function offsetGet($offset) {
		return $this->agencies[$offset];
	}

	public function offsetSet($offset, $value) {
		throw new Exception('You cant set agency.');
	}

	public function offsetUnset($offset) {
		throw new Exception('You cant unset agency.');
	}

	/**
	 * @return Agency
	 */
	public function rewind() {
		reset($this->agencies);
	}

	/**
	 * @return Agency
	 */
	public function current() {
		$var = current($this->agencies);
		return $var;
	}

	/**
	 * @return int
	 */
	public function key() {
		return key($this->agencies);
	}

	/**
	 * @return Agency
	 */
	public function next() {
		$var = next($this->agencies);
		return $var;
	}

	public function valid() {
		$key = key($this->agencies);
		return ($key !== NULL && $key !== FALSE);
	}

}