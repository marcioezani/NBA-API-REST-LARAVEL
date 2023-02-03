<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\NBA\NBAService;

class TeamController extends Controller
{
    protected $service;

    public function __construct()
    {
        $this->service = new NBAService();
    }

    public function index() 
    {
        try {
            $service = new NBAService();

            $parameters = http_build_query(request()->query());

            $json = $service->teams()->get($parameters);

            return response()->ok($json, 'List of Teams');
        }
        catch(\Exception $error) {
            return response()->internalServerError($error->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $json = $this->service->teams()->getTeam($id);

            return response()->ok($json, 'Team data');
        }
        catch(\Exception $error) {
            return response()->internalServerError($error->getMessage());
        }
    }
}
