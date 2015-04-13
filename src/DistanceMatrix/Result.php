<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\DistanceMatrix;

use Mesour\GeoServices\DistanceMatrix\Element,
Mesour\GeoServices\DistanceMatrix\Element\ElementList
;

/**
 * @author Matous Nemec
 */
class Result
{

    const OK = 'OK',
        MAX_ELEMENTS_EXCEEDED = 'MAX_ELEMENTS_EXCEEDED',
        INVALID_REQUEST = 'INVALID_REQUEST',
        OVER_QUERY_LIMIT = 'OVER_QUERY_LIMIT',
        REQUEST_DENIED = 'REQUEST_DENIED',
        UNKNOWN_ERROR = 'UNKNOWN_ERROR';


    private $response = array();

    /**
     * @var ElementList
     */
    private $Element;

    public function __construct($response)
    {
        $this->response = $response;
        if($this->isOk()) {
            $this->Element = new ElementList($this->response['routes']);
        }
    }

    public function getStatus()
    {
        return $this->response['status'];
    }

    public function isOk()
    {
        return $this->getStatus() === self::OK;
    }

    /**
     * @param null $key
     * @return Element|ElementList|null
     */
    public function getElements($key = NULL)
    {
        return !$this->isOk() ? NULL : is_null($key) ? $this->Element : $this->Element[$key];
    }

}