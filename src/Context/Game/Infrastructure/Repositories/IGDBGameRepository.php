<?php

declare(strict_types=1);

namespace Src\Context\Game\Infrastructure\Repositories;

use Src\Context\Game\Domain\Contracts\GameRepositoryContract;
use MarcReichel\IGDBLaravel\Models\Game as IGDBGame;
use Src\Context\Game\Domain\Game;
use Src\Context\Game\Domain\Games;
use Src\Context\Game\Domain\ValueObjects\GameId;
use Src\Context\Game\Domain\ValueObjects\GameName;

final class IGDBGameRepository implements GameRepositoryContract
{
    public function __construct()
    {

    }

    public function search(?string $name = ''): Games
    {
        $games = IGDBGame::get();
        $games = $games->map(
            function (IGDBGame $game) {
                return new Game(new GameId($game['id']), new GameName($game['name']));
            }
        )->toArray();
        return new Games($games);
    }
}