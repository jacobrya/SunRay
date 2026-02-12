<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests\WeatherRequest;
use App\Services\WeatherService;
use Illuminate\Support\Facades\Cache;

class WeatherController extends Controller
{
    public function __construct(
        private WeatherService $weatherService
    ) {}

    public function showForm()
    {
        return view('weather.input-city');
    }

    public function getWeather(WeatherRequest $request)
    {
        $city = $request->validated()['city'];
        $cacheKey = 'weather:' . strtolower(trim($city));
        $fromCache = Cache::has($cacheKey);

        $weather = $this->weatherService->getWeatherByCity($city);

        if (!$weather) {
            return back()
                ->withInput()
                ->withErrors(['city' => 'Не удалось получить данные о погоде для этого города']);
        }

        return view('weather.result', [
            'city' => $city,
            'weather' => $weather,
            'fromCache' => $fromCache
        ]);
    }
}
