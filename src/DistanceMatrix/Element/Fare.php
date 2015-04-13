<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\DistanceMatrix\Element;

use Mesour\GeoServices\Gps;

/**
 * @author Matous Nemec
 */
class Fare
{

    private $fare = array();

    public function __construct($fare)
    {
        $this->fare = $fare;
    }

    
    /**
     * @return string constants from Currency
     */
    public function getCurrency()
    {
        return $this->fare['currency'];
    }


    /**
     * @return float
     */
    public function getValue()
    {
        return (float) $this->fare['value'];
    }

}