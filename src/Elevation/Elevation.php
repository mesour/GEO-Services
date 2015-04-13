<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices;

/**
 * @author Matous Nemec
 */
class Elevation extends Http\Searcher implements ISearch
{

    private $required = array();

    private $locations = array();
    private $paths = array();


    public function __construct(Http\Authenticator $authenticator)
    {
        $this->response = new Elevation\Response($authenticator);
    }

    
/**
     * Defines the location(s) on the earth from which to return
     * elevation data. This parameter takes either a single
     * location as a comma-separated {latitude,longitude} pair
     * (e.g. "40.714728,-73.998672") or multiple latitude/longitude
     * pairs passed as an array or as an encoded polyline.
     * 
     * @param $locations
     * @return $this
     */
    public function setLocations(Gps\PolyLine $locations)
    {
        $data = array();
        foreach ($locations->toArray() as $coordinate) {
            $data[] = implode(',', $coordinate->toArray());
        }
        $this->locations = implode('|', $data);
        return $this;
    }

    /**
     * Defines a path on the earth for which to return elevation data.
     * This parameter defines a set of two or more ordered
     * {latitude,longitude} pairs defining a path along the surface
     * of the earth. This parameter must be used in conjunction
     * with the samples parameter described below.
     * 
     * @param $path
     * @return $this
     */
    public function setPath(Gps\PolyLine $path)
    {
        $data = array();
        foreach ($path->toArray() as $coordinate) {
            $data[] = implode(',', $coordinate->toArray());
        }
        $this->paths = implode('|', $data);
        return $this;
    }

    /**
     * Specifies the number of sample points along a path for which
     * to return elevation data. The samples parameter divides
     * the given path into an ordered set of equidistant points
     * along the path.
     * 
     * @param $samples
     * @return $this
     */
    public function setSamples($samples)
    {
        $this->response->setParameter('samples', $samples);
        return $this;
    }

    /**
     * @return Elevation\Result
     * @throws Exception
     */
    public function lookup()
    {
        foreach ($this->required as $required) {
            if (!$this->response->hasParameter($required)) {
                throw new Exception('Parameter ' . $required . ' is required.');
            }
        }
        if(count($this->paths) > 0)
        {
            $this->response->setParameter('path', implode('|', $this->paths));
        }
        if(count($this->locations) > 0)
        {
            $this->response->setParameter('locations', implode('|', $this->locations));
        }

        return new Elevation\Result($this->response->getResponse());
    }

}