<?php
/**
* This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
* Copyright (c) 2015 Matous Nemec (http://mesour.com)
*/

namespace Mesour\GeoServices\GeoCoding;

use Mesour\GeoServices\StaticClassException;

/**
* @author Matous Nemec
* @package Mesour\GeoServices
*/
class LocationType
{
const ROOFTOP = 'ROOFTOP',
        RANGE_INTERPOLATED = 'RANGE_INTERPOLATED',
        GEOMETRIC_CENTER = 'GEOMETRIC_CENTER',
        APPROXIMATE = 'APPROXIMATE';


    public function __construct() {
        throw new StaticClassException;
    }

}