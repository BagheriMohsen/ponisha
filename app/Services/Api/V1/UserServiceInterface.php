<?php

namespace App\Services\Api\V1;

use Illuminate\Database\Eloquent\Model;

interface UserServiceInterface
{
    public function create(array $data): Model;
}
