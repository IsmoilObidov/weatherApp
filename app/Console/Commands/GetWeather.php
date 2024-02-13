<?php

namespace App\Console\Commands;

use App\Services\EmailService;
use Illuminate\Console\Command;
use App\Services\WeatherService;
use Telegram\Bot\Laravel\Facades\Telegram;

class GetWeather extends Command
{
    protected $signature = 'weather {provider} {city} {channel?} {user?}';
    protected $description = 'Get current weather for a city from different providers';
    public $weatherService;
    public $emailService;

    public function __construct(WeatherService $weatherService, EmailService $emailService)
    {
        parent::__construct();
        $this->weatherService = $weatherService;
        $this->emailService = $emailService;
    }

    public function handle()
    {
        $provider = $this->argument('provider');
        $city = $this->argument('city');
        $channel = $this->argument('channel') ?? 'console';
        $user = $this->argument('user') ?? 'console';

        switch ($provider) {
            case 'open-weather-map':
                $weatherData = $this->weatherService->getWeatherOWM($city);
                break;
            case 'accu-weather':
                $weatherData = $this->weatherService->getWeatherACCU($city);
                break;
        }


        if ($weatherData['status'] == 'success') {
            $resp = 'Currently, The weather in ' . $city . ' is ' . $weatherData['data']['temp'] . ' celcius.';
            switch ($channel) {
                case 'console':

                    $this->line($resp);
                    break;
                case 'mail':

                    $this->emailService->sendWeatherEmail($user, ['city' => $city, 'temp' => $weatherData['data']['temp']]);
                    $this->line('Sent successfully!');
                    break;
                case 'telegram':
                    Telegram::sendMessage([
                        'chat_id' => $user,
                        'text' => $resp,
                    ]);
                    break;
                default:
                    $this->error('Invalid channel specified.');
            }
        } else {
            $this->line('Ooops, we couldn\'t find the city!');
        }
    }
}
