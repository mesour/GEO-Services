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
class RowsList implements \Iterator, \ArrayAccess, \Countable {

	private $rows = array();

	public function __construct($rows) {
		foreach($rows as $val) {
			$this->rows[] = new Rows($val);
		}
	}

	/**
	 * @return int
	 */
	public function count() {
		return count($this->rows);
	}

	/**
	 * @param mixed $offset
	 * @return bool
	 */
	public function offsetExists($offset) {
		return isset($this->rows[$offset]);
	}

	/**
	 * @param mixed $offset
	 * @return Rows
	 */
	public function offsetGet($offset) {
		return $this->rows[$offset];
	}

	public function offsetSet($offset, $value) {
		throw new Exception('You cant set rows.');
	}

	public function offsetUnset($offset) {
		throw new Exception('You cant unset rows.');
	}

	/**
	 * @return Rows
	 */
	public function rewind() {
		reset($this->rows);
	}

	/**
	 * @return Rows
	 */
	public function current() {
		$var = current($this->rows);
		return $var;
	}

	/**
	 * @return int
	 */
	public function key() {
		return key($this->rows);
	}

	/**
	 * @return Rows
	 */
	public function next() {
		$var = next($this->rows);
		return $var;
	}

	public function valid() {
		$key = key($this->rows);
		return ($key !== NULL && $key !== FALSE);
	}

}