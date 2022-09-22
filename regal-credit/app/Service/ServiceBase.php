<?php

namespace App\Service;

/**
 * Common class for services
 * @package App\Http\Service
 * @author Edwin Renz Mateo
 */
abstract class ServiceBase
{
    /**
     * Message success
     * @var string
     */
    protected const API_SUCCESS = 'Success!';

    /**
     * Message error
     * @var string
     */
    protected const API_FAILED = 'Error!';

    /**
     * Accuweather domain
     * @var string
     */
    protected const ACCU_DOMAIN = 'http://dataservice.accuweather.com';
}
