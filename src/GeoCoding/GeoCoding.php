<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices;

/**
 * @author Matous Nemec
 */
class GeoCoding extends Http\Searcher implements ISearch
{

    private $required = array('address');



    public function __construct(Http\Authenticator $authenticator)
    {
        $this->response = new GeoCoding\Response($authenticator);
    }

    /**
     * The street address that you want to geocode, in the
     * format used by the national postal service of
     * the country concerned. Additional address elements
     * such as business names and unit, suite or floor
     * numbers should be avoided.
     * 
     * @param $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->response->setParameter('address', $address);
        return $this;
    }

    /**
     * The language in which to return results. Note that we
     * often update supported languages so this list may not
     * be exhaustive. If language is not supplied, the geocoder
     * will attempt to use the native language of the domain
     * from which the request is sent wherever possible.
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
     * The region code, specified as a ccTLD ("top-level domain")
     * two-character value. This parameter will only influence,
     * not fully restrict, results from the geocoder.
     * 
     * @param $region
     * @return $this
     */
    public function setRegion($region)
    {
        $this->response->setParameter('region', $region);
        return $this;
    }

    /**
     * @param $bounds
     * @return $this
     */
    public function setBounds(Gps\Bounds $bounds)
    {
        $data = array();
        foreach ($bounds->toArray() as $coordinate) {
            $data[] = implode(',', $coordinate->toArray());
        }
        $this->response->setParameter('bounds', implode('|', $data));
        return $this;
    }

    /**
     * @return GeoCoding\Result
     * @throws Exception
     */
    public function lookup()
    {
        foreach ($this->required as $required) {
            if (!$this->response->hasParameter($required)) {
                throw new Exception('Parameter ' . $required . ' is required.');
            }
        }
        
        return new GeoCoding\Result($this->response->getResponse());
    }

}