<?php

declare(strict_types=1);

namespace Src\Context\Game\Domain;

use Src\Context\Game\Domain\ValueObjects\GameId;
use Src\Context\Game\Domain\ValueObjects\GameName;

final class Game
{
    public function __construct(
        public readonly GameId $id,
        //public readonly GameUuid $uuid,
        public readonly GameName $name
    )
    {
    }

    public function create(GameId $id, GameName $name): self
    {
        return new self($id, $name);
    }
}