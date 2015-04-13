<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\TimeZone;

use Mesour\GeoServices\Gps;

/**
 * @author Matous Nemec
 */
class TimeZoneResult
{

    private $TimeZoneResult = array();

    public function __construct($TimeZoneResult)
    {
        $this->TimeZoneResult = $TimeZoneResult;
    }

    
    /**
     * @return integer
     */
    public function getDstOffset()
    {
        return $this->TimeZoneResult['dstOffset'];
    }


    /**
     * @return integer
     */
    public function getRawOffset()
    {
        return $this->TimeZoneResult['rawOffset'];
    }


    /**
     * @return string
     */
    public function getTimeZoneId()
    {
        return $this->TimeZoneResult['timeZoneId'];
    }


    /**
     * @return string
     */
    public function getTimeZoneName()
    {
        return $this->TimeZoneResult['timeZoneName'];
    }


    /**
     * @return string|null
     */
    public function getErrorMessage()
    {
        return isset($this->TimeZoneResult['error_message']) ? $this->TimeZoneResult['error_message'] : NULL;
    }

}