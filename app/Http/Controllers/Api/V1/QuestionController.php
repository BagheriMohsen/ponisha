<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\V1\QuestionStoreRequest;
use App\Http\Resources\Api\PaginationResource;
use App\Http\Resources\Api\V1\QuestionListResource;
use App\Services\Api\V1\QuestionServiceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class QuestionController extends BaseApiController
{

    public function __construct(private QuestionServiceInterface $questionService)
    {
    }

    public function index(): JsonResponse
    {
        $questions = $this->questionService->getWithPaginate(with:['answers', 'user']);

        return $this->sendResponseWithPagination(
            data:new QuestionListResource($questions),
            pagination: new PaginationResource($questions));
    }

    public function store(QuestionStoreRequest $questionStoreRequest): JsonResponse
    {
        $data = $questionStoreRequest->validated();
        $this->questionService->create($data);

        return $this->sendResponse(message: __('Question has been created'), code: Response::HTTP_CREATED);
    }

    public function getListByAuthenticateUser(): JsonResponse
    {
        $user = auth()->user();
        $questions = $this->questionService->listByUser($user->id);

        return $this->sendResponseWithPagination(
            new QuestionListResource($questions),
            new PaginationResource($questions)
        );
    }

}
