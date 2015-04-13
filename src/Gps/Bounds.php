<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Gps;

/**
 * @author Matous Nemec
 */
class Bounds {

	/**
	 * @var Coordinates
	 */
	private $northeast;

	/**
	 * @var Coordinates
	 */
	private $southwest;

	public function __construct(Coordinates $northeast, Coordinates $southwest) {
		$this->northeast = $northeast;
		$this->southwest = $southwest;
	}

	public function getSouthWest() {
		return $this->southwest;
	}

	public function getNorthEast() {
		return $this->northeast;
	}

    public function toArray() {
        return array(
            'southwest' => array('lat' => $this->southwest->getLat(), 'lng' => $this->southwest->getLng()),
            'northeast' => array('lat' => $this->northeast->getLat(), 'lng' => $this->northeast->getLng()),
        );
    }

    public function __toArray() {
        return $this->toArray();
    }

}