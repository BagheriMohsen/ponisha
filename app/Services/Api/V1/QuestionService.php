<?php

namespace App\Services\Api\V1;

use App\Repositories\QuestionRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class QuestionService implements QuestionServiceInterface
{
    public function __construct(private QuestionRepositoryInterface $questionRepository)
    {
    }

    public function create(array $data): Model
    {
        return $this->questionRepository->create($data);
    }

    public function getWithPaginate(?array $queries = null, array $with = [], $sort = "created_at", $direction = "desc", $perPage = 15): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->questionRepository->getWithPaginate($queries,$with, $sort, $direction, $perPage);
    }

    public function listByUser(int $userId, int $perPage = 15): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->questionRepository->listByUser($userId, $perPage);
    }
}
