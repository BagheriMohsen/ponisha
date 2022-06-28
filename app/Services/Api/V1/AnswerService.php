<?php

namespace App\Services\Api\V1;

use App\Models\Answer;
use App\Models\Question;
use App\Repositories\AnswerRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class AnswerService implements AnswerServiceInterface
{
    public function __construct(private AnswerRepositoryInterface $answerRepository)
    {
    }

    public function getListByQuestionId(int $questionId, int $perPage=15): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->answerRepository->getListByQuestionId($questionId, $perPage);
    }

    public function create(int $questionId, array $data): Model
    {
        $data['question_id'] = $questionId;

        return $this->answerRepository->create($data);
    }

    public function accept(Question $question, Answer $answer): bool
    {
        $this->answerRepository->rejectPreviousAccepted($question);

        return $this->answerRepository->accept($answer);
    }

    public function storeComment(Answer $answer, string $description): Model
    {
        return $answer->comments()->create(['description', $description]);
    }
}
