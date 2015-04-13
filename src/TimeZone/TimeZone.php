<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices;

/**
 * @author Matous Nemec
 */
class TimeZone extends Http\Searcher implements ISearch
{

    private $required = array('location','timestamp');



    public function __construct(Http\Authenticator $authenticator)
    {
        $this->response = new TimeZone\Response($authenticator);
    }

    /**
     * Location to look up
     * 
     * @param $location
     * @return $this
     */
    public function setLocation($location)
    {
        $this->response->setParameter('location', $location);
        return $this;
    }

    /**
     * Specifies the desired time as seconds since midnight,
     * January 1, 1970 UTC. The Time Zone API uses the timestamp
     * to determine whether or not Daylight Savings should be applied.
     * Times before 1970 can be expressed as negative values.
     * 
     * @param $timestamp
     * @return $this
     */
    public function setTimestamp($timestamp)
    {
        $this->response->setParameter('timestamp', $timestamp);
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
     * @return TimeZone\Result
     * @throws Exception
     */
    public function lookup()
    {
        foreach ($this->required as $required) {
            if (!$this->response->hasParameter($required)) {
                throw new Exception('Parameter ' . $required . ' is required.');
            }
        }
        
        return new TimeZone\Result($this->response->getResponse());
    }

}