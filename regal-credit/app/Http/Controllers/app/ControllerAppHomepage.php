<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class ControllerAppHomepage
 * @package App\Http\Controllers
 * @author  Edwin Renz Mateo
 */
class ControllerAppHomepage extends Controller
{
    public function index()
    {
        $sRedirectUrl = (\session()->get('api_key') === null) ? 'registerapi' : 'displayweather';
        return redirect()->away($sRedirectUrl);
    }
}
