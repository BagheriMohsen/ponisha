<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\V1\RegisterRequest;
use App\Services\Api\V1\AuthServiceInterface;
use App\Services\Api\V1\UserServiceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends BaseApiController
{

    public function __construct(private UserServiceInterface $userService, private AuthServiceInterface $authService)
    {
    }

    public function __invoke(RegisterRequest $registerRequest): JsonResponse
    {
        $data = $registerRequest->validated();
        $user = $this->userService->create($data);

        $accessToken = $this->authService->createToken($user);

        return $this->sendResponse(data: [
            'access_token' => $accessToken,
            'token_type' => 'Bearer',
        ], message: __('User successfully registered'), code: Response::HTTP_CREATED);
    }
}
