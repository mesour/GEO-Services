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
class AddressComponents
{

    private $address_components = array();

    public function __construct($address_components)
    {
        $this->address_components = $address_components;
    }

    
    /**
     * @return array
     */
    public function getTypes()
    {
        return $this->address_components['types'];
    }


    /**
     * @return string
     */
    public function getLongName()
    {
        return $this->address_components['long_name'];
    }


    /**
     * @return string
     */
    public function getShortName()
    {
        return $this->address_components['short_name'];
    }

}