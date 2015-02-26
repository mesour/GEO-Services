<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Direction\Transit;

use Mesour\GeoServices\StaticClassException;

/**
 * @author Matous Nemec
 */
class Mode {

	const RAIL = 'RAIL',
	    METRO_RAIL = 'METRO_RAIL',
	    SUBWAY = 'SUBWAY',
	    TRAM = 'TRAM',
	    MONORAIL = 'MONORAIL',
	    HEAVY_RAIL = 'HEAVY_RAIL',
	    COMMUTER_TRAIN = 'COMMUTER_TRAIN',
	    HIGH_SPEED_TRAIN = 'HIGH_SPEED_TRAIN',
	    BUS = 'BUS',
	    INTERCITY_BUS = 'INTERCITY_BUS',
	    TROLLEYBUS = 'TROLLEYBUS',
	    SHARE_TAXI = 'SHARE_TAXI',
	    FERRY = 'FERRY',
	    CABLE_CAR = 'GONDOLA_LIFT',
	    GONDOLA_LIFT = 'GONDOLA_LIFT',
	    FUNICULAR = 'FUNICULAR',
	    OTHER = 'OTHER';

	public function __construct() {
		throw new StaticClassException;
	}

}