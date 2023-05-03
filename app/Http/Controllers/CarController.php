<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\CarServiceInterface;
use App\Trait\ResponseFormatTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarController extends Controller
{
    use ResponseFormatTrait;

    public $carServiceInterface;

    public function __construct(
        CarServiceInterface $carServiceInterface
    ) {
        $this->carServiceInterface = $carServiceInterface;
    }

    public function list(Request $request)
    {
        $data = $this->carServiceInterface->list();
        return $this->responseFormat(data: $data);
    }

    public function show(string|int $car_id)
    {
        $data = $this->carServiceInterface->show($car_id);
        return $this->responseFormat(data: $data);
    }
    public function create(Request $request)
    {
        $data = $this->carServiceInterface->create($request->all());
        return $this->responseFormat(status: Response::HTTP_CREATED, data: $data);
    }
    public function update(Request $request, $car_id)
    {
        $data = $this->carServiceInterface->update($request->all(), $car_id);
        return $this->responseFormat(data: $data);
    }
    public function delete(string|int $car_id)
    {
        $data = $this->carServiceInterface->list();
        return $this->responseFormat(data: $data);
    }
}
