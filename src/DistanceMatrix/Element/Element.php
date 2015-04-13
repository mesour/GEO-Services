<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\DistanceMatrix;

use Mesour\GeoServices\Gps;

/**
 * @author Matous Nemec
 */
class Element
{

    private $Element = array();

    /**
     * @var Element\RowsList
     */
    private $rows;

    public function __construct($Element)
    {
        $this->Element = $Element;
    }

    
    /**
     * @return string
     */
    public function getOriginAddresses()
    {
        return $this->Element['origin_addresses'];
    }


    /**
     * @return string
     */
    public function getDestinationAddresses()
    {
        return $this->Element['destination_addresses'];
    }


    /**
     * @return Element\RowsList
     */
    public function getRows()
    {
        if(!$this->rows)
        {
            $this->rows = new Element\RowsList($this->Element['rows']);
        }
        return $this->rows;
    }

}