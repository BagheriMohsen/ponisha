<?php

namespace App\Services\Api\V1;

use Illuminate\Database\Eloquent\Model;

interface QuestionServiceInterface
{
    public function create(array $data): Model;

    public function getWithPaginate(null|array $queries=null,
                                    array $with=[],
                                    $sort="created_at",
                                    $direction="desc",
                                    $perPage=15): \Illuminate\Contracts\Pagination\LengthAwarePaginator;

}
