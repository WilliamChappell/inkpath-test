<?php

namespace App\Services;
use Exception;
use Log;

class APIService
{
    private static $url = "https://api.genderize.io";

    public static function getCurl($name)
    {
        // Seting up curl
        $ch = curl_init();

        // Escaping the name given
        $escaped = curl_escape($ch, $name);

        // Setting curl
        curl_setopt($ch, CURLOPT_URL, self::$url . "?name=$escaped");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Running curl
        $response = curl_exec($ch);

        // If something went wrong with the request
        if(curl_errno($ch)) {
            throw new Exception(curl_error($ch));
        }

        // Get the HTTP code of the request
        $http_code = curl_getinfo($ch)['http_code'];

        curl_close($ch);

        // Finally, if the request returns as something other than successful..
        if($http_code != 200){
            Log::error("Error running CURL. Http code given: $http_code on name $name");
            throw new Exception("Something went wrong handling your request. Please try again later.");
        }

        return json_decode($response);
    }
}