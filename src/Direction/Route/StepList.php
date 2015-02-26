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
class StepList implements \Iterator, \ArrayAccess, \Countable {

	private $steps = array();

	public function __construct($steps) {
		foreach($steps as $step) {
			$this->steps[] = new Step($step);
		}
	}

	/**
	 * @return int
	 */
	public function count() {
		return count($this->steps);
	}

	/**
	 * @param mixed $offset
	 * @return bool
	 */
	public function offsetExists($offset) {
		return isset($this->steps[$offset]);
	}

	/**
	 * @param mixed $offset
	 * @return Step
	 */
	public function offsetGet($offset) {
		return $this->steps[$offset];
	}

	public function offsetSet($offset, $value) {
		throw new Exception('You cant set route step.');
	}

	public function offsetUnset($offset) {
		throw new Exception('You cant unset route step.');
	}

	/**
	 * @return Step
	 */
	public function rewind() {
		reset($this->steps);
	}

	/**
	 * @return Step
	 */
	public function current() {
		$var = current($this->steps);
		return $var;
	}

	/**
	 * @return int
	 */
	public function key() {
		return key($this->steps);
	}

	/**
	 * @return Step
	 */
	public function next() {
		$var = next($this->steps);
		return $var;
	}

	public function valid() {
		$key = key($this->steps);
		return ($key !== NULL && $key !== FALSE);
	}

}