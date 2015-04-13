<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices;

/**
 * @author Matous Nemec
 */
class DistanceMatrix extends Http\Searcher implements ISearch
{

    private $required = array('origins','destinations');

    private $origins = array();
    private $destinations = array();
    private $transit = array();


    public function __construct(Http\Authenticator $authenticator)
    {
        $this->response = new DistanceMatrix\Response($authenticator);
    }

    /**
     * One or more addresses and/or textual latitude/longitude values,
     * separated with the pipe (|) character, from which to calculate
     * distance and time. If you pass an address as a string,
     * the service will geocode the string and convert it to a
     * latitude/longitude coordinate to calculate directions.
     * If you pass coordinates, ensure that no space exists between
     * the latitude and longitude values.
     * 
     * @param $origins
     * @return $this
     */
    public function setOrigins(Gps\PolyLine $origins)
    {
        $data = array();
        foreach ($origins->toArray() as $coordinate) {
            $data[] = implode(',', $coordinate->toArray());
        }
        $this->origins = implode('|', $data);
        return $this;
    }

    /**
     * One or more addresses and/or textual latitude/longitude values,
     * separated with the pipe (|) character, to which to calculate
     * distance and time. If you pass an address as a string,
     * the service will geocode the string and convert it to
     * a latitude/longitude coordinate to calculate directions.
     * If you pass coordinates, ensure that no space exists
     * between the latitude and longitude values.
     * 
     * @param $destinations
     * @return $this
     */
    public function setDestinations(array $destinations)
    {
        $this->destinations = implode('|', $destinations);
        return $this;
    }
    
    /**
     * Specifies the mode of transport to use when calculating directions.
     * (defaults to driving)
     * 
     * This method accepts constants from TravelMode class
     * 
     * @param $mode
     * @return $this
     */
    public function setTravelMode($mode)
    {
        $this->response->setParameter('mode', strtolower($mode));
        return $this;
    }

    /**
     * Specifies the language in which to return results. Note that we often update
     * supported languages so this list may not be exhaustive. If language is not
     * supplied, the service will attempt to use the native language of the domain
     * from which the request is sent.
     * 
     * Supported languages: https://developers.google.com/maps/faq#languagesupport
     * 
     * @param $language
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->response->setParameter('language', $language);
        return $this;
    }
    
    /**
     * Introduces restrictions to the route. Valid values are specified in the Restrictions section of this document.
     * 
     * This method accepts constants from Avoid class
     * @param $avoid
     * @return $this
     */
    public function setAvoid($avoid)
    {
        $this->response->setParameter('avoid', $avoid);
        return $this;
    }
    /**
     * @return $this
     */
    public function useMetricUnit()
    {
        $this->response->setParameter('units', 'metric');
        return $this;
    }

    /**
     * @return $this
     */
    public function useImperialUnit()
    {
        $this->response->setParameter('units', 'imperial');
        return $this;
    }

    /**
     * Specifies the desired time of departure. You can specify the time as an
     * integer in seconds since midnight, January 1, 1970 UTC. Alternatively, you
     * can specify a value of now, which sets the departure time to the current
     * time (correct to the nearest second).
     * 
     * @param $departure_time
     * @return $this
     */
    public function setDepartureTime($departure_time)
    {
        $this->response->setParameter('departure_time', $departure_time);
        return $this;
    }

    /**
     * Specifies the desired time of arrival for transit directions, in seconds
     * since midnight, January 1, 1970 UTC. You can specify either departure_time
     * or arrival_time, but not both. Note that arrival_time must be specified
     * as an integer.
     * 
     * @param $arrival_time
     * @return $this
     */
    public function setArrivalTime($arrival_time)
    {
        $this->response->setParameter('arrival_time', $arrival_time);
        return $this;
    }
    
    /**
     * Specifies one or more preferred modes of transit. This parameter may only be
     * specified for transit directions, and only if the request includes an API
     * key or a Google Maps API for Work client ID.
     * 
     * This method accepts constants from TransitMode class
     * 
     * @param $transit_mode
     * @return $this
     */
    public function addTransitMode($transit_mode)
    {
        $this->transit[] = strtolower($transit_mode);
        return $this;
    }
    
    /**
     * Specifies preferences for transit routes. Using this parameter, you can bias
     * the options returned, rather than accepting the default best route chosen by
     * the API. This parameter may only be specified for transit directions, and only
     * if the request includes an API key or a Google Maps API for Work client ID.
     * 
     * This method accepts constants from TransitRoutingPreference class
     * 
     * @param $transit_routing_preference
     * @return $this
     */
    public function setTransitRoutingPreference($transit_routing_preference)
    {
        $this->response->setParameter('transit_routing_preference', $transit_routing_preference);
        return $this;
    }

    /**
     * @param $origin
     * @return $this
     */
    public function addOrigin(Gps\Coordinates $origin)
    {
        $this->origins[] = $origin;
        return $this;
    }

    /**
     * @param $destination
     * @return $this
     */
    public function addDestination($destination)
    {
        $this->destinations[] = $destination;
        return $this;
    }

    /**
     * @return DistanceMatrix\Result
     * @throws Exception
     */
    public function lookup()
    {
        foreach ($this->required as $required) {
            if (!$this->response->hasParameter($required)) {
                throw new Exception('Parameter ' . $required . ' is required.');
            }
        }
        if(count($this->origins) > 0)
        {
            $this->response->setParameter('origins', implode('|', $this->origins));
        }
        if(count($this->destinations) > 0)
        {
            $this->response->setParameter('destinations', implode('|', $this->destinations));
        }
        if(count($this->transit) > 0)
        {
            $this->response->setParameter('transit', implode('|', $this->transit));
        }

        return new DistanceMatrix\Result($this->response->getResponse());
    }

}