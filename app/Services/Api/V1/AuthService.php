<?php

namespace App\Services\Api\V1;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

class AuthService implements AuthServiceInterface
{

    public function createToken(User|Authenticatable $user): string
    {
        $token = $user->createToken('auth')->plainTextToken;
        list(, $accessToken) = explode('|', $token);

        return $accessToken;
    }

    public function deleteToken(User|Authenticatable $user): int
    {
        return $user->tokens()
            ->where('id', $user->currentAccessToken()->id)
            ->delete();
    }
}
