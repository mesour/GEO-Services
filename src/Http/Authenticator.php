<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Http;

/**
 * @author Matous Nemec
 */
class Authenticator {

	private $api_key;

	public function __construct($api_key) {
		$this->api_key = $api_key;
	}

	public function getApiKey() {
		return $this->api_key;
	}

}