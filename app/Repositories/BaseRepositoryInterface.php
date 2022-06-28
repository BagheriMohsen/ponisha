<?php

namespace App\Repositories;


interface BaseRepositoryInterface
{
    public function create(array $data);

    public function update(string $id, array $data);

    public function updateWithColumn(string $column, string $value, array $data): int;

    public function find(string $column, string $value);

    public function firstOrFail(string $column, string $value);

    public function delete(string $column, string $value);

    public function get($with=[], array $selectColumns=['*']);

    public function getWithPaginate(null|array $queries=null, array $with=[], $sort="created_at",
                                               $direction="desc", $perPage=15): \Illuminate\Contracts\Pagination\LengthAwarePaginator;

    public function firstOrCreate($queries,$data);

    public function search($value, $sort='created_at', $direction='desc', $perPage=15): \Illuminate\Contracts\Pagination\LengthAwarePaginator;
}
