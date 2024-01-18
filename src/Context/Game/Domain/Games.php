<?php

declare(strict_types=1);

namespace Src\Context\Game\Domain;

use Src\Shared\Domain\Collection;

final class Games extends Collection
{
    protected function type(): string
    {
        return Game::class;
    }
}