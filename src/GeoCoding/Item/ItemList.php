<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\GeoCoding\Item;

use Mesour\GeoServices\GeoCoding\Item,
    Mesour\GeoServices\Exception;

/**
 * @author Matous Nemec
 */
class ItemList implements \Iterator, \ArrayAccess, \Countable {

	private $Item = array();

	public function __construct($Item) {
		foreach($Item as $val) {
			$this->Item[] = new Item($val);
		}
	}

	/**
	 * @return int
	 */
	public function count() {
		return count($this->Item);
	}

	/**
	 * @param mixed $offset
	 * @return bool
	 */
	public function offsetExists($offset) {
		return isset($this->Item[$offset]);
	}

	/**
	 * @param mixed $offset
	 * @return Item
	 */
	public function offsetGet($offset) {
		return $this->Item[$offset];
	}

	public function offsetSet($offset, $value) {
		throw new Exception('You cant set Item.');
	}

	public function offsetUnset($offset) {
		throw new Exception('You cant unset Item.');
	}

	/**
	 * @return Item
	 */
	public function rewind() {
		reset($this->Item);
	}

	/**
	 * @return Item
	 */
	public function current() {
		$var = current($this->Item);
		return $var;
	}

	/**
	 * @return int
	 */
	public function key() {
		return key($this->Item);
	}

	/**
	 * @return Item
	 */
	public function next() {
		$var = next($this->Item);
		return $var;
	}

	public function valid() {
		$key = key($this->Item);
		return ($key !== NULL && $key !== FALSE);
	}

}