<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\V1\LoginRequest;
use App\Services\Api\V1\AuthServiceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class LoginController extends BaseApiController
{

    public function __construct(private AuthServiceInterface $authService)
    {
    }

    public function __invoke(LoginRequest $loginRequest): JsonResponse
    {
        $data = $loginRequest->validated();

        if (auth()->attempt($data)) {
            $user = auth()->user();
            $accessToken = $this->authService->createToken($user);

            return $this->sendResponse(data: [
                'access_token' => $accessToken,
                'token_type' => 'Bearer',
            ], message: __('User successfully registered'), code: Response::HTTP_CREATED);
        }

        return $this->sendResponse(message: __('Email or Password is incorrect!'));
    }
}
