<?php

namespace App\Services\Api\V1;

use App\Contracts\Comment;
use Illuminate\Database\Eloquent\Model;

interface CommentServiceInterface
{
    public function create(Comment $comment, string $description): Model;
}
