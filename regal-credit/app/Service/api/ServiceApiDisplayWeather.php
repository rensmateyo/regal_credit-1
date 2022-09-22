<?php

namespace App\Service\api;

use Illuminate\Support\Facades\Http;
use App\Service\ServiceBase;

/**
 * Class ServiceApiDisplayWeather
 * @package App\Http\Services\api
 * @author Edwin Renz Mateo <edwin.simplexi.com.ph>
 * @since 2019.07.01
 */
class ServiceApiDisplayWeather extends ServiceBase
{
    /**
     * Object for RepositorySetting
     * @var $oRepositorySetting
     */
    private $oRepositorySetting;

    private $sLocationApi = '/locations/v1/cities/autocomplete';
    private $sForecastApi = '/forecasts/v1/daily';


    /**
     * Pass app status to repository for saving
     * @param string $sMallId
     * @param bool  $bAppStatus
     * @return array
     */
    public function getForecast(string $sLocation, string $sDay, string $sApiKey)
    {
        $aLocationApiParameters = [
            'apikey' => $sApiKey,
            'q' => $sLocation,
            'language' => 'en-us'
        ];

        $aForecastApiParameters = [
            'apikey' => $sApiKey,
            'language' => 'en-us'
        ];

        $oLocationResponse = Http::get(sprintf(self::ACCU_DOMAIN . '%s?%s', $this->sLocationApi, http_build_query($aLocationApiParameters)));
        if ($oLocationResponse->status() !== 200 || empty($oLocationResponse) === true) {
            return ['error_code' => '505'];
        }

        $oResponse = Http::get(sprintf(self::ACCU_DOMAIN . '%s/%s/%s?%s', $this->sForecastApi, $sDay, $oLocationResponse[0]['Key'], http_build_query($aForecastApiParameters)));
        if ($oResponse->status() !== 200) {
            return ['error_code' => '505'];
        }

        return ['error_code' => '200', 'data' => json_decode($oResponse)];
    }
}
