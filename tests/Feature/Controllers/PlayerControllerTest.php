<?php
namespace Tests\Feature\Controllers;

use Tests\TestCase;

class PlayerControllerTest extends TestCase
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
    public function test_the_application_returns_a_successful_players()
    {
        $response = $this->get(route('players.index'));

        $this->assertEquals(200, $response->getStatusCode());

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'first_name',
                    'last_name',
                    'position',
                    'team' => [
                        'id',
                        'abbreviation',
                        'city',
                        'conference',
                        'division',
                        'full_name',
                        'name',
                    ]
                ]
            ]
        ]);
    }
}
