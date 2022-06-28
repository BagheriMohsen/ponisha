<?php

namespace App\Services\Api\V1;

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
}
