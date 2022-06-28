<?php

namespace App\Repositories\Eloquent;

use App\Models\Question;
use App\Repositories\QuestionRepositoryInterface;

class QuestionRepository extends BaseRepository implements QuestionRepositoryInterface
{

    public function getFieldsSearchable(): array
    {
        return [];
    }

    public function model(): string
    {
        return Question::class;
    }

    public function listByUser(int $userId, int $perPage=15): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->query()
            ->with('user', 'answers')
            ->where('user_id', $userId)
            ->latest()
            ->paginate($perPage);
    }
}
