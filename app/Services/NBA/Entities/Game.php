<?php

namespace App\Services\NBA\Entities;

class Game
{
    /* game: [
            "id" => 47179
            "date" => "2019-01-30T00:00:00.000Z"
            "home_team" => [
                "id" => 2
                "abbreviation" => "BOS"
                "city" => "Boston"
                "conference" => "East"
                "division" => "Atlantic"
                "full_name" => "Boston Celtics"
                "name" => "Celtics"
            ]
            "home_team_score" => 126
            "period" => 4
            "postseason" => false
            "season" => 2018
            "status" => "Final"
            "time" => " "
            "visitor_team" => [
                "id" => 4
                "abbreviation" => "CHA"
                "city" => "Charlotte"
                "conference" => "East"
                "division" => "Southeast"
                "full_name" => "Charlotte Hornets"
                "name" => "Hornets"
            ]
            "visitor_team_score" => 94
        ]
    */

    public int $id;
    public string $date;
    public array $home_team;
    public int $home_team_score;
    public int $period;
    public bool $postseason;
    public int $season;
    public string $status;
    public string $time;
    public array $visitor_team;
    public int $visitor_team_score;

    public function __construct(mixed $data)
    {
        $this->id = data_get($data, 'id');
        $this->date = data_get($data, 'date');
        $this->home_team = data_get($data, 'home_team');
        $this->home_team_score = data_get($data, 'home_team_score');
        $this->period = data_get($data, 'period');
        $this->postseason = data_get($data, 'postseason');
        $this->season = data_get($data, 'season');
        $this->status = data_get($data, 'status');
        $this->time = data_get($data, 'time');
        $this->visitor_team = data_get($data, 'visitor_team');
        $this->visitor_team_score = data_get($data, 'visitor_team_score');
    }
}
