<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function get(array|callable|null $where = null, ?array $relations = null);

    public function paginate(?int $paginate = 10, array|callable|null $where, ?array $relations = null);

    public function findById(string| int $id, ?array $relations = null);

    public function findByIdOrFail(string| int $id, ?array $relations = null);

    public function findWhere(array|callable $where, ?array $relations = null);

    public function findWhereOrFail(array|callable $where, ?array $relations = null);

    public function create(array $fields);

    public function updateById(array $fields, string|int $id);

    public function updateWhere(array $fields, array|callable $where);

    public function deleteById(string|int $id);

    public function deleteWhere(array|callable $where);
}