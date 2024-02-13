<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WeatherEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $weatherData;

    public function __construct($weatherData)
    {
        $this->weatherData = $weatherData;
    }

    public function build()
    {
        return $this->view('mail')
            ->with(['data' => $this->weatherData]);
    }
}
