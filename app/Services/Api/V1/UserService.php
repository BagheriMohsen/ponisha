<?php

namespace App\Services\Api\V1;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UserService implements UserServiceInterface
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function create(array $data): Model
    {
        return $this->userRepository->create($data);
    }
}
