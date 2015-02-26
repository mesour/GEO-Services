<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Direction;

use Mesour\GeoServices\StaticClassException;

/**
 * @author Matous Nemec
 * @package Mesour\GeoServices
 */
class Avoid {

	/**
	 * indicates that the calculated route should avoid toll roads/bridges.
	 */
	const TOOLS = 'tolls';

	/**
	 * indicates that the calculated route should avoid highways.
	 */
	const HIGHWAYS = 'highways';

	/**
	 * indicates that the calculated route should avoid ferries.
	 */
	const FERRIES = 'ferries';

	public function __construct() {
		throw new StaticClassException;
	}

}