<?php

namespace App\Services;

use App\Mail\WeatherEmail;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendWeatherEmail($recipient, $weatherData)
    {
        Mail::to($recipient)->send(new WeatherEmail($weatherData));
    }
}
