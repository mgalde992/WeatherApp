<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WeatherController extends Controller
{
    public function fetchWeather(Request $request, $city)
    {
        // Check if the data is cached
        $cacheKey = "weather_{$city}";
        if (Cache::has($cacheKey)) {
            return response()->json(Cache::get($cacheKey));
        }

        $apiKey = env('OPENWEATHER_API_KEY');
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $city,
            'appid' => $apiKey,
            'units' => 'metric',
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'City not found'], 404);
        }

        $data = $response->json();
        $weatherData = new Weather([
            'city' => $data['name'],
            'temperature' => $data['main']['temp'],
            'description' => $data['weather'][0]['description'],
            'retrieved_at' => now(),
        ]);

        $weatherData->save();
        Cache::put($cacheKey, $weatherData, 600); // Cache for 10 minutes

        return response()->json($weatherData);
    }
}
