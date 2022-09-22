<?php

namespace App\Service\app;

use Illuminate\Support\Facades\Http;
use App\Service\ServiceBase;

/**
 * Class ServiceApiRegisterApiKey
 * @package App\Http\Service\api
 * @author Edwin Renz Mateo
 */
class ServiceAppRegisterApiKey extends ServiceBase
{
    /**
     * Pass app status to repository for saving
     * @param string $sMallId
     * @param bool  $bAppStatus
     * @return array
     */
    public function validateApiKey(string $sApiKey)
    {
        if (empty($sApiKey) === true) {
            return '404';
        }

        $oResponse = Http::post('http://regal-credit-1.pretest.com/api/api_key', [
            'api_key' => $sApiKey
        ]);

        \session()->put('api_key', $sApiKey);
        return $oResponse;
    }
}
