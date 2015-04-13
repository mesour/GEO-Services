<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices;

/**
 * @author Matous Nemec
 */
class TransitRoutingPreference {

	/**
	 * indicates that the calculated route should prefer limited amounts of walking.
	 */
	const LESS_WALKING = 'less_walking';

	/**
	 * indicates that the calculated route should prefer a limited number of transfers.
	 */
	const FEWER_TRANSFERS = 'fewer_transfers';

	public function __construct() {
		throw new StaticClassException;
	}

}