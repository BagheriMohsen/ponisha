<?php

namespace App\Services\Api\V1;


use App\Contracts\Comment;
use Illuminate\Database\Eloquent\Model;

class CommentService implements CommentServiceInterface
{
    public function create(Comment $comment, string $description): Model
    {
        return $comment->comments()->create(['description', $description]);
    }
}
