<?php

declare(strict_types=1);

namespace Src\Context\Game\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\Context\Game\Domain\Games;
use Src\Context\Game\Infrastructure\Repositories\IGDBGameRepository;
use Src\Context\Game\Application\SearchGamesUseCase;

final class SearchGamesController
{
    private $repository;

    public function __construct(IGDBGameRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request): Games
    {
        $searchGamesUseCase = new SearchGamesUseCase($this->repository);
        return $searchGamesUseCase->__invoke($request);
    }
}