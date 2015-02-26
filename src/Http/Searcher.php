<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Http;

/**
 * @author Matous Nemec
 */
abstract class Searcher {

	/**
	 * @var Response
	 */
	protected $response;

	public function setParameter($key, $value) {
		$this->response->setParameter($key, $value);
		return $this;
	}

	public function getParameter($key) {
		return $this->response->getParameter($key);
	}

	public function hasParameter($key) {
		return $this->response->hasParameter($key);
	}

}