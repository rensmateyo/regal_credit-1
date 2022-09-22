<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Closure;

class ValidateApiKey
{
    /**
     * Check if the api is valid before saving it to session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $oRequest, Closure $oNext)
    {
        $sApiKey = \request()->get('api_key');
        $aApiParameters = [
            'apikey' => $sApiKey,
            'q' => 'manila',
            'language' => 'en-us'
        ];

        $oResponse = Http::get(sprintf('http://dataservice.accuweather.com/locations/v1/cities/autocomplete?%s', http_build_query($aApiParameters)));
        if ($oResponse->status() !== 200) {
            return response(['Api key is not valid'], $oResponse->status());
        }
        return $oNext($oRequest);
    }
}
