<?php

namespace App\Http\Controllers\User;

use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Src\Shared\Infrastructure\Controllers\BaseController;

class CreateUserController extends BaseController
{
    /**
     * @var \Src\Context\User\Infrastructure\CreateUserController
     */
    private $createUserController;

    public function __construct(\Src\Context\User\Infrastructure\CreateUserController $createUserController)
    {
        $this->createUserController = $createUserController;
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
        $user = new UserResource($this->createUserController->__invoke($request));
        return $this->jsonResponse($user, 'User created', 201);
    }
}