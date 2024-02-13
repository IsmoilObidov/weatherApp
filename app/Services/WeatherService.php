<?php

namespace App\Services;

class WeatherService
{

    function getWeatherOWM(string $city)
    {
        $response = [];

        $cityData = $this->curCityOWM($city);

        if ($cityData) {
            $response['status'] = 'success';
            $weather = $this->curWeatherOWM($cityData[0]->lat, $cityData[0]->lon);
            $response['data']['time'] = $weather->current->dt;
            $response['data']['temp'] = $weather->current->temp;
        } else {
            $response['status'] = 'failed';
            $response['data'] = [];
        }

        return $response;
    }

    function curWeatherOWM($lat, $lon)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.openweathermap.org/data/3.0/onecall?lat=' . $lat . '&lon=' . $lon . '&units=metric&appid=eb62c518e9294f2c8887015dc3531884',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response);
    }

    function curCityOWM($city)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.openweathermap.org/geo/1.0/direct?q=' . $city . '&limit=1&appid=eb62c518e9294f2c8887015dc3531884',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response);
    }

    function getWeatherACCU(string $city)
    {
        $response = [];

        $cityData = $this->curCityACCU($city);

        if ($cityData) {
            $response['status'] = 'success';
            $weather = $this->curWeatherACCU($cityData[0]->Key)[0];
            $response['data']['time'] = $weather->EpochTime;
            $response['data']['temp'] = $weather->Temperature->Metric->Value;
        } else {
            $response['status'] = 'failed';
            $response['data'] = [];
        }

        return $response;
    }

    function curWeatherACCU($city_code)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://dataservice.accuweather.com/currentconditions/v1/' . $city_code . '?apikey=vNIHCzpMi4Gu3NL4XBVC0H9vIMJG6OWs',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response);
    }

    function curCityACCU($city)
    {
        $curl = curl_init($city);

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://dataservice.accuweather.com/locations/v1/search?q=' . $city . '&apikey=vNIHCzpMi4Gu3NL4XBVC0H9vIMJG6OWs',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return json_decode($response);
    }
}
