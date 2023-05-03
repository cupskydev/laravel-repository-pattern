<?php

namespace App\Repositories;

use App\Models\Car;
use App\Repositories\Interfaces\CarRepositoryInterface;

class CarRepository extends BaseRepository implements CarRepositoryInterface
{
    public $model;

    public function __construct(Car $model)
    {
        $this->model = $model;
    }
}
