<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Direction;

use Mesour\GeoServices\Direction\Route,
	Mesour\GeoServices\Direction\Route\RouteList;

/**
 * @author Matous Nemec
 */
class Result {

	const OK = 'OK',
	    NOT_FOUND = 'NOT_FOUND',
	    MAX_WAYPOINTS_EXCEEDED = 'MAX_WAYPOINTS_EXCEEDED',
	    INVALID_REQUEST = 'INVALID_REQUEST',
	    OVER_QUERY_LIMIT = 'OVER_QUERY_LIMIT',
	    REQUEST_DENIED = 'REQUEST_DENIED',
	    UNKNOWN_ERROR = 'UNKNOWN_ERROR';

	private $response = array();

	/**
	 * @var RouteList
	 */
	private $route_list;

	public function __construct($response) {
		$this->response = $response;
		if($this->isOk()) {
			$this->route_list = new RouteList($this->response['routes']);
		}
	}

	public function getStatus() {
		return $this->response['status'];
	}

	public function isOk() {
		return $this->getStatus() === self::OK;
	}

	/**
	 * @param null $key
	 * @return Route|RouteList|null
	 */
	public function getRoutes($key = NULL) {
		return !$this->isOk() ? NULL : is_null($key) ? $this->route_list : $this->route_list[$key];
	}

}