<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Http;

use Mesour\GeoServices\Exception;

/**
 * @author Matous Nemec
 */
class Response {

	private $parameters = array();

	protected $link;

	public function setParameter($key, $value) {
		$this->parameters[$key] = $value;
		return $this;
	}

	public function setParameters(array $parameters) {
		$this->parameters = $parameters;
		return $this;
	}

	public function getParameters() {
		return $this->parameters;
	}

	public function hasParameter($key) {
		return isset($this->parameters[$key]);
	}

	public function getParameter($key) {
		if(!$this->hasParameter($key)) {
			throw new Exception('Parameter ' . $key . ' does not exists.');
		}
		return $this->parameters[$key];
	}

	protected function getParsedParameters($parameters) {
		return http_build_query($parameters);
	}

	protected function prepareParameters() {
		$parameters = array();
		foreach($this->parameters as $key => $val) {
			$parameters[$key] = str_replace(' ', '+', $val);
		}
		return $this->getParsedParameters($parameters);
	}

	public function getResponseJson() {
		if(!is_string($this->link)) {
			throw new Exception('Link must be a string. ' . gettype($this->link) . ' given.');
		}
		$args = $this->prepareParameters();
		$url = $this->link . '?' . $args;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$response = curl_exec($ch);

		curl_close($ch);

		return json_decode($response, true);
	}

}