<?php

namespace App\Services\NBA\Endpoints;

use App\Services\NBA\Endpoints\Teams;

trait HasTeams 
{
    public function teams () 
    {
        return new Teams();
    }
}