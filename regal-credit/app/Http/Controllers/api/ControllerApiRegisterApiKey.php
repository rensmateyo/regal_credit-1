<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Service\api\ServiceApiRegisterApiKey;
use Illuminate\Http\Request;

/**
 * Class ControllerApiRegisterApiKey
 * @package App\Http\Controllers
 * @author  Edwin Renz Mateo
 */
class ControllerApiRegisterApiKey extends Controller
{
    /**
     * Object for ServiceAppSettingManagement
     * @var $oServiceAppSettingManagement
     */
    protected $oServiceApiRegisterApiKey;

    /**
     * ControllerAppSettingManagement constructor.
     * @param ServiceAppSettingManagement $oServiceAppSettingManagement
     */
    public function __construct(ServiceApiRegisterApiKey $oServiceApiRegisterApiKey)
    {
        $this->oServiceApiRegisterApiKey = $oServiceApiRegisterApiKey;
    }

    public function create()
    {
        return $this->oServiceApiRegisterApiKey->saveAppStatus(request()->get('api_key'));
    }
}
