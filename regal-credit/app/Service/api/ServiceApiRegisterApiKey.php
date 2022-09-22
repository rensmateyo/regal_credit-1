<?php

namespace App\Service\api;

use Illuminate\Support\Facades\Http;
use App\Service\ServiceBase;

/**
 * Class ServiceApiRegisterApiKey
 * @package App\Http\Services\api
 * @author Edwin Renz Mateo <edwin.simplexi.com.ph>
 * @since 2019.07.01
 */
class ServiceApiRegisterApiKey extends ServiceBase
{
    /**
     * Object for RepositorySetting
     * @var $oRepositorySetting
     */
    private $oRepositorySetting;

    private $sCallApi = '/locations/v1/cities/autocomplete';

    /**
     * RepositorySetting constructor.
     * @param RepositorySetting $oRepositorySetting
     */
    public function __construct()
    {
    }

    /**
     * Pass app status to repository for saving
     * @param string $sMallId
     * @param bool  $bAppStatus
     * @return array
     */
    public function saveAppStatus(string $sApiKey)
    {
        $aApiParameters = [
            'apikey' => $sApiKey,
            'q' => 'manila',
            'language' => 'en-us'
        ];
        $oResponse = Http::get(sprintf(self::ACCU_DOMAIN . '%s?%s', $this->sCallApi, http_build_query($aApiParameters)));
        if ($oResponse->status() === 200) {
            \session()->put('api_key', $sApiKey);
        }
        return $oResponse->status();
    }
}
