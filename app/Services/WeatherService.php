<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherService
{
    /**
     * Create a new class instance.
     */

    private string $apiKey;
    private string $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('OPENWEATHER_API_KEY');
        $this->baseUrl = 'https://api.openweathermap.org/data/2.5/weather';
    }

    public function getWeatherByCity(string $city): ?array
    {
        try{
            $response = Http::get($this->baseUrl, [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric',
                'lang' => 'ru'
            ]);
            if ($response->successful()) {
                return $response->json();
            }

            Log::warning('Weather API error', [
                'city' => $city,
                'status' => $response->status()
            ]);

            return null;
        }
        catch (\Exception $e) {
            Log::error('Weather service exception', [
                'city' => $city,
                'error' => $e->getMessage()
            ]);

            return null;
        }

    }
}

