<?php

namespace Tests\Feature\Context\Game;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Src\Context\Game\Domain\Game;
use Tests\TestCase;
use Illuminate\Support\Str;

class ItShouldCreateAReviewTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_it_should_create_a_review_for_a_game(): void
    {
        $response = $this->post('/api/reviews/',[
            'userId' => fake()->name(),
            'gameId' => mt_rand(1000000, 9999999),
            'title' => Str::random(10),
            'text' => Str::random(50),
            'rating' => mt_rand(0, 9999999),
        ]);

        $response->assertJsonFragment([
            'data' => [
                'id' => fake()->name()
            ],
            'message' => 'Game review created'
        ]);
    }
}
