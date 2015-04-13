<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices;

/**
 * @author Matous Nemec
 */
class TravelMode {

	const DRIVING = 'DRIVING',
	    WALKING = 'WALKING',
	    BICYCLING = 'BICYCLING',
	    TRANSIT = 'TRANSIT';

	public function __construct() {
		throw new StaticClassException;
	}

}