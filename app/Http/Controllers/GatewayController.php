<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GatewayController extends Controller
{
    public function getFreeBooks(Request $request)
    {
        $apiKey = 'e5a36e79afmsh18876c308e596ccp1b1112jsn5fb4d83aa0e3'; // Get API key from configuration

        $client = new Client();

        $response = $client->request('GET', 'https://freebooks-api2.p.rapidapi.com/fetchEbooks/harry%20potter', [
            'headers' => [
                'X-RapidAPI-Host' => 'freebooks-api2.p.rapidapi.com',
                'X-RapidAPI-Key' => $apiKey,
            ],
        ]);

        return $response->getBody();
    }
}
