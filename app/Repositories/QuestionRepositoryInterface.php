<?php

namespace App\Repositories;

interface QuestionRepositoryInterface extends BaseRepositoryInterface
{
    public function listByUser(int $userId, int $perPage=15): \Illuminate\Contracts\Pagination\LengthAwarePaginator;
}
