<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\NBA\NBAService;

class GameController extends Controller
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

            $json = $this->service->games()->get($parameters);

            return response()->ok($json, 'List of Games');
        }
        catch(\Exception $error) {
            return response()->internalServerError($error->getMessage());
        }
    }

    public function show(int $id)
    {
        try {
            $json = $this->service->games()->getGame($id);

            return response()->ok($json, 'Game data');
        }
        catch(\Exception $error) {
            return response()->internalServerError($error->getMessage());
        }
    }
}
