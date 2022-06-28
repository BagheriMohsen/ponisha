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
}
