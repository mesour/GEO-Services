<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Direction\Route;

use Mesour\GeoServices\Direction\Route,
    Mesour\GeoServices\Exception;

/**
 * @author Matous Nemec
 */
class RouteList implements \Iterator, \ArrayAccess, \Countable {

	private $routes = array();

	public function __construct($routes) {
		foreach($routes as $route) {
			$this->routes[] = new Route($route);
		}
	}

	/**
	 * @return int
	 */
	public function count() {
		return count($this->routes);
	}

	/**
	 * @param mixed $offset
	 * @return bool
	 */
	public function offsetExists($offset) {
		return isset($this->routes[$offset]);
	}

	/**
	 * @param mixed $offset
	 * @return Route
	 */
	public function offsetGet($offset) {
		return $this->routes[$offset];
	}

	public function offsetSet($offset, $value) {
		throw new Exception('You cant set route.');
	}

	public function offsetUnset($offset) {
		throw new Exception('You cant unset route.');
	}

	/**
	 * @return Route
	 */
	public function rewind() {
		reset($this->routes);
	}

	/**
	 * @return Route
	 */
	public function current() {
		$var = current($this->routes);
		return $var;
	}

	/**
	 * @return int
	 */
	public function key() {
		return key($this->routes);
	}

	/**
	 * @return Route
	 */
	public function next() {
		$var = next($this->routes);
		return $var;
	}

	public function valid() {
		$key = key($this->routes);
		return ($key !== NULL && $key !== FALSE);
	}

}