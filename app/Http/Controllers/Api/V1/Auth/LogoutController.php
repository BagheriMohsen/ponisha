<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\BaseApiController;
use App\Services\Api\V1\AuthServiceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class LogoutController extends BaseApiController
{
    public function __construct(private AuthServiceInterface $authService)
    {
    }

    public function __invoke(): JsonResponse
    {
        $user = auth()->user();
        $this->authService->deleteToken($user);

        return $this->sendResponse(code: Response::HTTP_NO_CONTENT);
    }
}
