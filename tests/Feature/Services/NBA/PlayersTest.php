<?php
namespace Tests\Feature\Services\NBA;

use Illuminate\Support\Collection;

use App\Services\NBA\NBAService;
use App\Services\NBA\Entities\Player;

use Tests\TestCase;

class PlayersTest extends TestCase
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
    public function test_if_the_nbaservice_returns_a_successful_players()
    {
        $service = new NBAService;

        $parameters = 'page=1&per_pag=5';
    
        $players = $service->players()->get($parameters);

        $this->assertInstanceOf(Collection::class, $players);
        $this->assertInstanceOf(Player::class, $players->first());
    }
}


