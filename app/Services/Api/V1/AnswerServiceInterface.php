<?php

namespace App\Services\Api\V1;

use Illuminate\Database\Eloquent\Model;

interface AnswerServiceInterface
{
    public function getListByQuestionId(int $questionId, int $perPage=15): \Illuminate\Contracts\Pagination\LengthAwarePaginator;

    public function create(int $questionId, array $data): Model;
}
