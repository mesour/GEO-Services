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
class AddressComponentsList implements \Iterator, \ArrayAccess, \Countable {

	private $address_components = array();

	public function __construct($address_components) {
		foreach($address_components as $val) {
			$this->address_components[] = new AddressComponents($val);
		}
	}

	/**
	 * @return int
	 */
	public function count() {
		return count($this->address_components);
	}

	/**
	 * @param mixed $offset
	 * @return bool
	 */
	public function offsetExists($offset) {
		return isset($this->address_components[$offset]);
	}

	/**
	 * @param mixed $offset
	 * @return AddressComponents
	 */
	public function offsetGet($offset) {
		return $this->address_components[$offset];
	}

	public function offsetSet($offset, $value) {
		throw new Exception('You cant set address_components.');
	}

	public function offsetUnset($offset) {
		throw new Exception('You cant unset address_components.');
	}

	/**
	 * @return AddressComponents
	 */
	public function rewind() {
		reset($this->address_components);
	}

	/**
	 * @return AddressComponents
	 */
	public function current() {
		$var = current($this->address_components);
		return $var;
	}

	/**
	 * @return int
	 */
	public function key() {
		return key($this->address_components);
	}

	/**
	 * @return AddressComponents
	 */
	public function next() {
		$var = next($this->address_components);
		return $var;
	}

	public function valid() {
		$key = key($this->address_components);
		return ($key !== NULL && $key !== FALSE);
	}

}