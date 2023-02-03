<?php

namespace App\Services\NBA\Endpoints;

use Illuminate\Support\Collection;

use App\Services\NBA\Entities\Team;

class Teams extends BaseEndpoint
{
    public function get(string $parameters):Collection 
    {
        return $this->transform(
            $this->service
            ->api
            ->get(!empty($parameters) ? '/teams?' . $parameters : '/teams')
            ->json('data'),
            Team::class
        );
    }

    public function getTeam(int $id):Collection 
    {
        return $this->transform(
            $this->service
            ->api
            ->get('/teams/' . $id)
            ->json('data'),
            Player::class
        );
    }
}
