<?php
namespace Tests\Feature\Controllers;

use Tests\TestCase;

class TeamControllerTest extends TestCase
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
    public function test_the_application_returns_a_successful_teams()
    {
        $response = $this->get(route('teams.index'));

        $this->assertEquals(200, $response->getStatusCode());

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'abbreviation',
                    'city',
                    'conference',
                    'division',
                    'full_name',
                    'name',
                ]
            ]
        ]);
    }
}
