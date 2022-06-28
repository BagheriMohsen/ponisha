<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\V1\AnswerStoreRequest;
use App\Http\Resources\Api\PaginationResource;
use App\Http\Resources\Api\V1\AnswerListResource;
use App\Models\Question;
use App\Services\Api\V1\AnswerServiceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class AnswerController extends BaseApiController
{

    public function __construct(private AnswerServiceInterface $answerService)
    {
    }

    public function index(Question $question): JsonResponse
    {
        $answers = $this->answerService->getListByQuestionId($question->id);

        return $this->sendResponseWithPagination(
            new AnswerListResource($answers),
            new PaginationResource($answers)
        );
    }

    public function store(Question $question, AnswerStoreRequest $answerStoreRequest): JsonResponse
    {
        $data = $answerStoreRequest->validated();
        $this->answerService->create($question->id, $data);

        return $this->sendResponse(message: __('Answer has been created'), code: Response::HTTP_CREATED);
    }

}
