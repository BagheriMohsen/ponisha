<?php

namespace App\Services\Api\V1;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

interface AuthServiceInterface
{
    public function createToken(User|Authenticatable $user): string;

    public function deleteToken(User|Authenticatable $user): int;
}
