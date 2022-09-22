<?php

namespace App\Service\app;

use Illuminate\Support\Facades\Http;
use App\Service\ServiceBase;

/**
 * Class ServiceApiRegisterApiKey
 * @package App\Http\Service\api
 * @author Edwin Renz Mateo
 */
class ServiceAppDisplayWeather extends ServiceBase
{
    /**
     * Pass app status to repository for saving
     * @param string $sMallId
     * @param bool  $bAppStatus
     * @return array
     */
    public function getForecast(string $sLocation, string $sDay)
    {
        if (session()->has('api_key') === false) {
            return ['error_code' => '404'];
        }

        if (empty($sLocation) === true || empty($sDay) === true) {
            return ['error_code' => '401'];
        }

        $oResponse = Http::post('http://regal-credit-1.pretest.com/api/get_weather', [
            'location' => $sLocation,
            'day' => $sDay,
            'api_key' => session()->get('api_key')
        ]);
        return ['error_code' => '200', 'data' => json_decode($oResponse)];
    }
}
