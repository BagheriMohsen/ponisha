<?php

namespace App\Services\Api\V1;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function create(array $data): Model
    {
        $data['password'] = Hash::make($data['password']);

        return $this->userRepository->create($data);
    }
}
