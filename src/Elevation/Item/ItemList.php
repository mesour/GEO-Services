<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Elevation\Item;

use Mesour\GeoServices\Elevation\Item,
    Mesour\GeoServices\Exception;

/**
 * @author Matous Nemec
 */
class ItemList implements \Iterator, \ArrayAccess, \Countable {

	private $item = array();

	public function __construct($item) {
		foreach($item as $val) {
			$this->item[] = new Item($val);
		}
	}

	/**
	 * @return int
	 */
	public function count() {
		return count($this->item);
	}

	/**
	 * @param mixed $offset
	 * @return bool
	 */
	public function offsetExists($offset) {
		return isset($this->item[$offset]);
	}

	/**
	 * @param mixed $offset
	 * @return Item
	 */
	public function offsetGet($offset) {
		return $this->item[$offset];
	}

	public function offsetSet($offset, $value) {
		throw new Exception('You cant set item.');
	}

	public function offsetUnset($offset) {
		throw new Exception('You cant unset item.');
	}

	/**
	 * @return Item
	 */
	public function rewind() {
		reset($this->item);
	}

	/**
	 * @return Item
	 */
	public function current() {
		$var = current($this->item);
		return $var;
	}

	/**
	 * @return int
	 */
	public function key() {
		return key($this->item);
	}

	/**
	 * @return Item
	 */
	public function next() {
		$var = next($this->item);
		return $var;
	}

	public function valid() {
		$key = key($this->item);
		return ($key !== NULL && $key !== FALSE);
	}

}