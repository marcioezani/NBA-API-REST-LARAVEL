<?php

namespace App\Services\NBA\Endpoints;

use Illuminate\Support\Collection;

use App\Services\NBA\Entities\Game;

class Games extends BaseEndpoint
{
    public function get(string $parameters):Collection
    {
        return $this->transform(
            $this->service
            ->api
            ->get(!empty($parameters) ? '/games?' . $parameters : '/games')
            ->json('data'),
            Game::class
        );
    }

    public function getGame(int $id):Collection
    {
        return $this->transform(
            $this->service
            ->api
            ->get('/games/' . $id)
            ->json('data'),
            Game::class
        );
    }
}
