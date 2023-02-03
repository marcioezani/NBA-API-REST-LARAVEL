<?php

namespace App\Services\NBA\Endpoints;

use App\Services\NBA\Endpoints\Games;

trait HasGames 
{
    public function games () 
    {
        return new Games();
    }
}