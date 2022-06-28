<?php

namespace App\Services\Api\V1;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;

interface AnswerServiceInterface
{
    public function getListByQuestionId(int $questionId, int $perPage=15): \Illuminate\Contracts\Pagination\LengthAwarePaginator;

    public function create(int $questionId, array $data): Model;

    public function accept(Question $question, Answer $answer): bool;
}
