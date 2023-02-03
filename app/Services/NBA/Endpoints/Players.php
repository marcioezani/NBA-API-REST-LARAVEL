<?php

namespace App\Services\NBA\Endpoints;

use Illuminate\Support\Collection;

use App\Services\NBA\Entities\Player;

class Players extends BaseEndpoint
{
    public function get(string $parameters):Collection
    {
        return $this->transform(
            $this->service
            ->api
            ->get(!empty($parameters) ? '/players?' . $parameters : '/players')
            ->json('data'),
            Player::class
        );
    }

    public function getPlayer(int $id):Collection
    {
        return $this->transform(
            $this->service
            ->api
            ->get('/players/' . $id)
            ->json('data'),
            Player::class
        );
    }
}
