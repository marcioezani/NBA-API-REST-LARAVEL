<?php

namespace App\Services\NBA\Endpoints;

use Illuminate\Support\Collection;

use App\Services\NBA\NBAService;

class BaseEndpoint
{
    protected NBAService $service;
    
    public function __construct()
    {
        $this->service = new NBAService();
    }

    protected function transform(mixed $json, string $entity):Collection
    {
        return collect($json)->map(fn ($colect) => new $entity($colect));
    }
}
