<?php

namespace App\Http\Controllers\Api\V1;

use App\Contracts\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\CommentStoreRequest;
use App\Services\Api\V1\CommentServiceInterface;

class CommentController extends Controller
{
    public function __construct(private CommentServiceInterface $commentService)
    {
    }

    public function store(Comment $comment, CommentStoreRequest $commentStoreRequest)
    {
        $this->commentService->create($comment, $commentStoreRequest->description);
    }

}
