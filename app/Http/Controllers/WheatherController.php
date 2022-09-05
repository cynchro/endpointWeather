<?php

namespace App\Http\Controllers;

use App\Models\WeatherModel;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\WheaterRequest;

class WheatherController extends Controller
{

    function __construct(WeatherModel $weather, WheaterRequest $wheaterRequest)
    {
        $this->weather = $weather;
        $this->wheaterRequest = $wheaterRequest;
    }

    public function apiRequest(){
        $response = Http::get(env('API_URL'), [
            'access_key' => env('API_KEY'),
            'query' => $this->wheaterRequest->location
        ]);
        return $response->body();
    }

    public function apiWeather()
    {
        $storeSaveWeather = new WeatherModel();
        $storeSaveWeather->location = $this->wheaterRequest->location;
        $storeSaveWeather->current = $this->apiRequest();
        $storeSaveWeather->created_hour = date('H');
        $storeSaveWeather->save();

        return $this->apiRequest();
    }

    public function fetch()
    {
        date_default_timezone_set(env('TIME_ZONE'));
        $storeGetWeather = $this->weather->getWeather($this->wheaterRequest->location);
        if (json_decode($storeGetWeather)) {
        return $storeGetWeather->current;
        }
        return $this->apiWeather();
    }    
}
