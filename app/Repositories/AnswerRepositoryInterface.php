<?php

namespace App\Repositories;

use App\Models\Answer;
use App\Models\Question;

interface AnswerRepositoryInterface extends BaseRepositoryInterface
{
    public function getListByQuestionId(int $questionId, int $perPage=15): \Illuminate\Contracts\Pagination\LengthAwarePaginator;

    public function accept(Answer $answer): bool;

    public function rejectPreviousAccepted(Question $question): int;
}
