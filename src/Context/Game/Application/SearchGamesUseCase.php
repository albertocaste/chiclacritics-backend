<?php

declare(strict_types=1);

namespace Src\Context\Game\Application;

use Src\Context\Game\Domain\Contracts\GameRepositoryContract;

final class SearchGamesUseCase
{
    private $repository;

    public function __construct(GameRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {
        return $this->repository->search('as');
    }
}