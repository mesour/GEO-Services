<?php
/**
 * This file is part of the Mesour GeoServices (http://geo-services.mesour.com)
 * Copyright (c) 2015 Matous Nemec (http://mesour.com)
 */

namespace Mesour\GeoServices\Elevation;

use Mesour\GeoServices\Http\Authenticator;

/**
 * @author Matous Nemec
 */
class Response extends \Mesour\GeoServices\Http\Response
{

	/**
	 * @var Authenticator
	 */
	protected $authenticator;

	public function __construct(Authenticator $authenticator)
    {
		$this->authenticator = $authenticator;
		$this->link = 'https://maps.googleapis.com/maps/api/elevation/json';
	}

	protected function prepareParameters()
    {
		$this->setParameter('key', $this->authenticator->getApiKey());
		return parent::prepareParameters();
	}

}