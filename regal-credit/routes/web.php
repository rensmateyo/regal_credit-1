<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.api_register');
// });

Route::get('/', 'ControllerAppHomepage@index');

Route::get('/registerapi', 'ControllerAppRegisterApiKey@index');
Route::post('/validateapi', 'ControllerAppRegisterApiKey@validateApiKey');

Route::get('/displayweather', 'ControllerAppDisplayWeather@index');
Route::post('/getforecast', 'ControllerAppDisplayWeather@getForecast');
