<?php

declare(strict_types=1);

namespace Src\Context\Game\Domain\Contracts;

use Src\Context\Game\Domain\Games;

interface GameRepositoryContract
{
    public function search(?string $name): ?Games;
}