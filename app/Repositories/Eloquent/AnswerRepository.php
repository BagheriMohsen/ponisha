<?php

namespace App\Repositories\Eloquent;

use App\Models\Answer;
use App\Repositories\AnswerRepositoryInterface;

class AnswerRepository extends BaseRepository implements AnswerRepositoryInterface
{

    public function getFieldsSearchable(): array
    {
        return [];
    }

    public function model(): string
    {
        return Answer::class;
    }

    public function getListByQuestionId(int $questionId, int $perPage=15): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->query()
            ->with('user')
            ->where('question_id', $questionId)
            ->latest()
            ->paginate($perPage);
    }
}
