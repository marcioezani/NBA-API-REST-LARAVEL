<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\NBA\NBAService;

class PlayerController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new NBAService();
    }

    public function index() 
    {
        try {
            $parameters = http_build_query(request()->query());

            $json = $this->service->players()->get($parameters);

            return response()->ok($json, 'List of Players');
        }
        catch(\Exception $error) {
            return response()->internalServerError($error->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            $json = $this->service->players()->getPlayer($id);

            return response()->ok($json, 'Player data');
        }
        catch(\Exception $error) {
            return response()->internalServerError($error->getMessage());
        }
    }
}
