<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Resources\Api\V1\UserDetailResource;
use App\Models\User;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends BaseApiController
{
    public function show(User $user): JsonResponse
    {
        return $this->sendResponse(new UserDetailResource($user));
    }
}
