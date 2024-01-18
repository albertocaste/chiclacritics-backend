<?php

namespace Src\Shared\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

abstract class BaseController extends Controller
{
    /**
     * Json response for api controller
     *
     * @param int $status
     * @param bool $error
     * @param array|string|int|bool|JsonResource $response
     * @return JsonResponse
     */
    protected function jsonResponse(
        array|string|int|bool|JsonResource $data,
        string $message,
        int $status
    ): JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message
        ], $status);
    }
}