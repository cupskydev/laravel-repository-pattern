<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    public $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function get(array|callable|null $where = null, ?array $relations = null)
    {
        return $this->model->when($relations, function ($query) use ($relations) {
            $query->with($relations);
        })->when($where, function ($query) use ($where) {
            $query->where($where);
        })->get();
    }

    public function paginate(?int $paginate = 10, array|callable|null $where, ?array $relations = null)
    {
        return $this->model->when($relations, function ($query) use ($relations) {
            $query->with($relations);
        })->when($where, function ($query) use ($where) {
            $query->where($where);
        })->paginate($paginate);
    }

    public function findById(string|int $id, ?array $relations = null)
    {
        return $this->model->when($relations, function ($query) use ($relations) {
            $query->with($relations);
        })->find($id);
    }

    public function findByIdOrFail(string|int $id, ?array $relations = null)
    {
        return $this->model->when($relations, function ($query) use ($relations) {
            $query->with($relations);
        })->findOrFail($id);
    }

    public function findWhere(array|callable $where, ?array $relations = null)
    {
        return $this->model->when($relations, function ($query) use ($relations) {
            $query->with($relations);
        })->where($where)->first();
    }

    public function findWhereOrFail(array|callable $where, ?array $relations = null)
    {
        return $this->model->when($relations, function ($query) use ($relations) {
            $query->with($relations);
        })->where($where)->firstOrFail();
    }

    public function create(array $fields)
    {
        return $this->model->create($fields);
    }

    public function updateById(array $fields, string|int $id)
    {
        return $this->findByIdOrFail($id)->update($fields);
    }

    public function updateWhere(array $fields, array|callable $where)
    {
        return $this->findWhereOrFail($where)->update($fields);
    }

    public function deleteById(string|int $id)
    {
        return $this->findByIdOrFail($id)->delete();
    }

    public function deleteWhere(array|callable $where)
    {
        return $this->findWhereOrFail($where)->delete();
    }
}
