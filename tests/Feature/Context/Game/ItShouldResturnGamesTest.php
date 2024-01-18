<?php

namespace Tests\Feature\Context\Game;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItShouldResturnGamesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_obtener_listado_de_juegos(): void
    {
        $response = $this->get('/api/games/');

        $response->assertStatus(200);
    }
}
