<?php
namespace Tests\Feature\Services\NBA;

use Illuminate\Support\Collection;

use App\Services\NBA\NBAService;
use App\Services\NBA\Entities\Team;

use Tests\TestCase;

class TeamsTest extends TestCase
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
    public function test_if_the_nbaservice_returns_a_successful_teams()
    {
        $service = new NBAService;

        $parameters = 'page=1';
    
        $teams = $service->teams()->get($parameters);

        $this->assertInstanceOf(Collection::class, $teams);
        $this->assertInstanceOf(Team::class, $teams->first());
    }
}


