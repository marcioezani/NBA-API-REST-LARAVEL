<?php

namespace App\Services\NBA\Entities;

class Player
{
    /* data:
        [
            "id" => 497
            "first_name" => "Michael"
            "height_feet" => null
            "height_inches" => null
            "last_name" => "Ansley"
            "position" => ""
            "team" => [
                "id" => 22
                "abbreviation" => "ORL"
                "city" => "Orlando"
                "conference" => "East"
                "division" => "Southeast"
                "full_name" => "Orlando Magic"
                "name" => "Magic"
            ]
            "weight_pounds" => null
        ]
    */

    public int $id;
    public string $first_name;
    public string $last_name;
    public string $position;
    public mixed $height_feet;
    public mixed $height_inches;
    public array $team;

    public function __construct(mixed $data)
    {
        $this->id = data_get($data, 'id');
        $this->first_name = data_get($data, 'first_name');
        $this->last_name = data_get($data, 'last_name');
        $this->position = data_get($data, 'position');
        $this->height_feet = data_get($data, 'height_feet');
        $this->height_inches = data_get($data, 'height_inches');
        $this->team = data_get($data, 'team');
    }
}
