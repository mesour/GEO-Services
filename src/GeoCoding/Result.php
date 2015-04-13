<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\GeoCoding;

use Mesour\GeoServices\GeoCoding\Item,
Mesour\GeoServices\GeoCoding\Item\ItemList
;

/**
 * @author Matous Nemec
 */
class Result
{

    const OK = 'OK',
        ZERO_RESULTS = 'ZERO_RESULTS',
        INVALID_REQUEST = 'INVALID_REQUEST',
        OVER_QUERY_LIMIT = 'OVER_QUERY_LIMIT',
        REQUEST_DENIED = 'REQUEST_DENIED',
        UNKNOWN_ERROR = 'UNKNOWN_ERROR';


    private $response = array();

    /**
     * @var ItemList
     */
    private $Item;

    public function __construct($response)
    {
        $this->response = $response;
        if($this->isOk()) {
            $this->Item = new ItemList($this->response['routes']);
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
     * @return Item|ItemList|null
     */
    public function getItems($key = NULL)
    {
        return !$this->isOk() ? NULL : is_null($key) ? $this->Item : $this->Item[$key];
    }

}