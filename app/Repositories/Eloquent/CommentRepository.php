<?php

namespace App\Repositories\Eloquent;

use App\Models\Comment;
use App\Repositories\BaseRepositoryInterface;

class CommentRepository extends BaseRepository implements BaseRepositoryInterface
{

    public function getFieldsSearchable(): array
    {
        return [];
    }

    public function model(): string
    {
        return Comment::class;
    }
}
