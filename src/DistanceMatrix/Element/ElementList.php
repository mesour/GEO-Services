<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\DistanceMatrix\Element;

use Mesour\GeoServices\DistanceMatrix\Element,
    Mesour\GeoServices\Exception;

/**
 * @author Matous Nemec
 */
class ElementList implements \Iterator, \ArrayAccess, \Countable {

	private $Element = array();

	public function __construct($Element) {
		foreach($Element as $val) {
			$this->Element[] = new Element($val);
		}
	}

	/**
	 * @return int
	 */
	public function count() {
		return count($this->Element);
	}

	/**
	 * @param mixed $offset
	 * @return bool
	 */
	public function offsetExists($offset) {
		return isset($this->Element[$offset]);
	}

	/**
	 * @param mixed $offset
	 * @return Element
	 */
	public function offsetGet($offset) {
		return $this->Element[$offset];
	}

	public function offsetSet($offset, $value) {
		throw new Exception('You cant set Element.');
	}

	public function offsetUnset($offset) {
		throw new Exception('You cant unset Element.');
	}

	/**
	 * @return Element
	 */
	public function rewind() {
		reset($this->Element);
	}

	/**
	 * @return Element
	 */
	public function current() {
		$var = current($this->Element);
		return $var;
	}

	/**
	 * @return int
	 */
	public function key() {
		return key($this->Element);
	}

	/**
	 * @return Element
	 */
	public function next() {
		$var = next($this->Element);
		return $var;
	}

	public function valid() {
		$key = key($this->Element);
		return ($key !== NULL && $key !== FALSE);
	}

}