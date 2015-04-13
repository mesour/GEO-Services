<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Elevation;

use Mesour\GeoServices\Gps;

/**
 * @author Matous Nemec
 */
class Item
{

    private $item = array();

    /**
     * @var Gps\Coordinates
     */
    private $location;

    public function __construct($item)
    {
        $this->item = $item;
    }

    
    /**
     * @return double
     */
    public function getElevation()
    {
        return (double) $this->item['elevation'];
    }


    /**
     * @return double
     */
    public function getResolution()
    {
        return (double) $this->item['resolution'];
    }


    /**
     * @return Gps\Coordinates
     */
    public function getLocation()
    {
        if(!$this->location)
        {
            $this->location = new Gps\Coordinates($this->item['location']);
        }
        return $this->location;
    }

}