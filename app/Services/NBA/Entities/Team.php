<?php

namespace App\Services\NBA\Entities;

class Team
{
    /* data:
        [
            "id" => 28
            "abbreviation" => "TOR"
            "city" => "Toronto"
            "conference" => "East"
            "division" => "Atlantic"
            "full_name" => "Toronto Raptors"
            "name" => "Raptors"
        ]
    */

    public int $id;
    public string $abbreviation;
    public string $city;
    public string $conference;
    public string $division;
    public string $full_name;
    public string $name;

    public function __construct(mixed $data)
    {
        $this->id = data_get($data, 'id');
        $this->abbreviation = data_get($data, 'abbreviation');
        $this->city = data_get($data, 'city');
        $this->conference = data_get($data, 'conference');
        $this->division = data_get($data, 'division');
        $this->full_name = data_get($data, 'full_name');
        $this->name = data_get($data, 'name');
    }
}
