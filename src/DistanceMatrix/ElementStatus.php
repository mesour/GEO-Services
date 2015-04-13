<?php
/**
* This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
* Copyright (c) 2015 Matous Nemec (http://mesour.com)
*/

namespace Mesour\GeoServices\DistanceMatrix;

use Mesour\GeoServices\StaticClassException;

/**
* @author Matous Nemec
* @package Mesour\GeoServices
*/
class ElementStatus
{
const OK = 'OK',
        NOT_FOUND = 'NOTFOUND',
        ZERO_RESULTS = 'ZERORESULTS';


    public function __construct() {
        throw new StaticClassException;
    }

}