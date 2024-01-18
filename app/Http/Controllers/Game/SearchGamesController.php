<?php

namespace App\Http\Controllers\Game;

use App\Http\Resources\GameResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Context\Game\Infrastructure\Controllers\SearchGamesController as AHSearchGamesController;
use Src\Shared\Infrastructure\Controllers\BaseController;

class SearchGamesController extends BaseController
{
    /**
     * @var AHSearchGamesController
     */
    private $searchGamesController;

    public function __construct(AHSearchGamesController $searchGamesController)
    {
        $this->searchGamesController = $searchGamesController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request) : JsonResponse
    {
        // TODO: Validate
        $games = GameResource::collection($this->searchGamesController->__invoke($request)->items());
        return $this->jsonResponse($games, 'Games list retrieved successfully', 200);

    }
}