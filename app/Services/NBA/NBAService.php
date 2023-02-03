<?php

namespace App\Services\NBA;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

use App\Services\NBA\Endpoints\HasPlayers;
use App\Services\NBA\Endpoints\HasTeams;
use App\Services\NBA\Endpoints\HasGames;

/**
 * 
 * NBA Rapid Api - Service
 * https://rapidapi.com
 * 
 * url API
 * https://free-nba.p.rapidapi.com
 * 
 **/
class NBAService
{
    Use HasPlayers;
    Use HasTeams;
    Use HasGames;

    public PendingRequest $api;

    public function __construct()
    {
        $this->api = Http::withHeaders([
            'X-RapidAPI-Key' => env("APP_API_KEY"),
            'X-RapidAPI-Host' => env("APP_API_HOST")
        ])
        ->baseUrl(env("APP_API_URL"));
    }
}
