<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Service\app\ServiceAppRegisterApiKey;
use Illuminate\Http\Request;

/**
 * Class ControllerAppHomepage
 * @package App\Http\Controllers
 * @author  Edwin Renz Mateo
 */
class ControllerAppRegisterApiKey extends Controller
{
    /**
     * Object for ServiceAppManagement
     * @var ServiceAppManagement
     */
    private $ServiceAppRegisterApiKey;

    /**
     * ControllerKeyManagement constructor.
     * @param ServiceKeyManagement                $oServiceKeyManagement
     * @param LibraryMockablePlacesAuthentication $oLibraryPlacesAuthentication
     * @param ServiceAppManagement                $oServiceAppManagement
     * @param ServiceLocaleManagement                $oServiceLocaleManagement
     */
    public function __construct(ServiceAppRegisterApiKey $ServiceAppRegisterApiKey)
    {
        $this->oServiceAppRegisterApiKey = $ServiceAppRegisterApiKey;
    }

    public function index()
    {
        return view('pages.api_register')->with('');
    }

    public function validateApiKey()
    {
        return $this->oServiceAppRegisterApiKey->validateApiKey(base64_decode(request()->get('api_key')));
    }
}
