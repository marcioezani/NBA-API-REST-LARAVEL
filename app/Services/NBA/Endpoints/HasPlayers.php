<?php

namespace App\Services\NBA\Endpoints;

use App\Services\NBA\Endpoints\Players;

trait HasPlayers 
{
    public function players () 
    {
        return new Players();
    }
}