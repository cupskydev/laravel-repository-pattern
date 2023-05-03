<?php

namespace App\Services;

use App\Repositories\Interfaces\CarRepositoryInterface;
use App\Services\Interfaces\CarServiceInterface;

class CarService implements CarServiceInterface
{
    public $carRepositoryInterface;

    public function __construct(
        CarRepositoryInterface $carRepositoryInterface
    ) {
        $this->carRepositoryInterface = $carRepositoryInterface;
    }

    public function list()
    {
        return $this->carRepositoryInterface->get();
    }

    public function show(string|int $id)
    {
        return $this->carRepositoryInterface->findByIdOrFail($id);
    }

    public function create(array $fields)
    {
        return $this->carRepositoryInterface->create($fields);
    }

    public function update(array $fields, string|int $id)
    {
        return $this->carRepositoryInterface->updateById($fields, $id);
    }

    public function delete(string|int $id)
    {
        return $this->carRepositoryInterface->deleteById($id);
    }
}
