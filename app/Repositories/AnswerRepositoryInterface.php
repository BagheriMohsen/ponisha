<?php

namespace App\Repositories;

interface AnswerRepositoryInterface extends BaseRepositoryInterface
{
    public function getListByQuestionId(int $questionId, int $perPage=15): \Illuminate\Contracts\Pagination\LengthAwarePaginator;
}
