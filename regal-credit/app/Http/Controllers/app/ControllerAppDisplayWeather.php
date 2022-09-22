<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Service\app\ServiceAppDisplayWeather;
use Illuminate\Http\Request;

/**
 * Class ControllerAppHomepage
 * @package App\Http\Controllers
 * @author  Edwin Renz Mateo
 */
class ControllerAppDisplayWeather extends Controller
{
    /**
     * Object for ServiceAppManagement
     * @var ServiceAppManagement
     */
    private $ServiceAppDisplayWeather;

    /**
     * ControllerKeyManagement constructor.
     * @param ServiceKeyManagement                $oServiceKeyManagement
     * @param LibraryMockablePlacesAuthentication $oLibraryPlacesAuthentication
     * @param ServiceAppManagement                $oServiceAppManagement
     * @param ServiceLocaleManagement                $oServiceLocaleManagement
     */
    public function __construct(ServiceAppDisplayWeather $ServiceAppDisplayWeather)
    {
        $this->oServiceAppDisplayWeather = $ServiceAppDisplayWeather;
    }

    public function index(Request $request)
    {
        return view('pages.display_weather');
    }

    public function getForecast()
    {
        $sLocation = request()->get('location');
        $sDays = request()->get('day');
        return $this->oServiceAppDisplayWeather->getForecast($sLocation, $sDays);
    }
}
