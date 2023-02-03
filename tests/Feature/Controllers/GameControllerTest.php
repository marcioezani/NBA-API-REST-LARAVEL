<?php
namespace Tests\Feature\Controllers;

use Tests\TestCase;

class GameControllerTest extends TestCase
{
    /** 
    * Setup stuff
    **/
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_games()
    {
        $response = $this->get(route('games.index'));

        $this->assertEquals(200, $response->getStatusCode());

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'date',
                    'home_team',
                    'home_team_score',
                    'period',
                    'postseason',
                    'season',
                    'status',
                    'time',
                    'visitor_team',
                    'visitor_team_score',
                ]
            ]
        ]);
    }
}
