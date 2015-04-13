<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\GeoCoding;

use Mesour\GeoServices\Gps;

/**
 * @author Matous Nemec
 */
class Item
{

    private $Item = array();

    /**
     * @var AddressComponents
     */
    private $address_components;

    /**
     * @var Geometry
     */
    private $geometry;

    public function __construct($Item)
    {
        $this->Item = $Item;
    }

    
    /**
     * @return array
     */
    public function getTypes()
    {
        return $this->Item['types'];
    }


    /**
     * @return string
     */
    public function getFormattedAddress()
    {
        return $this->Item['formatted_address'];
    }


    /**
     * @return AddressComponents
     */
    public function getAddressComponents()
    {
        if(!$this->address_components)
        {
            $this->address_components = new AddressComponents($this->Item['address_components']);
        }
        return $this->address_components;
    }


    /**
     * @return array
     */
    public function getPostcodeLocalities()
    {
        return $this->Item['postcode_localities'];
    }


    /**
     * @return Geometry
     */
    public function getGeometry()
    {
        if(!$this->geometry)
        {
            $this->geometry = new Geometry($this->Item['geometry']);
        }
        return $this->geometry;
    }


    /**
     * @return string
     */
    public function getPartialMatch()
    {
        return $this->Item['partial_match'];
    }


    /**
     * @return string
     */
    public function getPlaceId()
    {
        return $this->Item['place_id'];
    }

}