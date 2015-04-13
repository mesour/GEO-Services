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
class Rows
{

    private $rows = array();

    /**
     * @var Gps\Coordinates
     */
    private $duration;

    /**
     * @var Gps\Coordinates
     */
    private $distance;

    /**
     * @var Fare
     */
    private $fare;

    public function __construct($rows)
    {
        $this->rows = $rows;
    }

    
    /**
     * @return string constants from ElementStatus
     */
    public function getStatus()
    {
        return $this->rows['status'];
    }


    /**
     * @return Gps\Coordinates
     */
    public function getDuration()
    {
        if(!$this->duration)
        {
            $this->duration = new Gps\Coordinates($this->rows['duration']);
        }
        return $this->duration;
    }


    /**
     * @return Gps\Coordinates
     */
    public function getDistance()
    {
        if(!$this->distance)
        {
            $this->distance = new Gps\Coordinates($this->rows['distance']);
        }
        return $this->distance;
    }


    /**
     * @return Fare
     */
    public function getFare()
    {
        if(!$this->fare)
        {
            $this->fare = new Fare($this->rows['fare']);
        }
        return $this->fare;
    }

}