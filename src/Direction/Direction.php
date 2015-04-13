<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices;

/**
 * @author Matous Nemec
 */
class Direction extends Http\Searcher implements ISearch {

	private $required = array('origin', 'destination');

	private $transit = array();

	private $way_points = array();

	public function __construct(Http\Authenticator $authenticator) {
		$this->response = new Direction\Response($authenticator);
	}

	/**
	 * The address or textual latitude/longitude value from which you wish
	 * to calculate directions. If you pass an address as a string, the
	 * Directions service will geocode the string and convert it to a
	 * latitude/longitude coordinate to calculate directions. If you pass
	 * coordinates, ensure that no space exists between the latitude and
	 * longitude values.
	 *
	 * @param $origin
	 * @return $this
	 */
	public function setOrigin($origin) {
		$this->response->setParameter('origin', $origin);
		return $this;
	}

	/**
	 * The address or textual latitude/longitude value from which you wish to
	 * calculate directions. If you pass an address as a string, the Directions
	 * service will geocode the string and convert it to a latitude/longitude
	 * coordinate to calculate directions. If you pass coordinates, ensure that
	 * no space exists between the latitude and longitude values.
	 *
	 * @param $destination
	 * @return $this
	 */
	public function setDestination($destination) {
		$this->response->setParameter('destination', $destination);
		return $this;
	}

	/**
	 * When calculating routes using the Directions API, you may also specify
	 * waypoints for driving, walking or bicycling directions. Waypoints are
	 * not available for transit directions. Waypoints allow you to calculate
	 * routes through additional locations, in which case the returned route
	 * passes through the given waypoints.
	 *
	 * @param $way_point
	 * @return $this
	 */
	public function addWayPoint($way_point) {
		$this->way_points[] = $way_point;
		return $this;
	}

	/**
	 * Takes a ccTLD (country code top-level domain) argument specifying the region
	 * bias. Most ccTLD codes are identical to ISO 3166-1 codes, with some notable
	 * exceptions. For example, the United Kingdom's ccTLD is "uk" (.co.uk) while
	 * its ISO 3166-1 code is "gb" (technically for the entity of "The United
	 * Kingdom of Great Britain and Northern Ireland").
	 *
	 * @param $region
	 * @return $this
	 */
	public function setRegion($region) {
		$this->response->setParameter('region', $region);
		return $this;
	}

	/**
	 * Indicates that the calculated route(s) should avoid the indicated features.
	 *
	 * This method accepts constants from Avoid class
	 *
	 * @param $avoid
	 * @return $this
	 */
	public function setAvoid($avoid) {
		$this->response->setParameter('avoid', $avoid);
		return $this;
	}

	/**
	 * If set to true, specifies that the Directions service may provide more than one
	 * route alternative in the response. Note that providing route alternatives may
	 * increase the response time from the server.
	 *
	 * @param bool $alternatives
	 * @return $this
	 */
	public function setAlternatives($alternatives = TRUE) {
		$this->response->setParameter('alternatives', $alternatives ? 'true' : 'false');
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
	public function setLanguage($language) {
		$this->response->setParameter('language', $language);
		return $this;
	}

	/**
	 * Specifies the mode of transport to use when calculating directions.
	 * (defaults to driving)
	 *
	 * This method accepts constants from TravelMode class
	 *
	 * @param $travel_mode
	 * @return $this
	 */
	public function setTravelMode($travel_mode) {
		$this->response->setParameter('mode', strtolower($travel_mode));
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
	public function addTransitMode($transit_mode) {
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
	public function setTransitRoutingPreference($transit_routing_preference) {
		$this->response->setParameter('transit_routing_preference', $transit_routing_preference);
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
	public function setDepartureTime($departure_time) {
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
	public function setArrivalTime($arrival_time) {
		$this->response->setParameter('arrival_time', $arrival_time);
		return $this;
	}

	public function useMetricUnit() {
		$this->response->setParameter('units', 'metric');
		return $this;
	}

	public function useImperialUnit() {
		$this->response->setParameter('units', 'imperial');
		return $this;
	}

	/**
	 * @return Direction\Result
	 * @throws Exception
	 */
	public function lookup() {
		foreach ($this->required as $required) {
			if (!$this->response->hasParameter($required)) {
				throw new Exception('Parameter ' . $required . ' is required.');
			}
		}
		if(count($this->transit) > 0) {
			$this->response->setParameter('transit_mode', implode('|', $this->transit));
		}
		if(count($this->way_points) > 0) {
			$this->response->setParameter('waypoints', implode('|', $this->way_points));
		}
		return new Direction\Result($this->response->getResponseJson());
	}

}