<?php
namespace Tests\Feature\Services\NBA;

use Illuminate\Support\Collection;

use App\Services\NBA\NBAService;
use App\Services\NBA\Entities\Game;

use Tests\TestCase;

class GamesTest extends TestCase
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
    public function test_if_the_nbaservice_returns_a_successful_games()
    {
        $service = new NBAService;

        $parameters = 'page=1';
    
        $games = $service->games()->get($parameters);

        $this->assertInstanceOf(Collection::class, $games);
        $this->assertInstanceOf(Game::class, $games->first());
    }
}


