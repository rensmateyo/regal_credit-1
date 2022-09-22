<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Service\api\ServiceApiDisplayWeather;
use Illuminate\Http\Request;

/**
 * Class ControllerApiDisplayWeather
 * @package App\Http\Controllers
 * @author  Edwin Renz Mateo
 */
class ControllerApiDisplayWeather extends Controller
{
    /**
     * Object for ServiceAppSettingManagement
     * @var $oServiceAppSettingManagement
     */
    protected $oServiceApiDisplayWeather;

    /**
     * ControllerAppSettingManagement constructor.
     * @param ServiceAppSettingManagement $oServiceAppSettingManagement
     */
    public function __construct(ServiceApiDisplayWeather $oServiceApiDisplayWeather)
    {
        $this->oServiceApiDisplayWeather = $oServiceApiDisplayWeather;
    }

    public function getForecast()
    {
        return $this->oServiceApiDisplayWeather->getForecast(request()->get('location'), request()->get('day'), request()->get('api_key'));
    }
}
