<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\GeoCoding\Item;

use Mesour\GeoServices\Gps;

/**
 * @author Matous Nemec
 */
class Geometry
{

    private $geometry = array();

    /**
     * @var Gps\Coordinates
     */
    private $location;

    /**
     * @var Gps\Bounds
     */
    private $viewport;

    /**
     * @var Gps\Bounds
     */
    private $bounds;

    public function __construct($geometry)
    {
        $this->geometry = $geometry;
    }

    
    /**
     * @return Gps\Coordinates
     */
    public function getLocation()
    {
        if(!$this->location)
        {
            $this->location = new Gps\Coordinates($this->geometry['location']);
        }
        return $this->location;
    }


    /**
     * @return string constants from LocationType
     */
    public function getLocationType()
    {
        return $this->geometry['location_type'];
    }


    /**
     * @return Gps\Bounds
     */
    public function getViewport()
    {
        if(!$this->viewport)
        {
            $this->viewport = new Gps\Bounds(
                new Gps\Coordinates($this->geometry['viewport']['northeast']),
                new Gps\Coordinates($this->geometry['viewport']['southwest'])
            );
        }
        return $this->viewport;
    }


    /**
     * @return Gps\Bounds
     */
    public function getBounds()
    {
        if(!$this->bounds)
        {
            $this->bounds = new Gps\Bounds(
                new Gps\Coordinates($this->geometry['bounds']['northeast']),
                new Gps\Coordinates($this->geometry['bounds']['southwest'])
            );
        }
        return $this->bounds;
    }

}